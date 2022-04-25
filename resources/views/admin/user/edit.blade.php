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

                    <!--Card-->
                    <div class="card card-cascade narrower">

                        <!--Card image-->
                        <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                            <h5 class="mb-0 font-weight-bold">Edit Photo</h5>
                        </div>
                        <!--/Card image-->

                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="User Photo" class="z-depth-1 mb-3 mx-auto" />

                            <p class="text-muted"><small>Profile photo will be changed automatically</small></p>
                            <div class="row flex-center">
                                <button class="btn btn-info btn-rounded btn-sm">Upload New Photo</button><br>
                                <button class="btn btn-danger btn-rounded btn-sm">Delete</button>
                            </div>
                        </div>
                        <!-- /.Card content -->

                    </div>
                    <!--/.Card-->

                </div>
                <!-- /.First column -->
                <!-- Second column -->
                <div class="col-lg-8 mb-4">

                    <!--Card-->
                    <div class="card card-cascade narrower">

                        <!--Card image-->
                        <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                            <h5 class="mb-0 font-weight-bold">Edit Account</h5>
                        </div>
                        <!--/Card image-->

                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">
                            <!-- Edit Form -->
                            <form action="{{route('admin.update', ['id' => $users->id])}}" method="post">
                                @csrf
                                @method('PUT')
                                <!--First row-->
                                <div class="row">
                                    <!--First column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form1" class="form-control validate" value="Company, inc" disabled>
                                            <label for="form1" data-error="wrong" data-success="right">Company</label>
                                        </div>
                                    </div>
                                    <!--Second column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form2" name="name" class="form-control validate" value="{{ $users->name}}">
                                            <label for="form2" data-error="wrong" data-success="right">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <!--/.First row-->
                                <!--First row-->
                                <div class="row">
                                    <!--First column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form81" class="form-control validate" value="{{ $users->phone }}">
                                            <label for="form81" data-error="wrong" data-success="right">Phone</label>
                                        </div>
                                    </div>
                                    <!--Second column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form82" class="form-control validate" value="{{ $users->login }}">
                                            <label for="form82" data-error="wrong" data-success="right">Login</label>
                                        </div>
                                    </div>
                                </div>
                                <!--/.First row-->
                                <!--Second row-->
                                <div class="row">
                                    <!--First column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="email" id="form76" class="form-control validate" value="{{ $users->email }}">
                                            <label for="form76">Email address</label>
                                        </div>
                                    </div>
                                    <!--Second column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form77" class="form-control validate" value="{{ $users->password }}">
                                            <label for="form77" data-error="wrong" data-success="right">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Second row-->
                                <!--Third row-->
                                <div class="row">
                                    <!--First column-->
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <textarea type="text" id="form78" class="md-textarea form-control" rows="3"></textarea>
                                            <label for="form78">About me</label>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Third row-->
                                <!-- Fourth row -->
                                <div class="row">
                                    <div class="col-md-12 text-center my-4">
                                        <input type="submit" value="Update Account" class="btn btn-info btn-rounded">
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
