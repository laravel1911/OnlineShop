<div>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('message'))
        <div class="container" style="margin: 10px auto">
            <div class="alert alert-success">
                <strong>Muvaffaqiyatli </strong> {{ session('message') }}
            </div>
        </div>
    @endif

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        @foreach ($random_products as $item)
                            <div class="thubmnail-recent">
                                <a href="{{route('details', ['slug' => $item->slug])}}">
                                    <img src="{{asset($item->image) }}" class="recent-thumb" alt="">
                                </a>
                                <h2>
                                    <a href="{{route('details', ['slug' => $item->slug])}}">{{$item->name}}</a>
                                </h2>
                                <div class="product-sidebar-price">
                                    <a href="{{route('details', ['slug' => $item->slug])}}">
                                        <ins>${{$item->price}}</ins>
                                    </a>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        @foreach ($recent_product as $item)
                            <ul>
                                <li>
                                    <a href="{{route('details', ['slug' => $item->slug])}}">{{$item->name}}</a>
                                </li>
                            </ul>
                        @endforeach

                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="">Category Name</a>
                            <a href="">Sony Smart TV - 2015</a>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="{{asset($product->image)}}" width="300" alt="">
                                    </div>

                                    <div class="product-gallery">
                                        @if ($product->images)
                                            @php
                                                $pro_images = str_replace(' ', '', $product->images);
                                                $images = explode(',', $pro_images);
                                            @endphp
                                            @foreach ($images as $item)
                                                <img src="{{asset($item)}}" alt="">
                                            @endforeach

                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{$product->name}}</h2>
                                    <div class="product-inner-price">
                                        <ins>${{$product->price}}</ins>
                                    </div>

                                    <form class="cart">
                                        <div class="quantity">
                                            <input type="number" wire:model="quantity" size="4"
                                                   class="input-text qty text" title="Qty" value="1" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button"
                                                wire:click.prevent="addToCart({{$product->id}})">Add to cart
                                        </button>
                                    </form>

                                    @if($wishlist)
                                    <abbr title="Wishlistdan o'chirish">
                                        <span> <img src="{{asset('assets/img/toliqyurak.png')}}"
                                            wire:click.prevent="addWishlist({{$product->id}})" width="50" alt=""></span>
                                    </abbr>

                                    @else
                                    <abbr title="Wishlistga qo'shish ">
                                        <span> <img src="{{asset('assets/img/yurak.png')}}" width="50" alt=""
                                                    wire:click.prevent="addWishlist({{$product->id}})"></span>
                                    </abbr>

                                    @endif
                                    <div class="product-inner-category">
                                        <p>Category: <a href="">{{$product->category->name}}</a>. Tags: <a href="">awesome</a>,
                                            <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                    </div>

                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                                                                      role="tab" data-toggle="tab">Description</a>
                                            </li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile"
                                                                       role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>
                                                <p>
                                                    {{ $product->description }}
                                                </p>

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                @if(sizeof($reviews) > 0)
                                                    @foreach($reviews as $key=>$item)
                                                        <div class="submit-review">
                                                            <div class="rating-chooser" style="margin-bottom: 1px">
                                                                <p> {{$item->user->name}}</p>
                                                                <div class="rating-wrap-post">
                                                                    @for($i=1; $i<=$item->rating; $i++)
                                                                        <i class="fa fa-star"></i>
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                            <div>
                                                                {{$item->comment}}
                                                            </div>
                                                        </div>
                                                        <br>
                                                    @endforeach
                                                @else
                                                    <div>
                                                        Sharhlar mavjud emas
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">
                                @foreach ($related_products as $item)
                                    <div class="single-product">
                                        <div class="product-f-image">
                                            <img src="{{asset($item->image) }}" alt="">

                                            <div class="product-hover">
                                                <a wire:click.prevent="addToCart({{$product->id}})"
                                                   class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to
                                                    cart</a>
                                                <a href="{{route('details', ['slug' => $item->slug])}}"
                                                   class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                            </div>
                                        </div>

                                        <h2>
                                            <a href="{{route('details', ['slug' => $item->slug])}}">
                                                {{$item->name}}
                                            </a>
                                        </h2>

                                        <div class="product-carousel-price">
                                            <a href="{{route('details', ['slug' => $item->slug])}}">
                                                <ins>${{$item->price}}</ins>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
