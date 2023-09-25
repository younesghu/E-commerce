<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');

// Store Product Data
Route::post('/products', [ProductController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth');

// Update Product
Route::put('/products/{product}', [ProductController::class, 'update'])->middleware('auth');

// Delete Product
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->middleware('auth');

// Manage Products
 Route::get('/products/manage', [ProductController::class, 'manage']);

// Single Product
Route::get('/products/{product}', [ProductController::class, 'show']);

// Register User
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new User
Route::post('/users', [UserController::class, 'store']);

// Log User out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
