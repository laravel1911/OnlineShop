<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderComponent extends Component
{
    public function render()
    {
        $order = Order::get();
        return view('livewire.order-component', ['order' => $order])->layout('layouts.layout');
    }
}
