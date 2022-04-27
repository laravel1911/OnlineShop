<div>

    <table cellspacing="0" class="shop_table cart">
        <thead>
            <tr>
                <th class="product-remove">&nbsp;</th>
                <th class="product-thumbnail">&nbsp;</th>
                <th class="product-name">Product</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-subtotal">Total</th>
            </tr>
        </thead>
        <tbody>
        @if($cart && $cart->count() > 0)
            @foreach($cart as $item)
            <tr class="cart_item">
                <td class="product-remove">
                    <a title="Remove this item" class="fa fa-trash" href="" wire:click.prevent="delete({{$item->id}})"></a>
                </td>

                <td class="product-thumbnail">
                    <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src={{asset($item->product->image)}}></a>
                </td>

                <td class="product-name">
                    <a href="{{route('details', ['slug' => $item->product->slug])}}">{{$item->product->name}}</a>
                </td>

                <td class="product-price">
                    <span class="amount">${{$item->product->price}}</span>
                </td>
                <td class="product-quantity">
                    <div class="quantity buttons_added">
                        <input type="button" class="minus" wire:click.prevent="minus({{$item->id}})" value="-">
                        <span>{{$item->quantity}}</span>
                        <input type="button" class="plus" wire:click.prevent="plus({{$item->id}})" value="+">
                    </div>
                </td>

                <td class="product-subtotal">
                    <span class="amount">${{$item->price}}</span>
                </td>
            </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="6">Korzinkada mahsulot yo'q</td>
                </tr>
            @endif
            <tr>
                <td class="actions" colspan="6">
                    <a href="{{route('checkout')}}" class="btn btn-primary">
                        <strong>Checkout</strong>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>

</div>
