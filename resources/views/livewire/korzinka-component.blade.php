<div>
    <div class="col-sm-6">
        <div class="shopping-item">
            <a href="{{ route('actioncart') }}">Cart - <span  class="cart-amunt">${{ $this->cart->sum('price')}}</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">{{ $cart->count() }}</span></a>
        </div>
    </div>
</div>
