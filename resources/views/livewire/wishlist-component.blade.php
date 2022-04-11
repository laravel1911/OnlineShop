<div>
    @if(auth()->check())
    <div class="col-sm-6">
        <div class="shopping-item">
            <a href="{{ route('wishlist') }}">Wishlist - <span  class="cart-amunt"></span> <i class="fa fa-heart" style="font-size:16px;color:red"></i> <span class="product-count">{{ $wishlist->count() }}</span></a>
        </div>
    </div>

    @endif
</div>
