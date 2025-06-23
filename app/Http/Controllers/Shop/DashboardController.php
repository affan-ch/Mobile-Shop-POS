<?php

namespace App\Http\Controllers\Shop;

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

        $rec = Auth::guard('web')->user();
        $data['rec'] = $rec;


        $shops = auth()->guard('web')->user()->products;
        $data['products'] = $shops;

        return view('shop.dashboard', $data);
    }

}
