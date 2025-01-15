@extends('layouts/backend/main')
@section('main-section')

    <style>
        .custom_table_header {
            background: #abc4de;
            font-size: 12px;
            padding: 5px 5px 5px 10px;
            color: black;
            font-weight: 500;
            box-shadow: inset 3px -9px 5px #8cbdef
        }

        .custom_table_header p {
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

        .main-container2 {
            display: flex;
            flex-direction: column;
            padding-left: 50px;
            padding-right: 50px;
            padding-bottom: 50px;
        }

        .content_area {
            /* border: 1px solid #999999; */
            margin: 2px;
            padding: 1px;
        }

        p {
            margin-bottom: 0px !important;
        }

        .submit_btn {
            height: 24px !important;
            font-size: 14px;
            padding: 0px;
            width: 60px;
            margin-bottom: 7px;
        }

        .margin_variable {
            margin-right: 5px;
        }

        .edit_job input,
        .edit_job select {
            font-size: 12.5px;
            text-transform: uppercase;
        }

        .edit_job select {
            background: #fff;
            border-radius: 0px;
            border: 1px solid #000;
        }

        #edit_profile_modal {
            z-index: 9999;
        }

        .edit_profile_modal_content {
            padding: 0px;
            width: 70%;
            margin: auto;
        }

        .edit_profile_modal_header {
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

        .edit_profile_modal_body {
            display: block;
            height: 300px;
        }

        .select_box {
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

        button#copyButton {
            padding: 2px;
            font-size: 12px;
            border-radius: 0;
            font-weight: 700;
        }

        .edit-job.row {
            margin: 0 !important;
        }

        .edit-job p {
            font-size: 12px;
        }

        .form-check-input:checked {

            width: 20px;
            height: 20px;
            margin-right: 3px;
        }

        a#edit-paid {
            margin-left: 13px;
        }

        .panel-pink input {
            width: 60%;
        }

        .unpaid-text {
            color: orange;
            margin-left: 9px;
        }

        .paid {
            color: green;
            margin-left: 9px;
        }

        .panel.panel-pink.baisc input {
            background: #eee;
            border: 1px solid #000;
        }

  
    </style>
    <div class="content-wrapper pt-3">
        <form action="{{ route('admin.job.update', [$job->id]) }}" method="POST" id="edit_form_data" autocomplete="off">
            <section class="main_section edit_job">
                <div class="custom_table_header">
                    <p><a href="javascript:void(0)" onclick="history.back();">Back</a></p>
                </div>
                <div class="main-container2">
                    @csrf
                    <div class="col d-flex edit-job">
                        <p style=" margin-right: 5px;">Job | </p>
                        <p> {{ $job->job_number ?? '' }} </p>
                    </div>

                    <div class="content_area">
                        <div class="row gap-3 align-items-center account_row mt-1">
                            <div class="col-md-7 d-flex account_col align-items-end">
                                <span style="margin-right:5px">Account</span>
                                <div style="width:20%;" class="input_box  account_box autocomplete">
                                    <input type="text" id="account_number" class="account_number_edit"
                                        name="account_number" placeholder="Number" autocomplete="nope"
                                        value="{{ $job->getAccount?->account_number }}" onchange="reCalculatePrice();">
                                </div>
                                <div style="width:58%" class="input_box account_box ms-0 autocomplete">
                                    <input type="text" id="account_name_list" class="account_name_list_edit"
                                        name="account_name_list" placeholder="Name" autocomplete="nope"
                                        value="{{ $job->getAccount?->account_name }}" onchange="reCalculatePrice();">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="d-flex align-items-center autocomplete" style="margin-left: 66px;">
                                        <span style="margin-right:5px">Car</span>
                                        <input type="text" id="car_category_name" name="car_category_name"
                                            placeholder="Car Category" onchange="getPriceDetailOnBooking();"
                                            style="text-transform:uppercase" value="{{ $job->getCarCategory?->short_name }}"
                                            autocomplete="nope">
                                        <input type="text" class="input_box disabled_box" style="width:60%"
                                            id="car_full_name" name="car_full_name" readonly
                                            value="{{ $job->getCarCategory?->name ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 d-flex align-items-end mt-1">
                                <span style="margin-right:2px">Job Date</span>
                                <input type="text" id="job_Date" name="job_date" placeholder="dd/mm/yyyy"
                                    class="w-50 addon form-control job_Date"
                                    value="{{ Carbon\Carbon::parse($job->job_date)->format('d/m/Y') }}">
                                <input type="text" class="input_box disabled_input" id="job_day" name="job_day"
                                    value="{{ $job->job_day ?? '' }}" style="width:50px; text-transform:uppercase;"
                                    readonly>
                            </div>
                            <div class="col-md-5 d-flex align-items-center mt-1">
                                <span style="width:60px;">Job Time</span>
                                <input type="text" class="input_box disabled_box time-hhmm job_time" id="job_time"
                                    name="job_time" onchange="reCalculatePrice();"
                                    value="{{ Carbon\Carbon::parse($job->job_time)->format('H:i') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex confirm_box mt-1">
                            <span style="margin-right:5px">Contact</span>
                            <div class="position-relative input_box">
                                <input type="text" class="disabled_box input_box contact_name_edit" style="width:100%;"
                                    name="contact_name" id="contact_name" value="{{ $job->getClient->name ?? '' }}"
                                    autocomplete="nope" />
                            </div>
                        </div>
                        <div class="col-md-6 d-flex confirm_box">
                            <span style="margin-right:5px">Tel</span>
                            <input type="tel" class="disabled_box input_box telphone_number_edit" name="telphone_number"
                                id="telephone_number" value="{{ $job->getClient->phone ?? '' }}" autocomplete="nope" />
                        </div>
                    </div>

                    <div class="row confirm_box">
                        <div class="col-md-6 d-flex confirm_box">
                            <span style="margin-right:5px">Ref</span>
                            <input type="text" class="disabled_box input_box" name="ref" id="ref"
                                value="{{ $job->ref ?? '' }}" autocomplete="nope" />
                        </div>
                        <div class="col-md-6 d-flex confirm_box">
                            <span style="margin-right:5px">Ref2</span>
                            <input type="text" class="disabled_box input_box" name="ref2" id="edit_ref2"
                                value="{{ $job->ref2 ?? '' }}" autocomplete="nope" />
                        </div>
                    </div>

                    <div class="row confirm_box">
                        <div class="col-md-6 d-flex confirm_box">
                            <span style="margin-right:5px">Passenger</span>
                            <input type="text" class="disabled_box input_box" id="edit_passenger_name"
                                name="passenger_name" value="{{ $job->passenger_name ?? '' }}" autocomplete="nope" />
                        </div>
                        <div class="col-md-6 d-flex confirm_box">
                            <span style="margin-right:5px">Telephone</span>
                            <input type="tel" class="disabled_box input_box" id="edit_passenger_phone"
                                name="passenger_phone" value="{{ $job->passenger_phone ?? '' }}" autocomplete="nope" />
                        </div>
                    </div>
                    <!-----------------add table ------->
                    <div class="row mt-2" id="job_history_section">
                        <table id="history_table" style="display:none; position:relative" tabindex="0">
                            <span id="close_modals">x</span>
                            <thead>
                                <tr>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Pick</th>
                                    <th>Pickup-Address</th>
                                    <th>Drop </th>
                                    <th>Drop-Address </th>
                                    <th>P_Name</th>
                                    <th>P_Tel</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-----------------add table end ------->

                    <div class="row mt-3">
                        <div class="col-md-2 d-flex">
                            <span class="margin_variable">Passengers</span>
                            <input type="number" class="input_box" min="1" style="width:43px;"
                                id="edit_passenger_count" name="passenger_count"
                                value="{{ $job->passenger_count ?? '' }}" autocomplete="nope">
                        </div>
                        <div class="col-md-2 d-flex">
                            <span class="margin_variable"> Check-in Luggage</span>
                            <input type="number" class="input_box" style="width:43px;" id="edit_checkin_luggage_count"
                                min="1" name="checkin_luggage_count"
                                value="{{ $job->checkin_luggage_count ?? '' }}" autocomplete="nope">
                        </div>
                        <div class="col-md-2 d-flex">
                            <span class="margin_variable">Hand Luggage</span>
                            <input type="number" name="hand_luggage_count" id="edit_hand_luggage_count"
                                style="width:43px;" min="1" class="input-box"
                                value="{{ $job->hand_luggage_count ?? '' }}" autocomplete="nope">
                        </div>

                        <div class="col-md-2 d-flex">
                            <span style="margin-right:5px">Baby/Booster Seat</span>
                            <div class="d-flex">
                                <!-- <select id="baby_seat_count" name="baby_seat_count"
                                                        onchange="getPriceDetailOnBooking();">
                                                        <option value="" selected>0</option>
                                                        <option value="1" {{ $job->booster_seat_count == 1 ? 'selected' : '' }}>1</option>
                                                        <option value="2" {{ $job->booster_seat_count == 2 ? 'selected' : '' }}>2</option>
                                                        <option value="3" {{ $job->booster_seat_count == 3 ? 'selected' : '' }}>3</option>
                                                    </select>  -->
                                <input type="text" style="width:35px; margin-left:3px;" name="baby_seat_count"
                                    id="baby_seat_count" pattern="[0-3]*" maxlength="1"
                                    value="{{ $job->booster_seat_count }}" autocomplete="nope">

                            </div>
                        </div>
                        <div class="col-md-4 pt-2">
                            <ul id="selectedOptions"
                                class="selected-options ps-2 col-md-11 d-flex ListoofStyle justify-content-start line_height child-list"
                                style="martin-bottom:0px !important;">

                                
                                    @php
                                        $baby_age_list = '';
                                    @endphp
                                    @if($job->child_age != NULL)
                                        @foreach ($job->child_age as $index => $age)
                                            @php
                                                $baby_age_list .= ($index > 0 ? ',' : '') . $age;
                                            @endphp
                                        @endforeach
                                    @endif
                                    <li id="li-1" class="margin-start-5px d-flex" style="font-size: 12px;">
                                        Baby Age: <input type="text" style="width:75px; margin-left:3px;"
                                            value="{{ $baby_age_list }}" name="child_age" pattern="[0-9, ]*">
                                        <p class="baby-booster-alert" id="child1_age_error"></p>
                                    </li>

                            </ul>
                            </ul>
                        </div>
                            
                        <!-- <div class="col-md-2 d-flex">-->
                        <!--    <span style="margin-right:5px">Parking Charge</span>-->
                        <!--    <div class="d-flex">-->
                        <!--        <input type="text" style="width:60px; margin-left:3px;">-->
                        <!--    </div>-->
                        <!--</div>-->

                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3 d-flex">
                            <input class="form-check-input" type="checkbox" checked name="email_acknowledge_flag"
                                id="edit_email_acknowledge_flag" value="1"
                                {{ $job->email_acknowledge_flag == 1 ? 'checked' : '' }}>
                            <span class="margin_variable">E-mail ack required?</span>
                        </div>

                        <div class="col-md-8 d-flex">
                            <span class="margin_variable">E-mail address</span>
                            <input type="email" style="width:60%;" id="email_address" class="email_address_edit"
                                name="email_address" value="{{ $job->getClient->email ?? '' }}">
                        </div>

                    </div>
                    <div>
                        <span>Journey Details</span>
                        <div class="row">
                            <div class="col-md-12 d-flex">
                                <div class="form-group col-md-3">
                                    <input type="text" name="pickup" id="pickup" placeholder="Pick-up"
                                        style="width: 100%; text-transform:uppercase"
                                        value="{{ $job->journey_type_id == 1 ? $job->postcode : $job->getAirport->display_name }}">
                                </div>
                                <div class="form-group col-md-9 autocomplete">
                                    <input type="text" style="width: 100%;" name="pickup_detail" id="pickup_detail"
                                        onchange="getPriceDetailOnBooking();" style="text-transform:uppercase;"
                                        value="{{ $job->journey_type_id == 1 ? $job->address : $job->getAirport->airport_name }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 d-flex">
                                <div class="form-group col-md-3">
                                    <input type="text" name="drop" id="drop" placeholder="Drop"
                                        style="width: 100%; text-transform:uppercase;"
                                        value="{{ $job->journey_type_id == 2 ? $job->postcode : $job->getAirport->display_name }}">
                                </div>
                                <div class="form-group col-md-9 autocomplete d-flex">
                                    <input type="text" style="width: 95%;" name="drop_detail" id="drop_detail"
                                        onchange="getPriceDetailOnBooking();" style="text-transform:uppercase;"
                                        value="{{ $job->journey_type_id == 2 ? $job->address : $job->getAirport->airport_name }}">
                                    <a style="width: 5%;" id="switch_journey" href="javascript:void(0)"><i
                                            class="fa-solid fa-arrow-right-arrow-left"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="row edit-job">
                            <div class="col p-0">
                                <select name="notes" id="edit_notes" class="journey_end" style="width:100%;">
                                    <option value="">Notes</option>
                                    <option value="SEE JOBS" {{ $job->notes == 'SEE JOBS' ? 'selected' : '' }}>SEE JOBS
                                    </option>
                                    <option value="URGENT" {{ $job->notes == 'URGENT' ? 'selected' : '' }}>URGENT</option>
                                </select>
                            </div>

                            <div class="col p-0">
                                <input type="text" name="flight_number" id="edit_flight_no"
                                    style="width:100%; text-transform:uppercase;" placeholder="Flight no."
                                    value="{{ $job->flight_number ?? '' }}">
                            </div>
                            <div class="col p-0">
                                <input type="text" id="city_of_arrival" name="departure_city"
                                    placeholder="City of Departure" autocomplete="nope"
                                    style="width:100%; text-transform:uppercase;"
                                    value="{{ $job->departure_city ?? '' }}" name="arrival_city"
                                    id="edit_city_of_arrival">
                            </div>
                            <div class="col p-0">
                                <select name="airport_terminal" id="airport_terminal" style="width:100%;"
                                    placeholder="Terminal">
                                    @foreach ($job->getAirport->getAirportPickupLocationList as $terminal_list)
                                        <option value="{{ $terminal_list->id }}"
                                            {{ $job->getAirportPickupLocation?->id == $terminal_list->id ? 'selected' : '' }}>
                                            {{ $terminal_list->terminal_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col p-0">
                                <input type="number" style="width:82%" name="entry_after" id="entry_after"
                                    placeholder="Entry After" min="1" autocomplete="nope" style="width:100%;"
                                    value="{{ $job->entry_after ?? '' }}">
                                <lable>Min</lable>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <input type="text" class="input_box" name="comment" id="edit_comment"
                                style="width:100%;" value="{{ $job->comment ?? '' }}">
                        </div>
                    </div>
                    <div class="row" style="text-Align:right">
                        <div class="col">
                            <span style=" ">Users</span>
                            <div class="panel panel-pink baisc"> <span style=" ">Created By</span>
                                <input type="text" class="input_box" name="created_by" id="created_by"
                                    value="{{ $job->getTakenBy->name ?? '' }}" readonly>
                            </div>
                            <div class="panel panel-pink baisc"> <span style=" ">Assigned By</span>
                                <input type="text" class="input_box" name="assigned_by" id="assigned_by"
                                    value="{{ $job->getAssignedBy->name ?? '' }}" readonly>
                            </div>
                            <div class="panel panel-pink baisc"> <span style=" ">Allocated By</span>
                                <input type="   text" class="input_box" id="allocated_by" name="allocated_by"
                                    value="{{ $job->getAllocatedBy->name ?? '' }}" readonly>
                            </div>
                            <div class="panel panel-pink baisc"> <span style=" ">Last Edited By</span>
                                <input type="text" class="input_box" name="last_editedb_by" id="last_editedb_by"
                                    value="{{ $job->getAmendedBy->name ?? '' }}" readonly>
                            </div>
                        </div>

                        <div class="col">
                            <span style=" ">Driver Details</span>
                            <div class="panel panel-pink baisc"> <span>Name</span>
                                <input type="text" value="{{ $job->getDriver->full_Name ?? '' }}" class="input_box"
                                    name="driver_details " id="driver_details" readonly>
                            </div>
                            <div class="panel panel-pink baisc"> <span>C/S</span>
                                <input type="text" value="{{ $job->getDriver->call_Sign ?? '' }}" class="input_box"
                                    name="C/S" id="c_s" readonly>
                            </div>
                            <div class="panel panel-pink baisc"> <span>Status</span>
                                @if ($job->getDriver != null)
                                    @if ($job->getDriver->status == 0)
                                        <input type="text" class="input_box" value="Active" name="d_status"
                                            id="d_status" readonly>
                                    @else
                                        <input type="text" class="input_box" value="Suspended" name="d_status"
                                            id="d_status" readonly>
                                    @endif
                                @else
                                    <input type="text" class="input_box" name="d_status" id="d_status" readonly>
                                @endif
                            </div>
                            <div class="panel panel-pink baisc"> <span style=" ">Share</span>
                                <input type="text" value="{{ $job->driver_share ?? '' }}" class="input_box"
                                    name="d_share" id="d_share" readonly>
                            </div>
                        </div>

                        <div class="col">
                           <div> 
                            <span style=" ">Charges</span>
                             <div class="d-flex justify-content-end">
                                 <div class="panel panel-pink baisc">
                                   <span style=" ">Parking</span>
                                   <input type="text" class="input_box" name="parking_charge" id="parking_charge" value="{{ $job->getPriceDetail->parking_charges ?? '0' }}" readonly style="max-width:90px">
                                 </div>
                                 <div class="panel panel-pink baisc">
                                   <span style=" ">Basic</span>
                                   <input type="text" value="{{ $job->getPriceDetail->basic_price ?? '0' }}" class="input_box" name="basic_fare" id="basic_fare" readonly style="width:60px">
                                 </div>
                             </div>
                         </div>
                            
                            <div class="panel panel-pink baisc"> <span>Congestion</span>
                                <input type="text" value="{{ $job->getPriceDetail->congestion_charges ?? '0' }}"
                                    class="input_box" name="congestion_charge" id="congestion_charge" readonly>
                            </div>
                            <div class="panel panel-pink baisc"> <span style=" ">Night</span>
                                <input type="text" value="{{ $job->getPriceDetail->night_charge ?? '0' }}"
                                    class="input_box" name="night_charge" id="night_charge" readonly>
                            </div>
                            <div class="panel panel-pink baisc"> <span style=" ">Booster Seat</span>
                                <input type="text" value="{{ $job->getPriceDetail->booster_seat_charge ?? '0' }}"
                                    class="input_box" name="booster_seat_charge" id="booster_seat_charge" readonly>
                            </div>
                        </div>

                        <div class="col">
                            <span>Fare</span>
                            <div class="panel panel-pink baisc"> <span>Total Price</span>
                                <input type="text" value="{{ $job->getPriceDetail->total_price ?? '0' }}"
                                    class="input_box" name="total_price" id="total_price" readonly>
                            </div>
                            <div class="panel panel-pink d-flex mt-1">


                                <span style="margin-right:5px">Waiting </span>
                                <input type="text" class="input_box" name="waiting_time" id="waiting_time"
                                    placeholder="Min" value="{{ $job->wating_time ?? '0' }}">
                                <span style="margin-right:5px">Charges</span>
                                <input type="text" value="{{ $job->getPriceDetail->waiting_charge ?? '0' }}"
                                    class="input_box" name="additional_charge" id="additional_charge"
                                    onkeyup="updateNetPrice()">
                            </div>

                            <div class="panel panel-pink"> <span>Adjustment</span>
                                <input type="text" value="{{ $job->getPriceDetail->adjustment ?? '0' }}"
                                    class="input_box" name="discount" id="discount" onkeyup="updateNetPrice()">
                            </div>
                            <div class="panel panel-pink baisc"> <span>Net Fare</span>
                                <input type="text" value="{{ $job->getPriceDetail->net_price ?? '0' }}"
                                    class="input_box" name="net_price" id="net_price" readonly>
                            </div>
                        </div>


                        <div class="border-top d-flex" style=" margin-top:30px; ">
                            <select style="margin-right:5px;" name="payment_status">
                                <option {{ $job->payment_status == '1' ? 'selected' : '' }} value="1">Paid</option>
                                <option {{ $job->payment_status == '0' ? 'selected' : '' }} value="0">Unpaid</option>
                            </select>
                            <p style="font-size:12px; margin-right:5px;">Direct Payment Link</p>
                            <input type="text" id="payment_link"
                                value="{{ route('frontend.direct_pay', [$job->job_number]) }}"
                                style="width:36%; text-transform: lowercase;">
                            <button id="copyButton" type="button" onclick="copyToClipboard();">Copy</button>
                            <div class="" style="margin-inline-start: auto;">
                                <button class="btn btn-primary mt-2"  type="submit">Update</button>
                                <button class="btn btn-primary mt-1"  id="compute_price">Compute price</button>    
                            </div>
                            
                        </div>

                        <input type="hidden" id="prevUrl" name="prevUrl" value="{{ $previousUrl }}">
                        <input type="hidden" id="edit_client_id" name="client_id"
                            value="{{ $job->getClient->id ?? '' }}">
                        <input type="hidden" id="edit_price_detail_id" name="price_detail_id"
                            value="{{ $job->getPriceDetail->id ?? '' }}">
                        <div class="col d-flex Payment-details1">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mt-3 ">
                       <p style="font-size:12px; margin-right:5px;"> Cancel Status</p>
                            <select style="margin-right:5px; width:35%;" name="job_status_type">
                                <option value="">Select</option>
                                <option {{ $job->job_status_type_id == '4' ? 'selected' : '' }} value="4">CANCELED
                                </option>
                                <option {{ $job->job_status_type_id == '7' ? 'selected' : '' }} value="7">NO PICKUP
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4  mt-3">
                            <p style="font-size:12px; margin-right:5px;">DUE TO</p>
                            <input class="form-check-input" type="radio" name="cancel_due_to" value="PASSENGER"
                                {{ $job->cancel_due_to == 'PASSENGER' ? 'checked' : '' }}>
                            <span class="due-list">Passenger</span>
                            <input class="form-check-input" type="radio" name="cancel_due_to" value="DRIVER"
                                {{ $job->cancel_due_to == 'DRIVER' ? 'checked' : '' }}>
                            <span class="due-list">Driver</span>
                            <input class="form-check-input" type="radio" name="cancel_due_to" value="ADMIN"
                                {{ $job->cancel_due_to == 'ADMIN' ? 'checked' : '' }}>
                            <span class="due-list">Admin</span>
                        </div>
                        <div class="col-md-4  mt-3">
                            <p style="font-size:12px; margin-right:5px;">CANCEL REASON</p>
                            <input type="text" value="{{ $job->cancel_reason ?? '' }}" name="cancel_reason"
                                style="width:50%; text-transform: lowercase;">
                        </div>
                    </div>

                </div>
            </section>
        </form>
    </div>
@section('extra-js-section')
    <script src="{{ url('public/assets/backend/js/edit_job.js') }}"></script>
@endsection

@section('javascript-section')
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
    </script>
@endsection

@endsection
