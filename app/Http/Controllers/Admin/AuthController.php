<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User};
use Illuminate\Support\Facades\{Auth, Hash, DB, File, Log};
use \Carbon\Carbon;
use Illuminate\Support\{Str};

class AuthController extends Controller
{
    public function loginForm(Request $request)
    {
        if (\request()->isMethod('get')) {
            return view('admin.auth.login');
        }else{
            $request->validate([
                'email' => 'required|email|exists:users',
                'password' => 'required',
            ]);
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if ($user && $user->role == 0) {
                    return redirect()->route('dashboard')->with('success', 'successfully logged in');
                }
                Auth::logout();
            }
            return back()->with('error','Login details are not valid');
        }
    }
    public function signOut()
    {
        $user = User::find(Auth::id());
        $user->is_online = false;
        $user->save();
        $user->tokens()->delete();
        auth()->logout();
        return Redirect(route('login'))->with('success', 'successfully logged out');;
    }

    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);
        $emailCheck = DB::table('password_reset_tokens')->where(['email' => $request->email])->first();

        if ($emailCheck) {
            return back()->with('error', 'A password reset link has already been sent to your email address.');
        }

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        // Mail::send('auth.forgetPasswordToken', ['token' => $token], function ($message) use ($request) {
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // });
        return back()->with('success', 'A password reset link has been sent to your email address.');
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email'                 => 'required|email|exists:users',
            'password'              => 'required|string|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect(route('login'))->with('success', 'Your password has been changed!');
    }

}
