@extends('layouts/backend/main')
@section('main-section')
<style>
   
  
#delete_table{
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
  background: #fff;
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





#delete_table_wrapper .row{
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

  </style>
<div class="content-wrapper">
    <div class="container">
    
        <div class="row">
            <div class="col"> 
                     
                    
                <div class="box main-container"> 
                    <div class="box-body"> 
                        <table id="delete_table" class="table table-bordered table-striped">
                        <div class="custom_table_header">
                            <p>Deleted Jobs</p> 
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
                            <tbody class="table_body" id="deleted_job">
                                <!-- Sample Job List Data (Replace with actual data from backend) -->
                                @if(count($jobs) > 0)
                                @foreach($jobs as $index => $job)
                                <tr>
                                    <td><a href="{{route('admin.job.view',[$job->id])}}" class="text-decoration-none">{{$job->job_number ?? ''}}</a></td>
                                    <td>{{$job->job_date}} {{Carbon\Carbon::parse($job->job_time)->format('h:i') ?? ''}}</td>
                                    <td>{{$job->passenger_name ?? ''}}</td>
                                    <td>{{$job->passenger_phone ?? ''}}</td> 
                                    <td><span class="badge bg-success">{{$job->getJobStatus->status_name}}</span></td>
                                    <td class="driver">
                                                @if($job->getDriver == '')
                                                    <a href="#" class="text-decoration-none driver" style="height:18px"></a>
                                                @else
                                                    <a href="#" class="text-decoration-none driver"
                                                    onclick="handleModal(`modal_btn{{$index}}`,`{{$job->job_number}}`,`{{$job->id}}`)">{{$job->getDriver->call_Sign ?? ''}}</a>

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
    
    </div>
    
@section('javascript-section')


<script>
    document.addEventListener("DOMContentLoaded", () => {
        const date = new Date();
        const startDate = document.getElementById("startDate");
        const endDate=document.getElementById("endDate");
        const formattedDate = date.toISOString().split('T')[0];
        startDate.value = formattedDate;
        endDate.value=formattedDate;
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

<!-- <script>
    function handleModal(e) {

        const modal = document.getElementById("Driver_allocation_modal");
        if (modal.style.display == "" || modal.style.display == "none") {

            modal.style.display = "block";
        } else {
            modal.style.display = "none";
        }
    }
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
    document.addEventListener("DOMContentLoaded", () => {
        $('#delete_table').DataTable()
    }) 
</script>

 @endsection
 @endsection