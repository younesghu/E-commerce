<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
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
// All Products
Route::get('/',  [ProductController::class, 'index']);

// Show Create Form
Route::get('/products/create', [ProductController::class, 'create']);

// Store Product Data
Route::post('/products', [ProductController::class, 'store']);



// Single Product
Route::get('/products/{product}', [ProductController::class, 'show']);
