@extends('layouts/backend/main')
@section('main-section')

<style>
#transfer_job_table{
    width: 100%;
    white-space: nowrap;
}
.deallocate_btn, .allocate_btn{
    padding: 0px !important;
    font-size: 11px !important;
    width: 61px !important;
    height: 18px !important;
    margin: 0px !important;
    }  

    .custom_table_header{
  background: #ff;
    font-size: 12px;
    padding: 2px 5px;
    color: black;
    font-weight: 500;
    /* box-shadow: inset 3px -9px 5px #8cbdef */
 }  
 .custom_table_header p{
  margin-bottom:0px !important;
  
 }
 .main-container{
  padding: 0!important;
 }
 div.dt-container div.dt-info{
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





#transfer_job_table_wrapper .row{
  margin-top: 3px !important;
}

div.dt-container div.dt-paging ul.pagination {
    margin: -2px 0px; 
}
 
 
 .filter{
  width:68% !important;
 }
 
.table-responsive {
    padding: 2px;
    }
    th{
    border-color:#fff;
    border:0.1px;
}
.btn_filter_search{ 
      padding: 0px;
    width: 58px;  
    font-size: 13px; 
 }
 .filter_lable{
    padding: 0px;
    font-size: 14px;
 }
 .endDate, .startDate{
    font-size: 14px;
 }
 .main-container{
    /* box-shadow: 0px 1px 7px 2px grey; */
    margin-top:20px;
 }

 .driver_modal_content {
        padding: 0px;
        width: 72%;
        margin: auto;
    }

    .d-flex {
        align-items: start;
    }

    .driver_modal_header {
        background: #abc4de;
        font-size: 12px;
        padding: 2px 5px;
        font-weight: 500;
        box-shadow: inset 3px -9px 5px #8cbdef;
    }

    .driver_modal_header button {
        line-height: 11px;
        color: #000;
        padding: 0 2px !important;
        font-size: 16px;
        background: red;
        color: white;
        opacity: 1;
    }

    .driver_columns {
        padding: 2px;
    }

    .driver_modal_body {
        padding: 2px;
        margin: 0 !important;
    }

    .driver {
        display: block;
        height: 19.14px;
        width:50px !important;
    }

    #filterOptions .date-text {
        margin-bottom: 10px;
    }
    #filterOptions {
        padding-top: 10px;
    }

  </style>
<div class="content-wrapper">
    <div class="container">
    
        <div class="row">
            <div class="col"> 
                    <div class="ccontainer filter">
                        <div class="row">
                            <div class="col-md-12 search-btn d-flex  mb-3">
                                <button type="button" class="btn btn-link btn_filter p-2" id="filterButton">Filter</button>
                            </div>
                            <div id="filterOptions" class="col-md-12 d-none">
                                <div class="row">
                                    <div class="col-md-4 d-flex date-text">
                                        <label for="startDate" class="col-form-label filter_label">Start Date</label>
                                        <input type="text" id="startDate" name="start_date" placeholder="dd/mm/yyyy" class="form-control startDate">
                                    </div>
                                    <div class="col-md-4 d-flex date-text">
                                        <label for="endDate" class="col-form-label filter_label">End Date</label>
                                        <input type="text" id="endDate" name="end_date" placeholder="dd/mm/yyyy" class="form-control endDate">
                                    </div>
                                    <div class="col-md-4 search-btn d-flex justify-content-end gap-2">
                                        <button type="submit" class="btn btn-primary btn_filter_search p-2">Search</button>
                                        <a href="{{route('admin.print_jobs')}}" class="btn btn-primary btn_filter_search p-2">Clear</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                <div class="box main-container"> 
                    <div class="box-body"> 
                        <table id="transfer_job_table" class="table table-bordered table-striped">
                        <div class="custom_table_header">
                            <p>Print Jobs</p> 
                            </div>
                            <thead class="table-dark">
                                <tr>
                                    <th>Job</th>
                                    <th>Date Time</th>
                                    <th>Name</th>
                                    <th>Tel</th>
                                    <th>Status</th>
                                    <th>Driver</th>
                                    <th>S</th>
                                    <th>P</th>
                                    <th>Account</th>
                                    <th>Car</th>
                                    <th>From</th>
                                    <th>To</th>
                                </tr>
                            </thead>
                            <tbody class="table_body" id="print_job">
                                <!-- Sample Job List Data (Replace with actual data from backend) -->
                                @if(count($jobs) > 0)
                                @foreach($jobs as $job)
                                <tr>
                                    <td><a href="{{route('admin.edit_jobs',[$job->id])}}" class="text-decoration-none">{{$job->ref ?? ''}}</a></td>
                                    <td>{{$job->job_date}} {{Carbon\Carbon::parse($job->job_time)->format('h:i') ?? ''}}</td>
                                    <td>{{$job->passenger_name ?? ''}}</td>
                                    <td>{{$job->passenger_phone ?? ''}}</td> 
                                    <td><span class="badge bg-success">{{$job->getJobStatus->status_name}}</span></td>
                                    <td class="driver">
                                                @if($job->getDriver == '')
                                                    <a href="#" class="text-decoration-none driver" style="height:18px"
                                                        onclick="handleModal()"></a>
                                                @else
                                                    <a href="#" class="text-decoration-none driver"
                                                        onclick="handleModal()">{{$job->getDriver->driver_code ?? ''}}</a>

                                                @endif
                                    </td>
                                    <td>{{$job->job_source ?? ''}}</td>
                                    <td>{{$job->getPaymentType->payment_type_name ?? ''}}</td>

                                    <td class="account">{{ Str::limit($job->getAccount->display_name ?? '', 10, '') }}    {{$job->getAccount->account_number ?? ''}}</td>
                                    <td>{{$job->getCarCategory->short_name ?? ''}} ({{$job->getCarCategory->name ?? ''}})</td>
                                    <td>
                                        @if($job->journey_type_id == 2)
                                        {{$job->getAirportPickupLocation->pickup_point ?? ''}} {{$job->getAirport->display_name ?? ''}}
                                        @else
                                        {{$job->address ?? ''}}
                                    @endif
                                    </td>
 
                                    <td>
                                    @if($job->journey_type_id == 1)
             T2 {{$job->getAirport->display_name ?? ''}}
                                            @else
                                            {{$job->address ?? ''}}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @endif 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal" id="Driver_allocation_modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content driver_modal_content">
                    <div class="d-flex justify-content-end driver_modal_header">
                        <button type="button" class="d-flex justify-content-center btn-close" data-bs-dismiss="modal"
                            onclick="handleModal()">x</button>
                    </div>

                    <form action="{{route('admin.assign_driver')}}" method="POST">
                        @csrf
                        <div class="modal-body driver_modal_body row">
                            <div class="col-md-3 d-flex align-items-center driver_columns">
                                <span style="margin-right:5px">PreAlloc Job </span>
                                <input type="text" style="width:110px;" class="input_box" name="job_number"
                                    id="job_number">
                            </div>
                            <input type="hidden" id="modal_job_id" name="modal_job_id">

                            <div class="col-md-2 d-flex align-items-end driver_columns">
                                <span></span>
                                <div>
                                    <span>Number</span><input type="text" value="48" class="input_box"
                                        style="width:100%;">
                                </div>

                            </div>

                            <div class="col-md-2 d-flex flex-column driver_columns">
                                <span>Name</span>
                                <select name="driver" style="width:100%">
                                    <option>--select--</option>
                                      @if(count($drivers) > 0)
                                        @foreach($drivers as $driver)
                                            <option value="{{$driver->id}}">{{$driver->name}}</option>
                                        @endforeach 
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-1 d-flex flex-column driver_columns">
                                <span>C/S</span>
                                <select name="c/s" id="" class="w-100">
                                    <option value="">S</option>
                                    <option value="">C</option>
                                </select>
                            </div>

                            <div class="col-md-2 d-flex flex-column driver_columns">
                                <span>Driver Type</span>
                                <input type="text" value="567" class="input_box" style="width:100%">
                            </div>

                            <div class="col-md-2 d-flex align-items-center gap-1">
                                OK? <input type="text" value="yes" class="input_box" style="width:100%">
                            </div>

                            <div class=" d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary save_btn">Assign</button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    </div>

    @section('javascript-section')

    <script>
    $(document).ready(function() {
    var dataTable = $('#transfer_job_table').DataTable();
    dataTable.page.len(100).draw();
    
});
</script>

<script>
    function handleModal(e) {

        const modal = document.getElementById("Driver_allocation_modal");
        if (modal.style.display == "" || modal.style.display == "none") {

            modal.style.display = "block";
        } else {
            modal.style.display = "none";
        }
    }
</script>



<script>
$(document).ready(function() {
    const endDate = document.getElementById("end_date");
    const startDate = document.getElementById("start_date");
    var currentDate = new Date();
    var nextDay = currentDate.toISOString().slice(0, 10);
    endDate.value = nextDay;
    var firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
    var year = firstDayOfMonth.getFullYear();
    var month = (firstDayOfMonth.getMonth() + 1).toString().padStart(2, '0');
    var day = firstDayOfMonth.getDate().toString().padStart(2, '0');
    var firstDayOfMonthFormatted = `${year}-${month}-${day}`;

    startDate.value = firstDayOfMonthFormatted;
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
 @endsection
 @endsection