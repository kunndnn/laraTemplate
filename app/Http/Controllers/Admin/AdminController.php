<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Mail;
use App\Models\{User};
use Illuminate\Support\Facades\{DB, Hash, Auth};
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function Dashboard(Request $request)
    {
        return view('admin.dashboard');
    }
    public function userList(Request $request)
    {
        $users = User::where(['role' => 1])->whereIn('status', [1, 2])->get();
        return view('admin.user-list', compact('users'));
    }
    public function userStatusChange(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            if ($user->status == 1) {
                $user->status = 2; // Suspend the user
                $statusMessage = 'Suspended';
            } elseif ($user->status == 2) {
                $user->status = 1; // Activate the user
                $statusMessage = 'Activated';
            } else {
                return response()->json(['message' => 'Invalid user status for toggling'], 400);
            }

            $user->save();
            return response()->json(['message' => 'User ' . $statusMessage . ' Successfully'], 200);
        }
        return response()->json(['message' => 'User not found'], 404);
    }

    public function userDelete(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->delete();
            return redirect(route('user.list'))->with('success', 'User deleted successfully!');
        } else {
            return redirect(route('user.list'))->with('error', 'User Not Found!');
        }
    }

    public function orderList(Request $request)
    {
        return view('admin.order.order-list');
    }
}
