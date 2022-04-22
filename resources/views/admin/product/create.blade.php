@extends('layouts.admin-layout')
@section('content')
  <main>
    <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
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
                  <input type="text" name="name"  class="form-control" placeholder="Product name">
                </div>
              </div>



              <div class="col-md-4 mb-4">

                <div class="md-form form-sm">
                    <label  for="form2" class="">Category</label>
                    <span style="color: red">{{$errors->first('category_id')}}</span>
                    <select class="form-control" style="display: block !important" name="category_id" id="form2" >
                        @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <input class="form-control" type="text" name="category_name" placeholder="Create new category">
                </div>

              </div>

              <div class="col-md-4 mb-4">

                <div class="md-form">
                    <span style="color: red">{{$errors->first('price')}}</span>
                  <input placeholder="Price" type="text"  name="price" class="form-control">
                  <label for="form3" class="active">Price</label>
                </div>

              </div>

            </div>

            <div class="row">

              <div class="col-md-6 mb-4">

                <div class="md-form">
                    <span style="color: red">{{$errors->first('quantity')}}</span>
                  <input placeholder="Quantity" name="quantity" type="number" class="form-control">
                  <label class="active" >Quantity</label>
                </div>

              </div>

              <div class="col-md-6 mb-4">

                <div class="md-form">
                    <span style="color: red">{{$errors->first('status')}}</span>
                  <input type="number" class="form-control" name="status" placeholder="status" >
                  <label for="form5">Status</label>
                </div>

              </div>

            </div>


            <div class="row text-left">

              <div class="col-md-6 mb-4">

                <div class="md-form">
                    <span style="color: red">{{$errors->first('description')}}</span>
                  <textarea type="text" name="description" class="md-textarea form-control" rows="3"></textarea>
                  <label for="form10">Description</label>
                </div>

              </div>
              <div class="col-md-6 mb-4">

                <div class="md-form">
                  <i class="fas fa-pencil-alt prefix"></i>
                  <span style="color: red">{{$errors->first('short_description')}}</span>
                  <textarea type="text" name="short_description" class="md-textarea form-control" rows="3"></textarea>
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
                        <span style="color: red">{{$errors->first('image')}}</span>
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
                        <span style="color: red">{{$errors->first('images')}}</span>
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
          <input type="submit" value="Send" class="btn btn-success" style="display: block" width="100%">
        </section>

      </div>
    </form>
  </main>
@endsection
