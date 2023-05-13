<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class BillsController extends Controller
{
   public function index()
   {
      $customers = Customer::all();
      return view('admin.main.bills.index', compact('customers'));
   }
   public function filter(Request $request)
   {
      //  $this->validate($request, [
      //      'date' => 'required|date',
      //      'name' => 'nullable|exists:customers,id'
      //  ]);

      $details = OrderDetail::whereDate('date', $request->date)->where('customers_id', $request->name)->get();
      $html = '';
      foreach ($details as $key => $data) {
         $balance = $data->customer->amount - $data->total;
         $html .= '<div class="col-md-4">';
         $html .= '<div class="invoice-box-four">';
         $html .= '';
         $html .= '<table class="table table-bordered" >';
         $html .= '<tbody><tr>';
         $html .= '<td colspan="2" class="title text-center">';
         $html .= '<h3 style="margin: 0;padding: 0;" class="company_name">' . Auth::user()->name . ' Company </h3>';
         $html .= '<p style="margin: 0;padding: 0;">Date:' . $data->date . '</p>';
         $html .= '<p style="margin: 0;padding: 0;">Mobile:' . $data->customer->phone . '</p>';
         $html .= '';
         $html .= '</td>';
         $html .= '</tr>';
         $html .= '<tr>';
         $html .= '<td>Bill Number</td>';
         $html .= '<td>' . $data->bill_number . '</td>';
         $html .= '</tr>';
         $html .= '<tr>';
         $html .= '<td>Customer</td>';
         $html .= '<td class="text-capitalize">' . $data->customer->name . '</td>';
         $html .= '</tr>';
         $html .= '</tbody></table>';
         $html .= '<table class="table table-condensed invoice-table" data-customer-id="" id="filter-form">';
         $html .= '<tbody id="bills-table tbody">';
         $html .= '<tr>';
         $html .= '<th>Product Name</th>';
         $html .= '<th>Quantity</th>';
         $html .= '<th>Amount</th>';
         $html .= '<th></th>';
         $html .= '</tr>';
         $html .= '';
         $html .= '<tr class="particular-row">';
         $html .= '<td class="weight">' . $data->product->name . ' </td>';
         $html .= '<td class="rate">' . $data->quantity . '</td>';
         $html .= '<td class="amount">' . $data->total . '</td>';
         $html .= '<td class=""></td>';
         $html .= '</tr>';
         $html .= '<tr>';
         $html .= '<td colspan="3">Balance</td>';
         $html .= '<td class="balance">' . $balance . '</td>';
         $html .= '</tr>';
         $html .= '<tr>';
         $html .= '<td colspan="3">Total Amount</td>';
         $html .= '<td class="total">' . $data->customer->amount . '</td>';
         $html .= '</tr>';
         $html .= '</tbody></table>';
         $html .= '</div>';
         $html .= '</div>';

      }
      return $html;
   }
}
