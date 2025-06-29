<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class PosController extends Controller
{
    public function index()
    {
        $rec = Auth::guard()->user();
        $shop_id = $rec->id;
        $shop_name = $rec->name;
        
        // get products that are not deleted
        $products = Product::where('shop_id', $shop_id)->where('isDeleted', 0)->get();
        
        return view('shop.pos', ['rec' => $rec, 'products' => $products, 'shop_id' => $shop_id, 'shop_name' => $shop_name]);
    }

}