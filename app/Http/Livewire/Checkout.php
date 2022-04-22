<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_Details;
use App\Models\Product;
use Livewire\Component;

class Checkout extends Component
{
    public $firstname;
    public $lastname;
    public $address;
    public $phone;
    public $payment_type;

    public function mount()
    {

    }

    public function saveToOrder()
    {
//        dd($this->payment_type);
        if(auth()->check()){
            $cart = Cart::where('user_id', auth()->id())->get();

            $order = Order::create([
                'user_id' => auth()->id(),
                'all_price' => $cart->sum('price'),
                'shipping_price' => $cart->sum('price')*0.01,
                'status' => false,
                'quantity' => $cart->sum('quantity'),
                'order_date' => date_format(now(), 'Y-m-d'),
                'payment_type' => $this->payment_type,
                'fullname' => $this->firstname. ' '. $this->lastname,
                'phone' => $this->phone,
                'adres' => $this->address
            ]);

            foreach ($cart as $item){
                Order_Details::create([
                    'product_id' => $item->product_id,
                    'user_id' => $item->user_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'order_id' => $order->id,
                    'rating' => 1
                ]);
                $item->delete();
            }
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }

    public function render()
    {
        if(auth()->check()){
            $cart = Cart::where('user_id', auth()->id())->get();
            $products = Product::inRandomOrder()->limit(4)->get();
            $recent_products = Product::inRandomOrder()->limit(5)->get();
            return view('livewire.checkout',
            [
                'products' => $products,
                'recent_products' => $recent_products,
                'cart' => $cart
                ])->layout('layouts.layout');
        }
        return redirect()->route('login');
    }

}
