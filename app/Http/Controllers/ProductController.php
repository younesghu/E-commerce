<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all products
    public function index(){
        return view('products', [
            'products' => Product::all()
        ]);
    }

    // Show single product
    public function show(Product $product){
        return view('product', [
            'product' => $product
        ]);
    }
}
