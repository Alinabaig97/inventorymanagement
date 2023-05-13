<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transations;
use Illuminate\Http\Request;
use Carbon\Carbon;



class ReportController extends Controller
{
    public function index()
   {
      $mytime = Carbon::now();
      $transations = Transations::whereDate('date', $mytime->toDateString())->get();
      return view('admin.main.reports.index', compact('transations'));
   }
   public function filter(Request $request)
   {
      $this->validate($request, [
         'date' => 'required|date',
      ]);

      $transations = Transations::whereDate('date', $request->date)->get();

      return view('admin.main.reports.index', compact('transations'));
   }
}
