<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index()
    {

        if (Auth::guard('web')->check()) {

            return redirect('shop/dashboard')->with('success', 'Already Logged In');
        }
        return view('shop.login');
    }


    public function login_validate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Find the admin by email
        $admin = User::where('email', $credentials['email'])->first();

        if ($admin && $admin->status && $admin->blocked_by_admin) {
            // Admin is blocked
            return redirect()->back()->with('error' ,'You have been blocked by the super admin.');
        }

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('shop/dashboard')->with('success', 'You have successfully logged in');
        }

        // If login fails, redirect back with an error
        return redirect()->back()->with('error' ,'Login credentials are incorrect.');
    }

    function logout(Request $request)
    {

        Auth::guard('web')->logout();


        return Redirect('shop/login')->with('success', 'You have been logged out successfully');
    }
}
