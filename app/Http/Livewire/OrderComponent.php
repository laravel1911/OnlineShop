<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderComponent extends Component
{
    public function render()
    {
        $order = null;  
        if(auth()->check()){
            $order = Order::where('user_id', auth()->id())->get();

        }
        return view('livewire.order-component', ['order' => $order])->layout('layouts.layout');
    }
}
