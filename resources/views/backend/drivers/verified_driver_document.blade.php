@extends('layouts/backend/main')
@section('main-section')
<style>
 .header{
    background-color:#abc4de;
 }

 .row{
    margin: 0px !important;
 }

 h2{
    font-size: 12px;
        font-weight: 600;
        margin-bottom:0 !important;
 }

 .driver_header{
    font-size: 12px;
    padding: 10px;
    font-weight: 500;
}

h3{
    font-weight: 600;
    font-size: 20px;
    margin-bottom: 0;
}

.verified_driver .main-container{
    box-shadow:none;
    border:none;
}

.row.mt-2.justify-content-between {
    padding: 0px 0px 9px 0px;

}



</style>

    <div class="content-wrapper">
    <div class="main-container verified_driver" style="padding: 0 !important;">
        <!-- Row for Heading and Search Box -->
        <div class="driver_header">
        <h3>Verify Drivers Documents</h3>
        </div>
        <!-- Table -->
        <div class="box main-container" style="width:100%;">
            <div class="box-body">
                <table id="verified_driver_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Driver Name</th>
                            <th>Documents</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="driver_body">
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>Driver's License</td>
                            <td><a href="/path/to/driver_license.pdf" target="_blank">View File</a></td>
                            <td>
                                <button class="btn btn-success btn-sm save_btn mt-0">Approve</button>
                                <button class="btn btn-danger btn-sm save_btn mt-0">Reject</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>Insurance Certificate</td>
                            <td><a href="/path/to/insurance_cert.pdf" target="_blank">View File</a></td>
                            <td>
                                <button class="btn btn-success btn-sm save_btn mt-0">Approve</button>
                                <button class="btn btn-danger btn-sm save_btn mt-0">Reject</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
            </div>
    </div>
    
@section('javascript-section')
<script>
    $(document).ready(function () {
    $('#verified_driver_table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true
    });
});

</script>
@endsection
 @endsection