<?php

namespace App\Traits;

use App\Models\{Product, Cart, Wishlist};
/**
 *
 */
trait MyTrait
{
    public function actionCart($product_id)
    {
        $product = Product::where('id', $product_id)->first();
        if(auth()->check()){
            $cart = Cart::where('user_id', auth()->id())->where('product_id', $product_id)->first();
            if($cart){
                $cart->update([
                    'quantity' => $cart->quantity + $this->quantity,
                    'price' => ($cart->quantity + $this->quantity) * $product->price
                ]);
            } else{
                $cart = Cart::create([
                    'user_id' => auth()->id(),
                    'product_id' => $product_id,
                    'quantity' => $this->quantity,
                    'price' => $product->price * $this->quantity
                ]);
            }
            session()->flash('message', 'Mahsulot savatga muvaffaqiyatli qo\'shildi');
            $this->emitTo('korzinka-component', 'load');
        } else{
            return redirect()->route('login');
        }
    }

    public function addToWishlist($product_id)
    {
        if(auth()->check()){
            $wishlist = Wishlist::where('user_id', auth()->id())->where('product_id', $product_id)->first();
            if($wishlist){
                $wishlist->delete();
            } else{
                Wishlist::create([
                    'user_id' => auth()->id(),
                    'product_id' => $product_id
                ]);
            }
            $this->emitTo('korzinka-component', 'load');
        } else
            return redirect()->route('login');
    }
}
