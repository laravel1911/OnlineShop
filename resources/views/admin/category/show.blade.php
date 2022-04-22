@extends('layouts.admin-layout')

@section('content')
<section class="section team-section">

    <!-- First row -->
    <div class="row">
      <!-- First column -->
      <div class="col-md-8">
        <div class="row mb-1">
          <div class="col-md-9">
            <h4 class="h4-responsive mt-1">Your Clients</h4>
          </div>
          <div class="col-md-3">
            <div class="md-form">
              <input placeholder="Search..." type="text" id="form5" class="form-control">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-1">
            <!-- Tabs -->
            <div class="classic-tabs">
              <!-- Nav tabs -->
              <div class="tabs-wrapper">
                <ul class="nav tabs-primary primary-color" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link waves-light active" data-toggle="tab" href="#panel83" role="tab">Personal
                      Clients</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link waves-light" data-toggle="tab" href="#panel84" role="tab">Corporate Clients</a>
                  </li>
                </ul>
              </div>
              <!-- Tab panels -->
              <div class="tab-content card">
                <!--Panel 1-->
                <div class="tab-pane fade show active" id="panel83" role="tabpanel">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>First Name</th>
                              <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($category as $values )
                            <tr>
                                <th scope="row">{{ $values->id }}</th>
                                <td>{{ $values->product->name }}</td>

                            </tr>
                            @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
                <!--/.Panel 1--
              </div>
              <!-- /.Tabs -->
            </div>
          </div>
        </div>
      </div>
      <!-- /.First column -->
      <!-- Second column -->
      <div class="col-md-4 mb-1">



      </div>
    </div>
    <!-- /.Second column -->
</div>
<!-- /.First row -->

</section>
@endsection
