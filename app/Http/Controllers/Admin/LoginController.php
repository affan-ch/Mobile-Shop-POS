<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class LoginController extends Controller
{
    //
    public function index()
    {

        if (Auth::guard('admin')->check()) {

            return redirect('admin-panel/dashboard')->with('success', 'Already Logged In');
        }
        return view('admin.login');
    }


    public function login_validate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Find the admin by email
        $admin = Admin::where('email', $credentials['email'])->first();

        if ($admin && $admin->status) {
            // Admin is blocked
            return redirect()->back()->with('error' ,'You have been blocked by the super admin.');
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('admin-panel/dashboard')->with('success', 'You have successfully logged in');
        }

        // If login fails, redirect back with an error
        return redirect()->back()->with('error' ,'Login credentials are incorrect.');
    }

    function logout(Request $request)
    {

        Auth::guard('admin')->logout();


        return Redirect('admin-panel/login')->with('success', 'You have been logged out successfully');
    }
}
