<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all products
    public function index(){
        return view('products.index', [
            'products' => Product::latest()->filter(request(['category', 'search']))->paginate(6)
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

        if($request->hasFile('image_url')){
            $data['image_url'] = $request->file('image_url')->store('logos', 'public');
        }

        // This method is in charge of adding a new listing

        $data['user_id'] = auth()->id();

        Product::create($data);

        return redirect('/')->with('message', 'Product added successfully!');
    }
    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

     // Store Product data
     public function update(Request $request, Product $product){
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock_quantity' => 'required',
            'categories' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('image_url')){
            $data['image_url'] = $request->file('image_url')->store('logos', 'public');
        }

        // This method is in charge of adding a new listing

        $product->update($data);

        return redirect('/')->with('message', 'Product updated successfully!');
    }

    public function destroy(Product $product){
        if($product->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        $product->delete();
        return redirect('/')->with('message', 'Product deleted successfully!');
    }

     // Manage Product
     public function manage(){
        return view ('products.manage', ['products' => auth()->user()->products()->get()]);
    }
}
