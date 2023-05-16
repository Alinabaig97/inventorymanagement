<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Quotation;
use Illuminate\Support\Facades\DB;
class QuotationController extends Controller
{
    public function index()
    {
        $quotations = Quotation::all();
        return view('user.main.quotation.index', compact('quotations'));
    }
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('user.main.quotation.add', compact('customers','products'));
    }
    public function store(Request $request)
    {
        return $request;
        $request->validate([
            'date' => 'required|date',
            // 'customer_id' => 'required|exists:customers,id',
            'order_tax' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'shipping' => 'nullable|numeric',
            'status' => 'nullable|string|max:255',
            'note' => 'nullable|string|max:255',
        ]);
        $quotations = new Quotation;
        $quotations->date = $request->date;
        $quotations->customer_id = $request->customer_id;
        $quotations->order_tax = $request->order_tax;
        $quotations->discount = $request->discount;
        $quotations->shipping = $request->shipping;
        $quotations->status = $request->status;
        $quotations->note = $request->note;
        $quotations->total_price = $request->total_price;
        $quotations->save();
        
        if ($quotations->save()) {
            foreach ($request->product_id as $key => $value) {
                $product = Product::find($value);
            }
        }
        return redirect()->route('quotation.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $products = DB::table('products')->where('name', 'LIKE', '%' . $search . '%') ->get();

        return $products;
    }
}
