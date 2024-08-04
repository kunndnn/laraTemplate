<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User};
use Illuminate\Support\Facades\{Auth, Hash, Http, File, Log};

class AdminController extends Controller
{
    public function profileForm(Request $request)
    {
        if (\request()->isMethod('get')) {
            $user = User::find(Auth::id());
            return view('admin.auth.update-profile', compact('user'));
        } else {
            $user = User::find(Auth::id());
            if ($request->filled('first_name')) {
                $user->first_name = $request->first_name;
            }

            if ($request->filled('last_name')) {
                $user->last_name = $request->last_name;
            }

            if ($request->filled('phone')) {
                $user->phone = $request->phone;
            }

            if ($request->filled('email')) {
                $existingUser = User::where('email', $request->email)
                    ->where('id', '!=', Auth::id())
                    ->first();
                if ($existingUser) {
                    return back()->with('error', 'Email already exists. Please try a different email.');
                }
                $user->email = $request->email;
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');

                $path = public_path('uploads/');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                $imageName = time() . '_' . uniqid() . $file->getClientOriginalExtension();
                $file->move($path, $imageName);
                $imagePath = asset('uploads/' . $imageName);
                $user->profile_image = $imagePath;
            }

            if ($request->filled('old_password')) {
                $request->validate([
                    'password' => [
                        'required',
                        'min:8',
                        'regex:/^[A-Z](?=.*[a-zA-Z])(?=.*[0-9]).{7,}$/'
                    ],
                    'confirm_password' => 'required|same:password'
                ], [
                    'password.required' => 'Password is required.',
                    'password.min'      => 'Password must be at least 8 characters long.',
                    'password.regex'    => 'Password must start with a capital letter and contain both letters and numbers.',
                ]);

                $hashedPassword = $user->password;
                if (Hash::check($request->old_password, $hashedPassword)) {
                    $user->password = bcrypt($request->password);
                } else {
                    return back()->with('old-pass-error', 'Old password does not match.');
                }
            }
            $user->save();
            return back()->with('success', 'Profile updated successfully.');
        }
    }
    public function Dashboard(Request $request)
    {
        $user = User::count();
        return view('admin.dashboard.index', compact('user'));
    }
    public function userList(Request $request)
    {
        $users = User::where(['status'=> 1 , 'role' => 1])->get();
        return view('admin.user.user-list', compact('users'));
    }
    public function deleteUser(Request $request)
    {
        $users = User::find($request->id);
        if($users){
            $users->delete();
            return back()->with('success', 'Successfully deleted user');
        }
        return back()->with('error', 'User not found');
     }
}
