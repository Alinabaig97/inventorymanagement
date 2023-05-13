<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        
        $data = Category::all();
        return view('admin.main.categories.index', compact('data'));
    }
    public function create()
    {
        
        return view('admin.main.categories.add');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        //insert Query
        $user = new Category;
        $user->name = $request->name;
        $user->save();

        return redirect()->route('categories.index');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {
            $category->delete();
        }
        return redirect()->route('categories.index');
    }
    public function edit($id)
    {
        $category= Category::find($id);
        
        return view('admin.main.categories.edit',compact('category'));

    }
    public function update($id,Request $request)
    {
        $customer =  Category::find($id);
        $customer->name = $request['name'];
        $customer->save();
         return redirect()->route('categories.index');
    }
}
