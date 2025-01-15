

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
    #job_Date{width: 128px;
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

tr:nth-child(even) {
  background-color: #dddddd;
}
 
  

</style> 




</div>
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
                        <form action="{{ route('admin.new_job.store') }}" method="POST" id="form_data" class="new_job_form"  autocomplete="off">
                            @csrf 
                            <div class="row gap-3 align-items-center account_row mt-1">
                                <div class="col-md-7 d-flex account_col align-items-end">
                                    <span style="margin-right:5px">Account</span>
                                    <div style="width:20%;" class="input_box  account_box autocomplete"> 
                                        <input type="text" id="account_number" name="account_number" placeholder="Number" autocomplete="nope"> 
                                    </div>  
                                    <div style="width:58%" class="input_box account_box ms-0 autocomplete">
                                        <input type="text" id="account_name_list" name="account_name_list" placeholder="Name" autocomplete="nope">
                                    </div>
                                    <!-- <input type="text" class="input_box" style="width:17%"
                                        name="account_display_name" id="account_display_name" disabled> -->
                                </div> 
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="d-flex align-items-center autocomplete" style="margin-left: 66px;">
                                            <span style="margin-right:5px">Car</span> 
                                                 <!-- <select name="car_category" id="car_category" class="car_categor" onchange="getPriceDetailOnBooking();" style="display:none;">
                                                    <option value=""></option>
                                                    @foreach ($car_categories_list as $car_category)
                                                    <option value="{{$car_category->id}}">{{$car_category->short_name}}</option>
                                                    @endforeach 
                                                </select> -->
                                        <input type="text" id="car_category_name" name="car_category_name" placeholder="Car Category" onchange="getPriceDetailOnBooking();" style="text-transform:uppercase" autocomplete="nope">
                                            <input type="text" placeholder="" class="input_box disabled_box" style="width:60%" id="car_full_name" name="car_full_name" disabled autocomplete="nope">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 d-flex align-items-end mt-1">
                                    <span style="margin-right:2px">Job Date</span>

                                    {{-- <input type="text" id="job_Date" name="job_date" placeholder="dd/mm/yyyy" 
                                        class="form-control job_Date"
                                        onchange="getDay('job_date', 'job_day'); getPriceDetailOnBooking();" style="width: 130px;"> --}}

                                            <!---end -->
                                        <input type="text" id="mydayInput" placeholder="mm/dd/yyyy" class="w-50 addon form-control job_Date">
                                        <!---end -->

                                    <input type="text" class="input_box disabled_input" id="job_day"
                                        style="width:50px; text-transform:uppercase;" disabled>
                                    <input type="hidden" class="input_box disabled_input" id="job_day_hidden"
                                        name="job_day">
                                </div>
                                <div class="col-md-5 d-flex align-items-center mt-1">
                                    <span style="width:60px;">Job Time</span>
                                    <!-- <input type="time" class="input_box disabled_box" style="width: 106px;" id="job_time" name="job_time"
                    onchange="getPriceDetailOnBooking();"> -->
                    
                                    {{-- <input type="text" class="input_box disabled_box"
                                        id="job_time" name="job_time" onchange="getPriceDetailOnBooking();"> --}}

                                        <!---add new-->
                                        <input type="text" id="timePicker" name="timePicker">
                                        <!---end new-->
                                </div>
                                </div>
                                <div class="row confirm_box">
                                    <div class="col-md-6 d-flex confirm_box">
                                        <span style="margin-right:5px">Contact</span>
                                        <div class="position-relative input_box">
                                            <input type="text" class="disabled_box input_box" style="width:100%; text-transform:uppercase;"
                                                name="contact_name" id="contact_name" autocomplete="nope" />
                                            <ul class="contact_suggestion" id="contact_suggestion"></ul>
                                            <input type="hidden" style="width:5%" id="client_id" name="client_id"
                                                class="disabled_box">
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex confirm_box">
                                        <span style="margin-right:5px">Client Tel</span>
                                        <input type="tel" class="disabled_box input_box" name="telphone_number"
                                            id="telephone_number" autocomplete="nope" style="text-transform:uppercase;"/> 
                                        <!-- <button class="profile_modal_btn"
                                            onclick="handleProfileModal(event,`profile_modal`, `telephone_number`)">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button> -->
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
                                        <!-- <button class="profile_modal_btn" type="button"
                                            onclick="handleProfileModal(event,`profile_modal`, 'passenger_phone')">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button> -->
                                    </div>
                                </div> 
                                <div class="row mt-2" id="job_history_section"> 
                                </div> 
                              
                                <div class="row mt-2" id="client_profile_section"> 
                                </div> 
                                <br><br>
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
                                                <select id="baby_seat_count" name="baby_seat_count"
                                                    onchange="addChldAgeList(); getPriceDetailOnBooking();">
                                                    <option value="" selected>0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <ul id="selectedOptions" class="selected-options ps-2 col-md-11 d-flex ListoofStyle justify-content-start line_height child-list" style="martin-bottom:0px !important;">     
                                        </ul>
                                        </div>
                                    <div class="row gap-2">
                                    <div class="col-md-2 d-flex my-1 mx-0 px-0">
                                        <input class="form-check-input" type="checkbox" checked name="email_acknowledge_flag" id="email_acknowledge_flag" value="1" >
                                            <span style="margin-right:5px">E-mail ack required?</span>
                                        </div>

                                        <div class="col-md-8 d-flex my-1">
                                            <span style="margin-right:5px">E-mail address</span>
                                            <input type="email" class="disabled_box input_box" id="email_address" name="email_address" autocomplete="nope" style="text-transform:uppercase;">
                                        </div> 
                                    </div>
                                    <div>
                                        <span></span>
                                        <div class="row">
                                            <div class="col-md-12 d-flex"> 
                                                <div class="form-group col-md-3">
                                                    <input type="text" name="pickup" id="pickup" placeholder="Pick-up" style="width: 100%; text-transform:uppercase">
                                                </div> 
                                                <div class="form-group col-md-9 autocomplete">  
                                                <input type="text" style="width: 100%;" name="pickup_detail" id="pickup_detail" onchange="getPriceDetailOnBooking();" style="text-transform:uppercase;">
                                                </div>  
                                            </div> 
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12 d-flex"> 
                                                <div class="form-group col-md-3">
                                                     <input type="text" name="drop" id="drop" placeholder="Drop" style="width: 100%; text-transform:uppercase;">
                                                </div> 
                                                <div class="form-group col-md-9 autocomplete d-flex"> 
                                                <input type="text" style="width: 95%;" name="drop_detail" id="drop_detail" onchange="getPriceDetailOnBooking();" style="text-transform:uppercase;">
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
                                             <input type="text" id="city_of_arrival" name="departure_city" placeholder="City of Departure" autocomplete="nope" style="width:100%; text-transform:uppercase;"> 
                                            </div>
                                            <div class="col"> 
                                            <!-- <input type="text" name="airport_terminal" id="airport_terminal" placeholder="Terminal"  autocomplete="nope" style="width:100%;"> -->
                                                <!-- <input type="hidden" name="terminal_hidden" id="terminal_hidden"> -->
                                                 <select name="airport_terminal" id="airport_terminal" style="width:100%;" placeholder="Terminal">
                                                    <option value="">Terminal</option>
                                                 </select>
                                            </div> 
                                            <div class="col d-flex" > 
                                                <input type="number" style="width:20%" name="entry_after" id="ntry_after" placeholder="Entry After" autocomplete="nope" style="width:100%;" value="40">
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
                                                    <span style="margin-right:5px">Additional Charges</span>
                                                    <input type="text" class="input_box" name="additional_charge" id="additional_charge" onkeyup="getPriceDetailOnBooking()">
                                                </div>
                                                <div>
                                                    <span style="margin-right:5px">Discount</span>
                                                    <input type="text" class="input_box" name="discount" id="discount" onkeyup="getPriceDetailOnBooking()">
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
                                    <a class="btn btn-block btn-default mt-1" id="clear_new_job_form">Clear</a>
                                        <button class="btn btn-primary mt-1" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!--  profile modal start -->
<div class="modal" id="profile_modal" style="z-index:9999">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content driver_modal_content">
            <div class="d-flex justify-content-between driver_modal_header">
                <span>Profile</span>
                <button type="button" class="d-flex justify-content-center btn-close"
                    onclick="handleProfileModal(event,`profile_modal`)">x</button>
            </div>
            <div class="table-responsive" id="client_profile_modal_div" style="width:100% !important;">
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                    </thead>
                    <tbody id="profile_body">
                        <tr>
                            <td id="name"></td>
                            <td id="email"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="loading" id="api_loader" style="display:none;">Loading&#8230;</div> 


<!--  profile modal end -->
<script>
    let get_account_with_acc_no_url = "{{ route('admin.new_job.get_acc_with_acc_no') }}";
    let get_car_category_url = "{{ route('admin.new_job.get_car_category') }}";
    let get_client_url = "{{ route('admin.new_job.get_client') }}";
    let get_terminal_list_url = "{{ route('admin.new_job.get_terminal_list') }}";
    let get_client_profile_with_phone_url = "{{ route('admin.new_job.get_client_profile_with_phone') }}";
</script>
<script data-cfasync="false" src="{{ url('public/assets/backend/js/email-decode.min.js') }}"></script>
<script src="{{ url('public/assets/backend/js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/8b7ad2abb9.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> -->


<script>
    $(document).ready(function() {
        $("#accordion-list").click(function() {
            $(".accordion-content").slideToggle("slow");
        });
    }); 
    .select2({
        placeholder: 'Select an option'
    }); 

//     $(document).on("click", "#clear_new_job_form", function(){ 
//     $("form")[0].reset();
// });
    
</script> 

<script>
    $(document).on("blur", "#contact_name", function(){
        let contact_name = $(this).val();
        $("#passenger_name").val(contact_name);
    })
    $(document).on("blur", "#telephone_number", function(){
        let telephone_number = $(this).val();
        $("#passenger_phone").val(telephone_number);
    })
 
  $('#new_job').on('shown.bs.modal', function () {
    //event.preventDefault()
    $('#account_number').focus();
    
  });
</script>

</script>
  <script>
    async function getPriceDetailOnBooking() {
        let airport_id = null;  
        let post_code = null;
        let airport = null; 
        const car_category = $("#car_category_name").val();
        const job_day = $("#job_day").val();
        const job_time = $("#job_time").val();
        let baby_seat_count = $("#baby_seat_count").val();
        // let additional_charge = ;
        // let discount = 0;
        // let net_price = 0; 
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
            }else if(drop_value.length > 4){ 
                post_code = drop_value; 
            }  
            if(post_code == null){
                post_code = $("#pickup").val(); 
            }  
            if(airport == null){
                let pick_value = $("#pickup").val().toUpperCase();  
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
            }
            const new_booking_price_url = "{{ route('frontend.get_price_on_new_booking') }}";
            let response = await fetch(`${new_booking_price_url}/?car_category=${car_category}
            &postcode=${post_code}&airport_id=${airport_id}&job_time=${job_time}&job_day=${job_day}&baby_seat_count=${baby_seat_count}`);
            let responseData = await response.json();
         
        if (responseData.status == 'success'){
            if(response.basic_price != 0){
                $("#basic_fare").val(responseData.basic_price); 
                if(responseData.congestion_charge != 0){
                $("#congestion_charge").val(responseData.congestion_charge);
                }else{
                    $("#congestion_charge").val(0);
                } 
                if(responseData.night_charge != 0){
                    $("#night_charge").val(responseData.night_charge);
                }else{
                    $("#night_charge").val(0); 
                } 
                if(responseData.total_price != 0){
                    $("#total_price").val(responseData.total_price);
                }else{
                    $("#total_price").val(0);
                } 
                if(responseData.baby_seat_cost != 0){
                    $("#booster_seat_charge").val(responseData.baby_seat_cost);
                } 
                let net_price = (Number(additional_charge) + Number(responseData.total_price) - Number(discount))
                $("#net_price").val(net_price);
            }else{
                $("#basic_fare").val(0); 
                $("#total_price").val(0); 
                $("#night_charge").val(0); 
                $("#congestion_charge").val(0);
                $("#booster_seat_charge").val(0); 
                $("#net_price").val(0); 
            } 
        } 
    }
</script>   

<script>
    async function handleProfileModal(e, id, field_id) {
        e.preventDefault();
        let phoneNumber = $(`#${field_id}`).val();
        let response = await fetch(get_client_profile_with_phone_url + "/?client_phone=" + phoneNumber)
        let responseData = await response.json();
        if (responseData.status == "success") {
            $("#name").html(`<p>${responseData.data.name}</p>`);
            $("#email").html(`<p>${responseData.data.email}</p>`);
        } else {
            $("#name").html(`<p>Profile Not Available</p>`);
            $("#email").html('');
        }
        const modal = document.getElementById(`${id}`);
        if (modal.style.display == "" || modal.style.display == "none") {
            modal.style.display = "block";
        } else {
            modal.style.display = "none";
        }
    }
</script>

<script>
    $(function() {
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false,
        })
    })
</script>

<script>
    $(document).on("keyup", "#telephone_number", async function() {
    
        let client_phone_number = $(this).val(); 
        let accordionSection = '';
        let history_table = '';
        let history_list = '';
        let profile_table = '';
        let client_profile = '';
        let get_client_history_url = "{{ route('frontend.get_history_with_client_number') }}";
        if(client_phone_number.length >= 10){
            console.log('test');
        let response = await fetch(`${get_client_history_url}/?phone=${client_phone_number}`);
        let responseData = await response.json(); 
        console.log(responseData);
        if (responseData.message == "history_found"){
            $("#client_id").val(responseData.client_id);
            responseData.history?.map((itm, index) => {
            history_list += `
            <tr class="history_options" id="${itm?.id}" onclick="setHistoryData(event, ${itm?.id})">
            <td>${itm?.get_client.name}</td>
            <td>${itm?.get_client.email}</td> 
            <td>${itm?.journey_type_id == 1 ? itm?.postcode : itm?.get_airport.display_name}</td>
            <td>${itm?.journey_type_id == 1 ? itm?.address : itm?.get_airport.airport_name}</td>
            <td>${itm?.journey_type_id == 1 ?  itm?.get_airport.display_name:itm?.postcode }</td>
            <td>${itm?.journey_type_id == 1 ?  itm?.get_airport.airport_name:itm?.address }</td>
            <td> ${itm?.passenger_name}</td>
            <td> ${itm?.passenger_phone}</td>
            </tr>`;
            }); 
            
            client_profile += `
            <tr class="history_options" id="" onclick="">
            <td>${responseData.client_profile.name}</td>
            <td>${responseData.client_profile.email}</td>
            <td>${responseData.client_profile.phone}</td> 
            </tr>`;
            history_table = `<table>
                                <tr>
                                    <th>Contact  </th>
                                    <th>Email</th>
                                    <th>Pick  </th>
                                    <th>Pickup-Address</th>
                                    <th>Drop  </th>
                                    <th>Drop-Address </th>
                                    <th>P_Name</th>
                                    <th>P_Tel</th>
                                </tr>
                                ${history_list}
                                </table>`;
            profile_table = `<table>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th> 
                                </tr>
                                ${client_profile}
                                </table>`; 
                                $("#job_history_section").html(history_table); 
                                $("#client_profile_section").html(profile_table);
        }else if(responseData.message == 'client_found'){
            console.log('found');
            client_profile += `
            <tr class="history_options" id="" onclick="">
            <td>${responseData.client_profile.name}</td>
            <td>${responseData.client_profile.email}</td>
            <td>${responseData.client_profile.phone}</td> 
            </tr>`;
            profile_table = 
            `<table>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th> 
            </tr>
            ${client_profile}
            </table>`; 
            
            $("#client_profile_section").html(profile_table);
            $("#job_history_section").html(''); 
            //$("#job_history_section").preventDefault()
        }
        else{
            $("#client_profile_section").html('');
            $("#job_history_section").html(''); 
            $('#client_id').val(''); 
        }
    }else{
        $("#job_history_section").html('');
        $("#client_profile_section").html('');
    }
        flag = 1; 
    });
</script>





<script>
    // const historyAccordion = document.getElementById("new_job_accordion_history");
    // let accordionData = "";
    // let accordionSection = '';
    // let flag = 0;
    // const historyDetails = document.getElementById("list");
    // let get_new_job_url = "{{ route('get_new_job') }}";
    // let update_job_url = "{{ route('update_new_job') }}";
    // var id = null;
    // setInterval(async () => {
    //     const apiResponse = await fetch(get_new_job_url);
    //     const data = await apiResponse.json();
    //     const historyDataArray = data?.history?.data;
    //     if (data?.data && flag == 0) {
    //         $("#contact_name").val(data?.data?.name);
    //         $("#telephone_number").val(data?.data?.phone);
    //         $("#email_address").val(data?.data?.email);
    //         if (data.history.data.length > 0 && historyDataArray != null) {
    //             let accordinaItem = '';
    //             // console.log("history", historyDataArray)
    //             historyDataArray?.map((itm, index) => {

    //                 accordinaItem += `
    //         <tr class="history_options" id="${itm?.id}" onclick="setHistoryData(event, ${itm?.id})">
    //               <td>${itm?.job_number}</td>
    //               <td>${itm?.job_date}</td>
    //               <td>${itm?.get_account?.account_number}</td>
    //               <td>${itm?.get_account?.contact_name}</td>
    //               <td>${itm?.passenger_name}</td>
    //               <td> ${itm?.get_airport?.display_name}- ${itm?.address}</td>
    //           </tr>`;

    //                 // else {
    //                 //   accordinaItem += `<a href="#" class="col-md-12 history_options d-flex justify-content-center gap-3" ID=${itm?.id} onclick="setHistoryData(event,${itm?.id})"> ${itm?.address}-${itm?.get_airport?.display_name} </a>`;
    //                 // }
    //             });
    //             accordionSection = `<div class="accordion accordion-flush" id="accordionFlushExample">
    //                           <div class="accordion-item">
    //                             <h2 class="accordion-header" id="flush-headingOne">
    //                               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">History</button>
    //                               </h2>
    //                               <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
    //                                 <div class="accordion-body">
    //                                   <div class="row history_details">
    //                                   <div class="table-responsive"  style="width:100% !important;overflow-y:hidden !important">
    //           <table class="history_table" style="width:100%" id="history_table">
    //             <thead><th>Job No.</th><th>Job Date</th><th>A/C</th><th>Contact</th><th>Passenger</th><th>Pickup</th></thead>
    //             <tbody>
    //              ${accordinaItem}
    //             </tbody>
    //         </table>
    //       </div>
                                     
    //                                   </div>
    //                                 </div>
    //                               </div>
    //                             </div>  
    //                         </div>`;
    //         } else {
    //             accordionSection = `<span>No history found</span>`;
    //         }
    //         flag = 1;
    //         $("#new_job_accordion_history").html(accordionSection);
    //         id = data?.data?.id;
    //         $("#new_job").modal({
    //             backdrop: 'static',
    //             keyboard: false
    //         }).modal('show');
    //     }
    // }, 3000);
    async function handleJobModal(e) {
        e.preventDefault();
        const apiResponse = await fetch(update_job_url + "/?id=" + id);
        const data = await apiResponse.json();
        flag = 0;
    }

    async function setHistoryData(e, id) {
        const get_history_url = "{{ route('get_job_detail') }}";
        const response = await fetch(get_history_url + "/?id=" + id);
        const data = await response.json(); 
        let terminal_response = await fetch(get_terminal_list_url + "/?airport_id=" + data?.job?.airport_id)
        let terminal_responseData = await terminal_response.json();
        console.log(data);
        // let append_html = '<option value="">Select Terminal</option>';
        // terminal_responseData.data.forEach(function(item) {
        //     append_html +=
        //         `<option value="${item.pickup_point}" data-id="${item.id}" ${item.id == data?.job?.airport_pickup_location_id ? 'selected' : ''}>${item.pickup_point}</option>`;
        // });
        // $("#terminal").html(append_html);
        $("#account_number").val(data?.job?.get_account.account_number);
        $("#account_name_list").val(data?.job?.get_account.account_name);
        $("#job_Date").val(data?.job?.job_date);
        $("#job_day").val(data?.job?.job_day);
        $("#job_day_hidden").val(data?.job?.job_day);
        $("#job_time").val(data?.job?.job_time);
        // $("#ref").val(data?.job?.ref);
        // $("#ref2").val(data?.job?.ref2);
        $("#passenger_name").val(data?.job?.passenger_name);
        $("#passenger_phone").val(data?.job?.passenger_phone);
        $("#email_address").val(data?.job?.email);
        // $("#passenger_count").val(data?.job?.passenger_count);
        // $("#checkin_luggage_count").val(data?.job?.checkin_luggage_count);
        // $("#hand_luggage_count").val(data?.job?.hand_luggage_count);
        // $("#flight_number").val(data?.job?.flight_number);
        // $("#arrival_city").val(data?.job?.arrival_city);
        // $("#car_park").val(data?.job?.car_park);
        // $("#summary").val('NOTES: ' + data?.job?.notes + ', ' + data?.job?.flight_number + ', ' + data?.job
        //     ?.arrival_city + ', ' + 'CAR PARK: ' + data?.job?.car_park + (data?.job?.additional_seat != null ?
        //         ', ' + data?.job?.additional_seat : '') + (data?.job?.comment != null ? ', ' + data?.job
        //         ?.comment : ''));
        // if (data?.job?.job_type == 2) {
        //     $("#journey_start").val('P/UP');
        //     $("#journey_END").val('DROP');
        // } else {
        //     $("#journey_start").val('DROP');
        //     $("#journey_end").val('P/UP');
        // }
        // $('#journey_start_details').val(data?.job?.airport_id);
        // $('#journey_end_details').val(data?.job?.address);
        // $('#notes').val(data?.job?.notes);
        // $('#flight_no').val(data?.job?.flight_number);
        // $('#city_of_arrival').val(data?.job?.arrival_city);
        // $('#distance').val(data?.job?.distance);
        // $('#price').val(data?.job?.total_price);
        // $('#total_price').val(data?.job?.total_price);
        // $('#job_number').val(data?.job?.job_number);
        // $('#account_suggestion').val(data?.job?.account_id).trigger('change');
        // $('#account_name_suggestion').val(data?.job?.account_id).trigger('change');
        // $('#account_name_suggestion').val(data?.job?.account_id).trigger('change');
        // $('#account_display_name').val(data?.job?.get_account?.display_name);
        // $('#car_category').val(data?.job?.car_category_id).trigger('change');
        // $('#additional_seat').val(data?.job?.additional_seat);
        // $('#comment').val(data?.job?.summary);
        // $('#journey_type_id').val(data?.job?.journey_type_id);
        $('#client_id').val(data?.job?.client_id);
        // $('#airport_terminal').val(data?.job?.airport_terminal);
    }
</script>

<script>
    $(document).ready(function() {
        $('#job_Date').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true
        }).on('changeDate', function(e) {
            getDay('job_Date', 'job_day');
        });
    });

    function getDayName(date) {
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const dayIndex = date.getDay();
        return days[dayIndex];
    }

    function getDay(id1, id2) {
        const dateBox = document.getElementById(id1);
        const dayBox = document.getElementById(id2);
        const selectedDate = new Date(dateBox.value.split('/').reverse().join('/'));
        if (!isNaN(selectedDate.getTime())) {
            const dayName = getDayName(selectedDate);
            dayBox.value = dayName;
        } else {
            dayBox.value = '';
        }
    }
</script>

<script>
    function getTimeIn24HourFormat() {
        const timeInput = document.getElementById('job_time');
        const timeValue = timeInput.value;
        if (timeValue) {
            const [hours, minutes] = timeValue.split(':').map(Number);
            const date = new Date();
            date.setHours(hours, minutes);
            const formattedTime = date.toTimeString().split(' ')[0].substring(0, 5);
            return formattedTime;
        } else {
            return '';
        }
    }
    document.getElementById('job_time').addEventListener('change', function() {
        const formattedTime = getTimeIn24HourFormat();
    });
</script>

<script>
    flatpickr("#job_time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });
</script>

<script>
    function addChldAgeList() {
        const selectedValue = document.getElementById("baby_seat_count").value;
        const selectedOptions = document.getElementById('selectedOptions');
        selectedOptions.innerHTML = '';
        const numberOfInputs = parseInt(selectedValue, 10);
        const ordinalNumbers = ["First", "Second", "Third"];
        if (numberOfInputs > 0) {
            for (let i = 1; i <= numberOfInputs; i++) {
                const li = document.createElement('li');
                li.id = `li-${i}`;
                li.innerHTML =
                    `${ordinalNumbers[i - 1]} Age: <input type="text" style="width:25px; margin-left:3px;" name="child_age[]" id="child${i}" min="0" max="9" oninput="this.value = this.value.slice(0, 1);"/><p class="baby-booster-alert" id="child${i}_age_error"></p>`;
                li.style.fontSize = '12px';
                li.style.fontSize = '12px';
                li.className = 'margin-start-5px, d-flex';
                selectedOptions.appendChild(li);
            }
        }
    }
</script>
 
<script> 
    document.addEventListener("DOMContentLoaded", function() {
    $(document).on("click", "#switch_journey", function(){ 
    let pickupValue = $("#pickup").val();
    let dropValue = $("#drop").val();
    let pickupDetailValue = $("#pickup_detail").val();
    let dropDetailValue = $("#drop_detail").val();
     
    $("#pickup").val(dropValue);
    $("#drop").val(pickupValue);
    $("#pickup_detail").val(dropDetailValue);
    $("#drop_detail").val(pickupDetailValue); 
    })

        function setTerminal(airport_id){
            let append_terminal_list = '<option value="">--Select Terminal--</option>';
            let airport_terminal_list = [];  
                if (airport_id == 1) {
                    airport_terminal_list.push('Terminal 1', 'Terminal 2', 'Terminal 3', 'Terminal 4', 'Terminal 5');
                } else if (airport_id == 2) {
                    airport_terminal_list.push('North Terminal', 'South Terminal');
                } else if (airport_id == 3 || airport_id == 4 || airport_id == 5 || airport_id == 6) {
                    airport_terminal_list.push('Terminal 1');
                } 
                if (airport_terminal_list.length > 0) {
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
            
        
            function autocomplete(input, suggestions) {
            let currentFocus;  

            input.addEventListener("keydown", function(e) {
                let x = document.getElementsByClassName("autocomplete-items");
                if (x)
                 x = x[0].getElementsByTagName("div");
                if (e.keyCode == 40) {
                    currentFocus++;
                    addActive(x);
                } else if (e.keyCode == 38) {
                    currentFocus--;
                    addActive(x);
                } else if (e.keyCode == 13) {
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
            //     let x = document.getElementsByClassName("autocomplete-items");
            //     for (let i = 0; i < x.length; i++) {
            //         if (elmnt != x[i] && elmnt != input) {
            //             x[i].parentNode.removeChild(x[i]);
            //         }
            //     }
            // } 
           

            function handleInput() {
                let listContainer, listItem, i, val = this.value;
                closeAllLists(); 
                // if (!val) return false;
                currentFocus = -1;
                listContainer = document.createElement("DIV");
                listContainer.setAttribute("class", "autocomplete-items");
                this.parentNode.appendChild(listContainer); 
                //check if val length is 0 then add all elements in suggestion to listContainer

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
            input.addEventListener("keydown", handleInput);

            document.addEventListener("click", function(e) { 
                closeAllLists(e.target);
            });  
        }

        

        // $(document).on("focus", "#pickup_detail", function(){

        // });

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
            }
            if(pick_value.length > 4){  
                $("#api_loader").show();
                let response = await fetch(`${url}/?req_value=${pick_value}`);
                let responseData = await response.json(); 
                console.log(responseData);
                responseData.data.forEach(element => { 
                pick_array.push(element.toUpperCase());
                });  
                autocomplete(document.getElementById("pickup_detail"), pick_array);  
                $("#api_loader").hide();
            }
        });
    
        $(document).on("click", "#drop", async function(){
            $("#drop_detail").val('');
        }); 

       
        
        $(document).on("blur", "#drop", async function(){
            let drop_array = [];
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
            }else if(drop_value.length > 4){
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

        $(document).on("blur", "#account_name_list", async function(){
            const accountList = @json($account_list); 
            let account_value = $(this).val().toUpperCase();  
            accountList.forEach((item, index) => {
                if(item.account_name == account_value){ 
                    $("#account_number").val(item.account_number);
                }
            });
            
        });

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
            let car_value = $(this).val().toUpperCase(); 
            carCategoryList.forEach((item, index) => {
                if(item.short_name == car_value){ 
                    $("#car_full_name").val(item.name);
                }
            }); 
            closeAllLists(e);
            
        });     
});
</script>

<!---------------------add a new ------>

<script>
    $(document).ready(function () {
      let selectedDate;


      $('#mydayInput').datepicker({
        dateFormat: 'dd-mm-yy',
        defaultDate: new Date(),
        minDate: 0,
      });


      $('#mydayInput').on('click', function () {
        $(this).datepicker('show');
      });


      $('#mydayInput').on('input', function () {
        let day = parseInt($(this).val());
        let today = new Date();

        if (!isNaN(day) && day > 0 && day <= 31) {
          if (day >= today.getDate()) {
            selectedDate = new Date(today.getFullYear(), today.getMonth(), day);
          } else {
            selectedDate = new Date(today.getFullYear(), today.getMonth() + 1, day);
          }

          if (selectedDate < today) {
            selectedDate = null;
            //alert('Please enter a valid day that is not in the past.');
            $(this).val('');
          }
        } else {
          if ($(this).val()) {
           // alert('Please enter a valid day between 1 and 31.');
            $(this).val('');
          }
        }
      });

      $('#mydayInput').on('keydown', function (e) {
        if (e.key === 'Enter') {
          if (selectedDate) {
            $(this).datepicker('setDate', selectedDate);
            $(this).val($.datepicker.formatDate('dd-mm-yy', selectedDate));
          }
          $(this).datepicker('hide');
          e.preventDefault();
        }
      });
    });
  </script>
  
  <script>
    $(document).ready(function () {
      $('#timePicker').timepicker({
        timeFormat: 'h:i a',           
        interval: 30,                 
        minTime: '12:00 AM',         
        maxTime: '11:30 PM',          
        defaultTime: '09:00 AM',     
        startTime: '12:00 AM',      
        dynamic: false,             
        dropdown: true,               
        scrollbar: true,             
        step: 30                  
      });
    });
  </script>
<!---------------------end a new ------>


@yield('javascript-section') </body>
</html>
