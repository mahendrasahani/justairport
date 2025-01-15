
@extends('layouts/backend/main')
@section('main-section')
<div class="content-wrapper">
<div class="container-fluid">
<div class="col-12 p-0">
<div class="box main-container table_responshive_elements">
    <table class="table table-bordered" id="jobHistoryTable">
    <div class="custom_table_header d-flex justify-content-between">
        <p>Job History</p>
    </div>
        <thead>
            <tr style="background-color: #f9f9f9;">
                <th>SN</th>
                <th>Job number</th>
                <th>Date</th>
                <th>Account</th>
                <th>Passenger</th> 
                <th>Phone</th>
                <th>Car</th> 
                <th>From</th>
                <th>To</th>
                <th>Price</th>
                <th>Notes</th>
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
    $('#jobHistoryTable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 500, // Set the number of records per page
        lengthMenu: [[500, 1000, 2000, 5000, 10000], [500, 1000, 2000, 5000, 10000]],
        ajax: '{{ route('admin.history_data.job_history_table') }}',
        columns: [
            { data: 'id', name: 'id' }, 
            { data: 'number', name: 'number' }, 
            { data: 'job_date', name: 'job_date' },
            { data: 'client_name', name: 'client_name' },
            { data: 'passenger', name: 'passenger' },
            { data: 'telephone', name: 'telephone' },
            { data: 'service', name: 'service' },
            { data: 'pickup_location', name: 'pickup_location' },
            { data: 'drop_location', name: 'drop_location' },
            { data: 'cli_total_price', name: 'cli_total_price' },
            { data: 'details', name: 'details' },
            // { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endsection
@endsection