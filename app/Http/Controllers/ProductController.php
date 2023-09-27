<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all products
    public function index(){
        return view('products.index', [
            'products' => Product::latest()->filter(request(['category', 'search']))->paginate(8)
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

        // Make sure logged in user is owner
        if($product->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

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


    public function productCart(){
            return view('products.cart');
    }

    //
    public function addProducttoCart($id){
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else{
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image_url
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('message', 'Product has been added to cart!');
    }

    public function deleteCartProduct(Request $request){
        $cart = session()->get('cart');
        if($request->id){
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('message', 'Product successfully removed!');
        }
    }
}
