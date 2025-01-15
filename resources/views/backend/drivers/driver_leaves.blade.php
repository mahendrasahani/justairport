@extends('layouts/backend/main')
@section('main-section')

<style>
 .row{
    margin: 0px ;
 }

.table-responsive{
    padding: 0 !important;
    width: 100% !important;
}

.dt-container div div{
    padding: 0 !important;
}

.driver_header{
   
    padding: 10px;
    font-weight: 500;
  
}



</style>




    <div class="content-wrapper">
    <div class="main-container verified_driver" style="padding: 0px !important;">
        <!-- Row for Heading and Search Box -->
        <div class="driver_header">
        <h3 class="">Verify Drivers Documents</h3>
        </div>
    
        <!-- Table -->
        <div class="box main-container my-0" style="width: 100% !important;">
            <div class="box-body">
                <table id="driver_leaves_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Total Days</th>
                            <th>Action</th>
                            <th>Applied Date</th>
                        </tr>
                    </thead>
                    <tbody id="driver_body">
                        @foreach($driver_leaves as $driver_leave)
                        <tr>
                            <td>1</td>
                            <td>{{$driver_leave->name}} {{$driver_leave->call_sign}}</td>
                            <td>{{\Carbon\Carbon::parse($driver_leave->start_date)->format('d-m-Y h:s')}}</td>
                            <td>{{\Carbon\Carbon::parse($driver_leave->end_date)->format('d-m-Y h:s')}}</td>
                             
                            <td>{{$driver_leave->total_days}}</td>
                            <td>
                                @if($driver_leave->approval_status == 'Approved')
                                <button class="btn btn-success btn-sm save_btn mt-0">Approved</button>
                                @else
                                <button class="btn btn-danger btn-sm save_btn mt-0">Rejected</button>
                                @endif
                            </td>
                            <td>{{\Carbon\Carbon::parse($driver_leave->posted_on)->format('d-m-Y')}}</td>
                        </tr> 
                        @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        
    </div>
   



    @section('javascript-section')

<script>
  document.addEventListener("DOMContentLoaded", () => {
        $('#driver_leaves_table').DataTable()
    })

$(document).ready(function() {
    var dataTable = $('#driver_leaves_table').DataTable();
    dataTable.page.len(100).draw();
});
 </script>
 @endsection
 @endsection