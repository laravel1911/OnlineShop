@extends('layouts.admin-layout')

@section('content')
<main>
    <div class="container-fluid">

        <!-- Section: Edit Account -->
        <section class="section">
            <!-- First row -->
            <div class="row">
                <!-- First column -->
                <div class="col-lg-4 mb-4">
                </div>
                <!-- /.First column -->
                <!-- Second column -->
                <div class="col-lg-8 mb-4">

                    <!--Card-->
                    <div class="card card-cascade narrower">

                        <!--Card image-->
                        <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                            <h5 class="mb-0 font-weight-bold">Edit Category</h5>
                        </div>
                        <!--/Card image-->

                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">
                            <!-- Edit Form -->
                            <form action="{{route('admin.category.update', ['id' => $category->id])}}" method="post">
                                @csrf
                                @method('PUT')
                                <!--First row-->
                                <div class="row">
                                    <!--Second column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form2" name="name" class="form-control validate" value="{{ $category->name}}">
                                            <label for="form2" data-error="wrong" data-success="right">Name</label>
                                        </div>
                                    </div>
                                </div>
                                <!--/.First row-->
                                <!--/.Third row-->
                                <!-- Fourth row -->
                                <div class="row">
                                    <div class="col-md-12 text-center my-4">
                                        <input type="submit" value="Update Craete" class="btn btn-info btn-rounded">
                                    </div>
                                </div>
                                <!-- /.Fourth row -->
                            </form>
                            <!-- Edit Form -->
                        </div>
                        <!-- /.Card content -->

                    </div>
                    <!--/.Card-->
                </div>
                <!-- /.Second column -->
            </div>
            <!-- /.First row -->
        </section>
        <!-- /.Section: Edit Account -->

    </div>
</main>


@endsection
