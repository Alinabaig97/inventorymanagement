<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();
        return view('admin.main.product.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $customers = Customer::all();
        return view('admin.main.product.add',compact('categories','customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            // 'category_id' => 'required|exists:products,id',
            // 'customers' => 'required',
        
        ]);
      
        //insert Query
        
        $products = new Product;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->unit = $request->unit;
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->category_id = $request->category_id;
        $products->supplier_id = auth()->user()->id;
        $products->customers = $request->customers;
        $products->save();

        return redirect()->route('product.index');
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories= Category::all();
        $products= Product::find($id);
        $customers =Customer::all();
        return view('admin.main.product.edit',compact('categories','products','customers'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) 
     {
        $products =  Product::find($id);
        $products->name = $request['name'];
        $products->description = $request['description'];
        $products->unit = $request['unit'];
        $products->price = $request['price'];
        $products->quantity = $request['quantity'];
        $products->category_id = $request['category_id'];
        $products->supplier_id = auth()->user()->id;
        $products->customers = $request->customers;
        $products->save();
         return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!is_null($product)) {
            $product->delete();
        }
        return redirect()->route('product.index');
    }
}
