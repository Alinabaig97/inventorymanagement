<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DailySalesController extends Controller
{
   public function index()
   {
      $mytime = Carbon::now();
      $details = OrderDetail::whereDate('date', $mytime->toDateString())->get();
      return view('admin.main.dailySales.index', compact('details'));
   }
   
   public function filter(Request $request)
   {
      $this->validate($request, [
         'date' => 'required|date',
      ]);

      $details = OrderDetail::whereDate('date', $request->date)->get();

      return view('admin.main.dailySales.index', compact('details'));
   }
}
