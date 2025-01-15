@extends('layouts/backend/main')
@section('main-section')
<div class="content-wrapper">
  <div class="box main-container">
    <div class="container my-5">
      <div class="row">
          <!-- Profile Picture and Details -->
          <div class="col-md-4">
              <div class="card">
                  <img src="
                  @if(Auth::user()->profile != '')
                    {{url(Auth::user()->profile)}}
                    @else
                {{url('public/assets/backend/images/user.png')}}
                  @endif
                  " class="card-img-top" alt="Profile Picture">
                  <div class="card-body text-center">
                      <h5 class="card-title">{{Auth::user()->name ?? ''}}</h5>
                      <p class="card-text">{{Auth::user()->phone ?? ''}}</p>
                      <p class="card-text"><small class="text-muted">{{Auth::user()->email ?? ''}}</small></p>
                      <a href="{{route('admin.edit_profile')}}" class="btn btn-primary">Edit Profile</a>
                  </div>
              </div>
          </div>

          <!-- User Information and Posts/Activity -->
          <div class="col-md-8">
              <div class="card mb-3">
                  <div class="card-body">
                      <h5 class="card-title">My Account</h5>
                      <h6 class="card-subtitle mb-2 text-muted">User Information</h6>
                      <div class="mb-3">
                          <label for="username" class="form-label">Username</label>
                          <p id="username" class="form-control-plaintext" style="font-size: 1.25rem;">{{Auth::user()->name ?? ''}}</p>
                      </div>
                      <div class="mb-3">
                          <label for="email" class="form-label">Email address</label>
                          <p id="email" class="form-control-plaintext" style="font-size: 1.25rem;">{{Auth::user()->email ?? ''}}</p>
                      </div>
                      <div class="mb-3">
                          <label for="firstName" class="form-label">Name</label>
                          <p id="firstName" class="form-control-plaintext" style="font-size: 1.25rem;">{{Auth::user()->name ?? ''}}</p>
                      </div>                      
                  </div>
              </div>
              <!-- Add more sections or posts as needed -->
          </div>
      </div>
  </div>
  </div>
</div>
@section('javascript-section') 
@endsection 
@endsection
