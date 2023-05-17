<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Quotation_products;

class AdminQuotationProductsController extends Controller
{
    public function index()
    {
        $quotations = Quotation_products::all();
        return view('admin.main.quotation_products.index',compact('quotations'));
    }
    
   
}
