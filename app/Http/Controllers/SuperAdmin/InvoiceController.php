<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use App\Models\ShopAdmin;
use App\Models\User;

class InvoiceController extends Controller
{
    public function index($shop_id)
    {
        $rec = Auth::guard('superadmin')->user();
        $invoices = Invoice::where('shop_id', $shop_id)
                           ->orderBy('created_at', 'desc')
                           ->get();
        $shop = User::where('id', $shop_id)->first();

        // Calculate total sales till now
        $totalSalesTillNow = Invoice::where('shop_id', $shop_id)->sum('final_bill');

        // Calculate total sales for the current month
        $totalSalesThisMonth = Invoice::where('shop_id', $shop_id)
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->sum('final_bill');

        return view('admin.invoices', ['rec' => $rec, 'shop_id' => $shop_id, 'invoices' => $invoices,'totalSalesTillNow' => $totalSalesTillNow,'totalSalesThisMonth' => $totalSalesThisMonth], ['shop_name' => $shop->name]);
    }

    public function getInvoiceDetails($id)
    {
        // Fetch the invoice by its ID, including related sales and products
        $invoice = Invoice::with('sales.product')->findorFail($id);

        // Check if invoice exists
        if (!$invoice) {
            return response()->json(['message' => 'Invoice not found'], 404);
        }

        // Return the invoice data with sales and products
        return response()->json($invoice);
    }


}
