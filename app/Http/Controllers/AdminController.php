<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\TransationCategory;
use Carbon\Carbon;
use App\Models\Transations;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $admin = auth()->user();
        $totalUsers = Customer::count();
        $products = Product::count();
        $today = Carbon::today();
        $sales = OrderDetail::whereDate('date', $today->toDateString())->count();
        $order = OrderDetail::count();
        $data = OrderDetail::select("date", "total")->get();

        $result[] = ['Dates', 'Price'];
        foreach ($data as $key => $value) {
            $result[++$key] = [$value->date, (int)$value->total];
        }

        $transations = Transations::select("date", "price")->get();

        $results[] = ['Dates', 'Expense'];
        foreach ($transations as $key => $value) {
            $results[++$key] = [$value->date, (int)$value->price];
        }
        return view('admin.main.dashboard', compact('totalUsers', 'admin', 'products', 'sales', 'order', 'result', 'results'));
    }
}
