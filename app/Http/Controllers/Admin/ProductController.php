<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\ProductImage;


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
        return view('admin.main.product.add', compact('categories', 'customers'));
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
        // $products->customers = $request->customers;
        if ($products->save()) {

            if ($request->hasFile('images')) {

                foreach ($request->images as $file) {
                    $name = time() . rand(1, 10) . '.' . $file->extension();
                    $file->move(public_path('uploads/product/gallery'), $name);
                    $file = new ProductImage();
                    $file->images = $name;
                    $file->product_id = $products->id;
                    $file->save();
                }
            }
        }

        return redirect()->route('product.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $products = Product::find($id);
        $customers = Customer::all();
        $images = ProductImage::where('product_id', $id)->get();
        return view('admin.main.product.edit', compact('categories', 'products', 'customers', 'images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->unit = $request->input('unit');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->category_id = $request->input('category_id');
        $product->supplier_id = auth()->user()->id;

        if ($product->update()) {
            if ($request->hasFile('images')) {

                // Save new images
                foreach ($request->file('images') as $file) {
                    $name = time() . rand(1, 10) . '.' . $file->extension();
                    $file->move(public_path('uploads/product/gallery'), $name);

                    $image = new ProductImage();
                    $image->images = $name;
                    $image->product_id = $product->id;
                    $image->save();
                }
            }
        }

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
    public function deleteImage(Request $request)
    {
        $imageId = $request->input('image_id');

        $image = ProductImage::find($imageId);
        if ($image) {
            $imagePath = public_path('uploads/product/gallery/' . $image->images);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $image->delete();

            return redirect()->route('product.index');
        }
    }
}
