<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShopAdmin;
use App\Models\User;

class ClaimsController extends Controller
{
    public function index($shop_id)
    {
        $rec = Auth::guard('superadmin')->user();
        $shop = User::where('id', $shop_id)->first();

        return view('admin.claims', ['rec' => $rec, 'shop_id' => $shop_id, 'shop_name' => $shop->name]);
    }
}
