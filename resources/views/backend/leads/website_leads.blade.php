@extends('layouts/backend/main')
@section('main-section')

<style> 
   
</style>

    <div class="content-wrapper"> 
        <div class="box main-container" style="width: 100%;"> 
            <div class="container-fuild"  >
                <div class="suspended1">
                    <h3>All Leads</h3>
                </div>
            </div>
            <div class="box-body">
                <table id="suspended_driver_table" class="table table-bordered table-striped ">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Phone</th>
                            <th>Passenger Count</th>
                            <th>Date Time</th>
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody id="driver_body"> 
                        @php $sn = 1; @endphp
                        @foreach($leads as $lead)
                        <tr>
                            <td>{{$sn++}}</td> 
                            <td>{{$lead->from}}</td>
                            <td>{{$lead->to}}</td>
                            <td>{{$lead->phone}}</td>
                            <td>{{$lead->passenger_count}}</td>
                            <td>{{Carbon\Carbon::parse($lead->created_at)->format('d M, Y h:i A')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$leads->links('pagination::bootstrap-5')}}
        </div>
    </div>
@section('javascript-section')
 
@endsection
@endsection
