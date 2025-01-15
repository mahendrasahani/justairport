@extends('layouts/backend/main')
@section('main-section')
    <style>
        a.btn-primary.click-refresh {
            color: #fff;
            text-decoration: none;
            padding: 4px;
        }
        .main-container {
            padding: 0 !important;
        }
        #control_jobs_table {
            width: 100%;
            white-space: nowrap;
        }
        .custom_table_header {
            background: #fff;
            font-size: 12px;
            padding: 2px 5px;
            color: black;
            font-weight: 500;
        }
        .custom_table_header p {
            margin-bottom: 0px !important;
        }
        .selected {
            /*background: #000 !important;*/
            background-color:#fff !important;
            color: #00ffff !important;
        }
        
        .selected a{
    /*color: #fff !important;*/
    color:#000 !important;
    } 
    .selected td{
        color:#000 !important;
    }
        
        .selected small {
            color: #00ffff !important;
            padding: 0px;
        }
        table.table.dataTable>tbody>tr.selected a {
            color: #00ffff !important;
        }
        .highlight {
            background-color: #000 !important;
            color: #00ffff !important;
        }
        #control_jobs_table_wrapper .row>* {
            padding: 0 !important;
        }
        #control_jobs_table_wrapper .row:nth-child(1) {
            padding: 0 10px !important;
            margin-top: 3px !important;
        }
        #control_jobs_table_wrapper .row:last-child {
            padding: 0 10px !important;
            margin-top: 2px !important;
            align-items: center !important;
        }
        div.dt-container div.dt-length label {
            font-size: 13px;
            text-transform: capitalize;
        }
        div.dt-container div.dt-info {
            font-size: 13px;
            margin-left: 12px;
        }
        .driver_modal_content {
            padding: 0px;
            width: 50%;
            margin: auto;
        }
        .d-flex {
            align-items: start;
        }
        .driver_modal_header {
            background: #fff;
            font-size: 12px;
            padding: 2px 5px;
            font-weight: 500;
            padding: 6px;
            border-bottom: 1px solid #e5e5e5;
            box-shadow: none;
        }
        .driver_modal_header button {
            line-height: 11px;
            color: #000;
            padding: 0 2px !important;
            font-size: 16px;
            opacity: 1;
            background: none;
        }
        .select_option {
            height: 35px;
            padding-left: 10px;
            width: 100%;
        }
        .driver_columns {
            padding: 2px;
        }
        .driver_modal_body {
            padding: 2px;
            margin: 0 !important;
            background: #fff;
            border: 1px solid #f1f1f1;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        /*th.dt-orderable-asc.dt-orderable-desc {*/
        /*    width: 4% !important;*/
        /*}*/
        .border_cs.select2-container--default.select2-selection--single {
            border: 1px solid #aaa !important;
            border-radius: none !important;
        }
        .select#driver_name select option {
            font-size: 13px;
        }
        a.view-btn.btn-primary {
            color: #fff;
            font-size: 12px;
            padding: 0px 10px 0px 10px;
        }
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
            background-color: DodgerBlue !important;
            color: #ffffff;
        }
        table#control_jobs_table .table_body {
            background: #0ff;
        } 
        
        
        
         .tooltips {
          position: relative;
          display: inline-block;
          width: 100%;
        
        }
        .tooltips .tooltipstext {
          visibility: hidden;
          width: 200px;
          top:0;
          left: -200px;
          font-size: 11px;
          background-color: black;
          color: #fff;
          text-align: center;
          border-radius: 6px;
          padding: 5px;
          font-weight: bold;
            font-size: 13px;
            line-height: 16px;
          position: absolute;
          z-index: 1;
          /*white-space:initial !important;*/
        }
        .tooltips:hover .tooltipstext {
          visibility: visible; 
        }
        .tooltips:hover .hoverTooltip{
            color:#0b5ed7;
            font-weight: bold;
            font-size: 11px;
            cursor:pointer;
        }
        
        
    </style> 
    
    <div class="content-wrapper"> 
        <div class="box main-container"> 
            <div class="box-body">
                <table id="control_jobs_table" class="table table-bordered table-striped" style="width: 100% !important;">
                    <div class="custom_table_header d-flex justify-content-between">
                        <p>Control</p>
                        {{-- <button class="btn-primary click-refresh" style="border-radius: 5px"></button> --}}
                        <!--<div>Next Reload in <span id="time">03:00</span> minutes!</div>-->
                        <!--<a href="" class="btn-primary click-refresh" style="border-radius: 5px" id="refreshBtn">Click To Refresh</a>  -->
                    </div> 
                    <thead>
                        <tr>  
                            <th scope="col" class="dly">DLY</th>
                            <th scope="col" class="time">Time</th>
                            <th scope="col" class="job">Job</th>
                            <!-- <th scope="col" class="notes" style="width: 1% !important"></th> -->
                            <th scope="col" class="account">Account</th>
                            <th scope="col" class="th_source">Car</th>
                            <th scope="col" class="job_details">Pickup</th>
                            <th scope="col" class="job_details">Drop</th>
                            <th scope="col" class="job_details">BS</th>
                            <th scope="col" class="job_details">Flight</th>
                            <th scope="col" class="job_details">Notes</th>
                            <th scope="col" class="job_details">Payment</th>
                            <th scope="col" class="driver_th">Driver</th>
                            <!-- <th scope="col" class="view_th">View Job</th> -->
                        </tr>
                    </thead>
                    <tbody id="control_table" class="table_body">
                        @if (count($jobs) > 0)
                            @foreach ($jobs as $index => $job)
                                <tr id="{{ $index }}" > 
                                    @php
                                        $currentDateTime = \Carbon\Carbon::now();
                                        $providedDateTime = Carbon\Carbon::parse($job->job_date . $job->job_time);
                                        $hoursRemaining = $currentDateTime->diffInHours($providedDateTime);
                                    @endphp
                                    @if ($currentDateTime > $providedDateTime)
                                        <td scope="row" class="dly" style="background:#fff !important; color:red;">
                                            -{{ $hoursRemaining }}h
                                        </td>
                                    @else
                                        @if($hoursRemaining < 5)
                                            <td scope="row" class="dly"
                                                style="color:white; background:blue !important;"> 
                                                +{{ $hoursRemaining }}h
                                            </td>
                                        @else
                                            <td scope="row" class="dly" style="color:white;"> 
                                                +{{ $hoursRemaining }}h
                                            </td>
                                        @endif
                                    @endif

                                    <td class="time">{{ Carbon\Carbon::parse($job->job_time)->format('H:i') ?? '' }}</td>
                                    <td class="job">
                                        {{-- <a href="{{ route('admin.edit_jobs', [$job->id]) }}">{{ $job->job_number ?? '' }}</a> --}}
                                        <a href="{{ route('admin.job.view', [$job->id]) }}">{{ $job->job_number ?? '' }}</a>
                                    </td>
                                    {{-- <td class="notes">{{ $job->notes != '' ? 'N' : '' }}</td>  --}}
                                    <td class="account">
                                        @if ($job->account_id == 2)
                                            CASH
                                        @elseif($job->account_id == 3)
                                            ONLINE
                                        @else
                                            {{ Str::limit($job->getAccount->account_number ?? '') }}
                                        @endif
                                        {{-- {{ Str::limit($job->getAccount->display_name ?? '', 15, '') }}
                                          {{ $job->getAccount->account_number ?? '' }}  --}}
                                    </td>
                                    <td class="source">{{ $job->getCarCategory->short_name ?? '' }}</td>
                                    <td class="job_details">
                                        @if ($job->journey_type_id == 1)
                                            {{ $job->postcode }}
                                        @elseif($job->journey_type_id == 2)
                                            {{ $job->getAirport->display_name ?? '' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($job->journey_type_id == 1)
                                            {{ $job->getAirport->display_name ?? '' }}
                                        @elseif($job->journey_type_id == 2)
                                            {{ $job->postcode }}
                                        @endif
                                    </td>
                                       <td>
                                                {{$job->booster_seat_count }}
                                                 @if($job->booster_seat_count > 0)
                                                 -
                                                     @foreach($job->child_age as $index => $age)
                                                     {{$age}}Y,
                                                 @endforeach
                                                 @endif
                                            </td>
                                            <td>{{ $job->flight_number ?? ''}}</td>
                                    <td>
                                       <!--{{$job->getAirportPickupLocation?->terminal_name ?? ''}}-->
                                       <div class="tooltips">
                                            <span class="hoverTooltip"> {{Str::limit($job->getAirportPickupLocation?->terminal_name, 15)}} </span>
                                            <div class="tooltipstext">
                                                 {{$job->getAirportPickupLocation?->terminal_name ?? ''}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($job->payment_status == 0)
                                            Pending
                                        @elseif($job->payment_status == 1)
                                            Paid
                                        @elseif($job->payment_status == 2)
                                            Void
                                        @endif
                                    </td>
                                    <td class="driver_td">
                                        @if ($job->job_status_type_id == 1)
                                            <button type="button" class="btn modal_btn" id="modal_btn{{ $index }}"
                                                onclick="handleModal(`modal_btn{{ $index }}`,`{{ $job->job_number }}`,`{{ $job->id }}`)">
                                                <small style="font-size: 11px">Assign</small>
                                            </button>
                                        @elseif($job->job_status_type_id == 2 || $job->job_status_type_id == 3)
                                            <button type="button" class="btn modal_btn" id="modal_btn{{ $index }}"
                                                onclick="handleModal(`modal_btn{{ $index }}`,`{{ $job->job_number }}`,`{{ $job->id }}`)">
                                                <small style="font-size: 11px">{{ $job->getDriver->call_Sign ?? '' }}</small>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="modal" id="myModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content driver_modal_content">
                        <div class="d-flex justify-content-between driver_modal_header">
                            <h4 class="modal-title">Driver Assignment</h4>
                            <button type="button" class="d-flex justify-content-center btn-close" data-bs-dismiss="modal"
                                onclick="handleModal()">x</button>
                        </div>
                        <form action="{{ route('admin.assign_driver') }}" method="POST">
                            @csrf
                            <div class="modal-body driver_modal_body d-block">
                                <div class="d-flex">
                                    <div class="col-md-2 ms-2 driver_columns">
                                        <span style="margin-right:5px">Job#</span>
                                        <input type="text" style="width:100%;" class="input_box" id="job_number_disabled"
                                            disabled>
                                        <input type="hidden" class="input_box" name="job_number" id="job_number">
                                    </div>
                                    {{-- <input type="text" id="modal_job_id" name="modal_job_id"> --}}
                                    <div class="col-md-2 ms-2 driver_columns position-relative">
                                        <div class="autocomplete" style="width:100%;">
                                            <span>C/S</span>
                                            <input id="c_s" type="text" name="c_s" class="input_box w-100"
                                                autocomplete="off">
                                            <input id="driver_id" type="hidden" name="driver_id"
                                                class="input_box w-100">
                                            <input id="modal_job_id" type="hidden" name="modal_job_id"
                                                class="input_box w-100">
                                        </div>
                                    </div>
                                    <div class="col-md-5 mx-2 driver_columns">
                                        <span>Driver</span>
                                        <input type="text" name="driver_name" id="driver_name" class="input_box"
                                            style="width:100%" readonly>
                                        <p id="select_driver_error" style="color:red;"></p>
                                    </div>
                                     <div class="col-md-2 driver_columns">
                                        <span>Car</span>
                                        <input type="text" value="" id="car_type" class="input_box"
                                            style="width:100%">
                                    </div> 
                                </div>
                                <div class=" justify-content-end d-flex">
                                    <div class=" justify-content-end mx-1" id="allocate">
                                        <button id="allocate_btn" class="btn btn-primary save_btn">Allocate</button>
                                    </div>
                                    <div class=" justify-content-end mx-1" id="unassign">
                                        <button id="unassign_btn" class="btn btn-primary save_btn">Un-Assign</button>
                                    </div>
                                    <div class=" justify-content-end" id="assign">
                                        <button type="submit" id="assign_btn"
                                            class="btn btn-primary save_btn">Assign</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <div class="toast-popup" id="success_message">
        <div class="toast-content">
            <i class="fas fa-solid fa-check check"></i> 
            <div class="message">
                <span class="text text-1">Success</span>
                <span class="text text-2" id="toast_message">Driver Assigned Successfully.</span>
            </div>
        </div> 
        <div class="progress"></div>
    </div>
 
    <div class="toast-popup warning" id="already_assigned">
    <div class="toast-content">
        <i class="fa-solid fa-circle-exclamation "></i>
        <div class="message">
            <span class="text text-1">Warning</span>
            <span class="text text-2" id="toast_message">Driver Already Assigned</span>
        </div>
    </div> 
    <div class="progress"></div>
</div>

@section('javascript-section') 
    @if(Session::has('assign_success'))
    <script>
        const successMessage = document.getElementById('success_message');
        const progress = successMessage.querySelector('.progress'); 
        successMessage.classList.add('active');
        progress.classList.add('active');  
            setTimeout(() => {
                successMessage.classList.remove('active');
            }, 5000);
    </script>
    @elseif(Session::has('already_assigned'))
    <script>
     const successMessage = document.getElementById('already_assigned');
     const progress = successMessage.querySelector('.progress'); 
     successMessage.classList.add('active');
     progress.classList.add('active');  
         setTimeout(() => {
             successMessage.classList.remove('active');
         }, 5000);
    </script>
    @endif 

    <script>
        $(document).on("click", "#allocate_btn", async function(e) {
            e.preventDefault();
            $("#select_driver_error").val();
            let url = "{{ route('backend.allocate_control_job') }}";
            let currentUrl = "{{ route('admin.control_job') }}";
            let driver_id = $("#driver_id").val();
            let job_id = $("#modal_job_id").val();
            if (driver_id != '') {
                let response = await fetch(`${url}/?driver_id=${driver_id}&job_id=${job_id}`);
                let responseData = await response.json();
                if (responseData.status == "success") {
                    window.location.reload(currentUrl);
                }
            } else {
                $("#select_driver_error").html("Select Driver");
            }
        })
    </script> 

    <script>
        $(document).on("click", "#unassign_btn", async function(e) {
            e.preventDefault();
            let url = "{{ route('backend.unassign_control_job') }}";
            let currentUrl = "{{ route('admin.control_job') }}";
            let job_id = $("#modal_job_id").val();
            let response = await fetch(`${url}/?job_id=${job_id}`);
            let responseData = await response.json();
            if (responseData.status == "success") {
                window.location.reload(currentUrl);
            }
        })
    </script>  

    <!-- <script>
        document.getElementById("driver_name").addEventListener("change", async function() {
            const driver_details_url = "{{ route('admin.get_driver_detail') }}";
            let driver_id = $(this).val();
            const response = await fetch(driver_details_url + "/?id=" + driver_id);
            const data = await response.json();
            $("#driver_code").val(data.data.driver_no);
            $("#c_s").val(data.data.call_Sign);
            $("#car_type").val(data.data.get_car_for_driver.name);
        })
    </script> -->

    <script>
        async function handleModal(id, job_number, job_id){
            let get_assigned_driver_with_job_url = "{{ route('admin.get_assigned_driver_with_job') }}";
            const modal = document.getElementById("myModal");
            if (modal.style.display == "" || modal.style.display == "none") {
                $("#job_number").val(job_number);
                $("#job_number_disabled").val(job_number);
                $("#modal_job_id").val(job_id);
                let response = await fetch(get_assigned_driver_with_job_url + '/?job_id=' + job_id);
                let responseData = await response.json();
                modal.style.display = "block";
                if (responseData.data.driver_id != null) {
                    $("#driver_name").val(responseData.data.get_driver.full_Name);
                    $("#driver_id").val(responseData.data.get_driver.id);  
                    $("#driver_code").val(responseData.data.get_driver.driver_no);
                    $("#c_s").val(responseData.data.get_driver.call_Sign).prop('disabled', true);
                
                    $("#car_type").val(responseData.driver.get_car_for_driver.name).prop('disabled', true);
                    $("#assign_btn").hide();
                    $("#unassign_btn").show();
                    $("#allocate_btn").show();
                } else {
                    $("#driver_name").val("").prop('disabled', false);
                    $("#driver_code").val("");
                    $("#c_s").val("").prop('disabled', false);
                    $("#assign_btn").show();
                    $("#unassign_btn").hide();
                    $("#allocate_btn").hide();
                }
                $("#c_s").focus();
            } else {
                modal.style.display = "none";
            }
        }
    </script>
            
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newJobModal = document.getElementById('new_job'); 
            const rows = document.querySelectorAll('#control_jobs_table tr');
            let selectedIndex = 1; 
            function selectRow(index){
                rows.forEach(row => row.classList.remove('selected'));
                rows[index].classList.add('selected');
                rows[index].scrollIntoView({block: 'nearest' });
            }
            selectRow(selectedIndex);
            document.addEventListener('keydown', function(e){
                if (newJobModal.classList.contains('show')) {
            // console.log('modal is opended');
            return;
            }
                if(e.key === 'ArrowDown'){
                    if(selectedIndex < rows.length - 1){
                        selectedIndex++;
                        selectRow(selectedIndex);
                    }
                }else if(e.key === 'ArrowUp'){
                    if(selectedIndex > 1){
                        selectedIndex--;
                        selectRow(selectedIndex);
                    }
                } else if (e.key === 'Enter'){
                    const modal = document.getElementById("myModal");
                    if (modal.style.display == "" || modal.style.display == "none") {
                    const selectedRow = rows[selectedIndex];
                    const link = selectedRow.querySelector('a');
                    if(link){
                        window.location.href = link.href;  
                    }
                } 
                }else if (e.keyCode === 68){
                    const selectedRow = rows[selectedIndex];
                    const button = selectedRow.querySelector('.modal_btn');
                    if (button) {
                        button.click();
                    }
                }
            });
        });
    </script> 

    <script>
        $(document).ready(function() { 
        //     var dataTable = $('#control_jobs_table').DataTable({
        //     "pageLength": 300,
        //     "order": [],
        //     "columnDefs": [
        //         { 
        //             "orderable": false, 
        //             "targets": [0]
        //         }
        //     ]
        // }); 
        $('#control_jobs_table').DataTable({
                "pageLength": 300,
                "lengthMenu": [[100, 200, 300, 400, 500], [100, 200, 300, 400, 500]],
                "scrollY": '500px',
                // "scrollCollapse": true,
                "paging": true,
                "order": [],
                "columnDefs": [
                    {
                        "orderable": false,
                        "targets": [0]
                    }
                ]
           });
        
        const source = document.querySelectorAll(".source");
        source.forEach((ele, index) => {
            if (ele.innerHTML == "E") {
                ele.style.color = "#4f3382"
            } else if (ele.innerHTML == "A"){
                ele.style.color = "white"
            }else{
                ele.style.color = "#03d428"
            }
        })
        });
    </script> 

    <script>
        function autocomplete(inp, arr) {
            let currentFocus;
            inp.addEventListener("input", function(e) {
                let a, b, i, val = this.value;
                closeAllLists();
                if(!val){
                    return false;
                }
                currentFocus = -1;
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                this.parentNode.appendChild(a);
                for (i = 0; i < arr.length; i++) {
                    if (arr[i].cs.toUpperCase().startsWith(val.toUpperCase())) {
                        b = document.createElement("DIV");
                        b.innerHTML = "<strong>" + arr[i].cs.substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].cs.substr(val.length);
                        b.innerHTML += "<input type='hidden' value='" + JSON.stringify(arr[i]) + "'>";
                        b.addEventListener("click", function(e) {
                            let selectedItem = JSON.parse(this.getElementsByTagName("input")[0].value);
                            inp.value = selectedItem.cs;
                            document.getElementById("driver_name").value = selectedItem.name;
                            document.getElementById("car_type").value = selectedItem.carType || '';
                            document.getElementById("driver_id").value = selectedItem.driver_id;
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            }); 
            $(document).on("blur", "#c_s", function() {
                let x = document.getElementById(inp.id + "autocomplete-list");
                if (x){
                    let firstItem = x.getElementsByTagName("div")[0];
                    if(firstItem){
                        firstItem.click();
                    }
                }
            }); 
            inp.addEventListener("keydown", function(e) {
                let x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
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
            function addActive(x){
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
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            } 
            document.addEventListener("click", function(e) {
                closeAllLists(e.target);
            });
        } 
        async function fetchDriverList(){
            try {
                let url = "{{ route('backend.get_driver_call_sign_list') }}";
                const response = await fetch(`${url}`);
                const data = await response.json();
                if (data.status === 'success') {
                    let driverList = data.driver_list;
                    return Object.keys(driverList).map(key => ({
                        cs: key,
                        driver_id: driverList[key].id,
                        name: driverList[key].name,
                        carType: driverList[key].car
                    }));
                } else {
                    console.warn('Failed to fetch driver list');
                    return [];
                }
            } catch (error) {
                console.error('Error fetching driver list:', error);
                return [];
            }
        }
        document.addEventListener("DOMContentLoaded", async () => {
            const driverList = await fetchDriverList(); 
            autocomplete(document.getElementById("c_s"), driverList);
        });
    </script>
             
    //  <script> 
    //     // reloading by on click of the button 
    //     $(document).on('click', '#refreshBtn', function() {
    //         window.location.reload();
    //         console.log('reloading this window');
    //     })
    //     function startTimer(duration, display) {
    //         var timer = duration,
    //             minutes, seconds;
    //         setInterval(function() {
    //             minutes = parseInt(timer / 60, 10);  
    //             seconds = parseInt(timer % 60, 10);
    //             minutes = minutes < 10 ? "0" + minutes : minutes;
    //             seconds = seconds < 10 ? "0" + seconds : seconds; 
    //             display.textContent = minutes + ":" + seconds; 
    //             if (--timer < 0) {
    //                 timer = duration;
    //                 window.location.reload();
    //             }
    //         }, 1000);
    //     }
    //     window.onload = function() {
    //         var fiveMinutes = 60 * 3,
    //             display = document.querySelector('#time');
    //         startTimer(fiveMinutes, display);
    //     };
    // </script> 
        
    @endsection
    @endsection
