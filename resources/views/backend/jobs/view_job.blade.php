@extends('layouts/backend/main')
@section('main-section')

<style>
.custom_table_header{
background: #abc4de;
font-size: 12px;
padding: 2px 5px;
color: black;
font-weight: 500;
box-shadow: inset 3px -9px 5px #8cbdef
}
.custom_table_header p{
margin-bottom: 0px !important;
}
.main_section {
width: 90%;
margin: 4px auto;
border: 1px solid rgb(180, 174, 174);
background: rgb(217, 207, 207);
box-shadow: 2px 2px 7px grey;
border-radius: 5px;
overflow: hidden;
box-shadow: 0px 1px 7px 2px grey;
}
.main-container2{
/* padding: 2px 2px !important; */ 
display: flex;
flex-direction: column;
padding-bottom: 50px ;
padding-left: 50px;
padding-right: 50px;
}
.content_area{
/* border: 1px solid #999999; */
margin: 2px;
padding: 1px;
}
p{
margin-bottom: 0px !important;
}
.submit_btn{
height: 24px !important;
font-size: 14px;
padding: 0px;
width: 60px;
margin-bottom: 7px;
}
.margin_variable{
margin-right: 5px;
}
.edit_job input,
.edit_job select{
font-size: 12.5px;
text-transform: uppercase;
}
.edit_job select{
background: #fff;
width: 100%;
}
#edit_profile_modal{
z-index: 9999;
}

.edit_profile_modal_content {
padding: 0px;
width: 70%;
margin: auto;
}

.edit_profile_modal_header{
background: #abc4de;
font-size: 12px;
padding: 2px 5px;
font-weight: 500;
box-shadow: inset 3px -9px 5px #8cbdef;
}
.edit_profile_modal_header button {
line-height: 8px;
color: #000;
padding: 0 2px !important;
font-size: 16px;
background: red;
color: white;
opacity: 1;
}

.driver_modal_content {
padding: 0px;
width: 70%;
margin: auto;
}

.edit_profile_modal_body{
display: block;
height: 300px;
}

.select_box{
z-index: 0 !important;
}

/* auto--search */
#dropdown ul {
border: 1px solid #ccc;
display: none;
list-style: none;
margin: 0;
padding: 0;
position: absolute;
z-index: 1000;
width: 40%;
background: #fff;
left: 0;
top: 24px;
}

#dropdown ul.has-suggestions {
display: block;
}

#dropdown ul li {
padding: 5px 10px;
cursor: pointer;
font-size: 11px;
}

#dropdown ul li:hover {
background-color: #f0f0f0;
}

.select-dropdown.has-suggestions {
max-height: 135px;
overflow-y: auto;
}

.auto-search {
width: 100%;
border-top: 0;
border-left: 1px solid grey;
}

.auto-search::placeholder {
color: black;
}

.search-container input {
height: auto;
background: white;
}

.view-job.row {
margin: 0 !important;
}
.view-job.col{
padding: 0px;
}
button#copyButton {
padding: 2px;
font-size: 12px;
border-radius: 0;
font-weight: 700;
}
.view-buton {
padding: 2px;
font-size: 12px;
}

.view-job input{  width: 100%;}
.form-check-input:checked {

width: 20px;
height: 20px;
margin-right: 4px;
}
a#paid {
margin-left: 13px;
}
.panel-pink input {
width: 60%;
}



.unpaid-text  {
    color: orange;
    margin-left: 9px;
} 
.paid {  color: green;
    margin-left: 9px;
}
</style>

<div class="content-wrapper" style="padding-top: 1px !important;"> 
    <section class="main_section edit_job">
        <div class="custom_table_header d-flex justify-content-between">
            <p>View Job </p>
            @csrf
                    @if(Session::has('previousUrl'))
                    <a href="{{Session::get('previousUrl')}}" class="btn-close"></a> 
                    @else
                    <a href="{{$previousUrl}}" class="btn-close"></a>
                    @endif

   
        </div>
        <div class="main-container2"> 
            <div class="row pt-2"> 
            <div class="col-2 job_num"><p>View Job  | {{$job->job_number ?? ''}}</p></div>
            <div class="col-10 d-flex justify-content-end" style="font-size: 12px;">
                <form method="POST" action="{{route('admin.edit_jobs', [$job->id])}}" id="edit_job_form">
                    @csrf
                    @if(Session::has('previousUrl'))
                    <input type="hidden" value="{{Session::get('previousUrl')}}" name="prevUrl">
                    @else
                    <input type="hidden" value="{{$previousUrl}}" name="prevUrl">
                    @endif
                    <input type="submit" value="Edit Job">
                </form>
                <!-- <a href="{{route('admin.edit_jobs', [$job->id])}}" id="edit_job_btn">Edit Job</a> -->
            </div>  
            </div> 
            <div class="content_area">
            <div class="row gap-3 align-items-center account_row mt-1">
                        <div class="col-md-7 d-flex account_col align-items-end">
                            <span style="margin-right:5px">Account</span>
                            <div style="width:20%;" class="input_box  account_box autocomplete"> 
                                <input type="text" id="account_number" name="account_number" placeholder="Number" disabled value="{{$job->getAccount?->account_number}}"> 
                            </div>  
                            <div style="width:58%" class="input_box account_box ms-0 autocomplete">
                                <input type="text" id="account_name_list" name="account_name_list" placeholder="Name" disabled value="{{$job->getAccount?->account_name}}">
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="row">
                                <div class="d-flex align-items-center autocomplete" style="margin-left: 66px;">
                                    <span style="margin-right:5px">Car</span>  
                                <input type="text" id="car_category_name" name="car_category_name" placeholder="Car Category" style="text-transform:uppercase"   value="{{$job->getCarCategory?->short_name}}" disabled>
                                    <input type="text" placeholder="" class="input_box disabled_box" style="width:60%"  id="edit_car_category_name" name="car_category_name"  value="{{$job->getCarCategory?->name ?? ''}}"  disabled>
                                </div> 
                            </div>
                        </div>
                    </div> 
                <div class="row gap-3"> 
                    </div>  
                </div>
                    <div class="row mt-2">
                    <div class="col-md-4 d-flex">
                        <span style="margin-right:5px">Job Date</span>
                        <input type="text" class="input_box" id="edit_job_date" name="job_date" style="width:50%" value="{{Carbon\Carbon::parse($job->job_date)->format('d/m/Y')}}" disabled>
                        <input type="text" class="input_box disabled_input" id="edit_job_day" name="job_day" value="{{$job->job_day}}" style="width:50px" disabled>
                        </div>
                    <div class="col-md-5 d-flex">
                        <span class="margin_variable">Job Time</span>
                        <input type="text" class="input_box disabled_box" style="width:101px;padding:0 10px" id="edit_job_time" name="job_time" value="{{Carbon\Carbon::parse($job->job_time)->format('H:i') ?? ''}}" disabled >
                    </div>
                    <div class="col-md-6 d-flex confirm_box mt-1">
                        <span style="margin-right:5px">Contact</span>
                        <div class="position-relative input_box">
                            <input type="text" class="disabled_box input_box" style="width:100%;" name="contact_name" id="edit_contact_name" value="{{$job->getClient->name ?? ''}}" disabled required/>
                            </div>
                    </div>
                    <div class="col-md-6 d-flex confirm_box">
                        <span style="margin-right:5px">Client Tel
                        </span>
                        <input type="tel" class="disabled_box input_box" name="telphone_number"  id="edit_telephone_number" value="{{$job->getClient->phone ?? ''}}" disabled required/>
                    </div>
                </div>

                    <div class="row confirm_box">
                    <div class="col-md-6 d-flex confirm_box">
                        <span style="margin-right:5px">Ref</span>
                        <input type="text" class="disabled_box input_box" name="ref" id="ref" value="{{$job->ref ?? ''}}" disabled/>
                    </div>
                    <div class="col-md-6 d-flex confirm_box">
                        <span style="margin-right:5px">Ref2</span>
                        <input type="text" class="disabled_box input_box" name="ref2" id="edit_ref2"  value="{{$job->ref2 ?? ''}}" disabled/>
                    </div>
                </div> 

                    <div class="row confirm_box">
                    <div class="col-md-6 d-flex confirm_box">
                        <span style="margin-right:5px">Passenger</span>
                        <input type="text" class="disabled_box input_box" id="edit_passenger_name" name="passenger_name" value="{{$job->passenger_name ?? ''}}" disabled/>
                    </div>
                    <div class="col-md-6 d-flex confirm_box">
                        <span style="margin-right:5px">Telephone</span>
                        <input type="tel" class="disabled_box input_box" id="edit_passenger_phone" name="passenger_phone"  value="{{$job->passenger_phone ?? ''}}" disabled/>
                        <!-- <button class="profile_modal_btn" type="button" onclick="handleProfileModal(event,`profile_modal`, `edit_telephone_number`)"><i class="fa fa-eye" aria-hidden="true"></i></button> -->
                    </div>
                </div> 

                    <div class="row mt-3">
                    <div class="col-md-2  d-flex">
                        <span style="width:fit-content" class="margin_variable">Passengers</span>
                        <input type="number" class="input_box" style="width:43px;" id="edit_passenger_count" name="passenger_count" value="{{$job->passenger_count ?? ''}}" disabled>
                    </div>
                    <div class="col-md-2 d-flex">
                        <span style="width:fit-content" class="margin_variable">Check-in Luggage</span>
                        <input type="number" class="input_box" style="width:43px;" id="edit_checkin_luggage_count"  name="checkin_luggage_count" value="{{$job->checkin_luggage_count ?? ''}}" disabled>
                    </div>
                    <div class="col-md-2 d-flex">
                        <span style="width:fit-content" class="margin_variable">Hand Luggages</span>
                        <input type="number" name="hand_luggage_count" id="edit_hand_luggage_count" style="width:43px;" class="input-box" value="{{$job->hand_luggage_count ?? ''}}" disabled>
                    </div>
                    <div class="col-md-2  d-flex">
                        <span style="margin-right:5px; width: 70%; align-items: baseline;">Baby/Booster Seat</span>
                        <div class="d-flex">
                        <input type="number" value="{{$job->booster_seat_count ?? '0'}}"  id="baby_seat_count" name="baby_seat_count" disabled style="width: 50%;"  >
                        </div>
                    </div> 
                    <div class="col-md-4 col-md-4 mt-2">
                        @if($job->booster_seat_count != null && $job->booster_seat_count > 0)
                        <ul id="selectedOptions" class="selected-options ps-2 col-md-11 d-flex ListoofStyle justify-content-start line_height child-list" style="martin-bottom:0px !important;">
                        @if($job->child_age != NULL)
                            @foreach($job->child_age as $index => $age)
                            <li id="li-1" class="margin-start-5px, d-flex" style="font-size: 12px;">
                                @if($index == 0) 
                                First
                                @elseif($index == 1)
                                Second
                                @elseif($index == 2)
                                Third
                                @endif
                                Age:<input type="text" value="{{$age}}" style="width:25px; margin-left:8px;" disabled>
                            </li>
                            @endforeach
                        @endif
                        
                    </ul>
                    @endif
                    </div>
                    
                    <!-- <div class="col-md-2 d-flex">-->
                    <!--        <span style="margin-right:5px">Parking Charge</span>-->
                    <!--        <div class="d-flex">-->
                    <!--            <input type="text" disabled style="width:60px; margin-left:3px;">-->
                    <!--        </div>-->
                    <!--</div>-->
                        
                </div> 
                    <div class="row gap-1 mt-2">

                    <div class="col-md-2 d-flex">
                    <input class="form-check-input" type="checkbox" checked name="email_acknowledge_flag" id="edit_email_acknowledge_flag" value="1"  {{$job->email_acknowledge_flag == 1 ? 'checked' : ''}} disabled>
                        <span class="margin_variable">E-mail ack required?</span>
                        
                    </div>

                    <div class="col-md-4 d-flex">
                        <span class="margin_variable">E-mail address</span>
                        <input type="email" style="width:70%;" id="edit_email_address" name="email_address"  value="{{$job->getClient->email ?? ''}}" disabled>
                    </div>

                    <div class="col-md-5">
                        <button class="btn btn-primary mt-1" id="email_to_clint" onclick="SendJobEmail('client', '{{$job->id}}');">Email To Client</button>
                        <button class="btn btn-primary mt-1" id="email_to_admin" onclick="SendJobEmail('admin', '{{$job->id}}');">Email To Admin</button>
                        <button class="btn btn-primary mt-1" id="email_to_driver" onclick="SendJobEmail('driver', '{{$job->id}}');">Email To Driver</button>
                    </div>
                </div> 

                    <div class="row mt-2"> 
                        <span>Journey Details</span>
                        <div class="col-md-12 d-flex">
                        <div class="col-md-3">
                    <input type="text"  style="width: 100%;" name="pickup" id="edit_journey_start" placeholder="Pick-up" style=" text-transform:uppercase" value="{{$job->journey_type_id == 1 ? $job->postcode : $job->getAirport->display_name}}" disabled required></div>
                    <div class="form-group col-md-9 autocomplete">  
                    <input type="text" style="width: 100%;"  name="pickup_detail"id="edit_journey_start_details" style="text-transform:uppercase;" disabled value="{{$job->journey_type_id == 1 ? $job->address : $job->getAirport->airport_name}}" required>
                    </div>
                        </div> 
                    </div> 
                    
                    <div class="row">
                        <div class="col-md-12 d-flex"> 
                            <div class="form-group col-md-3">
                                <input type="text"  style="width: 100%;" value="{{$job->journey_type_id == 2 ? $job->postcode : $job->getAirport->display_name}}" name="drop" id="drop" placeholder="Drop" style="text-transform:uppercase;" disabled required>
                            </div> 
                            <div class="form-group col-md-9 autocomplete d-flex"> 
                            <input type="text" value="{{$job->journey_type_id == 2 ? $job->address : $job->getAirport->airport_name}}"  style="width: 100%;" name="drop_detail" id="drop_detail" onchange="getPriceDetailOnBooking();" style="text-transform:uppercase;" disabled required>
                                </div> 
                                </div>
                                <div class="row view-job">
                                <div class="col p-0"> 
                                    <input type="text" disabled value="{{$job->notes}}" placeholder="Notes"> 
                                    </div>  
                                    <div class="col p-0">  
                                    <input type="text" id="flight_no" placeholder="Flight no." style="width:100%; text-transform:uppercase;" value="{{$job->flight_number}}" name="flight_number" disabled>
                                        </div>
                                    <div class="col p-0"> 
                                        <input type="text" id="city_of_arrival" name="departure_city" placeholder="City of Departure" autocomplete="nope" style="width:100%; text-transform:uppercase;" value="{{$job->departure_city ?? ''}}" name="arrival_city" id="edit_city_of_arrival" disabled> 
                                    </div>
                                    <div class="col p-0">  
                                        <input type="text" value="{{$job->getAirportPickupLocation->terminal_name ?? ''}}" name="airport_terminal" id="airport_terminal"  placeholder="Terminal" disabled>
                                    </div> 
                                    <div class="col p-0" > 
                                        <input type="number" style="width:82%" name="entry_after" id="ntry_after" placeholder="Entry After" autocomplete="nope" style="width:100%;" value="{{$job->entry_after ?? ''}}" disabled>
                                        <lable>Min</lable>
                                    </div> 
                                    </div> 
                                </div>  
                    <div class="row">
                    <div class="col-md-12 d-flex">
                        <input type="text" class="input_box" name="comment" id="edit_comment" style="width:100%;"  value="{{$job->comment}}" disabled>
                    </div>  
                    </div>

                    <div class="row" style="text-Align:right">
                    <div class="col">
                    <span style=" ">Users</span>
                    <div class="panel panel-pink "> <span style=" ">Created By</span>
                    <input type="text" class="input_box" name="created_by" id="created_by" value="{{$job->getTakenBy->name ?? ''}}" disabled ></div>
                    <div class="panel panel-pink"> <span style=" ">Assigned By</span>
                    <input type="text" class="input_box" name="assigned_by" id="assigned_by" value="{{$job->getAssignedBy->name ?? ''}}" onkeyup="getPriceDetailOnBooking()" disabled></div>
                    <div class="panel panel-pink"> <span style=" ">Allocated By</span>
                    <input type="text" class="input_box" id="edit_allocated_by" name="allocated_by" value="{{$job->getAllocatedBy->name ?? ''}}" disabled ></div>
                    <div class="panel panel-pink"> <span style=" ">Last Edited By</span>
                    <input type="text" class="input_box" name="east_editedb_by" id="east_editedb_by" value="{{$job->getAmendedBy->name ?? ''}}" disabled></div>
                    </div> 

                    <div class="col">
                    <span style=" ">Driver Details</span>
                    <div class="panel panel-pink"> <span style=" ">Name</span>
                    <input type="text" value="{{$job->getDriver->full_Name ?? ''}}" class="input_box" name="driver_details " id="driver_details" disabled></div>
                    <div class="panel panel-pink"> <span style=" ">C/S</span>
                    <input type="text" value="{{$job->getDriver->call_Sign ?? ''}}" class="input_box" name="C/S" id="C/S" disabled></div>
                    <div class="panel panel-pink"> <span>Status</span> 
                    @if($job->getDriver != null)
                    @if($job->getDriver->status == 0)
                    <input type="text" class="input_box" value="Active" name="status" id="status" disabled>
                    @else
                    <input type="text" class="input_box" value="Suspended" name="status" id="status" disabled>
                    @endif
                    @else
                    <input type="text" class="input_box" name="status" id="status" disabled>

                    @endif
                </div>
                    <div class="panel panel-pink"> <span style=" ">Share</span>
                    <input type="text" value="{{$job->driver_share ?? ''}}" class="input_box" name="share" id="share" disabled></div>
                    </div>

                    <div class="col"> 
                    <div>
                         <span style="">Charges</span>
                         <div class="d-flex justify-content-end">
                                <div class="panel panel-pink">
                                   <span style=" ">Parking</span>
                                   <input type="text" class="input_box" name="parking" id="parking" value="{{$job->getPriceDetail->parking_charges ?? '0'}}" disabled style="max-width:90px">
                                </div>
                                
                               <div class="panel panel-pink">
                                 <span style=" ">Basic</span>
                                 <input type="text" value="{{$job->getPriceDetail->basic_price ?? '0'}}" class="input_box" name="basic_fare" id="basic_fare" disabled style="width:60px">
                              </div>
                         </div>
                      
                    </div>
                    
                    <div class="panel panel-pink"> <span>Congestion</span>
                    <input type="text" value="{{$job->getPriceDetail->congestion_charges ?? '0'}}" class="input_box" name="congestion_charge" id="congestion_charge" disabled></div>
                    <div class="panel panel-pink"> <span style=" ">Night</span>
                    <input type="text" value="{{$job->getPriceDetail->night_charge ?? '0'}}" class="input_box" name="night_charge" id="night_charge" disabled></div>
                    <div class="panel panel-pink"> <span style=" ">Booster Seat</span>
                    <input type="text" value="{{$job->getPriceDetail->booster_seat_charge ?? '0'}}" class="input_box" name="booster_seat_charge" id="booster_seat_charge" disabled></div>
                    </div>
                    <div class="col">
                    <span  >Fare</span>
                    <div class="panel panel-pink"> <span>Total Price</span>
                    <input type="text" value="{{$job->getPriceDetail->total_price ?? '0'}}" class="input_box" name="total_price" id="total_price" disabled></div>
                    <div class="panel panel-pink d-flex">                              
                        <span style="margin-right:5px">Waiting </span>
                         <input type="text" class="input_box" name="waiting_time" value="{{$job->wating_time ?? ''}}" id="edit_waiting_time" placeholder="Min" disabled>
                         <span style="margin-right:5px">Charges  </span>
                    <input type="text" value="{{$job->getPriceDetail->waiting_charge ?? '0'}}"  class="input_box" name="additional_charge" id="additional_charge" onkeyup="getPriceDetailOnBooking()" disabled>
                </div>
                     
                    <div class="panel panel-pink"> <span>Adjustment </span>
                    <input type="text" value="{{$job->getPriceDetail->adjustment ?? '0'}}" class="input_box" name="discount" id="discount" onkeyup="getPriceDetailOnBooking()" disabled></div>
                    <div class="panel panel-pink"> <span>Net Fare</span>
                    <input type="text" value="{{$job->getPriceDetail->net_price ?? '0'}}" class="input_box" name="net_price" id="net_price" disabled></div>
                    </div>

                    <div class="col-12 d-flex mt-3">
                    <p style="  margin-right: 3px; font-size: 12px;">Direct Payment Link</p>
                    <input type="text" id="payment_link" value="{{route('frontend.direct_pay', [$job->job_number])}}" style="width:50%;  text-transform: lowercase;" readonly>
                    <button class="btn btn-block btn-default vi-bt" id="copyButton" type="button" onclick="copyToClipboard();">Copy</button>
                    @if($job->payment_status == '0')
                    <p class="unpaid-text">Unpaid</p>
                    @else
                    <p  class="paid" >Paid</p>
                    @endif  
                </div> 
                    </div> 

                    <div class="row">
                        <div class="col-md-2 mt-3 ">
                            <p style="font-size:12px; margin-right:5px;">Cancel Status</p>
                            <select style="margin-right:5px;" name="job_status_type" disabled>
                                <option value="">Select</option>
                                <option {{$job->job_status_type_id == '4' ? 'selected' : ''}} value="4">CANCELED</option>
                                <option {{$job->job_status_type_id == '7' ? 'selected' : ''}} value="7">NO PICKUP</option>
                            </select>
                        </div> 
                        <div class="col-md-4 mt-3">
                        <p style="font-size:12px; margin-right:5px;">DUE TO</p>
                            <input class="form-check-input" type="radio" name="cancel_due_to" value="PASSENGER" {{$job->cancel_due_to == 'PASSENGER' ? 'checked' : ''}} disabled>
                            <span class="margin_variable">Passenger</span>
                            <input class="form-check-input" type="radio" name="cancel_due_to" value="DRIVER" {{$job->cancel_due_to == 'DRIVER' ? 'checked' : ''}} disabled>
                            <span class="margin_variable">Driver</span>
                            <input class="form-check-input" type="radio" name="cancel_due_to" value="ADMIN" {{$job->cancel_due_to == 'ADMIN' ? 'checked' : ''}} disabled> 
                            <span class="margin_variable">Admin</span>
                        </div>
                        <div class="col-md-4 mt-3">  
                            <input type="text" value="{{$job->cancel_reason ?? ''}}" name="cancel_reason" style="width:50%; text-transform: lowercase;" disabled>
                        </div>
                    </div>
                </div>     
            </div>  
        </div>
    </section> 
</div> 
@endsection
@section('javascript-section')  
@if(Session::has('job_updated'))
<script>
Swal.fire({
  title: "Updated",
  text: "{{Session::get('job_updated')}}",
  icon: "success"
});
</script>
@endif

<script>
function copyToClipboard() { 
    console.log('test');
    const input = document.getElementById('payment_link');
    const button = document.getElementById('copyButton'); 
    input.select();
    input.setSelectionRange(0, 99999);  
    document.execCommand('copy'); 
    button.textContent = 'Copied'; 
    setTimeout(() => {
        button.textContent = 'Copy';
    }, 1000);
}

async function SendJobEmail(receiver, job){
    $("#api_loader").show(); 
    let url = "{{route('api.send_job_email')}}";
    let response = await fetch(`${url}/?receiver_type=${receiver}&job_id=${job}`);
    let responseData = await response.json(); 
    if(responseData.status == 'success'){
        $("#api_loader").hide(); 
    }
}

document.addEventListener('keydown', function (e) {
    if (e.keyCode === 27) {  
        e.preventDefault(); 
        window.history.back();
}
if (e.keyCode === 69) {  
    // e.preventDefault();
    $("#edit_job_form").submit();
    // const editAnchor = $("#edit_job_btn");  
    // if (editAnchor.length) {
    //     let job_id = @json($job->id);
    //     let url = "{{ route('admin.edit_jobs', ['__job_id__']) }}".replace('__job_id__', job_id);
    //     window.location.href = url; 
    // }
}
});




</script>
@endsection