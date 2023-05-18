<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Quotation_products;
use App\Models\Quotation;

class AdminQuotationProductsController extends Controller
{
    public function index()
    {
        $quotations = Quotation::all();
        return view('admin.main.quotation_products.index', compact('quotations'));
    }

    public function view($id)
    {
        $quotations = Quotation_products::where('quotation_id', $id)->get();
        return view('admin.main.quotation_products.view', compact('quotations'));
    }


    public function statusUpdate(Request $request, $id)
    {
        $quotation = Quotation::find($id);
        $quotation->status = $request->status;
        $quotation->update();

        return response()->json(['success' => true]);
    }
}
