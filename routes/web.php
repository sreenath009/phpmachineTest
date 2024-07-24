<?php

use App\Http\Controllers\AffiliateController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AffiliateController::class,'index'])->name('add.user');
Route::get('record-sale', [AffiliateController::class,'showRecordSale'])->name('record.sale');
Route::post('users',[AffiliateController::class,'addUser'])->name('users.store');
Route::post('sales',[AffiliateController::class,'recordSale'])->name('sales.store');
