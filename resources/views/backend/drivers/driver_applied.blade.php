@extends('layouts/backend/main')
@section('main-section')

<style>
 .table-responsive{
    padding: 0 !important;
}

.driver_header{
    font-size: 12px;
    padding:10px;
    font-weight: 500;

}

h3{
    font-weight: 600;
    font-size: 20px;
    margin-bottom: 0;
}


</style>

    <div class="content-wrapper">
    <div class="main-container" style="padding: 0 !important;">

    <div class="driver_header">
        <h3>Driver Applied</h3>
        </div>

        <div class="box main-container " style="width: 100%;">
            <div class="box-body">
                <table id="driver_applied_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Contact No</th>
                            <th>Zip Code</th>
                            <th>Car Model</th>
                            <th>Car Year</th>
                        </tr>
                            </thead>
                            <tbody id="driver_body">
                        @php
                            $sn = 1;
                        @endphp
                     
                    @if(count($apply_drivers)>0)
                        @foreach($apply_drivers as $apply_driver)
                        <tr>
                            <td>{{$sn++}}</td>
                            <td>{{$apply_driver->name ?? ''}}</td>
                            <td>{{$apply_driver->email ?? ''}}</td>
                            <td>{{$apply_driver->address ?? ''}}</td>
                            <td>{{$apply_driver->mobile ?? ''}}</td>
                            <td>{{$apply_driver->postcode ?? ''}}</td>
                            <td>{{$apply_driver->carmake ?? ''}}</td>
                            <td>{{$apply_driver->caryear ?? ''}}</td>
                        </tr>  
                        @endforeach 
                    @endif


                    </tbody>
                </table>
            </div>
        </div>  
    </div>    
        
    </div>
  
    

    @section('javascript-section')
    <script>
  document.addEventListener("DOMContentLoaded", () => {
        $('#driver_applied_table').DataTable()
    })

$(document).ready(function() {
    var dataTable = $('#driver_applied_table').DataTable();
    dataTable.page.len(100).draw();
});
 </script>
@endsection
 @endsection