<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Support\Facades\{Auth, Hash, Validator, File, Artisan};


class AuthController extends Controller
{
    // Validations => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    public function clear(Request $request)
    {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('event:clear');
        return $this->successRes(200, 'All Cache was cleared');
    }

    public function sign_up(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:25',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s])[\w\W]+$/',
            ],
            'device_type' => 'nullable',
            'device_token' => 'nullable',
        ], [
            'password.regex' => 'The password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one numeric digit, and one special character.',
        ]);

        if ($validator->fails()) return $this->errorHandle($validator);
        

        $otp = env('OTP', mt_rand(1000, 9999));

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 1;
        $user->otp = $otp;
        $user->device_type = $request->device_type;
        $user->device_token = $request->device_token;

        if (isset($request->device_model)) $user->device_model = $request->device_model;

        if ($request->profile_image) {
            $file = $request->file('profile_image');
            $name = time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $name);
            $user->profile_image = $name;
        }
        $user->save();

        $userName = $request->get('first_name');
        $templatePath = 'templates.emails.welcome';
        $subject = 'Welcome Plateform OTP!';

        if (!env('OTP')) $this->sendEmail($request->get('email'), $subject, $templatePath, $otp, $userName);

        return $this->successRes(201, 'User register successfully!', $user);
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp' => 'required'
        ]);

        if ($validator->fails()) return $this->errorHandle($validator);
        

        $check_user  = User::where('email', $request->email)->where('otp', $request->otp)->first();

        if (!$check_user) return $this->errorRes(400, 'Invalid OTP');

        $now = now();
        $accessToken   = $check_user->createToken('authToken')->plainTextToken;
        User::where('email', $request->email)->update(['is_verified' => 1, 'email_verified_at' => $now, 'otp' => null, 'remember_token' => $accessToken]);
        $user =  User::find($check_user->id);
        $user['token'] = $accessToken;
        return $this->successRes(200, 'OTP verified successfully!', $user);
    }

    public function resendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);
        if ($validator->fails()) return $this->errorHandle($validator);
        

        $otp = env('OTP', mt_rand(1000, 9999));
        $user = User::where('email', $request->email)->update(['otp' => $otp]);

        if (!$user) return $this->errorRes(400, 'Email does not exist!');

        $user = User::where('email', $request->email)->first();
        $userName = $user->first_name;
        $templatePath = 'templates.emails.resend_otp';
        $subject = 'Resend OTP!';

        if (!env('OTP')) $this->sendEmail($user->email, $subject, $templatePath, $otp, $userName);

        return $this->successRes(200, 'OTP resend successfully!', $otp);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
            'device_type' => 'nullable',
            'device_token' => 'nullable',
            'device_model' => 'nullable',
        ]);
        if ($validator->fails()) return $this->errorHandle($validator);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            return $this->errorRes(400, 'Invalid Credentials');
        }
        $user_detail = User::where('email', $request->email)->first();
        if ($user_detail->is_verified == 1) {
            $user_detail->device_type  = $request->device_type;
            $user_detail->device_token = $request->device_token;
            $user_detail->device_model = $request->device_model;
            $user_detail->is_online = 1;
            $user_detail->last_login =  now();
            $user_detail->save();

            $token = $user_detail->createToken('authToken')->plainTextToken;
            $user_detail->remember_token = $token;
            $user_detail->save();

            $user_detail = User::where('email', $request->email)->first();
            $user_detail->token = $token;

            return $this->successRes(200, 'User Login Successfully', $user_detail);
        } else {
            $otp = env('OTP', mt_rand(1000, 9999));
            $user_detail->otp = $otp;
            $user_detail->device_type = $request->device_type;
            $user_detail->device_token = $request->device_token;
            $user_detail->device_model = $request->device_model;
            $user_detail->save();

            $userName = $user_detail->first_name;
            $templatePath = 'templates.emails.resend_otp';
            $subject  = 'Resend OTP!';
            if (!env('OTP')) $this->sendEmail($user_detail->email, $subject, $templatePath, $otp, $userName);
            return $this->errorRes(200, 'Please verify your account before login!', $user_detail);
        }
    }

    public function getProfile(Request $request)
    {
        $user = User::find(Auth::id());
        if (!$user) return $this->errorRes(404, 'User not found');
        return $this->successRes(200, 'User profile fetched successfully', $user);
    }

    public function editProfile(Request $request)
    {
        $user = User::where("id", Auth::id())->first();
        if (!$user) return $this->errorRes(404, 'User not found');
        if (isset($request->first_name)) $user->first_name = $request->first_name;
        if (isset($request->last_name)) $user->last_name = $request->last_name;
        if (isset($request->phone)) $user->phone = $request->phone;

        if ($request->has('email')) {
            $check = User::where('id', '!=', Auth::id())
                ->where("email", $request->email)
                ->first();

            if ($check) return $this->errorRes(400, 'Email already exists');
            $user->email = $request->email;
        }
        if (isset($request->profile_image)) {

            $imagePath = public_path('uploads/') . $user->profile_image;
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $file = $request->file('profile_image');
            $name = time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $name);
            $user->profile_image = $name;
        }
        $user->save();
        return $this->successRes(200, 'Profile edit successfully', $user);
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required'
        ]);
        if ($validator->fails()) return $this->errorHandle($validator);
        
        $check = Hash::check($request->old_password, Auth::user()->password);
        if (!$check) return $this->errorRes(400, 'Incorrect old password');

        $user = User::where('id', Auth::id())->first();
        $user->password = bcrypt($request->new_password);
        $user->save();
        return $this->successRes(200, 'Password changed successfully', $user);
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) return $this->errorHandle($validator);
        
        $otp = env('OTP', mt_rand(1000, 9999));
        $user = User::where('email', $request->email)->update(['otp' => $otp]);
        if (!$user) return $this->errorRes(400, 'Email does not exist!');

        $user = User::where('email', $request->email)->first();
        $userName = $user->first_name;
        $templatePath = 'templates.emails.forgot_password';
        $subject  = 'Forgot Password OTP!';

        if (!env('OTP')) $this->sendEmail($user->email, $subject, $templatePath, $otp, $userName);

        return $this->successRes(201, 'OTP sent successfully!', $otp);
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        if ($validator->fails()) return $this->errorHandle($validator);
        
        $user  = User::where('email', $request->email)->first();
        if (! $user) return $this->errorRes(400, 'Email does not exist!');

        $password = $request->get('password');
        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt($password);
        $user->save();
        return $this->successRes(200, 'Password Change successfully!', $user);
    }

    public function logout(Request $request)
    {
        User::where('id', Auth::id())->update([
            'remember_token' => null,
            'is_online' => 0
        ]);
        $request->user()->currentAccessToken()->delete();
        return $this->successRes(200, 'You have been successfully logged out!');
    }

    public function deleteAccount(Request $request)
    {
        $user = User::find(Auth::id());
        if ($user) return $this->errorRes(404, 'User not found');

        $imagePath = public_path('uploads/') . $user->profile_image;
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $user->delete();
        return $this->successRes(200, 'Account successfully deleted!');
    }

    public function socialLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'socialId' => 'required',
            'socialType' => 'required|in:g,i',
            'device_type' => 'nullable',
            'device_token' => 'nullable',
            'device_model' => 'nullable',
        ]);

        if ($validator->fails()) return $this->errorHandle($validator);

        $socialId = $request->socialId;
        $socialType = $request->socialType;
        $email = $request->email;
        $now = now();

        $socialFound = User::where('email', $email)->first();

        if (!$socialFound) {
            $user = new User();
            $user->email = $request->email;
            $user->password = Hash::make($request->socialId);
            $user->save();
        } else {
            $user = User::find($socialFound->userId);
        }

        // update below fields
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->is_verified = 1;
        $user->role = 1;
        $user->email_verified_at = $now;
        $user->device_type = $request->device_type;
        $user->device_token = $request->device_token;
        $user->social_id = $socialId;
        $user->social_login_type = $socialType;

        $token = $user->createToken('authToken')->plainTextToken;
        $user->remember_token = $token;
        $user->save();

        $user->token = $token;
        return $this->successRes(200, 'User Login Successfully', $user);
    }
}
