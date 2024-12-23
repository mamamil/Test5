<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Models\Products;
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


Route::get('/', [ProductsController::class, 'index']);
Route::get('/product/{id}', [ProductsController::class, 'show']);
Route::get('/user/{id}', [UserController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::post('/product/{id}/bid', [BidController::class, 'store']);
    Route::get('/my-bids', [BidController::class, 'myBids']);
    Route::post('/product', [ProductsController::class, 'store']);
    Route::post('/product/{id}/close', [ProductsController::class, 'close']);
});
