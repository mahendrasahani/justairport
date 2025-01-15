@extends('layouts/backend/main')
@section('main-section')

    <style>
        h3 {
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 0 !important;
        }

        .search_header {
            background: #abc4de;
            font-size: 12px;
            padding: 4px 2px;
            font-weight: 500;
            box-shadow: inset 3px -9px 5px #8cbdef;
        }

        #client_modal .modal-content,
        #client_modal .modal-content .modal-body {
            padding: 0 !important;
        }

        #client_modal .modal-content .main-container {
            width: 100% !important;
        }

        #client_job_table {
            width: 100% !important;
        }
    </style>


    <div class="content-wrapper">
        <div class="main-container border rounded" style="margin: 0 auto;padding:0 !important">
            <div class="search_header">
                <h3>Jobs For Client</h3>
            </div>
            <form id="myForm" action="#" method="GET">
                <div class="row gx-2">
                    <div class="col-sm-3">
                        <label for="client_number" class="form-label">Client Number</label> 
                        <select id="mySelect" style="width: 100%;"></select>
                    </div>
                    <div class="col-sm-3">
                        <label for="client_name" class="form-label">Client Name</label>
                        <input type="text" class="form-control" id="client_name" placeholder="Enter client name"
                            name="client_name">
                    </div>
                    <div class="col-sm-3">
                        <label for="from_date" class="form-label">From Date</label>
                        <input type="text" class="form-control Date_pickerformat" id="from_date" name="from_date" placeholder="DD/MM/YY">
                    </div>
                    <div class="col-sm-3">
                        <label for="to_date" class="form-label">To Date</label>
                        <input type="text" class="form-control Date_pickerformat" id="to_date" name="to_date" placeholder="DD/MM/YY">
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary save_btn" id="modal_btn">Search</button>
                    </div>
                </div>
            </form>

        </div>

        <div class="row">
            <div class="col mt-4">

                <div class="box main-container">
                    <div class="box-body">
                        <table id="table_all_jobs" class="table table-bordered table-striped">
                            <div class="custom_table_header">
                                <p>All Jobs</p>
                            </div>
                            <thead class="table-dark">
                                <tr>
                                    <th>Job</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Account</th>
                                    <!-- <th>Number</th> -->
                                    <th class="driver">Driver</th>
                                    <th>Car</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Price</th>
                                    <th>D Share</th>
                                    <th>Payment</th>
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
                                @if (count($jobs) > 0)
                                    @foreach ($jobs as $index => $job)
                                        <tr>
                                            <td><a href="{{ route('admin.edit_jobs', [$job->id]) }}"
                                                    class="text-decoration-none">{{ $job->job_number ?? '' }}</a></td>
                                            <td>{{ Carbon\Carbon::parse($job->job_date)->format('d-m-Y') }}</td>
                                            <td>{{ Carbon\Carbon::parse($job->job_time)->format('H:i') ?? '' }}</td>
                                            <td>
                                                {{--    @if ($job->payment_type_id == 1)
                                                <p>{{$job->getPaymentType->payment_type_name ?? ''}}</p>
                                                @else 
                                                    @if ($job->payment_status == 0)
                                                    <p style="color:red;">{{$job->getPaymentType->payment_type_name ?? ''}}</p>
                                                        @if ($job->payment_reminder != 1)
                                                        <a href="{{route('admin.send_reminder_mail', [$job->email, $job->id])}}" class="btn btn-primary btn-xs send-remider" title="No remider send yet">Send Reminder</a>
                                                        @else
                                                        <a  href="{{route('admin.send_reminder_mail', [$job->email, $job->id])}}"  class="btn btn-primary btn-xs send-remider1" title="No remider send yet"> Reminder Sent</a>
                                                        @endif
                                                    @else
                                                    <p style="color:green;">{{$job->getPaymentType->payment_type_name ?? ''}}</p>
                                                    @endif 
                                            @endif --}}
                                                @if ($job->account_id == 2)
                                                    CASH
                                                @elseif($job->account_id == 3)
                                                    ONLINE
                                                    @if ($job->payment_status == 0)
                                                        @if ($job->payment_reminder != 1)
                                                            <a href="{{ route('admin.send_reminder_mail', [$job->email, $job->id]) }}"
                                                                class="btn btn-primary btn-xs send-remider"
                                                                title="No remider send yet">Send Reminder</a>
                                                        @else
                                                            <a href="{{ route('admin.send_reminder_mail', [$job->email, $job->id]) }}"
                                                                class="btn btn-primary btn-xs send-remider1"
                                                                title="No remider send yet"> Reminder Sent</a>
                                                        @endif
                                                    @endif
                                                @else
                                                    {{ Str::limit($job->getAccount->account_number ?? '') }}
                                                @endif
                                            </td>
                                            <!-- <td class="account">
                                                {{ $job->getAccount->account_number ?? '' }}</td> -->
                                            <td class="driver">
                                                @if ($job->getDriver == '')
                                                    <!-- <a href="#" class="text-decoration-none driver" style="height:18px"
                                                        onclick="handleModal(`modal_btn{{ $index }}`,`{{ $job->job_number }}`,`{{ $job->id }}`)"></a> -->
                                                @else
                                                    <a href="#" class="text-decoration-none driver"
                                                        onclick="handleModal(`modal_btn{{ $index }}`,`{{ $job->job_number }}`,`{{ $job->id }}`)">{{ $job->getDriver->call_Sign ?? '' }}</a>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $job->getCarCategory->short_name ?? '' }}
                                                <!-- {{ $job->getCarCategory->name ?? '' }} -->
                                            </td>
                                            <td>
                                                @if ($job->journey_type_id == 1)
                                                    {{ $job->postcode ?? '' }}
                                                @else
                                                    {{ $job->getAirport->display_name ?? '' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($job->journey_type_id == 1)
                                                    {{ $job->getAirport->display_name ?? '' }}
                                                @else
                                                    {{ $job->postcode ?? '' }}
                                                @endif
                                            </td>
                                            <td>{{ $job->total_price }}</td>
                                            <td>{{ $job->driver_share }}</td>
                                            <td>
                                                @if ($job->payment_status == 0)
                                                    Pending
                                                @elseif($job->payment_status == 1)
                                                    Paid
                                                @elseif($job->payment_status == 2)
                                                    Void
                                                @endif
                                            </td>
                                            <td>
                                                {{ $job->booster_seat_count > 0 ? $job->booster_seat_count . ' BS' : '' }}
                                                @if ($job->booster_seat_count > 0)
                                                    @foreach ($job->child_age as $index => $age)
                                                        {{ $age }}y
                                                    @endforeach
                                                @endif
                                                {{ $job->flight_number }}
                                                {{ $job->airport_terminal ?? '' }}
                                            </td>
                                            <td>{{ ucfirst($job->job_source ?? '') }} </td>
                                            <!-- <td>{{ $job->passenger_name ?? '' }}</td>
                                                <td>{{ $job->passenger_phone ?? '' }}</td>
                                                <td><span class="badge bg-success">{{ $job->getJobStatus->status_name ?? '' }}</span></td>
                                                <td>{{ $job->job_source ?? '' }}</td> -->
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('javascript-section')
    <script>
        $(document).ready(function() {
            $('#client_job_table').DataTable();
        });
    </script>


    <script>
        $(document).ready(function() {
            var dataTable = $('#client_job_table').DataTable();
            dataTable.page.len(100).draw();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#mySelect').select2({
                ajax: {
                    url: 'http://192.168.1.12/justairports/jims/get-all-client-data',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term,
                            page: params.page || 1,
                            limit: 10
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        const results = data.client.data.map(function(client) {
                            return {
                                id: client.phone,
                                text: client.phone
                            };
                        });

                        return {
                            results: results,
                            pagination: {
                                more: data.client.next_page_url !== null
                            }
                        };
                    },
                    cache: true
                },
                placeholder: 'Search for a client',
                minimumInputLength: 4,
                templateResult: formatClient,
                templateSelection: formatClientSelection
            });

            function formatClient(client) {
                if (client.loading) return client.text;
                console.warn(client);
                return `${client.text}`;
            }

            function formatClientSelection(client) {
                return client.text || client.id;
            }

            $('.Date_pickerformat').datepicker({
                format: 'dd/mm/yyyy',
                autoclose:true,
                todayHighlight:true
            });
        });
    </script>
@endsection

@endsection
