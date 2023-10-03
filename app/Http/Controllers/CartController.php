<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addtocart(Request $request){
        $user = Auth::user();
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Check if the item already exists in the user's cart
        $cart = Cart::where('user_id', $user->id)
                            ->where('product_id', $productId)
                            ->first();

        if ($cart) {
            // Update quantity if item already in cart
            $cart->update(['quantity' => $cart->quantity + $quantity]);
        } else {
            // Create a new cart item
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('message', 'Item added to cart');
    }
    public function showcart(){
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->with('product')->get();

        return view('cart.show', compact('carts'));
    }


}
