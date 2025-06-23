<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if (!$admin) {
            return redirect()->back()->with('error', 'No account found with this email.');
        }

        // Check if the admin is blocked
        if ($admin->status && $admin->blocked_by_admin) {
            return redirect()->back()->with('error', 'You have been blocked by the super admin.');
        }

        // Manually validate password (since it's not hashed)
        if ($admin->password !== $credentials['password']) {
            return redirect()->back()->with('error', 'Login credentials are incorrect.');
        }

        // Log the user in manually
        Auth::guard('web')->login($admin);
        $request->session()->regenerate();

        return redirect('shop/dashboard')->with('success', 'You have successfully logged in');
    }

    function logout(Request $request)
    {

        Auth::guard('web')->logout();


        return Redirect('shop/login')->with('success', 'You have been logged out successfully');
    }
}
