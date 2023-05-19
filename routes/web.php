<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderDetailsController;
use App\Http\Controllers\Admin\CustomerController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Carbon\Carbon;
use App\Http\Controllers\Admin\DailySalesController;
use App\Http\Controllers\Admin\TransactionCategoryController;
use App\Http\Controllers\Admin\TransactionsController;
use App\Http\Controllers\Admin\BillsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminQuotationProductsController;
use App\Http\Controllers\Admin\paymentSystem;

use App\Models\OrderDetail;
use App\Models\Transations;
/*
------------ Users Controller Start--------------
*/

use App\Http\Controllers\User\QuotationController;
use App\Http\Controllers\User\PaynowController;
use App\Http\Controllers\User\CustomersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/login', [AdminController::class, 'index']);
// Route::post('login', [AdminController::class, 'login'])->name('login');

// Route::middleware('auth')->group(function () {
//     Route::prefix('account')->group(function () {
//         Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
//     });
// });

Auth::routes();

Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/', function () {
        return redirect('dashboard');
    });
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('orders_details', OrderDetailsController::class);
    Route::get('/get/products', [OrderDetailsController::class, 'getproduct'])->name('get.products');
    Route::get('/get/name', [CustomerController::class, 'getproduct'])->name('get.amount');
    Route::post('/update-status/{id}', [OrderDetailsController::class, 'updateStatus'])->name('update.status');
    Route::post('updateQuantity', [OrderDetailsController::class, 'updateQuantity'])->name('update.quantity');
    Route::resource('customer', CustomerController::class);
    Route::get('/viewData/{id}', [CustomerController::class, 'view'])->name('view');
    Route::resource('dailySales', DailySalesController::class);
    Route::get('/filter', [DailySalesController::class, 'filter'])->name('sales.filter');
    Route::resource('bills', BillsController::class);
    Route::get('/getbills', [BillsController::class, 'filter'])->name('GetBills.filter');
    Route::resource('transactionCategory', TransactionCategoryController::class);
    Route::resource('transactions', TransactionsController::class);
    Route::resource('reports', ReportController::class);
    Route::get('/reportsfilter', [ReportController::class, 'filter'])->name('reports.filter');
    Route::resource('user', UserController::class);
    Route::get('quotations',[AdminQuotationProductsController::class,'index'])->name('quotations.index');
    Route::post('/updatestatus/{id}', [AdminQuotationProductsController::class, 'statusUpdate'])->name('updateQouataionstatus');
    Route::get('/getView/{id}',[AdminQuotationProductsController::class,'view'])->name('views');

    Route::get('/getview/{id}',[CustomerController::class,'view'])->name('view');
    Route::resource('paymentsystem', paymentSystem::class);
    Route::post('/status/{id}', [paymentSystem::class, 'status'])->name('status');
    
    
    
});

// Route::group(['middleware' => ['auth', 'isUser']], function () {
    // Route::get('/', function () {
    //     return redirect()->route('userdashboard');
    // });
    Route::get('/userdashboard', [AdminUserController::class, 'dashboard'])->name('userdashboard');
    Route::resource('quotation',QuotationController::class);
    Route::get('search',[QuotationController::class,'search'])->name('quotation.search');
    Route::get('/products/sum', [QuotationController::class,'sum'])->name('quotation.sum');
    Route::resource('payment',PaynowController::class);
    Route::resource('customers', CustomersController::class);
   
    
// });
