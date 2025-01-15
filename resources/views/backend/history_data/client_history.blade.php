
@extends('layouts/backend/main')
@section('main-section')
<div class="content-wrapper">
<div class="container-fluid">
<div class="col-12 p-0">

<div class="box main-container table_responshive_elements">
    <table class="table table-bordered" id="clientHistoryTable">
    <div class="custom_table_header d-flex justify-content-between">
        <p>Client History</p>
    </div>
        <thead>
            <tr style="background-color: #f9f9f9;">
                <th>SN</th>
                <th>Name</th>
                <th>Telephone</th>
                <th>Address</th> 
            </tr>
        </thead>
    </table>
</div>
</div>
</div>
</div>

<!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
@section('javascript-section')
<script>
$(document).ready(function() {
    $('#clientHistoryTable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 500, // Set the number of records per page
        lengthMenu: [[500, 1000, 2000, 5000, 10000], [500, 1000, 2000, 5000, 10000]],
        ajax: '{{ route('admin.history_data.client_history_table') }}', 
        columns: [
            { data: 'id', name: 'id' }, 
            { data: 'name', name: 'name' }, 
            { data: 'telephone', name: 'telephone' },
            { data: 'address', name: 'address' }, 
        ]
       
    });
});
</script>
@endsection
@endsection