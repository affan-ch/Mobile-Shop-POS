<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\ShopAdmin;

class LoginController extends Controller
{

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

        // Find the Shop by email
        $shop = User::where('email', $credentials['email'])->first();

        if (!$shop) {
            return redirect()->back()->with('error', 'No account found with this email.');
        }

        // Check if the shop is blocked by the super admin
        if ($shop->status) {
            return redirect()->back()->with('error', 'You have been blocked by the super admin.');
        }

        // Check if the shop is blocked by the admin
        if ($shop->blocked_by_admin) {
            return redirect()->back()->with('error', 'You have been blocked by the admin.');
        }

        // check if status of admin of the shop is blocked
        $shopAdminRelation = ShopAdmin::where('shop_id', $shop->id)->first(); 
        
        if (!$shopAdminRelation) {
            return redirect()->back()->with('error', 'Shop Have No Admin. Please Contact Super Admin.');
        }

        // Check if the admin is blocked
        $admin = Admin::find($shopAdminRelation->admin_id);
        if ($admin->status) {
            return redirect()->back()->with('error', 'Shop Admin is blocked by the super admin.');
        }

        // Manually validate password (since it's not hashed)
        if ($shop->password !== $credentials['password']) {
            return redirect()->back()->with('error', 'Login credentials are incorrect.');
        }

        // Log the user in manually
        Auth::guard('web')->login($shop);
        $request->session()->regenerate();

        return redirect('shop/dashboard')->with('success', 'You have successfully logged in');
    }

    function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return Redirect('shop/login')->with('success', 'You have been logged out successfully');
    }
}
