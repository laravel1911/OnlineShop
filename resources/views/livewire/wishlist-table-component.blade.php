<div>
    <form method="post" action="#">
        <table cellspacing="0" class="shop_table cart">
            <thead>
                <tr>
                    <th class="product-remove">&nbsp;</th>
                    <th class="product-thumbnail">&nbsp;</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                </tr>
            </thead>
            <tbody>
            @if($wishlist && $wishlist->count() > 0)
                @foreach($wishlist as $item)
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
                </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="6"><strong style="color: red">Wishlistga mahsulot qo'shilmagan yoki tizimga kirmagansiz</strong></td>
                    </tr>
                @endif

            </tbody>
        </table>
    </form>
</div>
