<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ProfileController;

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
    return view('auth.login');
});


Auth::routes();

Route::middleware(['auth'])->group(function () {


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    
    Route::resource('/suppliers', App\Http\Controllers\SupplierController::class, ['names' => 'supplier']);
    Route::resource('/customers', App\Http\Controllers\CustomerController::class, ['names' => 'customer']);
    Route::resource('/category', App\Http\Controllers\CategoryController::class, ['names' => 'category']);
    Route::resource('/unit', App\Http\Controllers\UnitController::class, ['names' => 'unit']);
    Route::resource('/product', App\Http\Controllers\ProductController::class, ['names' => 'product']);
    Route::resource('/material', App\Http\Controllers\MaterialController::class, ['names' => 'material']);
    Route::resource('/worker', App\Http\Controllers\workerController::class, ['names' => 'worker']);
    Route::controller(PurchaseController::class)->group(function () {
        Route::get('/purchase', 'index')->name('purchase.index'); 
        Route::post('/purchase/store', 'store')->name('purchase.store');
        Route::get('/purchase/delete/{id}', 'destroy')->name('purchase.destroy');
        Route::get('/purchase/create', 'create')->name('purchase.create');
        Route::get('/purchase/pending', 'PurchasePending')->name('purchase.pending');
        Route::get('/purchase/approve/{id}', 'PurchaseApprove')->name('purchase.approve');
        //Route::get('/daily/purchase/report', 'DailyPurchaseReport')->name('daily.purchase.report');
        //Route::get('/daily/purchase/pdf', 'DailyPurchasePdf')->name('daily.purchase.pdf');
         
    });
    Route::controller(ProductionController::class)->group(function () {
        Route::get('/production', 'index')->name('production.index'); 
        Route::post('/production/store', 'store')->name('production.store');
        Route::get('/production/delete/{id}', 'destroy')->name('production.destroy');
        Route::get('/production/create', 'create')->name('production.create');
        Route::get('/production/pending', 'ProductionPending')->name('production.pending');
        Route::get('/production/approve/{id}', 'ProductionApprove')->name('production.approve');
        //Route::get('/daily/purchase/report', 'DailyPurchaseReport')->name('daily.purchase.report');
        //Route::get('/daily/purchase/pdf', 'DailyPurchasePdf')->name('daily.purchase.pdf');
         
    });

   
   Route::controller(DefaultController::class)->group(function () {
        Route::get('/get-category', 'GetCategory')->name('get-category'); 
       Route::get('/get-product', 'GetProduct')->name('get-product');
       Route::get('/get-worker', 'GetWorker')->name('get-worker');
       Route::get('/get-material', 'GetMaterial')->name('get-material');
       Route::get('/check-product', 'GetStock')->name('check-product-stock'); 
    
   });
   Route::controller(InvoiceController::class)->group(function () {
    Route::get('/invoice/all', 'InvoiceAll')->name('invoice.all'); 
    Route::get('/invoice/add', 'invoiceAdd')->name('invoice.add');
    Route::post('/invoice/store', 'store')->name('invoice.store');
    Route::get('/invoice/pending/list', 'PendingList')->name('invoice.pending.list');
    Route::get('/invoice/delete/{id}', 'InvoiceDelete')->name('invoice.delete');
    Route::get('/invoice/approve/{id}', 'InvoiceApprove')->name('invoice.approve');
    Route::post('/approval/store/{id}', 'ApprovalStore')->name('approval.store');
});

Route::controller(StockController::class)->group(function () {
    Route::get('/stock/product', 'ProductReport')->name('product.report'); 
    Route::get('/stock/material', 'MaterialReport')->name('material.report'); 
   

});





});
