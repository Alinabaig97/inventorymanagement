<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Quotation_products;
use App\Models\Product;
use App\Models\Customer;

class QuotationProductsController extends Controller
{
    public function index()
    {
        $quotations = Quotation_products::all();
        return view('user.main.quotation_products.index',compact('quotations'));
    }
    public function create()
    {
        $products= Product::all();
        $customers = Customer::all();

        return view('user.main.quotation_products.add',compact('products','customers'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'quotation_id' => 'required|integer',
            'product_id' => 'required|integer',
            'product_qty' => 'required|integer',
            'product_price' => 'required|numeric',
            'customer_id' => 'required|integer',
        ]);
    
       $quotations = new Quotation_products;
       $quotations->quotation_id = $request->quotation_id;
       $quotations->product_id = $request->product_id;
       $quotations->product_qty = $request->product_qty;
       $quotations->product_price = $request->product_price;
       $quotations->customer_id = $request->customer_id;
       $quotations->save();
        return redirect()->route('quotationproducts.index');
     }
}
