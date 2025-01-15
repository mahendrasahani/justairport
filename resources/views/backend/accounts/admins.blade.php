@extends('layouts/backend/main')
 @section('main-section')
 <style>
       h3 {
        font-size: 12px;
        font-weight: 600;
        margin-bottom:0 !important;
    }

    .admin_header{
    background: #abc4de;
    font-size: 12px;
    padding: 4px 2px;
    font-weight: 500;
    box-shadow: inset 3px -9px 5px #8cbdef;
}
</style>

<div class="content-wrapper">
<div class="admin_header">
        <h3>All Admins</h3>
        </div>
    <div class="box container">
        <div class="box-body">
            <!-- <div class="number-table"> -->
                    <table id="example1" class=" user_table table table-bordered table-striped text-light" >
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Name</th>
                        <th>Email/Mobile</th>
                        <th>Acount Type</th>
                        <th>Acount Status</th>
                        <th>Total Bookings</th>
                        <th>Action</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <!-- ---------- user table body --------- -->
                <tbody id="account_body">
                    <tr>
                        <td class="search-table-data">1</td>
                        <td>Tanya Harris</td>
                        <td>
                              <p class="m-0 mb-1 mb-md-2">tanya.harris@jeragm.com</p>
                              <p class="m-0">+91 9087654321</p>
                        </td>
                        <td>individual</td>
                        <td class="status fw-bold">Approved</td>
                        <td>0</td>
                        <td>
                              <p class="m-0 mb-2 text-center">
                                    <button class=" btn btn-sm text-light fw-semibold" style="background-color : #5cb85c" > <span><i class="fa-solid fa-check"></i> </span>Enable</button>
                              </p>
                              <p class="mb-0">
                                    <button class=" btn btn-sm w-100 text-light fw-semibold m-0"  onclick="handleModal()" style="background-color : #286090"><span><i class="fa-solid fa-pen-to-square"></i> </span>Edit</button>
                              </p>
                        </td>
                        <td>  <p><button class=" btn btn-sm w-100 text-light fw-semibold" onclick="handleProfileModal()" style="background-color : #286090"><span><i class="fa-solid fa-user"></i> </span>Profile</button></p></td>
                  </tr>

                   <tr>
                        <td class="search-table-data">2</td>
                        <td>Tanya Harris</td>
                        <td>
                              <p class="m-0 fw-semibold mb-1 mb-md-2">tanya.harris@jeragm.com</p>
                              <p class="m-0">+91 1023456789</p>
                        </td>
                        <td>individual</td>
                        <td class="status fw-bold">Pending</td>
                        <td>0</td>
                        <td>
                              <p class="m-0 mb-2 text-center">
                                    <button class=" btn btn-sm text-light fw-semibold"  style="background-color : #5cb85c"> <span><i class="fa-solid fa-check"></i> </span>Enable</button>
                              </p>
                              <p class="mb-0">
                                    <button class=" btn btn-sm w-100 text-light fw-semibold m-0" style="background-color : #286090"  onclick="handleModal()"> <span><i class="fa-solid fa-pen-to-square"></i> </span>Edit</button>
                              </p>
                        </td>
                        <td>  <p><button class=" btn btn-sm w-100 text-light fw-semibold" style="background-color : #286090" onclick="handleProfileModal()"><span><i class="fa-solid fa-user"></i> </span>Profile</button></p></td>
                  </tr>
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
                
                          <!-- Registration type -->
                          <div class="row"  style="border-bottom: 1px solid #000;">
                              <div class="col-md-3"><strong>Reg.type:</strong></div>
                              <div class="col-md-9 text-end ">App</div>
                          </div>
                  
                          <!-- Name -->
                          <div class="row mt-2"  style="border-bottom: 1px solid #000;">
                              <div class="col-md-4"><strong>Name:</strong></div>
                              <div class="col-md-8 text-end">tong</div>
                          </div>
                  
                          <!-- Email -->
                          <div class="row mt-2"  style="border-bottom: 1px solid #000;"> 
                              <div class="col-md-4"><strong>Email:</strong></div>
                              <div class="col-md-8 text-end">1657752592@qq.com</div>
                          </div>
                  
                          <!-- Phone -->
                          <div class="row mt-2"  style="border-bottom: 1px solid #000;">
                              <div class="col-md-4"><strong>Phone:</strong></div>
                              <div class="col-md-8 text-end">07958545863</div>
                          </div>
                  
                          <!-- Address -->
                          <div class="row mt-2"  style="border-bottom: 1px solid #000;">
                              <div class="col-md-4"><strong>Address:</strong></div>
                              <div class="col-md-8 text-end">312 Goswell road</div>
                          </div>
                  
                          <!-- City -->
                          <div class="row mt-2"  style="border-bottom: 1px solid #000;">
                              <div class="col-md-4"><strong>City:</strong></div>
                              <div class="col-md-8 text-end">London</div>
                          </div>
                  
                          <!-- Postcode -->
                          <div class="row mt-2"  style="border-bottom: 1px solid #000;">
                              <div class="col-md-4"><strong>Postcode:</strong></div>
                              <div class="col-md-8 text-end">EC1V7AF</div>
                          </div>
                  
                          <!-- Member Since -->
                          <div class="row mt-2"  style="border-bottom: 1px solid #000;">
                              <div class="col-md-4"><strong>Member Since:</strong></div>
                              <div class="col-md-8 text-end">28/03/2020</div>
                          </div>
                      </div>
                      <!-- Close button -->
                  <div class="d-flex justify-content-end mt-3">
                      <button type="button" class="btn btn-primary" onclick="handleProfileModal()">Close</button>
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
  
      function handleProfileModal() {
          const modal = document.getElementById("profileModal");
          if (modal.style.display == "" || modal.style.display == "none") {
              modal.style.display = "block";
          } else {
              modal.style.display = "none";
          }
      }

  </script>
 @endsection

 