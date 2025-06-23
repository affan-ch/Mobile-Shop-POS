<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ClaimsController extends Controller
{
    public function index()
    {
        $rec = Auth::guard()->user();
        $shop_id = $rec->id;
        $shop_name = $rec->name;
        $products = Product::where('shop_id', $shop_id)->get();
        
        return view('shop.claims', ['rec' => $rec, 'products' => $products, 'shop_id' => $shop_id, 'shop_name' => $shop_name]);
    }

    public function getClaimsByShop($shop_id)
    {
        $claims = \DB::table('claims')
            ->join('products', 'claims.product_id', '=', 'products.id')
            ->where('claims.shop_id', $shop_id)
            ->select('claims.id', 'products.name as product_name', 'claims.invoice_id', 'claims.quantity', 'claims.created_at')
            ->get();

        return response()->json($claims);
    }
}