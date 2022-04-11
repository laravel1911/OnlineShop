<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use App\Traits\MyTrait;
use Livewire\Component;

class WishlistTableComponent extends Component
{
    use MyTrait;
    public $product;
    public $cart;


    public function render()
    {

        $this->product = Product::get();
        $wishlist = null;
        if(auth()->check()){
            $wishlist = Wishlist::with('product')->where('user_id', auth()->id())->get();
        }
        //dd($wishlist);
        return view('livewire.wishlist-table-component', ['wishlist' => $wishlist])->layout('layouts.layout');
    }

    // public function delete($product_id){
    //     $wishlist = Wishlist::where('user_id', auth()->id())->where('product_id', $product_id)->first();
    //     if($wishlist){
    //         $wishlist -> delete();
    //     }
    //     dd($wishlist);
    // }

    public function delete($id)
    {
        //dd($id);
        $wishlist = Wishlist::find($id); //Cart::where('id', $id)->first();
        if($wishlist)
            $wishlist->delete();

        //$this->emitTo('korzinka-component', 'load');
        return false;
        $this->emitTo('wishlist-component', 'wishlist');
    }


}
