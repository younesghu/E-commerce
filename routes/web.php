<?php

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

Route::get('/', function () {
    return view('products', [
        'heading' => 'Latest Products',
        'products' => Product::all()
    ]);
});
Route::get('/products/{id}', function($id){
    return view('product', [
        'product' => Product::find($id)
    ]);
});
