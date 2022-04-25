<div>
    @if(auth()->check())
    <form method="post" action="#">
        <table cellspacing="0" class="shop_table cart">
            <thead>
                <tr>
                    <th class="product-remove">&nbsp;</th>
                    <th class="product-name">Fullname</th>
                    <th class="product-price">Address</th>
                    <th class="product-price">Phone</th>
                    <th class="product-price">Quantity</th>
                    <th class="product-price">Order date</th>
                    <th class="product-price">Payment type</th>
                    <th class="product-price">All price</th>
                </tr>
            </thead>
            <tbody>
            @if($order && $order->count() > 0)
                @foreach($order as $item)
                <tr class="cart_item">
                    <td class="product-remove">
                        <a title="Remove this item" class="fa fa-trash" href="{{route('order_details')}}" ></a>
                    </td>

                    <td class="product-price">
                        <span class="amount"><a href="{{route('order_details')}}">{{$item->fullname}}</a></span>
                    </td>

                    <td class="product-price">
                        <span class="amount">{{$item->adres}}</span>
                    </td>

                    <td class="product-price">
                        <span class="amount">{{$item->phone}}</span>
                    </td>

                    <td class="product-price">
                        <span class="amount">{{$item->quantity}}</span>
                    </td>

                    <td class="product-price">
                        <span class="amount">{{$item->order_date}}</span>
                    </td>

                    <td class="product-price">
                        <span class="amount">{{$item->payment_type}}</span>
                    </td>

                    <td class="product-price">
                        <span class="amount">${{$item->all_price}}</span>
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
    @endif
</div>
