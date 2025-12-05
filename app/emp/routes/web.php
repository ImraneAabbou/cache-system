<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::resource('customers', CustomerController::class);

Route::get('/customers/{customerNumber}/orders', [CustomerController::class, 'showOrders'])->name('customer.orders');

Route::get('/customers/{customerNumber}/orders/{orderNumber}/edit', [CustomerController::class, 'editOrder'])->name('customer.orders.edit');

Route::get('/customers/{customerNumber}/orders/create', [CustomerController::class, 'createOrder'])->name('customer.orders.create');

Route::post('/customers/{customerNumber}/orders', [CustomerController::class, 'storeOrder'])->name('customer.orders.store');

Route::put('/customers/{customerNumber}/orders/{orderNumber}', [CustomerController::class, 'updateOrder'])->name('customer.orders.update');

Route::resource('orders', OrderController::class);