@extends('layouts.admin-layout')
@section('content')
  <main>
    <form action="{{route('admin.product.create')}}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="container-fluid">

        <section class="section card mb-5">

          <div class="card-body">


            <h1 class="text-center my-5 h1">Inputs</h1>

            <h5 class="pb-5">Input fields</h5>


            <div class="row">


              <div class="col-md-4 mb-4">
                <div class="md-form">
                    <label  class="">Product</label>
                    <span style="color: red">{{$errors->first('name')}}</span>
                  <input type="text" name="name"  class="form-control" value="{{$product->name}}" placeholder="Product name">
                </div>
              </div>



              <div class="col-md-4 mb-4">

                <div class="md-form form-sm">
                    <label  for="form2" class="">Category</label>
                    <span style="color: red">{{$errors->first('category_id')}}</span>

                    <select class="form-control"  style='display:block !important' name="category_id" id="form2" >
                        @foreach ($categories as $item)
                        @if ($item->id == $product->category_id)
                          <option selected value="{{$item->id}}">{{$item->name}}</option>
                        @else
                          <option value="{{$item->id}}">{{$item->name}}</option>
                        @endif
                        @endforeach
                    </select>


                    <input class="form-control" type="text" name="category_name" placeholder="Create new category">
                </div>

              </div>

              <div class="col-md-4 mb-4">

                <div class="md-form">
                  <input placeholder="Price" type="text" value="{{$product->price}}" class="form-control">
                  <label for="form3" class="active">Price</label>
                </div>

              </div>

            </div>

            <div class="row">

              <div class="col-md-6 mb-4">

                <div class="md-form">
                  <input  value="{{$product->quantity}}" type="number" class="form-control">
                  <label class="active" >Quantity</label>
                </div>

              </div>

              <div class="col-md-6 mb-4">

                <div class="md-form">
                  <input type="text" value="{{$product->status}}"  placeholder="Status" class="form-control" >
                  <label for="form5" class="disabled">Status</label>
                </div>

              </div>

            </div>


            <div class="row text-left">

              <div class="col-md-6 mb-4">

                <div class="md-form">
                  <textarea type="text"  name="text1" class="md-textarea form-control" rows="3">{{$product->description}}</textarea>
                  <label for="form10">Description</label>
                </div>

              </div>
              <div class="col-md-6 mb-4">

                <div class="md-form">
                  <i class="fas fa-pencil-alt prefix"></i>
                  <textarea type="text"  class="md-textarea form-control" name="text2" rows="3">{{$product->short_description}}</textarea>
                  <label for="form11">Short description</label>
                </div>

              </div>

            </div>

            <h5 class="pb-5">File input</h5>

            <div class="row">

              <div class="col-md-6 mb-4">

                  <div class="md-form">
                    <div class="file-field">
                      <div class="btn btn-primary btn-sm float-left">
                        <span>Choose file</span>
                        <input type="file" name="image">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" disabled placeholder="Upload your file">
                      </div>
                    </div>
                  </div>

              </div>

              <div class="col-md-6 mb-4">

                  <div class="md-form">
                    <div class="file-field">
                      <div class="btn btn-primary btn-sm float-left">
                        <span>Choose files</span>
                        <input type="file" name="images" multiple>
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" disabled placeholder="Upload one or more files">
                      </div>
                    </div>
                  </div>

              </div>

            </div>


          </div>
          {{-- <input type="submit" value="Save" class="btn btn-success" style="display: block !important" width="100%"> --}}
          <div style="display: flex">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{route('admin.product.show', ['slug' => $product->slug])}}" class="btn btn-light" width="25%">Back</a>
            <a href="{{route('admin.product.index')}}" class="btn btn-primary">&#926 Product list</a>
          </div>
        </section>

      </div>
    </form>
  </main>
@endsection
