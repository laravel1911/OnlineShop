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
        <div class="alert alert-success" >
        <strong>Muvaffaqiyatli </strong> {{ session('message') }}
        </div>
    </div>
@endif
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Categories</h2>
                        <div class="thubmnail-recent">
                        @foreach ($categories as $category)
                            <input
                                type="radio"
                                wire:model="category_slug"
                                value="{{$category->slug}}">
                                {{$category->name}} <br>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Price</h2>
                        <div class="thubmnail-recent">
                            MinPrice:
                            <input
                                type="text"
                                wire:model="max"
                                value="{{ $max }}">
                                MaxPrice
                            <input
                                type="text"
                                wire:model="min"
                                value="{{ $min }}">

                </div>
            </div>
        </div>
    </div>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <a href="{{route('details', ['slug' => $product->slug])}}"><img src="{{asset($product->image)}}" alt="bu yerda rasm bor"></a>
                            </div>
                            <h2><a href="{{route('details', ['slug' => $product->slug])}}">{{$product->name}}</a></h2>
                            <div class="product-carousel-price">
                                <a href="{{route('details', ['slug' => $product->slug])}}">
                                    <ins>${{$product->price}}</ins>
                                </a>
                            </div>
                            <form class="cart">
                                <button class="add_to_cart_button" wire:click.prevent="addToCart({{$product->id}})" >Add to cart</button>
                            </form>
                            @if($wishlists)
                                <span> <img src="{{asset('assets/img/toliqyurak.png')}}"
                                            wire:click.prevent="addwishlist({{$product->id}})" width="50" alt=""></span>
                            @else
                                <span> <img src="{{asset('assets/img/yurak.png')}}" width="50" alt=""
                                            wire:click.prevent="addwishlist({{$product->id}})"></span>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a style="cursor: pointer" wire:click="previousPage()" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            @for ($i=1; $i<=$products->lastPage(); $i++)
                                <li ><a style="cursor: pointer" wire:click="gotoPage({{$i}})">{{$i}}</a></li>
                            @endfor
                            <li>
                              <a style="cursor: pointer" wire:click="nextPage()" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

