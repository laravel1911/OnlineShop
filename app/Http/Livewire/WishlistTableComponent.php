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
        return view('livewire.wishlist-table-component', ['wishlist' => $wishlist])->layout('layouts.layout');
    }

    public function delete($id)
    {
        $wishlist = Wishlist::find($id);
        if($wishlist)
            $wishlist->delete();

            $this->emitTo('wishlist-component', 'wishlist');
        return false;
    }


}
