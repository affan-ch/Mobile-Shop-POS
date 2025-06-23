<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index()
    {

        if (Auth::guard('superadmin')->check()) {

            return redirect('super-admin/dashboard')->with('success', 'Already Logged In');
        }
        return view('superadmin.login');
    }


    public function login_validate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //        print_r($credentials);

        if (Auth::guard('superadmin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('super-admin/dashboard')->with('success', 'You have Successfully logged In');
        }

        return redirect('super-admin/')->with('error', 'You have entered an invalid credentials');
    }

    function logout(Request $request)
    {

        Auth::guard('superadmin')->logout();


        return Redirect('super-admin/login')->with('success', 'You have been logged out successfully');
    }

}
