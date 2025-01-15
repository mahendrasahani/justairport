@extends('layouts/backend/main')
@section('main-section')
<div class="content-wrapper">
    <div class="box main-container">
        <div class="container my-5">
            <div class="row">
                <!-- Profile Picture and Details -->
                 

                <!-- Edit User Information Form -->
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Edit Profile</h5>
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('admin.update_profile') }}" id="editProfileForm" enctype="multipart/form-data"> 
                                @csrf
                                <h6 class="card-subtitle mb-2 text-muted">User Information</h6>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username ?? '' }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email ?? '' }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="firstName" name="name" value="{{ Auth::user()->name ?? '' }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone ?? '' }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Profile Image</label>
                                    <input type="file" class="form-control" id="profile" name="profile">
                                </div>

                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('javascript-section')
<script>
    document.getElementById('changePhotoBtn').addEventListener('click', function() {
        document.getElementById('profilePhoto').click();
    });

    document.getElementById('profilePhoto').addEventListener('change', function() {
        this.form.submit();
    });
</script>
@endsection
@endsection
