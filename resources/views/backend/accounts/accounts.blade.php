@extends('layouts/backend/main')
@section('main-section')

<style>
    h3 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 0 !important;
    }

    .account_header {

        font-size: 12px;
        padding: 10px;
        font-weight: 500;

    }

    tbody#account_body tr td {
        padding: 10px !important;
        background-color: transparent;
    }
 .main-container{margin-top: 0px !important;}
 
</style>

<div class="content-wrapper">
    <div class="account_header">
        <h3>All Accounts</h3>
    </div>
    <div class="box main-container">
        <div class="box-body">
            <!-- <div class="number-table"> -->
            <table id="example1" class=" user_table table table-bordered table-striped text-light">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Name</th>
                        <th>Email/Mobile</th> 
                        <th>Address</th> 
                        <th>Account Status</th> 
                        <th>Action</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <!-- ---------- user table body --------- -->
                <tbody id="account_body">
                    @php
                    $sn = 1;
                    @endphp
                    @foreach($accounts as $account)
                    <tr>
                        <td class="search-table-data">{{$sn++}}</td>
                        <td>{{$account->account_name}}</td>
                        <td>
                            <p class="m-0 mb-1 mb-md-2">{{$account->email}}</p>
                            <p class="m-0">{{$account->contact_phone}}</p>
                        </td> 
                        <td><p>{{$account->address }}</p></td>
                        <td><p>{{$account->getAccountStatusType->status_name ?? '' }}</p></td>
                      
                        <td class="action-td"> 
                                <button class=" btn btn-sm  text-light fw-semibold m-0 save_btn" style="width:70%; background-color : #5cb85c" onclick="handleModal({{$account->id}})" style="width:30%; background-color : #286090"><span><i class="fa-solid fa-pen-to-square"></i> </span>Edit</button>
                        </td>
                        <td>
                            <p><button class=" btn btn-sm w-100 text-light fw-semibold save_btn"
                                    onclick="handleProfileModal({{$account->id}})" style="background-color : #286090"><span><i
                                            class="fa-solid fa-user"></i> </span>Profile</button></p>
                        </td>
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
                    <form action="{{route('admin.update_account')}}" method="POST" class="row g-3">
                        <!-- Left Column -->
                         @csrf
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="hidden" name="account_id" id="account_id">
                                <label for="registrationType" class="form-label">Registration Type</label>
                                <select class="form-select" id="edit_account_status" name="edit_account_status" required>
                                    <option value="">--Select--</option>
                                   @foreach($account_status as $status)
                                        <option value="{{$status->id}}">{{$status->status_name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Account Name</label>
                                <input type="text" class="form-control" id="edit_account_name" name="edit_account_name">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Display Name</label>
                                <input type="text" class="form-control" id="edit_display_name" name="edit_display_name">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Contact Name</label>
                                <input type="text" class="form-control" id="edit_contact_name" name="edit_contact_name">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="edit_account_number" name="edit_account_number" value="tong" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-Mail</label>
                                <input type="email" class="form-control" id="edit_email" name="edit_email">
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="edit_mobile" name="edit_mobile" >
                            </div>
                        </div>
 
                        <div class="col-md-6"> 
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="edit_address" name="edit_address" >
                            </div> 
                        </div>
                        <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                    </form>
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
                <div class="row" style="border-bottom: 1px solid #000;">
                    <div class="col-md-3"><strong>Account Name:</strong></div>
                    <div class="col-md-9 text-end" id="view_account_name"></div>
                </div>

                <!-- Name -->
                <div class="row mt-2" style="border-bottom: 1px solid #000;">
                    <div class="col-md-4"><strong>Account Number:</strong></div>
                    <div class="col-md-8 text-end" id="view_account_number"></div>
                </div>

                <!-- Email -->
                <div class="row mt-2" style="border-bottom: 1px solid #000;">
                    <div class="col-md-4"><strong>Contact Phone:</strong></div>
                    <div class="col-md-8 text-end" id="view_account_phone"></div>
                </div>

                <!-- Phone -->
                <div class="row mt-2" style="border-bottom: 1px solid #000;">
                    <div class="col-md-4"><strong>Email:</strong></div>
                    <div class="col-md-8 text-end" id="view_account_email"></div>
                </div>

                <!-- Address -->
                <div class="row mt-2" style="border-bottom: 1px solid #000;">
                    <div class="col-md-4"><strong>Address:</strong></div>
                    <div class="col-md-8 text-end" id="view_account_address"></div>
                </div>

                <!-- City -->
                <div class="row mt-2" style="border-bottom: 1px solid #000;">
                    <div class="col-md-4"><strong>Account Status:</strong></div>
                    <div class="col-md-8 text-end" id="view_account_status"></div>
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

@section('javascript-section')
<script>

   async function handleModal(id){
        let url = "{{route('admin.edit_account')}}"; 
        const modal = document.getElementById("myModal"); 
        if(modal.style.display == "" || modal.style.display == "none"){
            let response = await fetch(`${url}/?id=${id}`);
            let responseData = await response.json();
            $("#edit_account_status").val(responseData.account.get_account_status_type.id);
            $("#edit_account_name").val(responseData.account.account_name);
            $("#edit_display_name").val(responseData.account.display_name);
            $("#edit_contact_name").val(responseData.account.contact_name);
            $("#edit_email").val(responseData.account.email);
            $("#edit_mobile").val(responseData.account.contact_phone);
            $("#edit_address").val(responseData.account.address);
            $("#account_id").val(responseData.account.id);
            $("#edit_account_number").val(responseData.account.account_number);
            modal.style.display = "block";
        }else{
            modal.style.display = "none";
        }
    }

   async function handleProfileModal(id){
        const modal = document.getElementById("profileModal");
        let url = "{{route('admin.view_account')}}";
        let response = await fetch(`${url}/?id=${id}`);
        let responseData = await response.json();
        if (modal.style.display == "" || modal.style.display == "none"){
            $("#view_account_name").html(responseData.account.account_name);
            $("#view_account_number").html(responseData.account.account_number);
            $("#view_account_phone").html(responseData.account.contact_phone);
            $("#view_account_email").html(responseData.account.email);
            $("#view_account_address").html(responseData.account.address);
            $("#view_account_status").html(responseData.account.get_account_status_type.status_name);  
            modal.style.display = "block";
        }else{
            modal.style.display = "none";
        }
    }

</script>
@endsection
@endsection