<?php

namespace App\Http\Livewire;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistComponent extends Component
{
    public $wishlist;
    protected $listeners = ['wishlist' => '$refresh'];

    public function render()
    {
        $this->wishlist = Wishlist::get();
        return view('livewire.wishlist-component', ['wishlist' => $this->wishlist])->layout('layouts.layout');
    }
}
