@extends('layouts/backend/main')
@section('main-section')

<style>
    .box {width: 100%; border-top: none;}
    #car_type_body td , #car_type_body tr>td{padding: 10px !important;}

    .form-box input{height: 35px;}
    .form-hedding h3{  padding-bottom: 10px;  border-bottom: 1px solid #dcd7d7;}
</style>

<div class="content-wrapper">
    <div class="container mt-3  form-hedding form-box">
        <h3> Analytic</h3> 
        <div class="box" style="margin: 0 auto;">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th> 
                            <th>Job</th>
                            <th>Name</th>
                            <th>IP</th>
                            <th>Browser</th>
                            <th>OS</th>
                            <th>Payment Code</th>
                            <th>Pick-up Date</th>
                            <th>Pick-up Time</th>
                            <th>Booking Date Time</th>
                        </tr>
                    </thead>
                    <tbody id="">
                        @php
                        $sn = 1;
                        @endphp
                        @if(count($booking_logs) > 0)
                            @foreach($booking_logs as $log)
                                <tr>
                                    <td>{{$sn++}}</td>
                                    <td><a href="{{route('admin.edit_jobs', [$log->getJob->id])}}">{{$log->getJob->job_number}}</a></td>
                                    <td>{{$log->getJob->passenger_name}}</td>
                                    <td>{{$log->ip ?? ''}}</td>
                                    <td>{{$log->browser ?? ''}}</td>
                                    <td>{{$log->os ?? ''}}</td>
                                    <td>{{$log->payment_code ?? ''}}</td>
                                    <td>{{\Carbon\Carbon::parse($log->job_date)->format('Y-m-d')}}</td>
                                    <td>{{$log->getJob->job_time ?? ''}}</td>
                                    <td>{{\Carbon\Carbon::parse($log->getJob->created_at)->format('Y-m-d  h:m:i')}}</td>
                                </tr>
                            @endforeach
                        @endif
                   
                    </tbody>
                </table>
            </div>
            {{$booking_logs->links('pagination::bootstrap-5')}}
        </div>
    </div>

</div>


@section('javascript-section') 
@endsection
@endsection