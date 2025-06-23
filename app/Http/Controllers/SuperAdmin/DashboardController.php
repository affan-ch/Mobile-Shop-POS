<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index()
    {
        $data = [];

        $rec = Auth::guard('superadmin')->user();
        $data['rec'] = $rec;

        $admins = Admin::all();
        $data['Admins'] = $admins;


        $shops = User::all();
        $data['Shops'] = $shops;

        return view('superadmin.dashboard', $data);
    }

}
