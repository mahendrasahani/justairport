@extends('layouts/backend/main')
 @section('main-section')
 <style>
       h3 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom:0 !important;
        pad: 20px;
    }

    .users_header{
    font-size: 12px;
    padding:10px;
    font-weight: 500;
}
 tbody#account_body tr td{padding: 10px !important; background-color: transparent;}

</style>

<div class="content-wrapper">
<div class="users_header">
        <h3>All Users</h3>
        </div>
    <div class="box main-container">
        <div class="box-body">
            <!-- <div class="number-table"> -->
                    <table id="example1" class=" user_table table table-bordered table-striped text-light" >
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Acount Type</th>  
                        <th>Details</th>
                    </tr>
                </thead>
                <!-- ---------- user table body --------- -->
                <tbody id="account_body">
                    @php
                     $sn = 1;
                    @endphp
                    @foreach($app_user as $user)
                    <tr>
                        <td class="search-table-data">{{$sn++}}</td>
                        <td>{{ucfirst($user->name)}}</td>
                        <td><p class="m-0 mb-1 mb-md-2">{{$user->email}}</p></td>
                        <td><p class="m-0">{{$user->phone}}</p></td>
                        <td>{{strtoupper($user->acctype)}}</td>  
                        <td>  <p><button class=" btn btn-sm w-100 text-light fw-semibold" onclick="handleUserProfileModal({{$user->id}})" style="background-color : #286090"><span><i class="fa-solid fa-user"></i> </span>Profile</button></p></td>
                  </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" id="myModal" style="backdrop-filter: blur(2px)">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header with Close Button -->
                <div class="modal-header">
                    <!-- Close button (×), data-dismiss attribute to close the modal -->
                    <button type="button" onclick="handleModal(event)" class="close" data-dismiss="modal"
                            style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 30px;">
                        &times;
                    </button>
                </div>
              <div class="modal-body row">
                  <!-- Your form for editing user details goes here -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="registrationType" class="form-label">Registration Type</label>
                                <select class="form-select" id="registrationType" required>
                                    <option value="">--Select--</option>
                                    <option value="individual">Individual</option>
                                    <option value="app">App</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" value="tong" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-Mail</label>
                                <input type="email" class="form-control" id="email" value="1657752592@qq.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="mobile" value="07958545863" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" value="Chenyue1" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" value="312 Goswell road" required>
                            </div>
                            <div class="mb-3">
                                <label for="street" class="form-label">Street</label>
                                <input type="text" class="form-control" id="street" value="Goswell road" required>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" value="London" required>
                            </div>
                            <div class="mb-3">
                                <label for="postcode" class="form-label">Postcode</label>
                                <input type="text" class="form-control" id="postcode" value="EC1V7AF" required>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary" id="modal_btn" onclick="handleModal()">Update</button>
                  </div>
                
              </div>
          </div>
      </div>
  </div>


  <div class="modal" id="profileModal" style="backdrop-filter: blur(2px)">
      <div class="modal-dialog-centered modal-dialog-sm" style="justify-content: center; backdrop-filter: blur(2px);">
          <div class="modal-content" style="width: 509px;">
              <div class="modal-body row">
                          <div class="row"  style="border-bottom: 1px solid #000;">
                              <div class="col-md-3"><strong>Reg.type:</strong></div>
                              <div class="col-md-9 text-end" id="view_account_type"></div>
                          </div>
                          <div class="row mt-2"  style="border-bottom: 1px solid #000;">
                              <div class="col-md-4"><strong>Name:</strong></div>
                              <div class="col-md-8 text-end" id="view_name"></div>
                          </div>
                          <div class="row mt-2"  style="border-bottom: 1px solid #000;"> 
                              <div class="col-md-4"><strong>Email:</strong></div>
                              <div class="col-md-8 text-end" id="view_email"></div>
                          </div>
                          <div class="row mt-2"  style="border-bottom: 1px solid #000;">
                              <div class="col-md-4"><strong>Phone:</strong></div>
                              <div class="col-md-8 text-end" id="view_phone"></div>
                          </div>
                          <div class="row mt-2"  style="border-bottom: 1px solid #000;">
                              <div class="col-md-4"><strong>Address:</strong></div>
                              <div class="col-md-8 text-end" id="view_address"></div>
                          </div>
                          <div class="row mt-2"  style="border-bottom: 1px solid #000;">
                              <div class="col-md-4"><strong>City:</strong></div>
                              <div class="col-md-8 text-end" id="view_city"></div>
                          </div>
                          <div class="row mt-2"  style="border-bottom: 1px solid #000;">
                              <div class="col-md-4"><strong>Postcode:</strong></div>
                              <div class="col-md-8 text-end" id="view_zipcode"></div>
                          </div>
                          <div class="row mt-2"  style="border-bottom: 1px solid #000;">
                              <div class="col-md-4"><strong>Member Since:</strong></div>
                              <div class="col-md-8 text-end" id="view_create_date"></div>
                          </div>
                      </div>
                  <div class="d-flex justify-content-end mt-3">
                      <button type="button" class="btn btn-primary" onclick="handleUserProfileModal()">Close</button>
                  </div>
                  </div>
              </div>
  </div>
</div>

@ection('javascript-section')
<script>
      function handleModal() {
          const modal = document.getElementById("myModal");
          if (modal.style.display == "" || modal.style.display == "none") {
              modal.style.display = "block";
          } else {
              modal.style.display = "none";
          }
      }
  
      async function handleUserProfileModal(id) {
          const modal = document.getElementById("profileModal");
         let url = "{{route('admin.view_app_user')}}";
         let response = await fetch(`${url}/?user_id=${id}`);
         let responseData = await response.json(); 
          if (modal.style.display == "" || modal.style.display == "none") {
             $("#view_account_type").val();
             $("#view_name").html(responseData.user.name);
             $("#view_email").html(responseData.user.email);
             $("#view_phone").html(responseData.user.phone);
             $("#view_address").html(responseData.user.address);
             $("#view_city").html(responseData.user.city);
             $("#view_zipcode").html(responseData.user.zip);
             $("#view_create_date").html(responseData.user.created_on);
              modal.style.display = "block";
          } else {
              modal.style.display = "none";
          }
      }
  </script>
 @endsection
 

 