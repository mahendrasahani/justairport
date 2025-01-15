@extends('layouts/backend/main')
@section('main-section')

<style>
 .td_driver_photo img{
        margin:3px;
    }
    
    .table-responsive{
    padding: 0 !important;
    /* width: 100% !important; */
}

.row{
    margin: 0px !important;
 }

.dt-container div div{
    padding: 0 !important;
}

thead th{
    /* border-width:0 !important; */
    border-right: 1px solid white;
}


.id{
    border-left:none;
}

h3{
    font-weight: 600;
    font-size: 20px;
    margin-bottom: 0;
}

.edit_driver_profile{
    padding:0 !important;
}

.edit_driver_profile .modal-body{
    padding:2px !important;
}

.main-container {
     background: #fff;
   
}

.mt-2.justify-content-between{
    padding: 0px 0px 13px 0px;
}

</style>

    <div class="content-wrapper">

            <div class="box main-container" style="width: 100%;">

            <div class="container-fuild"  >
                <div class="suspended1">
            <h3>All Drivers</h3>

            <div class="d-flex justify-content-between">
          <!-- Add New Driver Button -->
          <a class="btn btn-primary btn-sm save_btn" href="{{route('admin.add_new_driver')}}"><i class="fa-solid fa-pen-to-square" mb-20></i>Add New Driver</a>
  </div>
          <!-- Search Box and Search Button -->
      </div>

<!--             
                    <a href="{{route('admin.add_new_driver')}}"><button class="btn btn-primary me-2 save_btn mt-0"><i class="fa-solid fa-pen-to-square"
                                style="padding-right: 5px;"></i>Add New Driver</button></a>  -->
                   <!-- #region -->
                </div>
            <div class="box-body">
                <table id="suspended_driver_table" class="table table-bordered table-striped ">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Driver Photo</th>
                            <th>Personal Details</th>
                            <th>Expiry Dates</th>
                            <th>Other Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="driver_body">
                        <!-- Example row (replace with dynamic data) -->
                        @php $sn = 1;
$current_date = Carbon\Carbon::now(); @endphp
                        @if (count($drivers) > 0)
                            @foreach ($drivers as $driver)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td class="td_driver_photo">
                                        <img src="
                                            @if ($driver->image_driver == '' || $driver->image_driver == null) 
                                                {{ url('public/assets/backend/images/drivers-images/default-driver.jpg') }}
                                            @else
                                                {{ url('public/assets/backend/images/drivers-images/' . $driver->image_driver) }} 
                                            @endif
                                            " alt="driver_img" width="30%">
                                    </td>
                                    <td>
                                        {{ $driver->full_Name ?? '' }} ({{ $driver->call_Sign ?? '' }})<br>
                                        {{ $driver->dob ?? '' }}<br>
                                        Email: {{ $driver->email ?? '' }}<br>
                                        Phone: {{ $driver->phone ?? '' }}<br>
                                        Phone: {{ $driver->phone_Secondary ?? '' }}<br>
                                        {{ $driver->full_Address ?? '' }}<br>
                                        Driver Licence Expiry Date:
                                        {{ Carbon\Carbon::parse($driver->driver_licence_expiry)->format('d M Y') }}<br>
                                    </td>
                                    
                                    <td>
                                        {{ $driver->vmm ?? '' }}({{ $driver->reg_No ?? '' }})<br>
                                        <p style="{{ $current_date > $driver->pco_Expiry ? 'color:red' : ''}}">PCO: {{ Carbon\Carbon::parse($driver->pco_Expiry)->format('d M Y') }}</p>
                                        <p style="{{ $current_date > $driver->phv_Expiry ? 'color:red' : ''}}">PHV: {{ Carbon\Carbon::parse($driver->phv_Expiry)->format('d M Y') }}</p>
                                        <p style="{{ $current_date > $driver->mot_Expiry ? 'color:red' : ''}}">MOT: {{ Carbon\Carbon::parse($driver->mot_Expiry)->format('d M Y') }}</p>
                                        <p style="{{ $current_date > $driver->insurance_Expiry ? 'color:red' : ''}}">Insurance:
                                        {{ Carbon\Carbon::parse($driver->insurance_Expiry)->format('d M Y H:i') }}</p>
                                    </td>
                                    <td>
                                        {{ $driver->vmm ?? '' }}({{ $driver->reg_No ?? '' }})<br>
                                        PCO Licence No: {{ $driver->driving_LicenceNo ?? '' }}<br>
                                        Driving No: {{ $driver->driving_LicenceNo ?? '' }}<br>
                                        <p style="{{ $current_date > $driver->tax_ExpiryDate ? 'color:red' : ''}}">Tax Expiry:
                                        {{ Carbon\Carbon::parse($driver->tax_ExpiryDate)->format('d M Y') }}</p>
                                        Joined to the company:
                                        {{ Carbon\Carbon::parse($driver->date_Created)->format('d M Y') }}<br>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary save_btn" href="{{ route('admin.edit_driver', [$driver->id]) }}">Edit</a>
                                        <button class="btn btn-danger save_btn" id="suspend_btn" data-id="{{ $driver->id }}">Suspend Driver</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header with Close Button -->
                    <div class="modal-header">
                        <!-- Close button (×), data-dismiss attribute to close the modal -->
                        <button type="button" onclick="handleModal(event)" class="close" data-dismiss="modal">
                          
                        </button>
                    </div>
                    <div class="modal-body row">
                        <form action="#" method="POST" id="myForm" class="row g-3">
                            <!-- Left Column -->
                            <div class="col">
                                <h3>Driver Personal Details</h3>
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="fullName" placeholder="Enter full name"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="fullAddress" class="form-label">Full Address</label>
                                    <input type="text" class="form-control" id="fullAddress"
                                        placeholder="Enter full address" required>
                                </div>
                                <div class="mb-3">
                                    <label for="driverPhone" class="form-label">Driver Phone</label>
                                    <input type="tel" class="form-control" id="driverPhone"
                                        placeholder="Enter driver phone number" required>
                                </div>
                                <div class="mb-3">
                                    <label for="driverPhoneSecondary" class="form-label">Driver Phone (Secondary)</label>
                                    <input type="tel" class="form-control" id="driverPhoneSecondary"
                                        placeholder="Enter secondary phone number">
                                </div>
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="emailAddress"
                                        placeholder="Enter email address" required>
                                </div>
                                <div class="mb-3">
                                    <label for="callSign" class="form-label">Call Sign</label>
                                    <input type="text" class="form-control" id="callSign" placeholder="Enter call sign">
                                </div>
                                <div class="mb-3">
                                    <label for="nationality" class="form-label">Nationality</label>
                                    <input type="text" class="form-control" id="nationality"
                                        placeholder="Enter nationality">
                                </div>
                                <div class="mb-3">
                                    <label for="pcoBadgeNumber" class="form-label">PCO Badge Number</label>
                                    <input type="text" class="form-control" id="pcoBadgeNumber"
                                        placeholder="Enter PCO badge number">
                                </div>
                            </div>

                            <div class="col">
                                <h3>Vehicle Details</h3>
                                <div class="mb-3">
                                    <label for="vehicleMakeModel" class="form-label">Vehicle (Make and Model)</label>
                                    <input type="text" class="form-control" id="vehicleMakeModel"
                                        placeholder="Enter vehicle make and model">
                                </div>
                                <div class="mb-3">
                                    <label for="registrationNo" class="form-label">Registration No</label>
                                    <input type="text" class="form-control" id="registrationNo"
                                        placeholder="Enter registration number">
                                </div>
                                <div class="mb-3">
                                    <label for="vehicleColor" class="form-label">Vehicle Color</label>
                                    <input type="text" class="form-control" id="vehicleColor"
                                        placeholder="Enter vehicle color">
                                </div>
                                <div class="mb-3">
                                    <label for="carType" class="form-label">Select Car Type</label>
                                    <select class="form-select select_box" id="carType">
                                        <option selected disabled>- Select type -</option>
                                        <option value="Saloon">Saloon</option>
                                        <option value="Estate">Estate</option>
                                        <option value="MPV">MPV</option>
                                        <option value="Executive">Executive</option>
                                        <option value="MPV7">MPV7</option>
                                        <option value="MPV8">MPV8</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="vehicleCheckDate" class="form-label">Vehicle Check Date (In
                                        Office)</label>
                                    <input type="date" class="form-control" id="vehicleCheckDate">
                                </div>
                                <div class="mb-3">
                                    <label for="pax" class="form-label">Pax</label>
                                    <input type="number" class="form-control" id="pax" min="1"
                                        value="1">
                                </div>
                                <div class="mb-3">
                                    <label for="largeS" class="form-label">Large S</label>
                                    <input type="number" class="form-control" id="largeS" min="0"
                                        value="0">
                                </div>
                                <div class="mb-3">
                                    <label for="smallS" class="form-label">Small S</label>
                                    <input type="number" class="form-control" id="smallS" min="0"
                                        value="0">
                                </div>
                            </div>

                            <div class="col">
                                <h3>Driver PCO Details</h3>
                                <div class="mb-3">
                                    <label for="driverPrivateHireLicense" class="form-label">Driver Private Hire
                                        License</label>
                                    <input type="text" class="form-control" id="driverPrivateHireLicense"
                                        placeholder="Enter private hire license">
                                </div>
                                <div class="mb-3">
                                    <label for="driverLicenceExpiryDate" class="form-label">Driver Licence Expiry
                                        Date</label>
                                    <input type="date" class="form-control" id="driverLicenceExpiryDate">
                                </div>
                                <div class="mb-3">
                                    <label for="pcoExpiryDate" class="form-label">PCO Expiry Date</label>
                                    <input type="date" class="form-control" id="pcoExpiryDate">
                                </div>
                                <div class="mb-3">
                                    <label for="driverNo" class="form-label">Driver No.</label>
                                    <input type="text" class="form-control" id="driverNo"
                                        placeholder="Enter driver number">
                                </div>
                                <div class="mb-3">
                                    <label for="driverImage" class="form-label">Upload Driver Image (100x100px)</label>
                                    <input type="file" class="form-control" id="driverImage"
                                        accept=".png, .jpg, .jpeg, .gif">
                                    <small class="text-muted">Leave empty if you don't want to change image. Only .png,
                                        .jpg, .jpeg, .gif allowed!</small>
                                </div>
                                <div class="mb-3">
                                    <label for="driverImage" class="form-label">Add Image</label>
                                    <input type="file" class="form-control" id="addImage"
                                        accept=".png, .jpg, .jpeg, .gif">
                                </div>
                            </div>

                            <div class="col">
                                <h3>Vehicle PCO Details</h3>
                                <div class="mb-3">
                                    <label for="pcoLicenceNumber" class="form-label">PCO Licence Number</label>
                                    <input type="text" class="form-control" id="pcoLicenceNumber"
                                        placeholder="Enter PCO licence number">
                                </div>
                                <div class="mb-3">
                                    <label for="pcoVehicleExpiryDate" class="form-label">PCO Vehicle Expiry Date</label>
                                    <input type="date" class="form-control" id="pcoVehicleExpiryDate">
                                </div>
                                <div class="mb-3">
                                    <label for="motExpiryDate" class="form-label">MOT Expiry Date</label>
                                    <input type="date" class="form-control" id="motExpiryDate">
                                </div>
                                <div class="mb-3">
                                    <label for="insuranceExpiryDate" class="form-label">Insurance Expiry Date</label>
                                    <input type="date" class="form-control" id="insuranceExpiryDate">
                                </div>
                                <div class="mb-3">
                                    <label for="taxExpiryDate" class="form-label">Tax Expiry Date</label>
                                    <input type="date" class="form-control" id="taxExpiryDate">
                                </div>
                            </div>
                    </div>
                    <div class="text-end"> <!-- This div aligns content to the right -->
                        <button type="submit" class="btn btn-primary" onclick="handleModal()">Update driver</button>
                    </div>
                    <div class="box mt-3">
                        <div class="box-body">
                            <h1>Driver Comment</h1>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>User</th>
                                        <th>Type</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01 Nov 2022, 14:08:28</td>
                                        <td>sukhi (Admin)</td>
                                        <td>Driver edit</td>
                                        <td>Driver add<br>Driver Comment</td>
                                    </tr>
                                    <tr>
                                        <td>03 Jul 2023, 13:35:49</td>
                                        <td>sukhi (Admin)</td>
                                        <td>Driver feedback</td>
                                        <td>#</td>
                                    </tr>
                                    <tr>
                                        <td>28 Apr 2023, 12:35:18</td>
                                        <td>sukhi (Admin)</td>
                                        <td>Driver feedback</td>
                                        <td>#</td>
                                    </tr>
                                    <tr>
                                        <td>09 Feb 2022, 06:30:01</td>
                                        <td>sukhi (Admin)</td>
                                        <td>Booking feedback</td>
                                        <td>#81334 - date changed to 20th</td>
                                    </tr>
                                    <tr>
                                        <td>10 Jan 2022, 13:20:13</td>
                                        <td>jassi (Operator)</td>
                                        <td>Booking feedback</td>
                                        <td>#81005</td>
                                    </tr>
                                    <tr>
                                        <td>03 Jan 2022, 11:38:24</td>
                                        <td>jassi (Operator)</td>
                                        <td>Booking feedback</td>
                                        <td>#80804</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   

@section('javascript-section')
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
 
    <script> 
        $(document).on("click", "#suspend_btn", async function(){
            let id = $(this).data('id'); 
            
            let suspend_url = "{{route('admin.driver_suspend')}}"; 
            Swal.fire({
                title: "Are you sure?",
                text: "You want to suspend this driver ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Suspend!"
            }).then(async (result) => {
                if (result.isConfirmed) {
                let response = await fetch(suspend_url+'/?id='+id);
                let responseData = await response.json(); 
                if (responseData.status == 'suspended') {
                    location.reload(); 
                }else{
                    Swal.fire({
                        title: "Warning !",
                        text: responseData.message,
                        icon: "warning"
                    }); 
                }}
            });
        });
       
    </script>

    <script>
        $(document).ready(function () {
    $('#suspended_driver_table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true
    });

});
    </script>

@endsection
@endsection
