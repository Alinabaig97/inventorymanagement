<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Paynow;
use App\Models\Quotation;


class paymentSystem extends Controller
{
    public function index()
    {
        $pays = Paynow::all();
        return view('admin.main.paymentsystem.index',compact('pays'));
    }
    public function status(Request $request, $id)
    {
        $quotation = Paynow::find($id);
        $quot_id = Paynow::find($id);
        $quotation->status = $request->status;
        if($quotation->update()){
            $qout = Quotation::where('id',$quot_id->qouataion_id)->first();
            $qout->pay_status = $request->status;
            $qout->update();
        }
        return response()->json(['success' => true]);
    }
}
