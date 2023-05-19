<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Paynow;
use Illuminate\Support\Facades\Auth;
use App\Models\Quotation_products;
use App\Models\Quotation;
class PaynowController extends Controller
{
   
    public function show($id)
    {
        $quotation = Quotation::find($id);
        $quotations = Quotation_products::where('quotation_id', $id)->get();
        return view('user.main.quotation.paynow',compact('quotation','quotations'));
    }
    public function store(Request $request)
    { 
        $pay = new Paynow;
        $pay->name = $request->name;
        $pay->email = $request->email;
        $pay->address = $request->address;
        $pay->qouataion_id = $request->qouataion_id;
        $pay->user_id = Auth::user()->id;
        $pay->price =$request->price;
        $pay->qty = $request->qty;

        // return $request;
       $pay->save();
       return redirect()->route('quotation.index');

    }


}
