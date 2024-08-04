<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User};
use Illuminate\Support\Facades\{Auth, Hash, DB, File, Log};
use \Carbon\Carbon;
use Illuminate\Support\{Str};

class AuthController extends Controller
{

    public function signupForm(Request $request)
    {

        if (\request()->isMethod('get')) {
            return view('frontend.auth.signup');
        } else {
            $request->validate([
                'first_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]);
            $user = new User();
            $user->first_name = $request->first_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 1;
            $user->save();
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->route('chat')->with('success', 'successfully logged in');
            } else {
                return back()->with('error', 'Error while signup');
            }
        }
    }
    public function loginForm(Request $request)
    {
        if (\request()->isMethod('get')) {
            return view('frontend.auth.login');
        } else {

            $request->validate([
                'email' => 'required|email|exists:users',
                'password' => 'required',
            ]);
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if ($user && $user->role == 1) {
                    return response()->json(['status' => 200, 'url' => route('chat'), 'message', 'successfully logged in']);
                }
                Auth::logout();
            }
            return response()->json(['status' => 404, 'message' => 'Login details are not valid']);
        }
    }
}