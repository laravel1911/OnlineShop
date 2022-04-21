@extends('layouts.admin-layout')

@section('content')
<main>
    <div class="container-fluid mb-5">

      <!--Section: Basic examples-->
      <section>

        <div class="row" >

          <div class="col-md-12">

            <div class="card">
              <div class="card-body">
                <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="th-sm">ID
                      </th>
                      <th class="th-sm">Name
                      </th>
                      <th class="th-sm">Price
                      </th>
                      <th class="th-sm">Category
                      </th>
                      <th class="th-sm">Quantity
                      </th>
                      <th class="th-sm">Image
                    </th>
                    </tr>
                  </thead>
                  <tbody>
                      @if ($product)
                        @foreach ($product as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td><a href="{{route('admin.product.show', ['slug' => $item->slug])}}">{{$item->name}}</a></td>
                                <td><a href="{{route('admin.product.show', ['slug' => $item->slug])}}">${{$item->price}}</a></td>
                                <td><a href="{{route('admin.product.show', ['slug' => $item->slug])}}">{{$item->category->name}}</a></td>
                                <td><a href="{{route('admin.product.show', ['slug' => $item->slug])}}">{{$item->quantity}}</a></td>
                                <td><a href="{{route('admin.product.show', ['slug' => $item->slug])}}"><img src="{{asset($item->image)}}" width="100" alt="Bu yerda rasm bor"></a></td>
                            </tr>

                        @endforeach
                      @endif

                  </tbody>

                </table>
              </div>
            </div>

          </div>

        </div>

      </section>
      <!--Section: Basic examples-->

    </div>
  </main>

@endsection
