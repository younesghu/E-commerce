<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all products
    public function index(){
        return view('products.index', [
            'products' => Product::latest()->filter(request(['category', 'searchprod']))->get()
        ]);
    }

    // Show single product
    public function show(Product $product){
        return view('products.show', [
            'product' => $product
        ]);
    }

    // Show create form
    public function create(){
        return view('products.create');
    }

     // Store Product data
     public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock_quantity' => 'required',
            'categories' => 'required',
            'description' => 'required'
        ]);

        // This method is in charge of adding a new listing
        Product::create($data);

        return redirect('/')->with('message', 'Product added successfully!');
    }

}
