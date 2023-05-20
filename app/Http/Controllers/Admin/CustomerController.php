<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::all();
        return view('admin.main.customer.index', compact('data'));
    }
    public function create()
    {
       
        return view('admin.main.customer.show');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:55',
            'email' => 'required|email|unique:customers,email',
            'address' => 'required|max:255',
            'phone' => 'required',
            'amount' => 'required',
        ]);


        //insert Query
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->amount = $request->amount;
        $customer->user_id = Auth::user()->id;
        $customer->save();

        return redirect()->route('customer.index');
    }
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.main.customer.edit', compact('customer'));
    }


    public function update(Request $request, $id)
    {
        $customer =  Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->address = $request['address'];
        $customer->phone = $request['phone'];
        $customer->amount = $request['amount'];
        $customer->update();
        return redirect()->route('customer.index');
    }
    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }
        return redirect()->route('customer.index');
    }
    public function view($id)
    {
        $customer = Customer::find($id);

        $details = OrderDetail::where('customers_id', $id)->get();
        return view('admin.main.customer.CustomerView', compact('details', 'customer'));
    }
    public function getproduct(Request $request)
    {
        $customer = Customer::find($request->customer_id); 
        return response()->json([
            'amount' => $customer->amount,
        ]);
    }
    

}
