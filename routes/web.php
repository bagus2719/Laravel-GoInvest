<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('/clients', ClientController::class);
Route::get('.clients.cetak', [ClientController::class, 'cetak'])->name('clients.cetak');
Route::resource('/products', ProductController::class);
Route::get('.products.cetak', [ProductController::class, 'cetak'])->name('products.cetak');
Route::resource('/transactions', TransactionController::class);
Route::get('.transactions.cetak', [TransactionController::class, 'cetak'])->name('transactions.cetak');