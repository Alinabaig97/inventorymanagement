<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $customers = Customer::where('user_id', $userId)->get();
        return view('user.main.customers.index', compact('customers'));
    }
    public function create()
    {

        return view('user.main.customers.show');
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

        return redirect()->route('customers.index');
    }
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('user.main.customers.edit', compact('customer'));
    }


    public function update(Request $request, $id)
    {
        $customer =  Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->address = $request['address'];
        $customer->phone = $request['phone'];
        $customer->amount = $request['amount'];
        $customer->save();
        return redirect()->route('customers.index');
    }
    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }
        return redirect()->route('customers.index');
    }
 
}
