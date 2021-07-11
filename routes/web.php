<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\AdminController;

if (App::environment('production')) {
    URL::forceScheme('https');
Route::get('/', function () {
		return view('auth.login');
});



Route::middleware(['verified','auth'])->group(function(){
Route::get('/admin',[AdminController::Class,'index'])->name('admin');

//product module
Route::get('/admin/product',[ProductController::Class,'index'])->name('product');
Route::get('/admin/product/create',[ProductController::Class,'createProduct'])->name('create.product');
Route::post('/admin/product/save',[ProductController::Class,'storeProduct'])->name('save.product');
Route::get('/admin/product/edit/{id}',[ProductController::Class,'editProduct'])->name('edit.product');

Route::post('/admin/product/update',[ProductController::Class,'updateProduct'])->name('update.product');
Route::get('/admin/product/delete/{id}',[ProductController::Class,'deleteProduct'])->name('delete.product');

// Sell Module
Route::get('/admin/sell',[PurchaseController::Class,'index'])->name('sell');
Route::get('admin/create-order',[PurchaseController::Class,'createOrder'])->name('create.order');
Route::post('admin/save-order',[PurchaseController::Class,'saveOrder'])->name('save.order');
Route::get('admin/edit-order/{id}',[PurchaseController::Class,'editOrder'])->name('edit.order');
Route::post('admin/update-order',[PurchaseController::Class,'updateOrder'])->name('update.order');
//Report module
Route::get('/admin/report',[ReportController::Class,'index'])->name('report');
Route::get('/admin/daily-sales',[ReportController::Class,'dailySalesReport'])->name('dailySalesReport');
Route::get('/admin/weekly-sales',[ReportController::Class,'weeklySalesReport'])->name('weeklySalesReport');
Route::post('/admin/range-sales',[ReportController::Class,'rangeSalesReport'])->name('rangeSalesReport');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
