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
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }

    .autocomplete-items div:hover {
        background-color: #e9e9e9;
    }

    .autocomplete-active {
        background-color: #1e90ff !important;
        color: #ffffff;
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
                        <form action="{{ route('admin.new_job.store') }}" method="POST" id="form_data"
                            class="new_job_form">
                            @csrf
                            <div id="new_job_accordion_history"></div> 
                            <div class="row gap-3 align-items-center account_row mt-1">
                                <div class="col-md-7 d-flex account_col">
                                    <span style="margin-right:5px">Acc</span>
                                    <div style="width:20%;" class="input_box  account_box">
                                        <select class="account_suggestion input_box" name="account_id"
                                            id="account_suggestion">
                                            <option value=""></option>
                                            @if (count($account_list) > 0)
                                                @foreach ($account_list as $account)
                                                    <option value="{{ $account->id }}">{{ $account->account_number }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>

                                    </div>


                                    <div style="width:70%" class="input_box account_box ms-0">
                                        <select class="account_name_suggestion input_box w-100" name="account_id"
                                            id="account_name_suggestion">
                                            <option value="">
                                                <p><span>***</span> No Account selected <sub>***</sub></p>
                                            </option>
                                            @if (count($account_list) > 0)
                                                @foreach ($account_list as $account)
                                                    <option value="{{ $account->id }}">{{ $account->account_name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <input type="text" class="input_box" style="width:20%"
                                        name="account_display_name" id="account_display_name" disabled>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="d-flex align-items-center">
                                            <span style="margin-right:5px">Car</span>
                                            <div>
                                                {{-- <input type="text" id="car_category_autosuggest" class="input_box car_category disabled_box" placeholder="Select Car Category" style="width:100%;" onchange="getCars();"> --}}
                                                <select name="car_category" id="car_category" class="car_categor" onchange="getPriceDetailOnBooking();" style="display:none;">
                                                    <option value=""></option>
                                                    @foreach ($car_categories_list as $car_category)
                                                    <option value="{{$car_category->id}}">{{$car_category->short_name}}</option>
                                                    @endforeach 
                                                </select>
                                                {{-- <div class="getcars" style="width:300px;" onchange="getPriceDetailOnBooking();">
                                                    <input id="myInput" type="text" name="myCountry" placeholder="Country">
                                                </div> --}}
                                            </div>
                                            <input type="text" placeholder="" class="input_box disabled_box" style="width:60%" id="car_category_name" name="car_category_name" disabled>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex">
                                    <span style="margin-right:5px">Job Date</span>
                                    <input type="text" id="job_Date" name="job_date" placeholder="dd/mm/yyyy"
                                        class="form-control job_Date"
                                        onchange="getDay('job_date', 'job_day'); getPriceDetailOnBooking();" style="width: 130px;">
                                    <input type="text" class="input_box disabled_input" id="job_day"
                                        style="width:50px" disabled>
                                    <input type="hidden" class="input_box disabled_input" id="job_day_hidden"
                                        name="job_day">
                                </div>
                                <div class="col-md-5 d-flex">
                                    <span style="width:60px;">Job Time</span>
                                    <!-- <input type="time" class="input_box disabled_box" style="width: 106px;" id="job_time" name="job_time"
                    onchange="getPriceDetailOnBooking();"> -->
                                    <input type="time" class="input_box disabled_box" style="width: 106px;"
                                        id="job_time" name="job_time" onchange="getPriceDetailOnBooking();">
                                </div>
                                <div class="row confirm_box">
                                    <div class="col-md-6 d-flex confirm_box">
                                        <span style="margin-right:5px">Contact</span>
                                        <div class="position-relative input_box">
                                            <input type="text" class="disabled_box input_box" style="width:100%;"
                                                name="contact_name" id="contact_name" autocomplete="nope" />
                                            <ul class="contact_suggestion" id="contact_suggestion"></ul>
                                            <input type="hidden" style="width:5%" id="client_id" name="client_id"
                                                class="disabled_box">
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex confirm_box">
                                        <span style="margin-right:5px">Client Tel</span>
                                        <input type="tel" class="disabled_box input_box" name="telphone_number"
                                            id="telephone_number" autocomplete="nope" />
                                        <button class="profile_modal_btn"
                                            onclick="handleProfileModal(event,`profile_modal`, `telephone_number`)"><i
                                                class="fa fa-eye" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <div class="row confirm_box">
                                    <div class="col-md-6 d-flex confirm_box">
                                        <span style="margin-right:5px">Ref</span>
                                        <input type="text" class="disabled_box input_box" id="rel"
                                            name="ref" id="ref" autocomplete="nope" />
                                    </div>
                                    <div class="col-md-6 d-flex confirm_box">
                                        <span style="margin-right:5px">Ref2</span>
                                        <input type="text" class="disabled_box input_box" name="ref2"
                                            id="ref2" autocomplete="nope" />
                                        <p style="width: 20.95px;"></p>
                                    </div>
                                </div>
                                <div class="row confirm_box">
                                    <div class="col-md-6 d-flex confirm_box">
                                        <span style="margin-right:5px">Passenger</span>
                                        <input type="text" class="disabled_box input_box" id="passenger_name"
                                            name="passenger_name" autocomplete="nope" />
                                    </div>
                                    <div class="col-md-6 d-flex confirm_box">
                                        <span style="margin-right:5px">Passenger Tel</span>
                                        <input type="tel" class="disabled_box input_box" id="passenger_phone"
                                            name="passenger_phone" autocomplete="nope" />
                                        <button class="profile_modal_btn" type="button"
                                            onclick="handleProfileModal(event,`profile_modal`, 'passenger_phone')"><i
                                                class="fa fa-eye" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row" style="margin-top:1px !important">
                                    <div class="col-md-2 d-flex">
                                        <span style="width:fit-content; margin-right:5px">Passengers</span>
                                        <input type="number" class="input_box disabled_box" style="width:20%"
                                            id="passenger_count" name="passenger_count" min="1">
                                    </div>
                                    <div class="col-md-2 d-flex">
                                        <span style="width:fit-content;margin-right:5px">Check-in Luggage</span>
                                        <input type="number" class="input_box disabled_box" style="width:20%"
                                            id="checkin_luggage_count" name="checkin_luggage_count" min="1">
                                    </div>
                                    <div class="col-md-2 d-flex">
                                        <span style="width:fit-content;margin-right:5px">Hand Luggage</span>
                                        <input type="number" name="hand_luggage_count" id="hand_luggage_count"
                                            style="width:20%" min="1">
                                    </div>
                                    <div class="col-md-2 d-flex">
                                            <span style="margin-right:5px">Baby/Booster Seat</span>
                                            <div class="d-flex">
                                                <select id="Select_child_list" name="booster_seat_count"
                                                    onchange="addChldAgeList()">
                                                    <option value="0" class="col-md-2" selected="selected">0
                                                    </option>
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
                                            <input type="email" class="disabled_box input_box" id="email_address" name="email_address" autocomplete="nope">
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
                                                <input type="text" style="width: 100%;" name="pickup_detail" id="pickup_detail">
                                                    <!-- <select class="select2" data-placeholder="Pickup" style="width: 100%;" name="pickup_detail" id="pickup_detail"> </select> -->
                                                </div> 
                                  
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 d-flex"> 
                                                <div class="form-group col-md-3">
                                                     <input type="text" name="drop" id="drop" placeholder="Drop" style="width: 100%; text-transform:uppercase;">
                                                </div> 
                                                <div class="form-group col-md-9">
                                                    <select class="journey_start_details disabled_box form-control select2" data-placeholder="Pickup" style="width: 100%;" name="drop_detail" id="drop_detail"> 
                                                      
                                                    </select>
                                                </div>
                                                
                                            </div> 
                                        </div>
                                        <div class="row">  
                                        <div class="col-md-3"> 
                                            <select name="notes" id="notes" class="journey_end disabled_box" style="width:100%;">
                                                <option value="">Notes</option>
                                                <option value="SEE JOBS">SEE JOBS</option>
                                                <option value="URGENT">URGENT</option>
                                            </select>
                                            </div> 
                                            <div class="col-md-3"> 
                                            <input type="text" name="airport_terminal" id="airport_terminal" placeholder="Terminal"  autocomplete="nope" style="width:100%;">
                                                <input type="hidden" name="terminal_hidden" id="terminal_hidden">
                                            </div> 
                                            <div class="col-md-3">  
                                            <input type="text" name="flight_number" id="flight_no" placeholder="Flight no." autocomplete="nope" style="width:100%;">
                                             </div>
                                            <div class="col-md-3"> 
                                             <input type="text" id="city_of_arrival" name="departure_city" placeholder="City of Departure" autocomplete="nope" style="width:100%;"> 
                                            </div>
                                        </div>       
                                        <div style="width:100%;display:flex" class="mt-0">
                                            <input type="text" placeholder="" name="comment" id="comment"
                                                class="w-100" autocomplete="nope">
                                        </div>
                                        <br> 
                                        <div class="confirm_box mt-1">
                                            <div class="row">
                                            <div class="d-flex col-md-2">
                                                    <span style="margin-right:5px">Base Fare</span>
                                                    <input type="text" name="congestion_charge" id="congestion_charge" class="input_box" style="width:50px" autocomplete="nope">
                                                </div>
                                                <div class="d-flex col-md-2">
                                                    <span style="margin-right:5px">Congestion Charge</span>
                                                    <input type="text" name="total_additional_charge" id="total_additional_charge" class="input_box" style="width:50px" autocomplete="nope">
                                                </div>  
                                                <div class="d-flex col-md-2">
                                                    <span style="margin-right:5px">Night Charge</span>
                                                    <input type="text" name="night_charge" id="night_charge" class="input_box" style="width:50px" autocomplete="nope">
                                                </div>
                                                <div class="d-flex justify-content-end col-md-2">
                                                    <span style="margin-right:5px">Booster Seat Charge</span>
                                                    <input type="text" name="price" id="price" class="input_box" style="width:50px" autocomplete="nope">
                                                </div>
                                                <div class="d-flex col-md-4 justify-content-end">
                                                    <span style="margin-right:5px">Total Price</span>
                                                    <input type="text" class="input_box" name="total_price" id="total_price" style="width:100px;" readonly>
                                                </div>
                                            </div> 
                                            <div class="row"> 
                                                <div class="d-flex col-md-12 justify-content-end">
                                                    <span style="margin-right:5px">Additional Charges</span>
                                                    <input type="text" class="input_box" name="total_price" id="total_price" style="width:100px;" readonly>
                                                </div>
                                                <div class="d-flex col-md-12 justify-content-end">
                                                    <span style="margin-right:5px">Discount</span>
                                                    <input type="text" class="input_box" name="total_price" id="total_price" style="width:100px;" readonly>
                                                </div>
                                                <div class="d-flex col-md-12 justify-content-end">
                                                    <span style="margin-right:5px">Net Price</span>
                                                    <input type="text" class="input_box" name="total_price" id="total_price" style="width:100px;" readonly>
                                                </div>
                                            </div> 
                                            </div>
                                             
                                        </div>
                                    </div><br>
                                    <div style="text-Align:right">
                                        <button class="btn btn-primary save_btn submit_btn"
                                            type="submit">Save</button>
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
    // var airport_id_final = null;
    $(document).ready(function() {
        $("#accordion-list").click(function() {
            $(".accordion-content").slideToggle("slow");
        });
    });

   .select2({
  placeholder: 'Select an option'
}); 
</script> 




<!----new script------>
<script>
const apiUrl = 'http://localhost/justairports/jims/new-job/get-postcode-airport-list';
const input = document.getElementById('dropdown-input');
const list = document.getElementById('dropdown-list');
let items = [];
let selectedIndex = -1;

async function fetchData() {
     
  try {
    const response = await fetch(apiUrl);
    const data = await response.json();
    
     console.log(data);
     
    if (data && Array.isArray(data.data)) {
      items = data.data;  
    } else {
      console.error('Expected an object with a "data" array but got:', data);
    }
  } catch (error) {
    console.error('Fetch error:', error);
  }
}

function filterAndDisplay() {
  const query = input.value.toLowerCase();
  list.innerHTML = '';
  selectedIndex = -1;

  if (query) {
    if (Array.isArray(items)) {
       const filteredItems = items.filter(item => item.toLowerCase().includes(query));
      
      filteredItems.forEach((item, index) => {
        const div = document.createElement('div');
        div.className = 'dropdown-item';
        div.textContent = item;
        div.onclick = () => selectItem(index);
        list.appendChild(div);
      });
    } else {
      console.error('Items is not an array:', items);
    }
  }

  list.style.display = list.innerHTML ? 'block' : 'none';
}

function selectItem(index) {
  if (index >= 0 && index < items.length) {
    input.value = items[index];
    list.style.display = 'none';
    input.focus();
  }
}

function handleKeydown(event) {
  const itemsList = Array.from(list.children);

  switch (event.key) {
    case 'ArrowDown':
      selectedIndex = (selectedIndex + 1) % itemsList.length;
      break;
    case 'ArrowUp':
      selectedIndex = (selectedIndex - 1 + itemsList.length) % itemsList.length;
      break;
    case 'Enter':
        if (selectedIndex >= 0 && selectedIndex < itemsList.length) {
        selectItem(items.indexOf(itemsList[selectedIndex].textContent)); 
      }
      break;
    case 'Escape':
      list.style.display = 'none';
      return;
  }

  itemsList.forEach((item, index) => item.classList.toggle('selected', index === selectedIndex));
  if (selectedIndex >= 0 && selectedIndex < itemsList.length) {
    itemsList[selectedIndex].scrollIntoView({ block: 'nearest' });
  }
}

input.addEventListener('input', filterAndDisplay);
input.addEventListener('keydown', handleKeydown);
document.addEventListener('click', (event) => {
  if (!list.contains(event.target) && event.target !== input) list.style.display = 'none';
});

//fetchData();
  </script>
<!----new script------>


<!-- Auto search--js -->
<!-- <script>
    const input = document.querySelector('#journey_end_details');
    const suggestions = document.querySelector('.select-dropdown');
    const googleMapsSearch = document.querySelector('#google_maps_search');

    async function locationlist(postcode) {
        let get_address_api_url = "{{ route('admin.get_postcode_airports_list') }}";
        try { 
            let response = await fetch(`${get_address_api_url}?req_value=${postcode}`);
            let responseData = await response.json();
            console.log('API Response:', responseData);

            if (responseData.status === 'success' && responseData.address_list && responseData.address_list.length >
                0) {
                return responseData.address_list;
            } else {
                console.warn(`No addresses found for postcode: ${postcode}`);
                return [];
            }
        } catch (error) {
            console.error("Error fetching location list:", error);
            return [];
        }
    }

    function searchHandler(e) {
        const inputVal = e.currentTarget.value.trim().toUpperCase().replace(/\s+/g, '');  
        console.log(`Input value: ${inputVal}`);  
        if (inputVal.length > 0) {
            locationlist(inputVal).then(results => {
                console.log('Results:', results); 
                showSuggestions(results, inputVal);
            });
        } else {
            suggestions.innerHTML = '';
            suggestions.classList.remove('has-suggestions');
        }
    }

    function showSuggestions(results, inputVal) {
        suggestions.innerHTML = '';
        if (results.length > 0) {
            results.forEach(item => {
                const address = item.address.toUpperCase().replace(/\s+/g, '');  
                const postcode = inputVal;

                console.log(`Checking address: ${address} against postcode: ${postcode}`);   
                if (address.includes(postcode)) {
                    const highlighted = item.address.replace(new RegExp(postcode, 'i'),
                        `<strong>${postcode}</strong>`);
                    suggestions.innerHTML +=
                        `<li data-address="${item.address}" data-postcode="${postcode}">${highlighted}</li>`;
                } else {
                    console.log(`No match for: ${postcode} in ${item.address}`);  
                }
            });
            suggestions.classList.add('has-suggestions');
        } else {
            suggestions.innerHTML = '<li>No suggestions available</li>';
            suggestions.classList.add('has-suggestions');
        }
    } 
    function useSuggestion(e) {
        const selectedAddress = e.target.getAttribute('data-address');
        const selectedPostcode = e.target.getAttribute('data-postcode');
        input.value = selectedPostcode;
        input.focus();
        googleMapsSearch.value = selectedAddress.replace(selectedPostcode, '').trim();
        suggestions.innerHTML = '';
        suggestions.classList.remove('has-suggestions');
    }

    input.addEventListener('keyup', searchHandler);
    suggestions.addEventListener('click', useSuggestion);
</script> -->




<script>
    async function getPriceDetailOnBooking() {
        // const new_booking_price_url = "{{ route('frontend.get_price_on_new_booking') }}";
        // const car_category = $("#car_category").val();
        // const postcode = $("#journey_end_details").val();
        // const airport_id = $("#journey_start_details").val();
        // const job_time = $("#job_time").val();
        // const job_day = $("#job_day").val();

        // let response = await fetch(`${new_booking_price_url}/?car_category=${car_category}&postcode=${postcode}&airport_id=${airport_id}&job_time=${job_time}&job_day=${job_day}`);
        // let responseData = await response.json();
        // console.log(responseData);
        // if (responseData.status == 'success') {
        //     $("#night_charge").val(responseData.night_charge);
        //     $("#congestion_charge").val(responseData.congestion_charge);
        //     if (responseData.basic_price != 0) {
        //         $("#price").val(responseData.basic_price);
        //     } else {
        //         $("#price").val(responseData.basic_price);
        //     } 
        //     $("#total_price").val(responseData.total_price);
        // } 
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
        let accordinaItem = '';
        let get_client_history_url = "{{ route('frontend.get_history_with_client_number') }}"
        let response = await fetch(`${get_client_history_url}/?phone=${client_phone_number}`);
        let responseData = await response.json();
        if (responseData.message == "history_found") {
            responseData.history?.map((itm, index) => {
                accordinaItem += `
        <tr class="history_options" id="${itm?.id}" onclick="setHistoryData(event, ${itm?.id})">
              <td>${itm?.job_number}</td>
              <td>${itm?.job_date}</td>
              <td>${itm?.get_account?.account_number}</td>
              <td>${itm?.get_account?.contact_name}</td>
              <td>${itm?.passenger_name}</td>
              <td> ${itm?.get_airport?.display_name}- ${itm?.address}</td>
          </tr>`;
            });
            accordionSection = `<div class="accordion accordion-flush" id="accordionFlushExample">
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">History</button></h2>
                                  <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                      <div class="row history_details">
                                      <div class="table-responsive"  style="width:100% !important;overflow-y:hidden !important">
                                        <table class="history_table" style="width:100%" id="history_table">
                                          <thead><th>Job No.</th><th>Job Date</th><th>A/C</th><th>Contact</th><th>Passenger</th><th>Pickup</th></thead>
                                          <tbody>
                                            ${accordinaItem}
                                          </tbody>
                                      </table>
                                    </div> 
                                  </div>
                                </div>
                              </div>
                            </div>  
                          </div>`;
        } else {
            $('#client_id').val('');
            accordionSection = `<span>No history found</span>`;
        }
        flag = 1;
        $("#new_job_accordion_history").html(accordionSection);

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

        let append_html = '<option value="">Select Terminal</option>';
        terminal_responseData.data.forEach(function(item) {
            append_html +=
                `<option value="${item.pickup_point}" data-id="${item.id}" ${item.id == data?.job?.airport_pickup_location_id ? 'selected' : ''}>${item.pickup_point}</option>`;
        });
        $("#terminal").html(append_html);
        $("#job_date").val(data?.job?.job_date);
        $("#job_day").val(data?.job?.job_day);
        $("#job_day_hidden").val(data?.job?.job_day);
        $("#job_time").val(data?.job?.job_time);
        $("#ref").val(data?.job?.ref);
        $("#ref2").val(data?.job?.ref2);
        $("#passenger_name").val(data?.job?.passenger_name);
        $("#passenger_phone").val(data?.job?.passenger_phone);
        $("#passenger_count").val(data?.job?.passenger_count);
        $("#checkin_luggage_count").val(data?.job?.checkin_luggage_count);
        $("#hand_luggage_count").val(data?.job?.hand_luggage_count);
        $("#flight_number").val(data?.job?.flight_number);
        $("#arrival_city").val(data?.job?.arrival_city);
        $("#car_park").val(data?.job?.car_park);
        $("#summary").val('NOTES: ' + data?.job?.notes + ', ' + data?.job?.flight_number + ', ' + data?.job
            ?.arrival_city + ', ' + 'CAR PARK: ' + data?.job?.car_park + (data?.job?.additional_seat != null ?
                ', ' + data?.job?.additional_seat : '') + (data?.job?.comment != null ? ', ' + data?.job
                ?.comment : ''));
        if (data?.job?.job_type == 2) {
            $("#journey_start").val('P/UP');
            $("#journey_END").val('DROP');
        } else {
            $("#journey_start").val('DROP');
            $("#journey_end").val('P/UP');
        }
        $('#journey_start_details').val(data?.job?.airport_id);
        $('#journey_end_details').val(data?.job?.address);
        $('#notes').val(data?.job?.notes);
        $('#flight_no').val(data?.job?.flight_number);
        $('#city_of_arrival').val(data?.job?.arrival_city);
        $('#distance').val(data?.job?.distance);
        $('#price').val(data?.job?.total_price);
        $('#total_price').val(data?.job?.total_price);
        $('#job_number').val(data?.job?.job_number);
        $('#account_suggestion').val(data?.job?.account_id).trigger('change');
        $('#account_name_suggestion').val(data?.job?.account_id).trigger('change');
        $('#account_name_suggestion').val(data?.job?.account_id).trigger('change');
        $('#account_display_name').val(data?.job?.get_account?.display_name);
        $('#car_category').val(data?.job?.car_category_id).trigger('change');
        $('#additional_seat').val(data?.job?.additional_seat);
        $('#comment').val(data?.job?.summary);
        $('#journey_type_id').val(data?.job?.journey_type_id);
        $('#client_id').val(data?.job?.client_id);
        $('#airport_terminal').val(data?.job?.airport_terminal);
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

        // If the input value is not empty
        if (timeValue) {
            // Convert time to a Date object
            const [hours, minutes] = timeValue.split(':').map(Number);
            const date = new Date();
            date.setHours(hours, minutes);

            // Format the time in 24-hour format
            const formattedTime = date.toTimeString().split(' ')[0].substring(0, 5); // "HH:mm"

            console.log(`Formatted Time: ${formattedTime}`);
            return formattedTime;
        } else {
            return '';
        }
    }

    // Example usage
    document.getElementById('job_time').addEventListener('change', function() {
        const formattedTime = getTimeIn24HourFormat();
        // You can use `formattedTime` as needed here
        console.log(`Selected Time: ${formattedTime}`);
        // Call the function if needed
        // getPriceDetailOnBooking();
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


<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#job_time", {
            enableTime: true,
            noCalendar: true,
            time_24hr: true
        });
    });
</script> -->
<script>
    function addChldAgeList() {
        const selectedValue = document.getElementById("Select_child_list").value;
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
                // Add CSS styles directly
                li.style.fontSize = '12px';
                li.style.fontSize = '12px';
                li.className = 'margin-start-5px, d-flex';
                // li.style.textTransform = 'uppercase';
                selectedOptions.appendChild(li);
            }
        }
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const airports_list = [{
                id: 1,
                airport_name: "Los Angeles International Airport"
            },
            {
                id: 2,
                airport_name: "John F. Kennedy International Airport"
            },
            {
                id: 3,
                airport_name: "Chicago O'Hare International Airport"
            }
            // Add more airport objects as needed
        ];

        // Create the select element
        const selectElement = document.createElement('select');
        selectElement.setAttribute('class', 'journey_start_details disabled_box form-control select2');
        selectElement.setAttribute('multiple', 'multiple');
        selectElement.setAttribute('data-placeholder', 'Select a State');
        selectElement.setAttribute('style', 'width: 100%;');
        selectElement.setAttribute('name', 'airport_id');
        selectElement.setAttribute('id', 'journey_start_details');

        // Create the default option
        const defaultOption = document.createElement('option');
        defaultOption.value = "";
        defaultOption.textContent = "--SELECT AIRPORT--";
        selectElement.appendChild(defaultOption);

        // Add options dynamically from the airports_list
        if (airports_list.length > 0) {
            airports_list.forEach(airport => {
                const optionElement = document.createElement('option');
                optionElement.value = airport.id;
                optionElement.textContent = airport.airport_name;
                selectElement.appendChild(optionElement);
            });
        }

        // Append the select element to a container in the DOM
        document.getElementById('airport-select-container').appendChild(selectElement);

        // Initialize Select2
        $('#journey_start_details').select2();
    });
</script>

<script>
    $(document).ready(function() {
        $("#car_category_autosuggest").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('car.categories.autosuggest') }}", // Backend route to get suggestions
                    dataType: "json",
                    data: {
                        term: request.term // The term to search for
                    },
                    success: function(data) {
                        response($.map(data, function(item) {
                            return {
                                label: item.short_name,
                                value: item.id
                            };
                        }));
                    }
                });
            },
            minLength: 2, // Start searching after typing 2 characters
            select: function(event, ui) {
                $("#car_category_autosuggest").val(ui.item.label); // Set the label in the input box
                $("#car_category").val(ui.item.value).trigger(
                'change'); // Set the value in the hidden select and trigger the change event
                $("#car_category_name").val(ui.item
                .label); // Optional: Display the selected category in the disabled input
                return false;
            }
        });

        // Optionally, update the displayed input box if the user manually changes the select box (if you ever make it visible)
        $("#car_category").change(function() {
            var selectedText = $("#car_category option:selected").text();
            $("#car_category_autosuggest").val(selectedText);
            $("#car_category_name").val(selectedText);
        });
    });
</script>

<script>
//   document.addEventListener("DOMContentLoaded", function() {
//     function autocomplete(input, suggestions) {
//         let currentFocus;
//         input.addEventListener("input", function() {
//             let listContainer, listItem, i, val = this.value;
//             closeAllLists();
//             if (!val) return false;
//             currentFocus = -1;
//             listContainer = document.createElement("DIV");
//             listContainer.setAttribute("class", "autocomplete-items");
//             this.parentNode.appendChild(listContainer);
//             for (i = 0; i < suggestions.length; i++) {
//                 if (suggestions[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
//                     listItem = document.createElement("DIV");
//                     listItem.innerHTML = "<strong>" + suggestions[i].substr(0, val.length) + "</strong>";
//                     listItem.innerHTML += suggestions[i].substr(val.length);
//                     listItem.innerHTML += "<input type='hidden' value='" + suggestions[i] + "'>";
//                     listItem.addEventListener("click", function() {
//                         input.value = this.getElementsByTagName("input")[0].value;
//                         closeAllLists();
//                     });
//                     listContainer.appendChild(listItem);
//                 }
//             }
//         });

//         input.addEventListener("keydown", function(e) {
//             let x = document.getElementsByClassName("autocomplete-items");
//             if (x) x = x[0].getElementsByTagName("div");
//             if (e.keyCode == 40) {
//                 currentFocus++;
//                 addActive(x);
//             } else if (e.keyCode == 38) {
//                 currentFocus--;
//                 addActive(x);
//             } else if (e.keyCode == 13) {
//                 e.preventDefault();
//                 if (currentFocus > -1) {
//                     if (x) x[currentFocus].click();
//                 }
//             }
//         });

//         function addActive(x) {
//             if (!x) return false;
//             removeActive(x);
//             if (currentFocus >= x.length) currentFocus = 0;
//             if (currentFocus < 0) currentFocus = (x.length - 1);
//             x[currentFocus].classList.add("autocomplete-active");
//         }

//         function removeActive(x) {
//             for (let i = 0; i < x.length; i++) {
//                 x[i].classList.remove("autocomplete-active");
//             }
//         }

//         function closeAllLists(elmnt) {
//             let x = document.getElementsByClassName("autocomplete-items");
//             for (let i = 0; i < x.length; i++) {
//                 if (elmnt != x[i] && elmnt != input) {
//                     x[i].parentNode.removeChild(x[i]);
//                 }
//             }
//         }

//         document.addEventListener("click", function(e) {
//             closeAllLists(e.target);
//         });
//     }

//     $(document).on("blur", "#pickup", async function(){
            
//             let airport = null;
//             let pick_array = [];                 
//             let pick_value = $(this).val().toUpperCase();
//             let url = "{{route('admin.get_postcode_airports_list')}}";
//            let append_html = '<option>Select</option>';
//             if(pick_value == 'LHR'){                
//                 airport = "Heathrow Airport";
//                 append_html += `<option>${airport}</option>`;
//             }else if(pick_value == 'LGW'){
//                 airport = "Gatwick Airport";
//                 append_html += `<option>Gatwick Airport</option>`;
//             }else if(pick_value == 'LTN'){
//                 airport = "Luton Airport";
//                 append_html += `<option>Luton Airport</option>`;
//             }else if(pick_value == 'STN'){
//                 airport = "Stansted Airport";                
//                 append_html += `<option>Stansted Airport</option>`;
//             }else if(pick_value == 'LCY'){
//                 airport = "City Airport";
//                 append_html += `<option>City Airport</option>`;
//             }else if(pick_value == 'SEN'){  
//                 airport = "Southend Airport";
//                 append_html += `<option>Southend Airport</option>`;
//             }
            
//             //else 
//             if(pick_value.length >= 3){  //changed to >= 3 from > 4                 
//                 let response = await fetch(`${url}/?req_value=${pick_value}`);
//                 let responseData = await response.json();               
//                 responseData.data.forEach(element => {
//                   append_html += `<option>${element}</option>`;               
//                 });
//                 // $("#pickup_detail").html(append_html); 
//                 pick_array.push(airport);   
//                  pick_array = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan"];
//                   alert(airport) ;      
//                   autocomplete($("#pickup_detail"), pick_array);   
//             }  
               
//     });
    
// });


document.addEventListener("DOMContentLoaded", function() {
    function autocomplete(input, suggestions) {
        let currentFocus;
        input.addEventListener("input", function() {
            let listContainer, listItem, i, val = this.value;
            closeAllLists();
            if (!val) return false;
            currentFocus = -1;
            listContainer = document.createElement("DIV");
            listContainer.setAttribute("class", "autocomplete-items");
            this.parentNode.appendChild(listContainer);
            for (i = 0; i < suggestions.length; i++) {
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
        });

        input.addEventListener("keydown", function(e) {
            let x = document.getElementsByClassName("autocomplete-items");
            if (x) x = x[0].getElementsByTagName("div");
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

        function closeAllLists(elmnt) {
            let x = document.getElementsByClassName("autocomplete-items");
            for (let i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != input) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        } 
        document.addEventListener("click", function(e) {
            closeAllLists(e.target);
        });

        const countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan"];
        autocomplete($("#pickup_detail"), countries);

    } 



    var countries = []; //["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan"];
    let pick_array = [];
    $(document).on("blur", "#pickup", async function(){ 
                        let airport = null;    
                        let pick_value = $(this).val().toUpperCase();
                        let url = "{{route('admin.get_postcode_airports_list')}}";
                       let append_html = '<option>Select</option>';
                        if(pick_value == 'LHR'){                
                            airport = "Heathrow Airport";
                            append_html += `<option>${airport}</option>`;
                        }else if(pick_value == 'LGW'){
                            airport = "Gatwick Airport";
                            append_html += `<option>Gatwick Airport</option>`;
                        }else if(pick_value == 'LTN'){
                            airport = "Luton Airport";
                            append_html += `<option>Luton Airport</option>`;
                        }else if(pick_value == 'STN'){
                            airport = "Stansted Airport";                
                            append_html += `<option>Stansted Airport</option>`;
                        }else if(pick_value == 'LCY'){
                            airport = "City Airport";
                            append_html += `<option>City Airport</option>`;
                        }else if(pick_value == 'SEN'){  
                            airport = "Southend Airport";
                            append_html += `<option>Southend Airport</option>`;
                        }
                        
                        //else 
                        if(pick_value.length > 3){ 
                            //changed to >= 3 from > 4                 
                            let response = await fetch(`${url}/?req_value=${pick_value}`);
                            let responseData = await response.json();               
                            responseData.data.forEach(element => {
                              append_html += `<option>${element}</option>`; 
                              alert(element);
                            //   pick_array.push(`${element}`);            
                            });  
                            // pick_array.push(airport);
                            ///  pick_array = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan"];
                            //   alert(pick_array);    
                            //countries.push(airport)  
                            //autocomplete($("#pickup_detail"), pick_array);   
                        }
                        // $("#pickup_detail").html(append_html); 
             });
            //  autocomplete(document.getElementById("pickup_detail"), pick_array);

            });
            </script>
 
<script> 

    $(document).on("blur", "#drop", async function(){
            let journey_type = null;
            let airport = null; 
            let airport_id = null; 
            let post_code = null; 
            let drop_value = $(this).val().toUpperCase();
            let url = "{{route('admin.get_postcode_airports_list')}}";
           let append_html = '<option>Select</option>'; 
            if(drop_value == 'LHR'){
                airport = "Heathrow Airport";
                airport_id = 1;
                append_html += `<option>${airport}</option>`;
            }else if(drop_value == 'LGW'){
                airport = "Gatwick Airport";
                airport_id = 2;
                append_html += `<option>Gatwick Airport</option>`;
            }else if(drop_value == 'LTN'){
                airport = "Luton Airport";
                airport_id = 3;
                append_html += `<option>Luton Airport</option>`;
            }else if(drop_value == 'STN'){
                airport = "Stansted Airport";
                airport_id = 4;
                append_html += `<option>Stansted Airport</option>`;
            }else if(drop_value == 'LCY'){
                airport = "City Airport";
                airport_id = 5;
                append_html += `<option>City Airport</option>`;
            }else if(drop_value == 'SEN'){  
                airport = "Southend Airport";
                airport_id = 6;
                append_html += `<option>Southend Airport</option>`;
            }else if(drop_value.length > 4){
                let response = await fetch(`${url}/?req_value=${drop_value}`);
                let responseData = await response.json();  
                responseData.data.forEach(element => {
                    append_html += `<option>${element}</option>`; 
                }); 
                post_code = drop_value; 
            }
            if(post_code == null){
                    post_code = $("#pickup").val(); 
                }
            $("#drop_detail").html(append_html);

            if(airport != null){
                journey_type = 'to_airport';     
            }else{ 
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
            // const car_category = $("#car_category").val();
            // const job_day = $("#job_day").val();
            // const job_time = $("#job_time").val(); 
            // alert(airport_id + ' '+post_code);

            // const post_code = $("#journey_end_details").val();
            // const airport_id = $("#journey_start_details").val();
            
            // const new_booking_price_url = "{{ route('frontend.get_price_on_new_booking') }}";
            //  let response = await fetch(`${new_booking_price_url}/?car_category=${car_category}
            //  &postcode=${post_code}&airport_id=${airport_id}&job_time=${job_time}&job_day=${job_day}`);
            //  let responseData = await response.json();
            //  console.log(responseData);

    });

  

</script>

@yield('javascript-section') </body>


</html>
