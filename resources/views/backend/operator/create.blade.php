@extends('layouts/backend/main')
@section('main-section')  
<style> 
    .content-main{background-color: white;}  
    input {height:32px;}
    .eye_btn{height: 32px;padding-top: 2px;} 
</style>
<div class="content-wrapper content-main">
 <div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
        <h4>Add New Operator</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form class="mt-1" action="{{route('admin.operator.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label"  >First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}" placeholder="Enter first name"  style="text-transform: uppercase;">
                        @error('first_name')
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label"  >Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}" placeholder="Enter Last name"  style="text-transform: uppercase;">
                        @error('last_name')
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div> 
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" value="{{old(key: 'phone')}}" placeholder="Enter phone number">
                        @error('phone')
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{old('user_name')}}" placeholder="Enter user name"  style="text-transform: uppercase;">
                        @error('username')
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email ID</label>
                        <input type="email" class="form-control" id="email" value="{{old('email')}}" placeholder="Enter email address" name="email"  style="text-transform: uppercase;">
                        @error('email')
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                            <button type="button" class="btn btn-outline-secondary eye_btn" id="togglePassword">
                                <i class="fa fa-eye" id="eyeIconPassword"></i> <!-- Eye icon to toggle visibility for password -->
                            </button>
                        </div>
                        @error('password')
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
                            <button type="button" class="btn btn-outline-secondary eye_btn" id="toggleConfirmPassword">
                                <i class="fa fa-eye" id="eyeIconConfirmPassword"></i> <!-- Eye icon to toggle visibility for confirm password -->
                            </button>
                        </div>
                        @error('confirm_password')
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    <!-- <div class="col-md-6">
                        <label for="profile_image" class="form-label">Profile</label>
                        <input type="file" class="form-control" id="profile_image" name="profile_image">
                        @error('profile_image')
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div> -->
                    <div class="col-md-12 text-end"> 
                        <button type="submit" class="btn btn-primary">Add New Operator</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
 </div>
 </div>
  
    </div>
</div>

@section('javascript-section') 
<script> 
    document.getElementById('togglePassword').addEventListener('click', function() {
        var passwordField = document.getElementById('password');
        var eyeIcon = document.getElementById('eyeIconPassword'); 
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }); 
    document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
        var confirmPasswordField = document.getElementById('confirm_password');
        var eyeIconConfirm = document.getElementById('eyeIconConfirmPassword');
        
        if (confirmPasswordField.type === 'password') {
            confirmPasswordField.type = 'text';
            eyeIconConfirm.classList.remove('fa-eye');
            eyeIconConfirm.classList.add('fa-eye-slash');
        } else {
            confirmPasswordField.type = 'password';
            eyeIconConfirm.classList.remove('fa-eye-slash');
            eyeIconConfirm.classList.add('fa-eye');
        }
    });
</script>
@endsection
 @endsection