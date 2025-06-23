<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Claim;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\User;
use Auth;

class ReportsController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
        } else {
            $user = Auth::guard('superadmin')->user();
        }
        $rec = $user;

        if (Auth::guard('admin')->check()) {
            $shops = User::whereHas('admins', function ($query) use ($user) {
                $query->where('admin_id', $user->id);
            })->get();

            return view('admin.reports', compact('shops', 'rec'));
        } else {
            $shops = User::all();

            return view('superadmin.reports', compact('shops', 'rec'));
        }

    }

    public function getReportData(Request $request)
    {
        $reportType = $request->input('report_type');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $shopId = $request->input('shop_id');

        switch ($reportType) {
            case 'sales':
                $data = Sale::with(['product', 'shop', 'invoice'])
                    ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                        return $query->whereBetween('sale_date', [$startDate, $endDate]);
                    })
                    ->when($shopId, function ($query) use ($shopId) {
                        return $query->where('shop_id', $shopId);
                    })
                    ->get()
                    ->map(function ($sale) {
                        return [
                            'Product Name' => $sale->product->name,
                            'Shop Name' => $sale->shop->name,
                            'Sale Date' => $sale->sale_date,
                            'Sale Price' => $sale->sale_price,
                            'Quantity' => $sale->quantity,
                            'Total Price' => $sale->total_price,
                            'Invoice ID' => $sale->invoice->id,
                        ];
                    });
                break;

            case 'warranty':
                $data = Claim::with(['product', 'shop', 'invoice'])
                    ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                        return $query->whereBetween('created_at', [$startDate, $endDate]);
                    })
                    ->when($shopId, function ($query) use ($shopId) {
                        return $query->where('shop_id', $shopId);
                    })
                    ->get()
                    ->map(function ($claim) {
                        return [
                            'Product Name' => $claim->product->name,
                            'Shop Name' => $claim->shop->name,
                            'Quantity' => $claim->quantity,
                            'Claim Date' => $claim->created_at,
                            'Invoice ID' => $claim->invoice->id,
                        ];
                    });
                break;

            case 'inventory':
                $data = Product::with('shop')
                    ->when($shopId, function ($query) use ($shopId) {
                        return $query->where('shop_id', $shopId);
                    })
                    ->get()
                    ->map(function ($product) {
                        return [
                            'Product Name' => $product->name,
                            'Shop Name' => $product->shop->name,
                            'Price' => $product->price,
                            'Stock Quantity' => $product->qty,
                            'Sold Quantity' => $product->sold_qty,
                            'Warranty' => $product->warranty_duration . ' ' . ($product->warranty_unit ? 'months' : 'years'),
                        ];
                    });
                break;

            case 'revenue':
                $data = Invoice::with('shop')
                    ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                        return $query->whereBetween('created_at', [$startDate, $endDate]);
                    })
                    ->when($shopId, function ($query) use ($shopId) {
                        return $query->where('shop_id', $shopId);
                    })
                    ->get()
                    ->map(function ($invoice) {
                        return [
                            'Invoice ID' => $invoice->id,
                            'Shop Name' => $invoice->shop->name,
                            'Total Bill' => $invoice->total_bill,
                            'Final Bill' => $invoice->final_bill,
                            'Customer Name' => $invoice->customer_name,
                            'Customer Phone' => $invoice->customer_phone,
                            'Invoice Date' => $invoice->created_at,
                        ];
                    });
                break;

            case 'discounts':
                $data = Invoice::with('shop')
                    ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                        return $query->whereBetween('created_at', [$startDate, $endDate]);
                    })
                    ->when($shopId, function ($query) use ($shopId) {
                        return $query->where('shop_id', $shopId);
                    })
                    ->get()
                    ->map(function ($invoice) {
                        return [
                            'Invoice ID' => $invoice->id,
                            'Shop Name' => $invoice->shop->name,
                            'Total Bill' => $invoice->total_bill,
                            'Discount Applied' => $invoice->discount,
                            'Final Bill' => $invoice->final_bill,
                            'Invoice Date' => $invoice->created_at,
                        ];
                    });
                break;

            default:
                return response()->json(['error' => 'Invalid report type'], 400);
        }

        return response()->json(['data' => $data]);
    }



}
