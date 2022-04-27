@extends('layouts.admin-layout')

@section('content')
<main>
    <div class="card-body pt-0 mt-0">
        <!--Name-->
        <div class="text-center">
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
                            <img src="{{asset($item)}}" width="100" alt="bu yer">
                        @endforeach

                    @endif
                </div>
            </div>
          <h3 class="mb-3 font-weight-bold"><strong>{{$product->name}}</strong></h3>
          <h6 class="font-weight-bold blue-text mb-4">${{$product->price}}</h6>
        </div>

        <ul class="mb-3 font-weight-bold">
          <li><strong>Category:</strong>{{$product->category->name}}</li>

          <li><strong>Quantity:</strong>{{$product->quantity}}</li>

          <li><strong>Description:</strong>{{$product->description}}</li>


        </ul>
        <br>
        <div style="display: flex">
            <a href="{{route('admin.product.index')}}" class="btn btn-primary">&#926 Product list</a>
            <a href="{{route('admin.product.edit', ['slug' => $product->slug])}}" class="teal-text btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit">
                <i class="fas fa-pencil-alt"></i><strong>Edit</strong>
            </a>
            <form action="{{route('admin.product.delete', ['id' => $product->id])}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </div>


      </div>
  </main>

@endsection
