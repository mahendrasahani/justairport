 @extends('layouts/backend/main')
@section('main-section')
 
<style>
    h3 {
        font-size: 12px;
        font-weight: 600;
        margin-bottom:0 !important;
    } 
    .driver_header {
        background: #abc4de;
        font-size: 12px;
        padding: 4px 2px;
        font-weight: 500;
        box-shadow: inset 3px -9px 5px #8cbdef;
    } 
    #for_driver_modal .modal-content, #for_driver_modal .modal-content .modal-body{
        padding: 0 !important;
    }
    .date_types{
        padding: 10px 5px;
    }
    .datatable tr td{
        padding: 0px 7px !important;
    }
    .submitbtnns{
        width: 80px !important;
        height: 40px !important;
        background-color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        font-size: 16px !important;
    }
    .bgtd{
        background-color: #00ffff !important;
    }
    .disabled{
        background: #f8f8f8;
        border: 1px solid rgba(118, 118, 118, 0.3);
        color: rgb(84, 84, 84);
    }
    .calculation_section{
        padding: 20px 120px;
        background: #f1f1f1;
    }
    .calculation_section table{
        background: white;
    }
    .text-wight{
        color:#fff;
        margin-top: 8px;
        margin-right: 15px;
        font-size: 17px;
        font-weight: 500;
    }
</style>

<div class="content-wrapper">
<div class="main-container border rounded" style="margin: 0 auto;padding:0 !important">
<div class="driver_header"> 
        <h3 class="">Job For Driver</h3>
        </div>
        <div class="box-body">
            <form id="" action="#" method="GET"> 
                <div class="container">
                <div class="row"> 
                    <div class="col-sm-2 driver_search_field mt-4">
                        <div class="autocomplete" style="width:100%;"> 
                            <span>C/S</span>
                            <input id="c_s" type="text" name="c_s" placeholder="Call Sign" class="input_box w-100" autocomplete="off" value="{{isset($_GET['c_s']) && $_GET['c_s'] != '' ? $_GET['c_s'] : ''}}" required>
                        </div>  
                    </div>

                    <div class="col-sm-2 driver_search_field mt-4"> 
                        <div class="autocomplete" style="width:100%;">
                            <span>Driver Number</span>
                            <input id="driver_number" type="text" name="driver_number" placeholder="Driver Number" class="input_box w-100" autocomplete="off" readonly value="{{isset($_GET['driver_number']) && $_GET['driver_number'] != '' ? $_GET['driver_number'] : ''}}">
                        </div>                     
                    </div>

                    <div class="col-sm-3 driver_search_field mt-4">
                        <div class="autocomplete" style="width:100%;"> 
                            <span>Name</span>
                            <input id="driver_name" type="text" name="driver_name" placeholder="Driver Name" class="input_box w-100" autocomplete="off" readonly value="{{isset($_GET['driver_name']) && $_GET['driver_name'] != '' ? $_GET['driver_name'] : ''}}">
                        </div>
                    </div>  
                    <div class="col-md-4"></div>  
                    <div class="col-sm-12 d-flex mt-3">
                        <div class="" style="margin-right:20px">
                            <span>From</span>
                            <input type="text" id="start_date" style="width: 100%;" class="input_box date_types" name="from_date" autocomplete="off" value="{{isset($_GET['from_date']) && $_GET['from_date'] != '' ? $_GET['from_date'] : ''}}" required placeholder="DD/MM/YY">
                         </div> 
                        <div>
                            <span >To</span>
                            <input type="text" id="end_date" style="width:100%;" class="input_box date_types disabled" name="to_date" value="{{isset($_GET['to_date']) && $_GET['to_date'] != '' ? $_GET['to_date'] : ''}}" readonly placeholder="DD/MM/YY">
                         </div> 
                    </div> 

                    <div class="col-lg-12 d-flex justify-content-end align-items-center mb-4">
                            <span>
                                <a href="{{route('admin.for_driver')}}" class="btn btn-info text-wight">Clear</a>
                            </span>
                            <button type="submit" class="btn btn-primary save_btn submitbtnns" id="search_button">Search</button>
                           
                        
                    </div> 
                </div>
                </div> 
            </form> 
    
        @if (count($jobs) > 0 && $driver_account == null)
            <div class="row calculation_section">
                <form action="{{route('admin.driverAccount')}}" method="POST">
                    @csrf
            <table>           
                <tr>
                    <td>
                        <lable>Driver Code</lable><br>
                        {{$c_s}}
                        <input type="hidden" name="driver_code" value="{{$c_s}}">
                    </td>

                    <td>
                        <lable>Start Date</lable><br>
                        {{Carbon\Carbon::parse($from_date)->format('d/m/Y')}}
                        <input type="hidden" name="start_date" value="{{$from_date}}">
                    </td>

                    <td>
                        <lable>End Date</lable><br>
                        {{Carbon\Carbon::parse($to_date)->format('d/m/Y')}}
                        <input type="hidden" name="end_date" value="{{$to_date}}">

                    </td>

                    <td>
                        <lable>Total Jobs</lable><br>
                        {{count($jobs)}}
                        <input type="hidden" name="total_job_count" value="{{count($jobs)}}">
                    </td>

                    <td>
                        <lable><b>Total Job Value</b></lable><br>
                        @php
    $total_amount_all_jobs = $calculation[0]->total_amount;
                        @endphp
                         <input type="hidden" name="total_job_amount" value="{{$total_amount_all_jobs}}">
                        {{$total_amount_all_jobs}}
                    </td>
                </tr>    

                <tr>
                    <td>
                        <lable>Congestion Charge</lable><br>
                        @php
    $congestion_charge = $calculation[0]->total_congestion_charge;
                        @endphp
                         <input type="hidden" name="congestion_charge" value="{{$congestion_charge}}">
                        {{$congestion_charge }}
                    </td>

                    <td>
                        <lable>Drop Off Charge</lable><br>
                        @php
    $drop_off_charge = $calculation[0]->total_drop_off_charge ?? 0;
                        @endphp
                        <input type="hidden" name="drop_off_charge" value="{{$drop_off_charge}}">
                        {{ $drop_off_charge }}
                    </td>
                    
                    <td>
                        <lable>Parking Charge</lable><br>
                        @php
    $total_amount_parking_collection = $calculation[0]->total_amount_parking_collection ?? 0;
                        @endphp
                        <input type="number" name="parking_charge" id="parking_charge" placeholder="Enter Parking Charge"> 

                        {{ $total_amount_parking_collection }}

                    </td>
                    <td>
                        <lable>Hotel Comm.</lable><br>
                        <input type="number" name="hotel_commission" id="hotel_commission" placeholder="Enter Hotel Commission">

                    </td>

                    <td>
                        <lable><b>Driver Earning</b></lable><br>
                        @php
    $driver_earning = $total_amount_all_jobs - $congestion_charge - $drop_off_charge - $total_amount_parking_collection;
                        @endphp
                        <input type="text" name="driver_earning" id="driver_earning" value="{{$driver_earning}}" readonly>
                        <input type="hidden" name="driver_earning_old" id="driver_earning_old" value="{{$driver_earning}}">
                        
                    </td>
                </tr>  
                <tr>
                    <td>
                        <lable>Rate %</lable><br>
                        @php
    $rate = ($total_amount_all_jobs - $congestion_charge - $drop_off_charge - $total_amount_parking_collection) > 724 ? 22 : 24;
                        @endphp
                        <input type="hidden" name="rate" id="rate" value="{{$rate}}">
                        {{$rate}}%
                    </td>

                    <td>
                        <lable>Rent</lable><br>
                        @php
    $rent = ($driver_earning * $rate) / 100
                        @endphp
                        <input type="hidden" name="rent" id="rent" value="{{$rent}}">
                        {{$rent}}   
                    </td>

                    <td>
                        <lable>Accounts</lable><br>
                        @php
    $accounts = $calculation[0]->count_acc_and_online_jobs ?? 0;
                        @endphp
                         <input type="hidden" name="count_acc_and_online_jobs" id="count_acc_and_online_jobs" value="{{$accounts}}">
                        {{ $accounts }}
                    </td> 
                    
                    <td>
                        <lable>Topi Jobs</lable><br> 
                        @php
    $topi_jobs = $calculation[0]->count_topi_jobs ?? 0;
                        @endphp
                        <input type="hidden" name="count_topi_jobs" id="count_topi_jobs" value="{{$topi_jobs}}">
                        {{ $topi_jobs }} 
                    </td> 

                    <td>
                        <lable><b>Driver B/F</b></lable><br>
                        @php
    $driver_b_f = $calculation[0]->driver_b_f ?? 0;
                        @endphp
                         <input type="hidden" name="driver_b_f" id="driver_b_f  " value="{{$driver_b_f}}">
                        {{ $driver_b_f }}
                    </td>
                </tr> 

                <tr>
                    <td>
                        <lable>Parking Adjustments</lable><br>
                        <input type="number" name="parking_adjustment" id="parking_adjustment" onkeyup="totalPayableWithAdjustment();" placeholder="Enter Parking Adjustment">

                    </td>

                    <td>
                        <lable>Commission Adjustments</lable><br>
                        <input type="number" name="commission_adjustment" id="commission_adjustment" onkeyup="totalPayableWithAdjustment()" placeholder="Enter Commission Adjustment">
                    </td>

                    <td>
                        <lable>Other Adjustments</lable><br>
                        <input type="number" name="other_adjustment" id="other_adjustment" onkeyup="totalPayableWithAdjustment()" placeholder="Enter Other Adjustment">
                    </td>

                    <td>
                        <lable>Other Adjustment Details</lable><br>
                        <input type="text" name="adjustment_detail" id="adjustment_detail" placeholder="Write Adjustment Detail">
                    </td>

                    <td>
                        <lable><b>Total Payable</b></lable><br>
                         @php
    $total_payable = ($rent - $calculation[0]->account_collection) +
        $calculation[0]->total_topi_jobs_amount + $driver_b_f;
                         @endphp
                         <input type="hidden" id="total_payable_old" value="{{$total_payable}}">
                         <input type="text" id="total_payable" name="total_payable" value="{{$total_payable}}" readonly>
                       
                    </td>
                </tr> 

                <tr>
                    <td>
                        <lable>Payment Type</lable><br>
                        <select name="payment_type">
                            <option value="">Select Payment Type</option>
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque</option>
                            <option value="chargeback">Chargeback</option>
                        </select> 
                    </td>

                    <td>
                        <lable>Payment Details</lable><br>
                        <input type="text" name="payment_detail" placeholder="Write Payment Details">
                    </td>

                    <td>
                        <lable>Payment</lable><br>
                        <input type="number" name="payment" id="payment" placeholder="Enter Payment Amount">
                    </td>

                    <td>
                        
                        <input type="submit" value="Finalize">
                    </td>

                    <td>
                        <lable><b>Balance C/F</b></lable><br>
                            @php
    $balance_c_f = $total_payable;
                            @endphp
                            <input type="text" id="balance_c_f" name="balance_c_f" value="{{$balance_c_f}}" readonly>
                    </td>
                </tr>  

                <tr>

                    <td colspan="5"> 
                        <lable>Remarks (if any)</lable><br>
                        <textarea id="remark" name="remark" rows="2" cols="150" placeholder="Remarks (if any)"></textarea>
                    </td> 

                </tr>  
            </table>
            </form>
            </div>
        @endif







        @if ($driver_account != null)
        <div class="row calculation_section">
            <table>           
                <tr>
                    <td><lable>Driver Code</lable><br>{{$driver_account->driver_code}}</td> 
                    <td><lable>Start Date</lable><br>{{Carbon\Carbon::parse($driver_account->start_date)->format('d/m/Y')}}</td> 
                    <td><lable>End Date</lable><br>{{Carbon\Carbon::parse($driver_account->end_date)->format('d/m/Y')}}</td>
                    <td><lable>Total Jobs</lable><br>{{$driver_account->total_jobs_count}}</td>
                    <td><lable><b>Total Job Value</b></lable><br>£{{$driver_account->total_jobs_amount}}</td>
                </tr>    

                <tr>
                    <td><lable>Congestion</lable><br>£{{$driver_account->congestion_charge}}</td>
                    <td><lable>Drop Off Charge</lable><br>£{{$driver_account->drop_off_charge}}</td>
                    <td><lable>Parking Charge</lable><br>£{{$driver_account->parking_charge}}</td>
                    <td><lable>Hotel Comm.</lable><br>£{{$driver_account->hotel_commission}}</td>
                    <td><lable><b>Driver Earning</b></lable><br>£{{$driver_account->driver_earning}}</td>
                </tr>  
                <tr>
                    <td><lable>Rate %</lable><br>{{$driver_account->rate_percent}}%</td>
                    <td><lable>Rent</lable><br>£{{$driver_account->rent}}</td>
                    <td><lable>Accounts</lable><br>{{$driver_account->accounts_count}}</td>
                    <td><lable>Topi Jobs</lable><br>{{$driver_account->topi_jobs_count}}</td>
                    <td><lable><b>Driver B/F</b></lable><br>£{{$driver_account->driver_b_f}}</td>
                </tr>  
                <tr>
                    <td><lable>Parking Adjustments</lable><br>£{{$driver_account->parking_adjustment}}</td>
                    <td><lable>Commission Adjustments</lable><br>£{{$driver_account->commission_adjustment}}</td>
                    <td><lable>Other Adjustments</lable><br>£{{$driver_account->other_adjustments}}</td>
                    <td><lable>Other Adjustment Details</lable><br>{{$driver_account->adjustment_detail}}</td>
                    <td><lable><b>Total Payable</b></lable><br>£{{$driver_account->total}}</td>
                </tr>  
                <tr>
                    <td><lable>Payment Type</lable><br>{{$driver_account->payment_type}}</td>
                    <td><lable>Payment Details</lable><br>{{$driver_account->payment_details}}</td>
                    <td><lable>Payment</lable><br>£{{$driver_account->payment}}</td>
                    <td><button class="btn btn-success save_btn">PAID</button></td>
                    <td><lable><b>Balance C/F</b> £{{$driver_account->balance_c_f}}</lable><br></td>
                </tr>  
                <tr>
                    <td colspan="5"><lable>Remarks (if any)</lable><br>{{$driver_account->remark}}</td> 
                </tr>  
            </table>
        </div>
        @endif

{{--
                @if ($driver_account != null)
                <table id="control_jobs_table" class="table table-bordered table-striped bgtd" style="width: 100% !important;">
                        <thead>
                            <tr>   
                                <th scope="col" class="date_time">START DATE</th>
                                <th scope="col" class="job">END DATE</th> 
                                <th scope="col" class="account">JOBS</th>
                                <th scope="col" class="th_source">TOTAL AMOUNT</th>
                                <th scope="col" class="job_details">CASH</th>
                                <th scope="col" class="job_details">PARKING</th>
                                <th scope="col" class="job_details">ADVANCE</th> 
                                <th scope="col" class="job_details">ADJUSTMET</th> 
                                <th scope="col" class="job_details">NET AMOUNT</th> 
                            </tr>
                        </thead>
                        <tbody id="control_table" class="table_body datatable">  
                                    <tr id="" >  
                                        <td>{{$driver_account->start_date}}</td>
                                        <td>{{$driver_account->end_date}}</td>  
                                        <td>{{$driver_account->total_jobs}}</td>
                                        <td>{{$driver_account->total_amount}}</td>
                                        <td>{{$driver_account->cash_collection ?? '0'}}</td>
                                        <td>{{$driver_account->total_parking_with_driver ?? '0'}}</td>
                                        <td>{{$driver_account->weekly_advance ?? '0'}}</td>
                                        <td>{{$driver_account->adjustment ?? '0'}}</td>
                                        <td>{{$driver_account->net_amount ?? '0'}}</td> 
                                    </tr>
                                 
                        </tbody>
                    </table> 
                @endif

                --}}

                {{--
                    @if($driver_account == null && count($jobs) > 0)
                <div class="col-lg-12 d-flex justify-content-end mb-4">
        
                <form action="{{route('admin.driverAccount')}}" method="POST">
                        @csrf
                    <input id="c_s" type="hidden" name="c_s" placeholder="Call Sign" class="input_box w-100" autocomplete="off" value="{{isset($_GET['c_s']) && $_GET['c_s'] != '' ? $_GET['c_s'] : ''}}">
                    <input type="hidden" id="start_date" style="width: 100%;" class="input_box date_types" name="from_date" value="{{isset($_GET['from_date']) && $_GET['from_date'] != '' ? $_GET['from_date'] : ''}}">
                    <input type="hidden" id="end_date" style="width:100%;" class="input_box date_types disabled" name="to_date" value="{{isset($_GET['to_date']) && $_GET['to_date'] != '' ? $_GET['to_date'] : ''}}" readonly>
                        <button type="submit" class="btn btn-primary save_btn submitbtnns">Mark as Paid</button>
                    </form>
                    </div>  
                    @elseif($driver_account != null && count($jobs) > 0) 
                    <div class="col-lg-12 d-flex justify-content-end mb-4">
                    <h2 style="color:green;">PAID</h2>
                    </div>  
                    @endif
                    <br><br>
                    --}}
                    
                @if (count($jobs) > 0)
                <div class="row">
                <p>Job Details</p>
                    <table id="calculation_jobs_table" class="table table-bordered table-striped bgtd" style="width: 100% !important;">
                        <thead>
                            <tr>   
                                <th scope="col" class="date_time">DATE & TIME</th>
                                <th scope="col" class="job">JOB</th> 
                                <th scope="col" class="account">ACCOUNT</th>
                                <th scope="col" class="th_source">CAR</th>
                                <th scope="col" class="job_details">PICKUP</th>
                                <th scope="col" class="job_details">DROP</th>
                                <th scope="col" class="job_details">NOTES</th>
                                <th scope="col" class="job_details">PAYMENT</th>
                                <th scope="col" class="job_details">JOB STATUS</th>
                                <th scope="col" class="driver_th">DRIVER</th>
                                <th scope="col" class="job_details">C SHARE</th>
                                <th scope="col" class="job_details">D SHARE</th>
                                <th scope="col" class="job_details">TOTAL</th> 
                            </tr>
                        </thead>
                        <tbody id="control_table" class="table_body datatable"> 
                                @foreach ($jobs as $index => $job)
                                    <tr id="{{ $index }}" >  
                                        <td class="date_time">{{ Carbon\Carbon::parse($job->job_date)->format('d M, Y') ?? '' }} {{ Carbon\Carbon::parse($job->job_time)->format('H:i') ?? '' }}</td>
                                        <td class="job">
                                             <a href="{{ route('admin.job.view', [$job->id]) }}">{{ $job->job_number ?? '' }}</a>
                                        </td> 
                                        <td class="account">
                                            @if ($job->account_id == 2)
                                                CASH
                                            @elseif($job->account_id == 3)
                                                ONLINE
                                            @else
                                                {{ Str::limit($job->getAccount->account_number ?? '') }}
                                            @endif 
                                        </td>
                                        <td class="source">{{ $job->getCarCategory->short_name ?? '' }}</td>
                                        <td class="job_details">
                                            @if ($job->journey_type_id == 1)
                                                {{ strtoupper($job->postcode) }}
                                            @elseif($job->journey_type_id == 2)
                                                {{ strtoupper($job->getAirport->display_name) ?? '' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($job->journey_type_id == 1)
                                                {{ strtoupper($job->getAirport->display_name) ?? '' }}
                                            @elseif($job->journey_type_id == 2)
                                                {{ strtoupper($job->postcode) }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $job->booster_seat_count > 0 ? $job->booster_seat_count . ' BS' : '' }}
                                            @if ($job->booster_seat_count > 0)
                                                @foreach ($job->child_age as $index => $age)
                                                    {{ $age }}Y
                                                @endforeach
                                            @endif
                                            {{ $job->flight_number }}
                                            {{ $job->airport_terminal ?? '' }}
                                        </td>
                                        <td>
                                            @if ($job->payment_status == 0)
                                                PENDING
                                            @elseif($job->payment_status == 1)
                                                PAID
                                            @elseif($job->payment_status == 2)
                                                VOID
                                            @endif
                                        </td>
                                        <td>
                                            {{strtoupper($job->getJobStatus?->status_name)}}
                                        </td>
                                        <td class="driver_td"> 
                                            <small style="font-size: 11px">{{ $job->getDriver->call_Sign ?? '' }}</small>
                                        </td>
                                        <td>{{$job->company_share}}</td>
                                        <td>{{$job->driver_share}}</td>
                                        <td>{{$job->total_price}}</td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table> 
                    </div> 
                @endif 
        </div> 
    </div>
</div> 
@section('javascript-section')
    <script>
            function autocompleteForDriver(inp, arr) {
                let currentFocus;
                inp.addEventListener("input", function(e) {
                    let a, b, i, val = this.value;
                    closeAllLists();
                    if(!val){
                        return false;
                    }
                    currentFocus = -1;
                    a = document.createElement("DIV");
                    a.setAttribute("id", this.id + "autocomplete-list");
                    a.setAttribute("class", "autocomplete-items");
                    this.parentNode.appendChild(a);
                    for (i = 0; i < arr.length; i++) {
                        if (arr[i].cs.toUpperCase().startsWith(val.toUpperCase())) {
                            b = document.createElement("DIV");
                            b.innerHTML = "<strong>" + arr[i].cs.substr(0, val.length) + "</strong>";
                            b.innerHTML += arr[i].cs.substr(val.length);
                            b.innerHTML += "<input type='hidden' value='" + JSON.stringify(arr[i]) + "'>";
                            b.addEventListener("click", function(e) {
                                let selectedItem = JSON.parse(this.getElementsByTagName("input")[0].value);
                                inp.value = selectedItem.cs;  
                                document.getElementById("driver_name").value = selectedItem.name;
                                document.getElementById("driver_number").value = selectedItem.driverNumber;  
                                closeAllLists();
                            });
                            a.appendChild(b);
                        }
                    }
                }); 
                $(document).on("blur", "#c_s", function() {
                    let x = document.getElementById(inp.id + "autocomplete-list");
                    if (x){
                        let firstItem = x.getElementsByTagName("div")[0];
                        if(firstItem){
                            firstItem.click();
                        }
                    }
                });

                inp.addEventListener("keydown", function(e) {
                    let x = document.getElementById(this.id + "autocomplete-list");
                    if (x) x = x.getElementsByTagName("div");
                    if (e.keyCode == 40) {
                        currentFocus++;
                        addActive(x);
                    } else if (e.keyCode == 38) {
                        currentFocus--;
                        addActive(x);
                    } else if (e.keyCode == 13) {
                        e.preventDefault();
                        if (currentFocus > -1) {
                            if (x) x[currentFocus].click();
                        }
                    }
                });
                function addActive(x) {
                    if (!x) return false;
                    removeActive(x);
                    if (currentFocus >= x.length) currentFocus = 0;
                    if (currentFocus < 0) currentFocus = (x.length - 1);
                    x[currentFocus].classList.add("autocomplete-active");
                } 
                function removeActive(x) {
                    for (let i = 0; i < x.length; i++) {
                        x[i].classList.remove("autocomplete-active");
                    }
                } 
                function closeAllLists(elmnt) {
                    let x = document.getElementsByClassName("autocomplete-items");
                    for (let i = 0; i < x.length; i++) {
                        if (elmnt != x[i] && elmnt != inp) {
                            x[i].parentNode.removeChild(x[i]);
                        }
                    }
                }
                document.addEventListener("click", function(e) {
                    closeAllLists(e.target);
                });
            }
            async function fetchDriverList(){
                try {
                    let url = "{{ route('backend.get_driver_call_sign_list') }}";
                    const response = await fetch(`${url}`);
                    const data = await response.json(); 
                    if(data.status === 'success'){
                        let driverList = data.driver_list; 
                        return Object.keys(driverList).map(key => ({
                            cs: key,
                            driver_id: driverList[key].id,
                            name: driverList[key].name,
                            carType: driverList[key].car,
                            driverNumber: driverList[key].driverNumber
                        }));
                    }else{
                        console.warn('Failed to fetch driver list');
                        return [];
                    }
                } catch (error) {
                    console.error('Error fetching driver list:', error);
                    return [];
                }
            }
            document.addEventListener("DOMContentLoaded", async () => {
                const driverList = await fetchDriverList(); 
                autocompleteForDriver(document.getElementById("c_s"), driverList);
            }); 
    </script>

    <script>
                $('#c_s').focus();
    </script>

    <script>
            // document.getElementById('start_date').addEventListener('change', function() {
             
            //     let selectedDate = new Date(this.value);
            //     console.log(selectedDate)
            //     let dayOfWeek = selectedDate.getDay(); 
            //     console.log(dayOfWeek)
            //     if (dayOfWeek !== 4) {
            //         Swal.fire({
            //             title: "Warning!",
            //             text: "Only Thursdays are selectable. Please pick a Thursday.",
            //             icon: "warning"
            //         }); 
            //         this.value = '';
            //         return;
            //     } 
            //     let end_date = new Date(selectedDate);
            //     let daysToWednesday = (10 - dayOfWeek) % 7;
            //     end_date.setDate(selectedDate.getDate() + daysToWednesday);
            //     let formattedEndDate = end_date.toISOString().split('T')[0]; 

            //     console.log(formattedEndDate)

            //     document.getElementById('end_date').value = formattedEndDate; 
            // });
    </script> 
                        <!--- date pick point start --->
<script>
    
            $(document).ready(function () {
                $('#start_date').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true,
                    todayHighlight: true
                })
               .on('changeDate', function (e)
                {
                    let selectedDate = e.date;
                     let dayOfWeek = selectedDate.getDay(); 
                     if (dayOfWeek !== 4)
                     {
                         Swal.fire({
                             title: "Warning!",
                            text: "Only Thursdays are selectable. Please pick a Thursday.",
                            icon: "warning"
                        });
                        $('#start_date').val('');
                         return;
                    }

                      let end_date = new Date(selectedDate);
                     let daysToWednesday = 6;
                    end_date.setDate(selectedDate.getDate() + daysToWednesday);  

                   const day = String(end_date.getDate()).padStart(2, '0'); 
                   const month = String(end_date.getMonth() + 1).padStart(2, '0');
                   const year = String(end_date.getFullYear()); 
                   let formattedEndDate = `${day}/${month}/${year}`;
              
                      $('#end_date').val(formattedEndDate); 
                })
                     
    });
   
</script>
                        <!--- date pick point end --->

    <script>
        $(document).on("change", "#start_date", function ()
        {
            let end_date = $("#end_date").val();
            const today = new Date();
            console.log(end_date);
            if (end_date)
            {
                let parsedEndDate = new Date(end_date);
                if (parsedEndDate < today)
                {
                    $("#search_button").show();
                } else
                {
                    $("#search_button").hide();
                }
            } else
            {
                console.log("No end date selected.");
            }
        });
    </script>

    <script>
        $(document).on("keyup", "#parking_charge", function(){
            console.log('test');
            let parking_charge = $(this).val();
            if(parking_charge == ''){
                parking_charge = 0;
            }
            let driver_earning = $("#driver_earning_old").val();
            let new_driver_earning = parseInt(driver_earning)  + parseInt(parking_charge)
            $("#driver_earning").val(new_driver_earning);  
        });

        $(document).on("keyup", "#hotel_commission", function(){ 
            let hotel_commission = $(this).val();
            let parking_charge = $("#parking_charge").val(); 
            if(parking_charge == ''){
                parking_charge = 0;
            } 
            if(hotel_commission == ''){
                hotel_commission = 0;
            } 
            let driver_earning = $("#driver_earning_old").val();
            console.log(driver_earning);
            let new_driver_earning = (parseInt(driver_earning)  + parseInt(parking_charge) + parseInt(hotel_commission));
            $("#driver_earning").val(new_driver_earning);
        });

        function totalPayableWithAdjustment(){ 
            let parking_adjustment = $("#parking_adjustment").val(); 
            let total_payable_old = $("#total_payable_old").val();  
            let commission_adjustment = $("#commission_adjustment").val();
            let other_adjustment = $("#other_adjustment").val();
            let payment = $("#payment").val();
            console.log(commission_adjustment);
            if(parking_adjustment == ''){
                parking_adjustment = 0;
            } 
            if(commission_adjustment == ''){
                commission_adjustment = 0;
            }  
            if(other_adjustment == ''){
                other_adjustment = 0;
            }  
            if(payment == ''){
                payment = 0;
            }  
            let new_total_payable = ((parseFloat(total_payable_old) - parseFloat(parking_adjustment)) +
            parseFloat(commission_adjustment) + parseFloat(other_adjustment));
            $("#total_payable").val(new_total_payable);  
            $("#balance_c   _f").val(parseFloat(new_total_payable) - parseFloat(payment).toFixed(2));  
        }

        $(document).on("keyup", "#payment", function(){
            let payment = $(this).val(); 
            let total_payable = $("#total_payable").val(); 
            if(payment == ''){
                payment = 0;
            }
            if(total_payable == ''){
                total_payable = 0;
            } 
            let balance_c_f = parseFloat(total_payable) - parseFloat(payment);
            $("#balance_c_f").val(parseFloat(balance_c_f).toFixed(2));  
        }); 

    </script>
@endsection
@endsection