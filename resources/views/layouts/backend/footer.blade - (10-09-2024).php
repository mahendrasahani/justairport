
<style>
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

    .selected_history_tr th{
        color:#fff !important;
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

    span {
        font-size: 12px;
        /* text-transform: uppercase; */
    }

    .ListoofStyle {
        /* list-style-type: oof; */
        list-style: none !important;
    }

    .margin-start-5px {
        margin-left: 0.5rem;
    }



    .auto-search::placeholder {
        color: black;
    }

    .search-container input {
        height: auto;
        background: white;
    }

    .getcars-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        top: 15%;
        /* left: 0;
        right: 0; */
    }

    .getcars-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
        width: 100px
    }

    .getcars-items div:hover {
        background-color: #e9e9e9;
    }

    .getcars-active {
        background-color: DodgerBlue !important;
        color: #ffffff;
    }
    select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #6d6969 !important;
    border-radius: 0px !important;
    }


    .dropdown_class{
        position: relative;
    }
    .dropdown_input{
        width: 100%;
    }
    .dropdown-list{
        position: absolute;
        top:26px;
        background-color: #fff;
        width: 100%;
    }
    /*NEW CSS*/
    .autocomplete {
        position: relative;
        display: inline-block;
    }

    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        top: 100%;
        left: 0;
        right: 0;
    }

    .autocomplete-items div {
        padding: 3px;
    cursor: pointer;
    background-color: #fff;
    border-bottom: 1px solid #d4d4d4;
    font-size: 12px;
    }

    .autocomplete-items div:hover {
        background-color: #e9e9e9;
    }

    .autocomplete-active {
        background-color: #1e90ff !important;
        color: #ffffff;
    } 
    #job_Date{width: 122px;
    border-radius: 0px !important;
   border: 0.5px solid #767676;
   }
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #000;
    text-align: left;
    padding: 8px;
    }

    /* tr:nth-child(even) {
    background-color: #dddddd;
    } */
    /* tr:nth-child(5){
    background-color: #dddddd;
    }
    tr:nth-last-child(5) {
    background: red;
    } */
    .profile-tr { background: #dddddd;}
    .car-div {
        margin-left: 24%;
    }
    .emai_check {
        width: 20px;
        margin-right: 5px;
    }

    .job_time {
        width: 46.4% !important;
    }


    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }
    #history_table{
        position: relative;
    }
    #close_modals{
        position: absolute;
        width: 20px;
        right: 27px;
        font-size: 17.5px;
        font-weight: 500;
        cursor: pointer;
        display: none;
    }
</style> 


<!-- Modal -->
<div class="modal fade" id="new_job" tabindex="-1" aria-labelledby="new_jobLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body new_job_modal_body">
                <section class="new_job_section">
                    <div class="custom_table_header d-flex justify-content-between">
                        <p>New Job</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            onclick="handleJobModal(event)">x</button>
                    </div>
                    <div class="new_job_container container">
                        <form action="{{ route('admin.new_job.store') }}" method="POST" id="new_job_form" class="new_job_form"  autocomplete="off">
                            @csrf 
                            <div class="row gap-3 align-items-center account_row mt-1">
                                <div class="col-md-7 d-flex account_col align-items-end">
                                    <span style="margin-right:5px">Account</span>
                                    <div style="width:20%;" class="input_box  account_box autocomplete"> 
                                        <input type="text" id="account_number" name="account_number" placeholder="Number" autocomplete="nope" required onchange="reCalculatePrice();"> 
                                    </div>  
                                    <div style="width:58%" class="input_box account_box ms-0 autocomplete">
                                        <input type="text" id="account_name_list" name="account_name_list" placeholder="Name" autocomplete="nope" required onchange="reCalculatePrice();">
                                    </div>
                                    <!-- <input type="text" class="input_box" style="width:17%" name="account_display_name" id="account_display_name" disabled> -->
                                </div> 
                                
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="d-flex align-items-center autocomplete car-div" >
                                            <span style="margin-right:5px">Car</span>  
                                        <input type="text" id="car_category_name" name="car_category_name" placeholder="Car Category" onchange="reCalculatePrice();" style="text-transform:uppercase" autocomplete="nope" required>
                                            <input type="text" placeholder="" class="input_box disabled_box" style="width:48%" id="car_full_name" name="car_full_name" readonly autocomplete="nope" required>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3 d-flex align-items-end mt-1">
                                    <span style="margin-right:2px">Job Date</span> 
                                        <input type="text" id="job_Date" name="job_date" placeholder="dd/mm/yyyy" class="addon form-control job_Date" required>
                                    <input type="text" class="input_box disabled_input" id="job_day" name="job_day"
                                        style="width:50px; text-transform:uppercase;" readonly>
                                </div>

                                <div class="col-md-5 d-flex align-items-center mt-1">
                                    <span style="width:60px;">Job Time</span> 
                                    <input type="text" class="input_box job_time disabled_box time-hhmm"
                                        id="job_time" name="job_time" onchange="reCalculatePrice();" required>
                                </div>
                                
                                </div>
                                <div class="row confirm_box">
                                    <div class="col-md-6 d-flex confirm_box">
                                        <span style="margin-right:5px">Contact</span>
                                        <div class="position-relative input_box">
                                            <input type="text" class="disabled_box input_box" style="width:100%; text-transform:uppercase;"
                                                name="contact_name" id="contact_name" autocomplete="nope" />
                                            <ul class="contact_suggestion" id="contact_suggestion"></ul>   
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex confirm_box">
                                        <span style="margin-right:5px">Client Tel</span>
                                        <input type="tel" class="disabled_box input_box" name="telphone_number"
                                            id="telephone_number" autocomplete="nope" style="text-transform:uppercase;"/> 
                                    </div>
                                </div>
                                <div class="row confirm_box">
                                    <div class="col-md-6 d-flex confirm_box">
                                        <span style="margin-right:5px">Ref</span>
                                        <input type="text" class="disabled_box input_box" id="rel"
                                            name="ref" id="ref" autocomplete="nope" style="text-transform:uppercase;"/>
                                    </div>
                                    <div class="col-md-6 d-flex confirm_box">
                                        <span style="margin-right:5px">Ref2</span>
                                        <input type="text" class="disabled_box input_box" name="ref2"
                                            id="ref2" autocomplete="nope" style="text-transform:uppercase;"/>
                                        <!-- <p style="width: 20.95px;"></p> -->
                                    </div>
                                </div>
                                <div class="row confirm_box">
                                    <div class="col-md-6 d-flex confirm_box">
                                        <span style="margin-right:5px">Passenger</span>
                                        <input type="text" class="disabled_box input_box" id="passenger_name"
                                            name="passenger_name" autocomplete="nope" style="text-transform:uppercase;"/>
                                    </div>
                                    <div class="col-md-6 d-flex confirm_box">
                                        <span style="margin-right:5px">Passenger Tel</span>
                                        <input type="tel" class="disabled_box input_box" id="passenger_phone"
                                            name="passenger_phone" autocomplete="nope" /> 
                                    </div>
                                </div> 
                                
                                <div class="row mt-2" id="job_history_section"> 
                                <table id="history_table" style="display:none; position:relative" tabindex="0">
                                    <span id="close_modals">x</span>
                                    <thead>
                                <tr>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Pick</th>
                                    <th>Pickup-Address</th>
                                    <th>Drop  </th>
                                    <th>Drop-Address </th>
                                    <th>P_Name</th>
                                    <th>P_Tel</th>
                                </tr>
                                </thead>
                                <tbody> 
                                </tbody>
                                </table>
                                </div> 
                              
                                <!-- <div class="row mt-2" id="client_profile_section"> 
                                <ul id="selectedOptions" class="selected-options ps-2 col-md-11 d-flex ListoofStyle justify-content-start line_height child-list" style="martin-bottom:0px !important;">
                            </ul>
                                </div>  -->
                                <br> 
                                <div class="row" style="margin-top:1px !important">
                                    <div class="col-md-2 d-flex">
                                        <span style="width:fit-content; margin-right:5px">Passengers</span>
                                        <input type="number" class="input_box disabled_box" style="width:20%; text-transform:uppercase;"
                                            id="passenger_count" name="passenger_count" min="1">
                                    </div>
                                    <div class="col-md-2 d-flex">
                                        <span style="width:fit-content;margin-right:5px">Check-in Luggage</span>
                                        <input type="number" class="input_box disabled_box" style="width:20%; text-transform:uppercase;"
                                            id="checkin_luggage_count" name="checkin_luggage_count" min="1">
                                    </div>
                                    <div class="col-md-2 d-flex">
                                        <span style="width:fit-content;margin-right:5px">Hand Luggage</span>
                                        <input type="number" name="hand_luggage_count" id="hand_luggage_count"
                                            style="width:20%; text-transform:uppercase;" min="1">
                                    </div>
                                    <div class="col-md-2 d-flex">
                                            <span style="margin-right:5px">Baby/Booster Seat</span>
                                            <div class="d-flex">
                                            <input type="text" style="width:35px; margin-left:3px;" name="baby_seat_count" id="baby_seat_count"  pattern="[0-3]*">
                                                <!-- <select id="baby_seat_count" name="baby_seat_count"
                                                    onchange="addChldAgeList();">
                                                    <option value="" selected>0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>  -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <ul id="selectedOptions" class="selected-options ps-2 col-md-11 d-flex ListoofStyle justify-content-start line_height child-list" style="martin-bottom:0px !important;">
                                            <li id="li-1" class="margin-start-5px d-flex" style="font-size: 12px;"> 
                                                Baby Age: <input type="text" style="width:75px; margin-left:3px;" name="child_age" pattern="[0-9, ]*">
                                                <p class="baby-booster-alert" id="child1_age_error"></p>
                                            </li>
                                            </ul>
                                        <!-- <ul id="selectedOptions" class="selected-options ps-2 col-md-11 d-flex ListoofStyle justify-content-start line_height child-list" style="martin-bottom:0px !important;">     
                                        </ul> -->
                                        <!-- <ul id="selectedOptions" class="selected-options ps-2 col-md-11 d-flex ListoofStyle justify-content-start line_height child-list" style="martin-bottom:0px !important;">
                                            <li id="li-1" class="margin-start-5px d-flex" style="font-size: 12px;">
                                                <div class="child_age" id="first_child">
                                                Baby Age: <input type="text" style="width:75px; margin-left:3px;" name="child_age" pattern="[0-9, ]*" id="child_age">
                                                <p class="baby-booster-alert" id="child1_age_error"></p>
                                                </div>
                                            </li> -->

                                            <!-- <li id="li-2" class="margin-start-5px d-flex" style="font-size: 12px;">
                                            <div class="child_age" id="second_child">
                                                Second Age: <input type="text" style="width:25px; margin-left:3px;" name="child_age2" id="child2" min="0" max="9" oninput="this.value = this.value.slice(0, 1);">
                                                <p class="baby-booster-alert" id="child2_age_error"></p>
                                                </div>
                                            </li> -->
                                            <!-- <li id="li-3" class="margin-start-5px d-flex" style="font-size: 12px;">
                                            <div class="child_age" id="third_child">
                                                Third Age: <input type="text" style="width:25px; margin-left:3px;" name="child_age3" id="child3" min="0" max="9" oninput="this.value = this.value.slice(0, 1);">
                                                <p class="baby-booster-alert" id="child3_age_error"></p>
                                                </div>
                                            </li> -->
                                        </ul>
                                        </div>
                                    <div class="row gap-2">
                                    <div class="col-md-2 d-flex my-1 mx-0 px-0">
                                        <input class="form-check-inpu emai_check" type="checkbox" checked name="email_acknowledge_flag" id="email_acknowledge_flag" value="1" >
                                            <span style="margin-right:5px">E-mail ack required?</span>
                                        </div> 
                                        <div class="col-md-8 d-flex my-1">
                                            <span style="margin-right:5px">E-mail address</span>
                                            <input type="email" class="disabled_box input_box" id="email_address" name="email_address" autocomplete="nope" style="text-transform:uppercase;">
                                        </div> 
                                    </div>
                                    <div>
                                        <span>Journey Details</span>
                                        <div class="row">
                                            <div class="col-md-12 d-flex"> 
                                                <div class="form-group col-md-3">
                                                    <input type="text" name="pickup" id="pickup" placeholder="Pick-up" style="width: 100%; text-transform:uppercase">
                                                </div> 
                                                <div class="form-group col-md-9 autocomplete">  
                                                <input type="text" style="width: 100%;" name="pickup_detail" id="pickup_detail" style="text-transform:uppercase;">
                                                </div>  
                                            </div> 
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12 d-flex"> 
                                                <div class="form-group col-md-3">
                                                     <input type="text" name="drop" id="drop" placeholder="Drop" style="width: 100%; text-transform:uppercase;">
                                                </div> 
                                                <div class="form-group col-md-9 autocomplete d-flex"> 
                                                <input type="text" style="width: 95%;" name="drop_detail" id="drop_detail"  style="text-transform:uppercase;">
                                                <a style="width: 5%;" id="switch_journey"  href="javascript:void(0)"><i class="fa-solid fa-arrow-right-arrow-left"></i></a>
                                                </div> 
                                        </div>
                                        <div class="row">  
                                        <div class="col"> 
                                            <select name="notes" id="notes" class="journey_end disabled_box" style="width:100%;">
                                                <option value="">Notes</option>
                                                <option value="SEE JOBS">SEE JOBS</option>
                                                <option value="URGENT">URGENT</option>
                                            </select>
                                            </div>  
                                            <div class="col">  
                                            <input type="text" name="flight_number" id="flight_no" placeholder="Flight no." autocomplete="nope" style="width:100%; text-transform:uppercase;">
                                             </div>
                                            <div class="col"> 
                                             <input type="text" id="departure_city" name="departure_city" placeholder="City of Departure" autocomplete="nope" style="width:100%; text-transform:uppercase;"> 
                                            </div>
                                            <div class="col">  
                                                 <select name="airport_terminal" id="airport_terminal" style="width:100%;" placeholder="Terminal" required>
                                                    <option value="">Terminal</option>
                                                 </select>
                                            </div> 
                                            <div class="col d-flex" > 
                                                <input type="number" style="width:82%" name="entry_after" id="entry_after" placeholder="Entry After" autocomplete="nope" style="width:100%;">
                                                <lable>Min</lable>
                                            </div> 
                                            </div> 
                                        </div>  
                                        <div style="width:100%;display:flex" class="mt-0">
                                            <input type="text" placeholder="" name="comment" id="comment"
                                                class="w-100" autocomplete="nope" style="text-transform:uppercase;">
                                        </div>
                                        <br> 
                                        <div class="confirm_box mt-1">
                                            <div class="row text_align_right">
                                                <div class="col-md-3"></div> 
                                                <div class="col-md-3"></div> 
                                            <div class="col-md-3">
                                                <div>
                                                    <span style="margin-right:5px">Base Fare</span>
                                                    <input type="text" name="basic_fare" id="basic_fare" class="input_box" autocomplete="nope" readonly>
                                                    </div>

                                                    <div>
                                                    <span style="margin-right:5px">Congestion Charge</span>
                                                    <input type="text" name="congestion_charge" id="congestion_charge" class="input_box" autocomplete="nope" readonly>
                                                    </div> 
                                                    <div>
                                                    <span style="margin-right:5px">Night Charge</span>
                                                    <input type="text" name="night_charge" id="night_charge" class="input_box" autocomplete="nope" readonly>
                                               </div>
                                               <div>
                                                    <span style="margin-right:5px">Booster Seat Charge</span>
                                                    <input type="text" name="booster_seat_charge" id="booster_seat_charge" class="input_box" autocomplete="nope" readonly>
                                                    </div> 
                                                </div>
                                                <div class="col-md-3"> 
                                                <div>
                                                    <span style="margin-right:5px">Total Price</span>
                                                    <input type="text" class="input_box" name="total_price" id="total_price" readonly>
                                                </div>

                                                <div>
                                                    <span style="margin-right:5px">Waiting </span>
                                                    <input type="text" class="input_box" name="waiting_time" id="waiting_time" placeholder="Min">
                                                    <span style="margin-right:5px">Charges</span>
                                                    <input type="number" class="input_box" name="additional_charge" id="additional_charge" onkeyup="updateNetPrice()">
                                                </div>
                                                <div>
                                                    <span style="margin-right:5px">Adjustment</span>
                                                    <input type="text" class="input_box" name="discount" id="discount" onkeyup="updateNetPrice()">
                                                </div>
                                                <div>
                                                    <span style="margin-right:5px">Net Price</span>
                                                    <input type="text" class="input_box" name="net_price" id="net_price" readonly>
                                                </div>
                                            </div>
                                            </div>  
                                            </div> 
                                        </div>
                                    </div><br>

                                    <div style="text-Align:right" class="mt-3 border-top d-flex justify-content-between">
                                    <div>
                                        <a class="btn btn-block btn-default mt-1" href="javascript:void(0)" id="clear_new_job_form">Clear</a>
                                            <button class="btn btn-primary mt-1" id="compute_price">Compute price</button>
                                    </div>
                                        <button class="btn btn-primary mt-1" id="create_new_job_btn" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="input_box disabled_input" id="job_day_hidden" name="job_day">
                            <input type="hidden" style="width:5%" id="client_id" name="client_id" class="disabled_box">
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div> 
<div class="loading" id="api_loader" style="display:none;">Loading&#8230;</div> 
<script>
    let get_account_with_acc_no_url = "{{ route('admin.new_job.get_acc_with_acc_no') }}";
    let get_car_category_url = "{{ route('admin.new_job.get_car_category') }}";
    let get_client_url = "{{ route('admin.new_job.get_client') }}";
    let get_terminal_list_url = "{{ route('admin.new_job.get_terminal_list') }}";
    let get_client_profile_with_phone_url = "{{ route('admin.new_job.get_client_profile_with_phone') }}";
</script>
<script data-cfasync="false" src="{{ url('public/assets/backend/js/email-decode.min.js') }}"></script>
<script src="{{ url('public/assets/backend/js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="{{ url('public/assets/backend/js/fastclick.js') }}"></script>
<script src="{{ url('public/assets/backend/js/adminlte.min.js') }}"></script>
<script src="{{ url('paplic/assets/backend/js/adminlte.js') }}"></script>
<script src="{{ url('public/assets/backend/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('public/assets/backend/js/demo.js') }}"></script>
<script src="{{ url('public/assets/backend/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('public/assets/backend/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('public/assets/backend/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('public/assets/backend/js/script.js') }}"></script>
<script src="{{ url('public/assets/backend/js/main.js') }}"></script>
<script src="{{ url('public/assets/backend/js/new_job.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/8b7ad2abb9.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@yield('extra-js-section')
</script>
<script>
     let drop_array = [];
    $(document).ready(function() { 
        let profile_name = '';
        let profile_email = ''; 
        let job_history_record = [];
        let selectedDate; 

        document.addEventListener('keydown', function(e) {
            if (e.altKey && e.keyCode === 80){   
                getPriceDetailOnBooking();
            }
        }); 
        $(document).on("click", "#compute_price", function(e){
            e.preventDefault();
            getPriceDetailOnBooking();
        }); 
        $('#job_Date').datepicker({
            format: 'dd/mm/yyyy',  
            autoclose: true,
            todayHighlight: true
        }).on('changeDate', function(e){
            getDay('job_Date', 'job_day');
        });  
        $('#job_Date').on('click', function (){
            $(this).datepicker('show');
        }); 
        $('#job_Date').on('input', function (){
            let day = parseInt($(this).val());
            let today = new Date();
            if (!isNaN(day) && day > 0 && day <= 31){
                if (day >= today.getDate()){
                    selectedDate = new Date(today.getFullYear(), today.getMonth(), day);
                }else{
                    selectedDate = new Date(today.getFullYear(), today.getMonth() + 1, day);
                }
                if(selectedDate < today){
                  selectedDate = null;
                  $(this).val('');
                }
            }else{
                if($(this).val()){
                    $(this).val('');
                }
            }   
        }); 
        $('#job_Date').on('focus', function (e) {
            $(this).select();
        });
        $('#job_Date').on('keydown', function (e){
            if (e.key === 'Enter'){
            if (selectedDate) {
                $(this).datepicker('setDate', selectedDate);
                $(this).val($.datepicker.formatDate('dd-mm-yy', selectedDate));
            }
            $(this).datepicker('hide');
            e.preventDefault();
            }
        });
        $('#job_Date').on('keydown', function (e) {
            $(this).datepicker('hide');
        });
    });

    $(document).on("input", "#additional_charge", function(){
            this.value = this.value.replace(/[^0-9]/g, '').replace(/^0+/, ''); 
    });
    $(document).on("click", "#create_new_job_btn", function(e){
            e.preventDefault();
            let additional_charge = $("#additional_charge").val();
            let discount = $("#discount").val();
            if(additional_charge !== '' || discount != ''){ 
                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to submit with discount and additional charge!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Save it!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $("#new_job_form").submit();
                    }
                    });
            }
            else{
                $("#new_job_form").submit();
            }
    });
    function updateNetPrice(){
            let total_price = Number($("#total_price").val()) || 0;
            let additional_charge = Number($("#additional_charge").val()) || 0;
            let discount = Number($("#discount").val()) || 0;
            let net_price = (Number(additional_charge) + Number(total_price) + Number(discount))
            $("#net_price").val(net_price); 
    }
    function reCalculatePrice(){ 
            let total_price = $("#total_price").val();  
            if(total_price != ''){ 
                getPriceDetailOnBooking();
            }
    }
    function addSelectedOnHistoryTable() {
            let tableRows = $(".history_options");  
            tableRows.each(function() {
                $(this).on("click", function() {  
                    tableRows.removeClass("selected_history_tr");  
                    $(this).addClass("selected_history_tr");
                });
            });
    }
    async function getPriceDetailOnBooking(){  
        setTimeout(async () => {
            let airport_id = null;  
            let post_code = null;
            let airport = null; 
            let baby_seat_count = $("#baby_seat_count").val();
            let journey_type = 'to_airport';
            const car_category = $("#car_category_name").val();
            let account_id = $("#account_number").val();
            const job_day = $("#job_day").val();
            const job_time = $("#job_time").val();
            let additional_charge = $("#additional_charge").val();
            let discount = $("#discount").val();
            let drop_value = $("#drop").val().toUpperCase(); 
            if(drop_value == 'LHR'){
                airport = "Heathrow Airport";
                airport_id = 1;  
            }else if(drop_value == 'LGW'){
                airport = "Gatwick Airport";
                airport_id = 2; 
            }else if(drop_value == 'LTN'){
                airport = "Luton Airport";
                airport_id = 3; 
            }else if(drop_value == 'STN'){
                airport = "Stansted Airport";
                airport_id = 4; 
            }else if(drop_value == 'LCY'){
                airport = "City Airport";
                airport_id = 5; 
            }else if(drop_value == 'SEN'){  
                airport = "Southend Airport";
                airport_id = 6; 
            }else{ 
                post_code = drop_value; 
            }  
            if(airport_id != null){
                post_code = $("#pickup").val(); 
            } 
            if(airport == null){
                let pick_value = $("#pickup").val().toUpperCase();  
                if(pick_value == 'LHR'){ 
                    airport = "Heathrow Airport";
                    airport_id = 1; 
                    journey_type = 'from_airport';
                }else if(pick_value == 'LGW'){
                    airport = "Gatwick Airport"; 
                    airport_id = 2; 
                    journey_type = 'from_airport';
                }else if(pick_value == 'LTN'){ 
                    airport = "Luton Airport";
                    airport_id = 3; 
                    journey_type = 'from_airport';
                }else if(pick_value == 'STN'){ 
                    airport = "Stansted Airport";
                    airport_id = 4; 
                    journey_type = 'from_airport';
                }else if(pick_value == 'LCY'){ 
                    airport = "City Airport";
                    airport_id = 5; 
                    journey_type = 'from_airport';
                }else if(pick_value == 'SEN'){   
                    airport = "Southend Airport";
                    airport_id = 6; 
                    journey_type = 'from_airport';
                }else{ 
                    post_code = pick_value; 
                } 
            } 
            const new_booking_price_url = "{{ route('frontend.get_price_on_new_booking') }}";
            let response = await fetch(`${new_booking_price_url}/?car_category=${car_category}&account_id=${account_id}
            &postcode=${post_code}&airport_id=${airport_id}&job_time=${job_time}&job_day=${job_day}&baby_seat_count=${baby_seat_count}&journey_type=${journey_type}`);
            let responseData = await response.json();  
                if(responseData.status == 'success'){  
                    $("#basic_fare").val(responseData.basic_price);
                    $("#congestion_charge").val(responseData.congestion_charge);
                    $("#night_charge").val(responseData.night_charge); 
                    let net_price = (Number(additional_charge) + Number(responseData.total_price) + Number(discount))
                    let booster_seat_charge = Number($("#booster_seat_charge").val()); 
                    let charges = Number($("#additional_charge").val());
                    let adjustment = Number($("#discount").val()); 
                    $("#total_price").val(responseData.basic_price + responseData.congestion_charge +
                    responseData.night_charge + booster_seat_charge); 
                    $("#net_price").val(responseData.basic_price + responseData.congestion_charge +
                    responseData.night_charge + booster_seat_charge + charges + adjustment);
                } 
            }, 500);
    }
    $(document).on("click", "#switch_journey", function(){ 
        let pickupValue = $("#pickup").val();
        let dropValue = $("#drop").val();
        let pickupDetailValue = $("#pickup_detail").val();
        let dropDetailValue = $("#drop_detail").val(); 
        $("#pickup").val(dropValue);
        $("#drop").val(pickupValue);
        $("#pickup_detail").val(dropDetailValue);
        $("#drop_detail").val(pickupDetailValue); 
        getPriceDetailOnBooking();
    });
    $(document).on("keydown", "#telephone_number", async function (event){
        if (event.altKey && event.key === "Enter"){ 

            $("#api_loader").show(); 
            let accordionSection = '';
            let history_table = '';
            let history_list = '';
            let profile_table = '';
            let client_profile = '';
            let client_phone_number = $(this).val();
            if(client_phone_number == ''){
                $("#api_loader").hide(); 
            }else if(client_phone_number.length < 10){
                $("#api_loader").hide();  
            } 
            let get_client_history_url = "{{ route('frontend.get_history_with_client_number') }}";
            if(client_phone_number.length >= 10){
                let response = await fetch(`${get_client_history_url}/?phone=${client_phone_number}`);
                let responseData = await response.json();
                job_history_record = responseData; 
                if (responseData.message == "history_found"){
                    $("#api_loader").hide(); 
                    $("#client_id").val(responseData.client_id);
                    responseData.history?.map((itm, index) =>{
                    history_list += `
                    <tr data-id="${itm?.id}" class="history_options ${index == 0 ? 'selected_history_tr' : ''}" id="${itm?.id}" onclick="addSelectedOnHistoryTable();">
                        <td class="name">${itm?.get_client.name}</td>
                        <td class="email">${itm?.get_client.email}</td> 
                        <td class="pick">${itm?.journey_type_id == 1 ? itm?.postcode : itm?.get_airport.display_name}</td>
                        <td class="pick_detail">${itm?.journey_type_id == 1 ? itm?.address : itm?.get_airport.airport_name}</td>
                        <td class="drop">${itm?.journey_type_id == 1 ? itm?.get_airport.display_name : itm?.postcode}</td>
                        <td class="drop_detail">${itm?.journey_type_id == 1 ? itm?.get_airport.airport_name : itm?.address}</td>
                        <td class="passenger_name"> ${itm?.passenger_name}</td>
                        <td class="passenger_phone"> ${itm?.passenger_phone}</td>
                    </tr>`;
                    }); 
                    client_profile += `
                    <tr class="history_options profile-tr">
                    <td class="name">${responseData.client_profile.name}</td>
                    <td class="email">${responseData.client_profile.email}</td>
                    <td class="pick">${responseData.client_profile.address == null ? '' : responseData.client_profile.address}</td>
                    <td class="pick_detail"></td>
                    <td class="drop"></td>
                    <td class="drop_detail"></td>
                    <td class="passenger_name"></td>
                    <td class="passenger_phone">${responseData.client_profile.phone}</td> 
                    </tr>`;
                    profile_name = responseData.client_profile.name;
                    profile_email = responseData.client_profile.email;   
                    $("#job_history_section").show();
                    $('#history_table tbody').empty().append(history_list + client_profile);
                    $("#history_table").show(); 
                    $('#close_modals').show();
                }else{
                    $("#api_loader").hide(); 
                    $("#client_profile_section").html('');
                    $("#job_history_section").html('');
                    $('#client_id').val('');
                }
            }else{
                // $("#job_history_section").html('');
                // $("#client_profile_section").html('');
            } 
            $('#history_table').focus();
            const rows = document.querySelectorAll('#history_table tr');
            const table = document.querySelector('#history_table');
            let selectedIndex = 1;
            function selectRow(index){
                rows.forEach(row => row.classList.remove('selected_history_tr'));
                rows[index].classList.add('selected_history_tr');
                rows[index].scrollIntoView({ block: 'nearest', inline: 'nearest' });
            }
            selectRow(selectedIndex);
            table.addEventListener('keydown', function (e){
                if (e.key === 'ArrowDown'){
                    e.preventDefault(); 
                    if (selectedIndex < rows.length - 1){
                        selectedIndex++;
                        selectRow(selectedIndex);
                    }else if (selectedIndex == (rows.length - 1)){
                        selectedIndex = 0;
                    }
                }else if(e.key === 'ArrowUp'){
                    e.preventDefault();  
                    if(selectedIndex > 0){
                        selectedIndex--;
                        selectRow(selectedIndex);
                    }else if(selectedIndex == 0){
                        selectedIndex = rows.length - 1;
                    }
                }else if(e.key === 'Enter'){ 
                    e.preventDefault();  
                    let selectedRow = rows[selectedIndex];  
                    setHistoryData(selectedRow); 
                    $('#rel').focus();
                    $('#job_history_section').hide(); 
                    $('#close_modals').hide();   
                }else if (e.altKey && e.key === 'Enter'){ 
                    e.preventDefault();   
                    $('#account_number').focus();
                    $('#job_history_section').hide();            
                }
            }); 
        }
    });  
    async function handleJobModal(e){
        e.preventDefault();
        const apiResponse = await fetch(update_job_url + "/?id=" + id);
        const data = await apiResponse.json();
        flag = 0;
    }
    async function setHistoryData(selectedRow) {  
        var name = selectedRow.querySelector('.name').textContent;
        var email = selectedRow.querySelector('.email').textContent;
        var pick = selectedRow.querySelector('.pick').textContent;
        var pickDetail = selectedRow.querySelector('.pick_detail').textContent;
        var drop = selectedRow.querySelector('.drop').textContent;
        var dropDetail = selectedRow.querySelector('.drop_detail').textContent;
        var passengerName = selectedRow.querySelector('.passenger_name').textContent;
        var passengerPhone = selectedRow.querySelector('.passenger_phone').textContent;
        if (name !== null && name !== ""){
            $("#contact_name").val(name);
        }
        if (email !== null && email !== ""){
            $("#email_address").val(email);    
        }
        if (pick !== null && pick !== ""){
            $("#pickup").val(pick);
        }
        if (pickDetail !== null && pickDetail !== ""){
            $("#pickup_detail").val(pickDetail); 
        }
        if (drop !== null && drop !== ""){
            $("#drop").val(drop); 
        }
        if (dropDetail !== null && dropDetail !== ""){
            $("#drop_detail").val(dropDetail);
        }
        if (passengerName !== null && passengerName !== ""){
            $("#passenger_name").val(passengerName);
        }
        if (passengerPhone !== null && passengerPhone !== ""){
            $("#passenger_phone").val(passengerPhone); 
        }      
    }
    function getDayName(date) {
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const dayIndex = date.getDay();
        return days[dayIndex];
    }
    function getDay(id1, id2) {
        const dateBox = document.getElementById(id1);
        const dayBox = document.getElementById(id2);
        const selectedDate = new Date(dateBox.value.split('/').reverse().join('/'));
        if(!isNaN(selectedDate.getTime())){
            const dayName = getDayName(selectedDate);
            dayBox.value = dayName;
        }else{
            dayBox.value = '';
        }
    }
    $(document).on("keyup", "#baby_seat_count", function(){ 
        let booster_seat_charge = 0;
        let numberOfInputs = $(this).val();  
        let basic_fare = Number($("#basic_fare").val());
        let congestion_charge = Number($("#congestion_charge").val());
        let night_charge = Number($("#night_charge").val());
        let total_price = Number($("#total_price").val());
        let charges = Number($("#additional_charge").val());
        let adjustment = Number($("#discount").val());
        let net_price = Number($("#net_price").val()); 
        booster_seat_charge = numberOfInputs * 5;
        $("#total_price").val(basic_fare + congestion_charge + night_charge + booster_seat_charge);
        $("#net_price").val(basic_fare + congestion_charge + night_charge + booster_seat_charge + charges + adjustment);
        $("#booster_seat_charge").val(booster_seat_charge);   
    });
    function handleEnterKey(event, currentIndex) {
        const email_acknowledg = document.getElementById("email_acknowledge_flag")
        if (event.key === 'Enter'){
            event.preventDefault();  
            const nextIndex = currentIndex + 1;
            const nextInput = document.getElementById(`child${nextIndex}`);
            if (nextInput) {
                nextInput.focus();
            } else {
                email_acknowledg.focus();
            }
        }
    }
    $('#close_modals').click(function(){
        $('#history_table').hide();
        $('#close_modals').hide(); 
    });

    document.addEventListener("DOMContentLoaded", function(){
        function setTerminal(airport_id){
            let append_terminal_list = '<option value="">--Select Terminal--</option>';
            let airport_terminal_list = [];  
                if(airport_id == 1){
                    airport_terminal_list.push('Terminal 1', 'Terminal 2', 'Terminal 3', 'Terminal 4', 'Terminal 5');
                }else if (airport_id == 2){
                    airport_terminal_list.push('North Terminal', 'South Terminal');
                }else if(airport_id == 3 || airport_id == 4 || airport_id == 5 || airport_id == 6){
                    airport_terminal_list.push('Terminal 1');
                }
                if(airport_terminal_list.length > 0){
                    airport_terminal_list.forEach((terminal, index) => {
                        let value = index + 1; 
                        append_terminal_list += `<option value="${value}" ${airport_terminal_list.length == 1 ? 'selected' : ''}>${terminal.toUpperCase()}</option>`;
                    }); 
                    $("#airport_terminal").html(append_terminal_list);
                } 
        }
        function closeAllLists(elmnt) {
                let x = document.getElementsByClassName("autocomplete-items");
                for (let i = 0; i < x.length; i++) {
                    // if (elmnt != x[i] && elmnt != input) {
                    if (elmnt != x[i]) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
        }  
        function autocomplete(input, suggestions){
            let currentFocus; 
            input.addEventListener("keydown", function(e){
                let x = document.getElementsByClassName("autocomplete-items"); 
                if(x)
                 x = x[0].getElementsByTagName("div");
                if(e.keyCode == 40){
                    currentFocus++;
                    addActive(x);
                }else if(e.keyCode == 38){
                    currentFocus--;
                    addActive(x);
                }else if (e.keyCode == 13){
                    console.log("current_focus:- " + currentFocus)
                    e.preventDefault();
                    if (currentFocus > -1) { 
                        if (x) x[currentFocus].click();
                    }
                }
            });

            function addActive(x) {
                if (!x) return false;
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                x[currentFocus].classList.add("autocomplete-active");
            }

            function removeActive(x) {
                for (let i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }
            } 

            // function closeAllLists(elmnt) {
                // let x = document.getElementsByClassName("autocomplete-items");
                // for (let i = 0; i < x.length; i++) {
                //     if (elmnt != x[i] && elmnt != input) {
                //         x[i].parentNode.removeChild(x[i]);
                //     }
                // }
            // }  

            function handleInput(){ 
                let listContainer, listItem, i, val = this.value;
                closeAllLists(); 
                // if (!val) return false;
                currentFocus = -1;
                listContainer = document.createElement("DIV");
                listContainer.setAttribute("class", "autocomplete-items");
                this.parentNode.appendChild(listContainer);   
                if(val == ''){ 
                    for (i = 0; i <= suggestions.length; i++) { 
                        listItem = document.createElement("DIV");
                        listItem.innerHTML = "<strong>" + suggestions[i].substr(0, val.length) + "</strong>";
                        listItem.innerHTML += suggestions[i].substr(val.length);
                        listItem.innerHTML += "<input type='hidden' value='" + suggestions[i] + "'>";
                        listItem.addEventListener("click", function() { 
                            input.value = this.getElementsByTagName("input")[0].value;
                            closeAllLists();
                        });
                        listContainer.appendChild(listItem); 
                } 
                }
                for (i = 0; i <= suggestions.length; i++) {
                    if (suggestions[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        listItem = document.createElement("DIV");
                        listItem.innerHTML = "<strong>" + suggestions[i].substr(0, val.length) + "</strong>";
                        listItem.innerHTML += suggestions[i].substr(val.length);
                        listItem.innerHTML += "<input type='hidden' value='" + suggestions[i] + "'>";
                        listItem.addEventListener("click", function() { 
                            input.value = this.getElementsByTagName("input")[0].value;
                            closeAllLists();
                        });
                        listContainer.appendChild(listItem);
                    }
                } 
            } 
            input.addEventListener("input", handleInput);  
            input.addEventListener("focus", handleInput);  
        }
        $(document).on("click", "#pickup", async function(){
            $("#pickup_detail").val('');
        });   
        $(document).on("blur", "#pickup", async function(){
            let pick_array = [];
            let airport = null;    
            let airport_id = null; 
            let append_terminal_list = '<option value="">--Select Terminal--</option>';
            let pick_value = $(this).val().toUpperCase();
            let url = "{{route('admin.get_postcode_airports_list')}}"; 
            if(pick_value == 'LHR'){                
                airport = "Heathrow Airport"; 
                airport_id = 1; 
            }else if(pick_value == 'LGW'){
                airport = "Gatwick Airport"; 
                airport_id = 2; 
            }else if(pick_value == 'LTN'){
                airport = "Luton Airport"; 
                airport_id = 3; 
            }else if(pick_value == 'STN'){
                airport = "Stansted Airport"; 
                airport_id = 4;                 
            }else if(pick_value == 'LCY'){
                airport = "City Airport"; 
                airport_id = 5; 
            }else if(pick_value == 'SEN'){  
                airport = "Southend Airport"; 
                airport_id = 6; 
            }  
            if(airport != null){
                setTerminal(airport_id);
                $("#pickup_detail").val(airport.toUpperCase());
                $("#entry_after").val(40);
            }else{ 
                $("#api_loader").show();
                let timeout = setTimeout(() => {
                    $("#api_loader").hide(); 
                }, 10000); 
                let response = await fetch(`${url}/?req_value=${pick_value}`);
                let responseData = await response.json();   
                responseData.data.forEach(element => { 
                pick_array.push(element.toUpperCase());
                });  
                autocomplete(document.getElementById("pickup_detail"), pick_array);  
                $("#api_loader").hide(); 
            } 
            reCalculatePrice();
        });  
        $(document).on("click", "#drop", async function(){
            $("#drop_detail").val('');
        });  
        $(document).on("blur", "#drop", async function(){
            let journey_type = null;
            let airport = null; 
            let airport_id = null; 
            let post_code = null; 
           
            let drop_value = $(this).val().toUpperCase();
            let url = "{{route('admin.get_postcode_airports_list')}}"; 
            if(drop_value == 'LHR'){
                airport = "Heathrow Airport";
                airport_id = 1; 
            }else if(drop_value == 'LGW'){
                airport = "Gatwick Airport";
                airport_id = 2; 
            }else if(drop_value == 'LTN'){
                airport = "Luton Airport";
                airport_id = 3; 
            }else if(drop_value == 'STN'){
                airport = "Stansted Airport";
                airport_id = 4; 
            }else if(drop_value == 'LCY'){
                airport = "City Airport";
                airport_id = 5; 
            }else if(drop_value == 'SEN'){  
                airport = "Southend Airport";
                airport_id = 6; 
            }else{
                $("#api_loader").show();
                let response = await fetch(`${url}/?req_value=${drop_value}`);
                let responseData = await response.json();   
                responseData.data.forEach(element => {
                    drop_array.push(element.toUpperCase()); 
                }); 
                post_code = drop_value;   
                autocomplete(document.getElementById("drop_detail"), drop_array);
                $("#api_loader").hide();
            } 
            if(airport != null){
                setTerminal(airport_id);
                $("#drop_detail").val(airport.toUpperCase());
            }
            if(post_code == null){
                post_code = $("#pickup").val(); 
            }  
            if(airport != null){
                journey_type = 'to_airport';     
            }else{ 
                journey_type = 'from_airport'; 
                let pick_value = $("#pickup").val().toUpperCase();  
                if(pick_value == 'LHR'){
                    airport_id = 1; 
                }else if(pick_value == 'LGW'){
                    airport_id = 2; 
                }else if(pick_value == 'LTN'){ 
                    airport_id = 3; 
                }else if(pick_value == 'STN'){ 
                    airport_id = 4; 
                }else if(pick_value == 'LCY'){ 
                    airport_id = 5; 
                }else if(pick_value == 'SEN'){
                    airport_id = 6; 
                }
            }
            getPriceDetailOnBooking();
        });  

        $(document).on("focus", "#account_number", async function(){
            const accountList = @json($account_list); 
            let account_array = [];
            accountList.forEach((item, index) => { 
                account_array.push(item.account_number);
            });
            autocomplete(document.getElementById("account_number"), account_array);
        });

        $(document).on("blur", "#account_number", async function(e){
            const accountList = @json($account_list); 
            let account_value = $(this).val(); 
            console.log("account_value:- " + account_value);
            accountList.forEach((item, index) => { 
                if(item.account_number == account_value){  
                    $("#account_name_list").val(item.account_name);
                }
            }); 
            closeAllLists(e.target);
        }); 

        $(document).on("focus", "#account_name_list", async function(){
            const accountNameList = @json($account_list); 
            let account_name_array = [];
            accountNameList.forEach((item, index) => { 
                account_name_array.push(item.account_name);
            });
            autocomplete(document.getElementById("account_name_list"), account_name_array); 
        }); 

        // $(document).on("blur", "#account_name_list", async function(){
        //     const accountList = @json($account_list); 
        //     let account_value = $(this).val().toUpperCase();  
        //     accountList.forEach((item, index) => {
        //         if(item.account_name == account_value){ 
        //             $("#account_number").val(item.account_number);
        //         }
        //     });
        // }); 


        $(document).on("focus", "#car_category_name", async function(){
            const carCategoryList = @json($car_categories_list); 
            let car_category_array = [];
            carCategoryList.forEach((item, index) => {
                car_category_array.push(item.short_name);
            });
            autocomplete(document.getElementById("car_category_name"), car_category_array);
        }); 

        $(document).on("blur", "#car_category_name", async function(e){
            
            const carCategoryList = @json($car_categories_list); 
            let car_value = $(this).val();   
            carCategoryList.forEach((item, index) => { 
                if(item.short_name == car_value.toUpperCase()){ 
                    $("#car_full_name").val(item.name);
                }
            }); 
            closeAllLists(e);
        });     
    });
</script> 
@yield('javascript-section')
 </body>
</html>
