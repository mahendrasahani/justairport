
@extends('layouts/backend/main')
@section('main-section')
<style>

     a.btn-primary.click-refresh {
            color: #fff;
            text-decoration: none;
            padding: 4px;
        }
a.send-remider1 {
    padding: 2px;
    color: #fff;
    border-radius: 3px;
    text-decoration: none;
}
a.send-remider{ padding: 2px;
    color: #fff;
    border-radius: 3px;
    text-decoration: none;}
    .selected {
    /*background-color: #000 !important;*/
      background-color: #fff !important;  
    }
    .selected td{
        color:#000 !important;
    }
    
    .selected a{
    /*color: #fff !important;*/
    color:#000 !important;
    } 
    #table_all_jobs {
        width: 100%;
        white-space: nowrap;
    }
    #table_all_jobs {
        width: 100%;
        /*white-space: nowrap;*/
    }
    .deallocate_btn,
    .allocate_btn {
        padding: 0px !important;
        font-size: 11px !important;
        width: 61px !important;
        height: 18px !important;
        margin: 0px !important;
    }
    .custom_table_header {
        font-size: 12px;
        /* padding:10px; */
        color: black;
        font-weight: 500;
         /* border-bottom: 1px solid rgb(180, 174, 174);
    } */
    .custom_table_header p {
        margin-bottom: 0px !important;

    }
    .main-container {
        padding: 0 !important;
    }
    div.dt-container div.dt-info {
        font-size: 13px;
        margin-left: 12px;
    }
    div.dt-container div.dt-length label {
        font-size: 13px;
        text-transform: capitalize;
    }
    div.dt-container div.dt-search {
        font-size: 13px;
    }
    div.dt-container div.dt-paging ul.pagination {
        margin: -2px 0px;
    }
    .table-responsive {
        padding: 2px;
    }
    th {
        border-color: #fff;
        border: 0.1px;
    }
    .btn_filter_search {
        padding: 0px;
        width: 58px;
        font-size: 13px;
    }
    .filter_lable {
        padding: 0px;
        font-size: 14px;
    }
    .dt-search{margin-right: 10px;}
    .endDate, .startDate {
        font-size: 14px;
    }
    
    .modal-content.driver_modal_content {
    width: 50%;
}

    .driver_modal_content {
        padding: 0px;
        width:50% !important;
        margin: auto;
        padding-bottom: 20px;
    }
    .d-flex {
        align-items: start;
    }
    .driver_modal_header {
        font-size: 12px;
        padding: 2px 5px;
        font-weight: 500;
        background: #fff !important;
        box-shadow: none;
        border-bottom: 1px solid #f2f2f2;
    }
    .driver_modal_header button {
        line-height: 11px;
        color: #000 !important;
        padding: 0 2px !important;
        font-size: 16px;
        background: none;
    
        opacity: 1;  
    }
    .modal-content{
        background-color: #fff !important;
    }
    .driver_columns {
        padding: 2px;
    }
    .driver_modal_body {
        padding: 2px;
        margin: 0 !important;
        width: 50% !important;
    }
    .driver {
        display: block;
        height: 19.14px;
        width: 50px !important;
    }
   .send-remider1 , .send-remider{   
        padding: 0px 5px;
        font-size: 10px;
        line-height: 1.5;
        border-radius: 3px;
        background-color: #337ab7;
    }
    .send-remider1:hover{
        background-color: #3bca3b;
    } 
    .send-remider1{
        background-color: #5cb85c;
    }
    .date-text label{
        width: 30%;
    }
    .date-text input{
        height: 35px;
    }
    .table_body>tr>td>p{
        margin-bottom: 0px!important;
    }
        #filterOptions .date-text {
        margin-bottom: 10px;
    }
    #filterOptions {
        padding-top: 10px;
    }
   
</style>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col p-0">
                <div class="container filter">
                <form method="GET">
                    <div class="row">
                        <div class="col-md-12 search-btn d-flex ">
                           
                        </div>
                        <div id="filterOptions" class="col-md-12 d-none">
                            <div class="row">
                                <div class="col-md-3 d-flex date-text">
                                    <label for="startDate" class="col-form-label filter_label" style="padding-right: 12px;">Start Date</label>
                                    <input type="text" id="startDate" name="start_date" placeholder="dd/mm/yyyy" class="form-control startDate"style="width: 140px;">
                                </div>
                                <div class="col-md-3 d-flex date-text">
                                    <label for="endDate" class="col-form-label filter_label" style="padding-right: 12px;">End Date</label>
                                    <input type="text" id="endDate" name="end_date" placeholder="dd/mm/yyyy" class="form-control endDate" style="width: 140px;">
                                </div>
                                <div class="col-md-2 search-btn d-flex justify-content-end gap-2">
                                    <button type="submit" class="btn btn-primary btn_filter_search p-2">Search</button>
                                    <a href="{{route('admin.all_jobs')}}" class="btn btn-primary btn_filter_search p-2">Clear</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                    <style>
                        .tooltips {
                              position: relative;
                              display: inline-block;
                              width: 100%;
                            }
                            .tooltipstext {
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
                                white-space:initial !important;
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
                <div class="box main-container">
                    <div class="box-body">
                        <table id="table_all_jobs" class="table table-bordered table-striped">
                            <div class="custom_table_header d-flex justify-content-between">
                                <p>All Jobs</p>
                                 <div>Next Reload in <span id="time">03:00</span> minutes!</div>
                                <a href="" class="btn-primary click-refresh" style="border-radius: 5px" id="refreshBtn">Click To Refresh</a>  
                                <a  class="btn btn-link btn_filter " id="filterButton" style="">Filter</a> 
                            </div>
                            <thead class="table-dark">
                                <tr>
                                    <th>Job</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Account</th>
                                    <!-- <th>Number</th> -->
                                    <th class="driver">Driver</th>
                                    <th class="driver">Passenger</th>
                                    <th>Car</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Price</th>
                                    <!--<th>D Share</th>-->
                                    <th>Payment</th> 
                                    <th>B S</th> 
                                    <th>Flight</th> 
                                    <th>Notes</th> 
                                    <th>Source</th> 
                                    <!-- <th>Name</th>
                                    <th>Tel</th>
                                    <th>Status</th>
                                    <th>S</th> -->
                                </tr>
                            </thead>
                            <tbody class="table_body" id="all_job">
                                <!-- Sample Job List Data (Replace with actual data from backend) -->
                                @if(count($jobs) > 0)
                                    @foreach($jobs as $index => $job)
                                        <tr>
                                            <td><a href="{{route('admin.job.view', [$job->id])}}" class="text-decoration-none">{{$job->job_number ?? ''}}</a></td>
                                            <td>{{Carbon\Carbon::parse($job->job_date)->format('d-m-Y')}}</td>   
                                            <td>{{Carbon\Carbon::parse($job->job_time)->format('H:i') ?? ''}}</td> 
                                            <td>
                                             {{--    @if($job->payment_type_id == 1)
                                                <p>{{$job->getPaymentType->payment_type_name ?? ''}}</p>
                                                @else 
                                                    @if($job->payment_status == 0)
                                                    <p style="color:red;">{{$job->getPaymentType->payment_type_name ?? ''}}</p>
                                                        @if($job->payment_reminder != 1)
                                                        <a href="{{route('admin.send_reminder_mail', [$job->email, $job->id])}}" class="btn-primary btn-xs send-remider" title="No remider send yet">Send Reminder</a>
                                                        @else
                                                        <!--<a  href="{{route('admin.send_reminder_mail', [$job->email, $job->id])}}"  class="btn-primary btn-xs send-remider1" title="Reminder Sent"> Reminder Sent</a>-->
                                                        <a  href="javascript:void(0)"  class="btn-primary btn-xs send-remider1" title="Reminder Sent"> Reminder Sent</a>
                                                        @endif
                                                    @else
                                                    <p style="color:green;">{{$job->getPaymentType->payment_type_name ?? ''}}</p>
                                                    @endif 
                                            @endif --}}
                                            
                                                @if($job->account_id == 2)
                                                    @if($job->job_status_type_id == 4 || $job->job_status_type_id == 7)
                                                       <span><del style="text-decoration-thickness: 2px;">CASH</del></span>
                                                       @else
                                                        <span>CASH</span>
                                                    @endif 
                                                @elseif($job->account_id == 3)
                                                
                                                    @if($job->payment_status == 1) 
                                                        @if($job->job_status_type_id == 4 || $job->job_status_type_id == 7) 
                                                        <span style="color:green;"><del style="text-decoration-thickness: 2px;">ONLINE</del></span>
                                                        @else
                                                         <span style="color:green;">ONLINE</span>
                                                        @endif 
                                                    @else
                                                    @if($job->job_status_type_id == 4 || $job->job_status_type_id == 7) 
                                                    <span style="color:red;"><del style="text-decoration-thickness: 2px;">ONLINE</del></span>
                                                     @else
                                                         <span style="color:red;">ONLINE</span>
                                                         @endif
                                                    @endif
                                                    
                                                @if($job->job_status_type_id != 4 && $job->job_status_type_id != 7)
                                                    @if($job->payment_status == 0)
                                                         @if($job->payment_status == 0)
                                              <a href="javascript:void(0)" id="reminder_btn" data-email="{{$job->email}}" data-job_id="{{$job->id}}" data-reminder_count="{{$job->payment_reminder_count}}"
                                              data-reminder_sent_date="{{\Carbon\Carbon::parse($job->payment_reminder_sent_date)->format('d M, Y')}}"
                                                class="btn-primary btn-xs send-remider" title="Send Reminder">
                                                <span id="reminder_count_number_{{$job->id}}">{{$job->payment_reminder_count ?? '0'}}</span>
                                                 <span id="reminder_icon_{{$job->id}}"> 
                                                    <i class="fa fa-bell" aria-hidden="true"></i></span> 
                                                </a>
                                                @endif
                                                    @endif
                                                        
                                                    @endif
                                                @else
                                                <span>{{ Str::limit($job->getAccount->account_number ?? '') }}</span>
                                                @endif 
                                            </td>
                                            
                                            
                                            <!-- <td class="account">
                                            {{$job->getAccount->account_number ?? ''}}</td> -->
                                            <td class="driver">
                                              @if($job->getDriver == '')
                                                    <!-- <a href="#" class="text-decoration-none driver" style="height:18px"
                                                    onclick="handleModal(`modal_btn{{$index}}`,`{{$job->job_number}}`,`{{$job->id}}`)"></a> -->
                                                @else
                                                <a href="#" class="text-decoration-none driver"
                                                onclick="handleModal(`modal_btn{{$index}}`,`{{$job->job_number}}`,`{{$job->id}}`)">{{$job->getDriver->call_Sign ?? ''}}</a>
                                                @endif  
                                            </td>
                                            
                                            <td>{{$job->passenger_name ?? ''}}</td>
                                            <td>
                                            {{$job->getCarCategory->short_name ?? ''}}
                                            <!-- {{$job->getCarCategory->name ?? ''}} -->
                                        </td>
                                        <td> 
                                                @if($job->journey_type_id == 1)
                                                {{$job->postcode ?? ''}}
                                                @else
                                                {{$job->getAirport->display_name ?? ''}}
                                                @endif
                                            </td> 
                                            <td>
                                                @if($job->journey_type_id == 1)
                                                {{$job->getAirport->display_name ?? ''}}
                                                @else
                                                    {{$job->postcode ?? ''}}
                                                @endif
                                            </td>
                                            <td>{{$job->total_price}}</td>
                                            <!--<td>{{$job->driver_share}}</td>-->
                                            
                                            <td>
                                                @if($job->job_status_type_id == 4)
                                                    CANCELED
                                                @elseif($job->job_status_type_id == 7)
                                                    NO PICKUP
                                                @else
                                                    @if($job->payment_status == 0)
                                                        Pending
                                                    @elseif($job->payment_status == 1)
                                                        Paid
                                                    @elseif($job->payment_status == 2)
                                                        Void
                                                    @endif
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
                                            
                                            <td>{{$job->flight_number ?? ''}}</td>
                                            
                                            <!--<td> -->
                                            <!--    {{$job->getAirportPickupLocation?->terminal_name ?? ''}}-->
                                            <!--</td> -->
                                             <td>
                                                <!--<div class="tooltipss">-->
                                                <!--    <span class="hoverTooltipp"> {{Str::limit($job->getAirportPickupLocation?->terminal_name, 15)}} not is on show tolltip</span>-->
                                                <!--    <div class="tooltipstext">-->
                                                <!--    {{$job->getAirportPickupLocation?->terminal_name ?? ''}}note-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                 <div class="tooltips">
                                                    <span class="hoverTooltip"> {{Str::limit($job->getAirportPickupLocation?->terminal_name, 15)}}</span>
                                                    <div class="tooltipstext">
                                                        {{$job->getAirportPickupLocation?->terminal_name ?? ''}} 
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            <td>{{ucfirst($job->job_source ?? '')}} </td>
                                            <!-- <td>{{$job->passenger_name ?? ''}}</td>
                                            <td>{{$job->passenger_phone ?? ''}}</td>
                                            <td><span class="badge bg-success">{{$job->getJobStatus->status_name ?? ''}}</span></td>
                                            <td>{{$job->job_source ?? ''}}</td> --> 
                                        </tr>
                                    @endforeach
                                @endif                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal" id="Driver_allocation_modal">
                <div class="modal-dialog-centered">
                    <div class="modal-content driver_modal_content"> 
                        <div class="d-flex justify-content-end driver_modal_header">
                            <button type="button" class="d-flex justify-content-center btn-close" data-bs-dismiss="modal"
                                onclick="handleModal()">x</button>
                        </div> 
                        <form action="{{ route('admin.assign_driver') }}" method="POST">
                            @csrf
                            <div class="modal-body driver_modal_body d-block">
                               <div class="d-flex">
                                <div class="col-md-5 ms-2 driver_columns">
                                    <span style="margin-right:5px">Name </span>
                                    <input type="text" style="width:100%;" class="input_box" name="driver_name" id="driver_name" disabled>
                                </div>
                                <div class="col-md-4 ms-2 driver_columns">
                                    <span style="margin-right:5px">Phone </span>
                                    <input type="text" style="width:100%;" class="input_box" name="driver_phone" id="driver_phone" disabled>
                                </div> 
                                <div class="col-md-2 ms-2 driver_columns">
                                    <span>C/S</span>
                                    <input type="text"  name="c_s" id="c_s" class="input_box w-100" disabled> 
                                </div> 
                               </div> 
                            </div>

                        </form>
                    </div>
                </div>
            </div>
    </div>

</div>


@section('javascript-section')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
<script>
    document.getElementById('startDate').addEventListener('change', function() {
        let startDate = this.value;
        let endDateInput = document.getElementById('endDate');
        if (startDate) {
            endDateInput.value = startDate;
        }
    });
</script>

<script>
    
        $(document).on("click", "#reminder_btn", function(){
             
    const email = $(this).data('email');
    const job_id = $(this).data('job_id');
    const reminder_count = $(this).data('reminder_count');
    const url = "{{route('admin.send_reminder_mail')}}";
    const reminder_sent_date = $(this).data('reminder_sent_date');
    const text = '';
    if(reminder_count == 0){
        reminder_text = "Are you sure you want to send reminder?";
    }else{
       reminder_text = `Last reminder sent on ${reminder_sent_date}. Are you sure you want to send reminder again?`;
    }
    Swal.fire({
        title: "Are you sure?",
        text: reminder_text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, send!"
        }).then(async (result) => {
        if (result.isConfirmed) {
            $("#reminder_icon_"+job_id).html(`<div class="spinner-border text-light" role="status" style="height: 16px; width: 16px; ">
                                                <span class="visually-hidden">Loading...</span>
                                            </div> `);
            const response = await fetch(`${url}?email=${email}&job_id=${job_id}`);
            const responseData = await response.json(); 
            console.log(responseData);
            if(responseData.status == "success"){
                $("#reminder_count_number_"+job_id).html(responseData.reminder_count); 
                Swal.fire({
                    title: "Reminder Sent!",
                    text: "Your reminder has been sent.",
                    icon: "success"
                });
                
            }else{
                Swal.fire({
                    title: "Error!",
                    text: "Something went wrong.",
                    icon: "error"
                });
            } 
            $("#reminder_icon_"+job_id).html('<i class="fa fa-bell" aria-hidden="true"></i>');
        }
        }); 
    });
</script>
<!-- <script>
$(document).ready(function() {
    const url = window.location.href;
    if(url.includes("?")){ 
    }
    else{
    const endDate = document.getElementById("endDate");
    const startDate = document.getElementById("startDate");
    var currentDate = new Date();
    var nextDay = currentDate.toISOString().slice(0, 10);
    endDate.value = nextDay;
    var firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
    var year = firstDayOfMonth.getFullYear();
    var month = (firstDayOfMonth.getMonth() + 1).toString().padStart(2, '0');
    var day = firstDayOfMonth.getDate().toString().padStart(2, '0');
    var firstDayOfMonthFormatted = `${year}-${month}-${day}`;

    startDate.value = firstDayOfMonthFormatted;
    } 
});
</script> -->



<script>
    document.addEventListener("DOMContentLoaded", () => {
        const startDateInput = document.getElementById("startDate");
        const endDateInput = document.getElementById("endDate");
        startDateInput.addEventListener("change", () => {
            endDateInput.min = startDateInput.value;
            endDateInput.max = new Date(new Date(startDateInput.value).setMonth(new Date(startDateInput.value).getMonth() + 6)).toISOString().split('T')[0];
        });
        endDateInput.addEventListener("change", () => {
            startDateInput.max = endDateInput.value;
            startDateInput.min = new Date(new Date(endDateInput.value).setMonth(new Date(endDateInput.value).getMonth() - 6)).toISOString().split('T')[0];
        });
    });
</script>

<script>
  async function handleModal(id, job_number, job_id){
    let get_assigned_driver_with_job_url = "{{route('admin.get_assigned_driver_with_job')}}";
    const modal = document.getElementById("Driver_allocation_modal");
     
    if(modal.style.display == "" || modal.style.display == "none"){
      $("#job_number").val(job_number);
      $("#modal_job_id").val(job_id); 

      let response = await fetch(get_assigned_driver_with_job_url+'/?job_id='+job_id);
      let responseData = await response.json();
      console.log(responseData);
      if(responseData.data.get_driver != null){
        $("#driver_name").val(responseData.data.get_driver.full_Name); 
        $("#c_s").val(responseData.data.get_driver.call_Sign);
        $("#driver_phone").val(responseData.data.get_driver.phone);
      }else{
        $("#driver_name").val(""); 
        $("#driver_code").val(""); 
      }
      modal.style.display = "block";
    }else{
      modal.style.display = "none";
    }
  }
</script>


<script>
  document.getElementById("driver_name").addEventListener("change", async function() {
        const driver_details_url ="{{route('admin.get_driver_detail')}}"; 
        let driver_id = $(this).val();  
        const response=await fetch(driver_details_url + "/?id=" + driver_id);
        const data=await response.json(); 
        $("#driver_code").val(data?.data?.driver_code); 
  })
</script>


<script>
    $(document).ready(function () { 
        // var dataTable = $('#table_all_jobs').DataTable({
        //     "order": []
        // });
        // dataTable.page.len(300).draw(); 
        
        $('#table_all_jobs').DataTable({
            pageLength: 100,
            lengthMenu: [[100, 200, 300, 400, 500], [100, 200, 300, 400, 500]],  
            scrollY: '500px',  
            scrollCollapse: true, 
            paging: true, 
            order: [[0, 'desc']]
        });
    });
</script>

<script>
    document.getElementById('filterButton').addEventListener('click', function() {
    var filterOptions = document.getElementById('filterOptions');

    // Toggle visibility
    if (filterOptions.classList.contains('d-none')) {
        filterOptions.classList.remove('d-none');
    } else {
        filterOptions.classList.add('d-none');
    }
});
</script>

<script>
    $(document).ready(function(){
        $('#startDate').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true
        });
        $('#endDate').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true
        });
        // Synchronize end date with start date
        $('#startDate').on('changeDate', function() {
                let startDate = $(this).datepicker('getDate');
                if (startDate) {
                    $('#endDate').datepicker('setDate', startDate);
                }
            });
        });
</script>


<script>
    function focusElement(row, focusIndex) {
        const interactiveElements = row.querySelectorAll('a, .send-remider, .send-remider1');
        if (interactiveElements.length > 0) {
            interactiveElements.forEach(el => el.classList.remove('focused'));
            interactiveElements[focusIndex].classList.add('focused');
            interactiveElements[focusIndex].focus();
        }
    }

document.addEventListener('DOMContentLoaded', function () {
    const newJobModal = document.getElementById('new_job'); 
    const rows = document.querySelectorAll('#table_all_jobs tr');
    let selectedIndex = 1; 
    let focusIndex = 0;
    
    // Function to handle row selection
    function selectRow(index) {
        rows.forEach(row => row.classList.remove('selected'));
        rows[index].classList.add('selected');
        rows[index].scrollIntoView({ block: 'nearest' });
    }
    // Initially select the first row
    selectRow(selectedIndex); 
    document.addEventListener('keydown', function (e) {
        if (newJobModal.classList.contains('show')) {
            console.log('modal is opended');
            return;
            }
            
        if (e.key === 'ArrowDown'){
            if (selectedIndex < rows.length - 1) {
                selectedIndex++;
                selectRow(selectedIndex);
            }
        }else if (e.key === 'ArrowUp'){
            if(selectedIndex > 1){
                selectedIndex--;
                selectRow(selectedIndex);
            }
        }
        // else if (e.key === 'ArrowRight'){
        //     const currentRow = rows[selectedIndex];
        //     const interactiveElements = currentRow.querySelectorAll('a');
        //     if (focusIndex < interactiveElements.length - 1) {
        //         focusIndex++;
        //         focusElement(currentRow, focusIndex);
        //     }
        // }
        else if (e.key === 'Enter'){
            const selectedRow = rows[selectedIndex];
            const link = selectedRow.querySelector('a');
            if(link){
                window.location.href = link.href;  
            }
        }

    });
});
</script>

@endsection
@endsection