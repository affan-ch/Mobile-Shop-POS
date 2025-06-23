<?php

namespace App\Http\Controllers\Admin;

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

        $rec = Auth::guard('admin')->user();
        $data['rec'] = $rec;


        $shops = auth()->guard('admin')->user()->shops;
        $data['Shops'] = $shops;

        return view('admin.dashboard', $data);
    }

}
