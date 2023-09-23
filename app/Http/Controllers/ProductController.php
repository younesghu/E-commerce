<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all products
    public function index(){
        return view('products.index', [
            'products' => Product::latest()->filter(request(['category', 'search']))->get()
        ]);
    }

    // Show single product
    public function show(Product $product){
        return view('products.show', [
            'product' => $product
        ]);
    }

}
