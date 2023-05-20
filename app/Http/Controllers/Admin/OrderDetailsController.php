<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class OrderDetailsController extends Controller
{
    public function index()
    {
        $details = OrderDetail::all();
        return view('admin.main.orders_details.index', compact('details'));
    }
    public function create()
    {
        $data = Product::all();
        $customers = Customer::all();
        return view('admin.main.orders_details.add', compact('data', 'customers'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'discount' => 'required|max:255',
            'total' => 'required|max:255',
            'product_id' => 'required',
            'quantity' => 'required|integer',
            'customers_id' => 'required|integer',
            'date' => 'required',
        ]);


        //insert Q10.uery
        $orders = new OrderDetail;
        $orders->unit_price = $request->price;
        $orders->quantity     = $request->quantity;
        $orders->discount = $request->discount;
        $orders->total = $request->total;
        $orders->product_id = $request->product_id;
        $orders->order_id = Str::uuid();
        $orders->bill_number = 'ManagementSystem_' . rand(10, 1000);
        $orders->customers_id = $request->customers_id;
        $orders->date = $request->date;

        if ($orders->save()) {
            $getproduct = Product::find($request->product_id);
            $product = Product::find($request->product_id);
            $product->quantity = $getproduct->quantity -  $request->quantity;

            // Check if the new quantity is less than or equal to the current quantity

            $product->update();
        }

        return redirect()->route('orders_details.index');
    }


    public function getproduct(Request $request)
    {
        $product = Product::find($request->product_id);
        return response()->json([
            'quantity' => $product->quantity,
            'price' => $product->price,
        ]);
    }

    public function show($id)
    {
        $details = OrderDetail::find($id);
        return view('admin.main.orders_details.show', compact('details'));
    }
    public function updateStatus(Request $request, $id)
    {
        $status = $request->status;
        $order = OrderDetail::find($id);
        $order->status = $request->status;
        $order->update();
        return redirect()->back()->with('success', 'Status updated successfully');
    }
    public function updateQuantity(Request $request)
    {
        $product = Product::find($request->product_id);
        $newQuantity = $request->quantity;

        // Check if the new quantity is less than or equal to the current quantity

        $product->quantity = $newQuantity;
        $product->update();
        return response()->json(['success' => true]);
    }
   
}
