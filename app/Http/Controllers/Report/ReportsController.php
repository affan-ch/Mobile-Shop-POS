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
            $user= Auth::guard('superadmin')->user();
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
                $data = Sale::whereBetween('sale_date', [$startDate, $endDate])
                    ->when($shopId, function ($query) use ($shopId) {
                        return $query->where('shop_id', $shopId);
                    })
                    ->get();
                break;

            case 'warranty':
                $data = Claim::whereBetween('created_at', [$startDate, $endDate])
                    ->when($shopId, function ($query) use ($shopId) {
                        return $query->where('shop_id', $shopId);
                    })
                    ->get();
                break;

            case 'inventory':
                $data = Product::where('shop_id', $shopId)->get();
                break;

            case 'revenue':
                $data = Invoice::whereBetween('created_at', [$startDate, $endDate])
                    ->when($shopId, function ($query) use ($shopId) {
                        return $query->where('shop_id', $shopId);
                    })
                    ->get();
                break;

            case 'discounts':
                $data = Invoice::whereBetween('created_at', [$startDate, $endDate])
                    ->when($shopId, function ($query) use ($shopId) {
                        return $query->where('shop_id', $shopId);
                    })
                    ->select('id', 'shop_id', 'total_bill', 'discount', 'final_bill', 'created_at')
                    ->get();
                break;

            default:
                return response()->json(['error' => 'Invalid report type'], 400);
        }

        return response()->json(['data' => $data]);
    }
}
