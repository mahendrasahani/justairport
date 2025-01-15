@extends('layouts/backend/main')
@section('main-section') 
 
<style>
    h3{
        font-weight: 600;
        font-size: 12.5px;
        margin-bottom: 0;
    } 
    .driver_header{
        background: #abc4de;
        font-size: 12px;
        padding: 4px 2px;
        font-weight: 500;
        box-shadow: inset 3px -9px 5px #8cbdef;
    } 
    .container, .main-container{
        padding: 0 !important;
    } 
        .main-form-driver{width: 100%;}

    .form-hedding h3{font-size: 24px;  font-family: 'Source Sans Pro', sans-serif; }
    .form-hedding{background-color: transparent; box-shadow: none;}
    .main-form-driver{background-color: transparent; box-shadow: none; border: none;}
    .form-box h3{font-size:19px ; padding: 10px 0px;     border-bottom: 1px solid #f4f4f4;    font-family: 'Source Sans Pro', sans-serif; font-weight: 700;color: #337ab7;}
    .form-box{    border-top: 1px solid #d2d6de;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);border-radius: 3px; }
    .form-box{width: 50%;}
    /* .form-box-main{column-gap: 20px;} */
    .form-box label{font-size: 16px; font-weight: 700; margin-bottom: 5px !important;    font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;}
    .form-box input{    width: 100%;
    height: 34px;
    padding: 6px 12px !important;
    font-size: 15px;
    line-height: 1.42857143;
    color: #555;
    background-image: none;
    border: 1px solid #676464;

    }
    .form-box select{
        height: 34px;
    padding: 6px 12px !important;
    font-size: 15px;
    line-height: 1.42857143;
    color: #555;
    background-image: none;
    border: 1px solid #676464;
    }
    .small-text{font-size: 13px; margin-top: 5px; display: block;}
    .content-main{background-color: white;}
    .form-box select:focus{border-color: black; box-shadow: none; background-color:#e9ebefbd ;}
    .form-box input:focus{background-color: #e9ebefbd;}
</style>
 
 
<div class="content-wrapper content-main">
    <div class="main-container main-form-driver">
        <div class="container">
        <div class="driver_header form-hedding">
        <h3>Add New </h3>
        </div>
            <form class="mt-1" action="{{route('admin.store_new_driver')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row ">
                    <div class="col form-box">
                        <h3>Driver Personal Details</h3>
                        <div class="mb-2">
                            <label for="fullName" class="form-label"  >Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="full_name" placeholder="Enter full name" required>
                        </div>
                        <div class="mb-2">
                            <label for="fullAddress" class="form-label">Full Address</label>
                            <input type="text" class="form-control" id="fullAddress" placeholder="Enter full address" name="full_address" >
                        </div>
                        <div class="mb-2">
                            <label for="driverPhone" class="form-label">Driver Phone</label>
                            <input type="tel" class="form-control" id="driverPhone" placeholder="Enter driver phone number" name="driver_phone" >
                        </div>
                        <div class="mb-2">
                            <label for="driverPhoneSecondary" class="form-label">Driver Phone (Secondary)</label>
                            <input type="tel" class="form-control" id="driverPhoneSecondary" placeholder="Enter secondary phone number" name="secondary_phone">
                        </div>
                        <div class="mb-2">
                            <label for="emailAddress" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="emailAddress" placeholder="Enter email address" name="email_address" >
                        </div>
                        <div class="mb-2">
                            <label for="callSign" class="form-label">Call Sign</label>
                            <input type="text" class="form-control" id="callSign" placeholder="Enter call sign" name="call_sign">
                        </div>
                        <div class="mb-2">
                            <label for="nationality" class="form-label">Nationality</label>
                            <input type="text" class="form-control" id="nationality" placeholder="Enter nationality" name="nationality">
                        </div>
                        <div class="mb-2">
                            <label for="pcoBadgeNumber" class="form-label">PCO Badge Number</label>
                            <input type="text" class="form-control" id="pcoBadgeNumber" placeholder="Enter PCO badge number" name="nino">
                        </div>
                    </div>
        
                    <div class="col form-box">
                        <h3>Vehicle Details</h3>
                        <div class="mb-2">
                            <label for="vehicleMakeModel" class="form-label">Vehicle (Make and Model)</label>
                            <input type="text" class="form-control" id="vehicleMakeModel" placeholder="Enter vehicle make and model" name="vmm" required>
                        </div>
                        <div class="mb-2">
                            <label for="registrationNo" class="form-label">Registration No</label>
                            <input type="text" class="form-control" id="registrationNo" placeholder="Enter registration number" name="registration_no" required>
                        </div>
                        <div class="mb-2">
                            <label for="vehicleColor" class="form-label">Vehicle Color</label>
                            <input type="text" class="form-control" id="vehicleColor" placeholder="Enter vehicle color" name="vehicle_color">
                        </div>
                        <div class="mb-2">
                            <label for="carType" class="form-label">Select Car Type</label>
                            <select class="form-select select_box" id="carType" name="car_type">
                                <option selected disabled>- Select type -</option>
                                @if(count($cars) > 0)
                                    @foreach($cars as $car)
                                        <option value="{{$car->id}}">{{$car->name}}</option>
                                    @endforeach
                                @endif
                             
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="vehicleCheckDate" class="form-label">Vehicle Check Date (In Office)</label>
                            <input type="text" class="form-control Date_pickerformat" id="vehicleCheckDate" name="vehicle_check_date" placeholder="DD/MM/YY">
                        </div>
                        <div class="mb-2">
                            <label for="pax" class="form-label">Pax</label>
                            <input type="number" class="form-control" id="pax" name="pax" min="1" value="1">
                        </div>
                        <div class="mb-2">
                            <label for="largeS" class="form-label">Large S</label>
                            <input type="number" class="form-control" id="largeS" min="0" value="0" name="large_s">
                        </div>
                        <div class="mb-2">
                            <label for="smallS" class="form-label">Small S</label>
                            <input type="number" class="form-control" id="smallS" min="0" value="0" name="small_s">
                        </div>
                    </div>
        
                    <div class="col form-box">
                        <h3>Driver PCO Details</h3>
                        <div class="mb-2">
                            <label for="driverPrivateHireLicense" class="form-label">Driver Private Hire License</label>
                            <input type="text" class="form-control" id="driverPrivateHireLicense" placeholder="Enter private hire license" name="driver_private_hire_license">
                        </div>
                        <div class="mb-2">
                            <label for="driverLicenceExpiryDate" class="form-label">Driver Licence Expiry Date</label>
                            <input type="text" class="form-control Date_pickerformat" id="driverLicenceExpiryDate" name="driver_licence_exp_date" placeholder="DD/MM/YY" >
                        </div>
                        <div class="mb-2">
                            <label for="pcoExpiryDate" class="form-label">PCO Expiry Date</label>
                            <input type="text" class="form-control Date_pickerformat" id="pcoExpiryDate" name="pco_exp_date" placeholder="DD/MM/YY">
                        </div>
                        <div class="mb-2">
                            <label for="driverNo" class="form-label">Driver No.</label>
                            <input type="text" class="form-control" id="driverNo" placeholder="Enter driver number" name="driver_no" required>
                        </div>
                        <div class="mb-2 ">
                            <label for="driverImage" class="form-label">Upload Driver Image (100x100px)</label>
                            <input type="file" class="form-control" id="driverImage" accept=".png, .jpg, .jpeg, .gif" name="image_driver">
                            <small class="text-muted small-text">Leave empty if you don't want to change image. Only .png, .jpg, .jpeg, .gif allowed!</small>
                        </div>
                        <div class="mb-2">
                            <label for="driverImage" class="form-label">Add Image</label>
                            <input type="file" class="form-control" id="addImage" accept=".png, .jpg, .jpeg, .gif">
                        </div>
                    </div>
        
                    <div class="col form-box">
                        <h3>Vehicle PCO Details</h3>
                        <div class="mb-2">
                            <label for="pcoLicenceNumber" class="form-label">PCO Licence Number</label>
                            <input type="text" class="form-control" id="pcoLicenceNumber" placeholder="Enter PCO licence number" name="pco_licence_number">
                        </div>
                        <div class="mb-2">
                            <label for="pcoVehicleExpiryDate" class="form-label">PCO Vehicle Expiry Date</label>
                            <input type="text" class="form-control Date_pickerformat" id="pcoVehicleExpiryDate" name="pco_vehicle_exp_date" placeholder="DD/MM/YY">
                        </div>
                        <div class="mb-2">
                            <label for="motExpiryDate" class="form-label">MOT Expiry Date</label>
                            <input type="text" class="form-control Date_pickerformat" id="motExpiryDate" name="mot_exp_date" placeholder="DD/MM/YY" >
                        </div>
                        <div class="mb-2">
                            <label for="insuranceExpiryDate" class="form-label">Insurance Expiry Date</label>
                            <input type="text" class="form-control Date_pickerformat" id="insuranceExpiryDate" name="insurance_exp_date" placeholder="DD/MM/YY" >
                        </div>
                        <div class="mb-2">
                            <label for="taxExpiryDate" class="form-label">Tax Expiry Date</label>
                            <input type="text" class="form-control Date_pickerformat" id="taxExpiryDate" name="tax_exp_date" placeholder="DD/MM/YY" >
                        </div>
                        <div class="mb-2">
                            <label for="taxExpiryDate" class="form-label">Comment</label>
                            <textarea type="text" class="form-control Date_pickerformat" id="taxExpiryDate" name="comment"></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-end"> <!-- This div aligns content to the right -->
                    <button type="submit" class="btn btn-primary save_btn">Add new driver</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('javascript-section')
  <script>
       $(document).ready(function ()
            {
                $('.Date_pickerformat').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true,
                    todayHighlight: true
                }).on('changeDate', function (e)
                {
                    getDay('job_Date', 'job_day');
                }).on('click', function ()
                {
                    $(this).datepicker('show');
                });
            });

            function getDay(dateInputId, dayOutputId)
            {
            }
  </script>
@endsection
 @endsection