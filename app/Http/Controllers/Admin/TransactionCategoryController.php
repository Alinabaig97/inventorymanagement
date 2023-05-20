<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransationCategory;

class TransactionCategoryController extends Controller
{
    public function index()
    {

        $data = TransationCategory::all();
        return view('admin.main.transactionCategory.index', compact('data'));
    }
    public function create()
    {
        return view('admin.main.transactionCategory.add');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',

        ]);
        //insert Query
        $data = new TransationCategory;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('transactionCategory.index');
    }
    public function edit($id)
    {
        $category= TransationCategory::find($id);
        
        return view('admin.main.transactionCategory.edit',compact('category'));

    }
    public function update($id,Request $request)
    {
        $category =  TransationCategory::find($id);
        $category->name = $request['name'];
        $category->description = $request['description'];
        $category->update();
         return redirect()->route('transactionCategory.index');
    }
    public function destroy($id)
    {
        $category = TransationCategory::find($id);
        if (!is_null($category)) {
            $category->delete();
        }
        return redirect()->route('transactionCategory.index');
    }
}
