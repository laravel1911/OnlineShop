<div>
    <form method="post" action="#">
        <table cellspacing="0" class="shop_table cart">
            <thead>
                <tr>
                    <th class="product-remove">&nbsp;</th>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-fulname">Fullname</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-price">Price</th>
                </tr>
            </thead>
            <tbody>
            @if($details && $details->count() > 0)
                @foreach($details as $item)
                <tr class="cart_item">
                    <td class="product-remove">
                        <a title="Remove this item" class="fa fa-trash" href="" ></a>
                    </td>

                    <td class="product-thumbnail">
                        <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src={{asset($item->product->image)}}></a>
                    </td>

                    <td class="product-fullname">
                        <span class="amount">{{$item->order->fullname}}</span>
                    </td>

                    <td class="product-quantity">
                        <span class="amount">{{$item->quantity}}</span>
                    </td>

                    <td class="product-price">
                        <span class="amount">${{$item->price}}</span>
                    </td>

                </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="6"> Buyurtmalar yoq</td>
                    </tr>
                @endif
                <tr>
            </tbody>
        </table>
    </form>
</div>
