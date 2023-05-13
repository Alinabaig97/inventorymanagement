<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transations;
use App\Models\TransationCategory;
class TransactionsController extends Controller
{
    public function index()
    {

        $data = Transations::all();
        return view('admin.main.transactions.index', compact('data'));
    }
    public function create()
    {
        $data = TransationCategory::all();
        return view('admin.main.transactions.add', compact('data'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required',
            // 'date' => 'required',
            

        ]);
        //insert Query
        $data = new Transations;
        $data->name = $request->name;
        $data->price = $request->price;
        $data->date = $request->date;
        $data->category_id = $request->category_id;

        $data->save();

        return redirect()->route('transactions.index');
    }
    public function edit($id)
    {
        $transation= Transations::find($id);
        $categories= TransationCategory::all();
        return view('admin.main.transactions.edit',compact('transation','categories'));

    }
    public function update($id,Request $request)
    {
        $category =  Transations::find($id);
        $category->name = $request['name'];
        $category->price = $request['price'];
        $category->date = $request['date'];
        $category->category_id = $request['category_id'];
        $category->update();
         return redirect()->route('transactions.index');
    }
    public function destroy($id)
    {
        $category = Transations::find($id);
        if (!is_null($category)) {
            $category->delete();
        }
        return redirect()->route('transactions.index');
}
}
