@extends('layouts.admin-layout')
@section('content')
<!--Card-->
<div class="card profile-card">

  <!--Avatar-->
  <div class="avatar z-depth-1-half mb-4">
    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" class="rounded-circle" alt="First sample avatar image">
  </div>

  <div class="card-body pt-0 mt-0">
    <!--Name-->
    <div class="text-center">
      <h3 class="mb-3 font-weight-bold"><strong>{{ $users->name }}</strong></h3>
      <h6 class="font-weight-bold blue-text mb-4">Web Designer</h6>
    </div>

    <ul class="striped list-unstyled">
      <li><strong>E-mail address:</strong>{{ $users->email }}</li>

      <li><strong>Phone number:</strong>{{ $users->phone }}</li>

      <li><strong>Company:</strong> The Company, Inc</li>

      <li><strong>Twitter username:</strong> @anna.doe</li>

      <li><strong>Instagram username:</strong> @anna.doe</li>
    </ul>

  </div>

</div>
<!--Card-->
@endsection;
