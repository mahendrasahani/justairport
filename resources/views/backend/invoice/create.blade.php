@extends('layouts/backend/main')
@section('main-section')

<style>
 
        .flatpickr-calendar{
        width: 300px !important;
        }
  

    .input-content li {
        list-style: none;
        display: flex;
        gap: 20px;
    }

    .client-col {
        display: flex;
        /* gap: 16px; */
    }
    .border_1{
  border-radius: 4px;
    border: 1px solid #676464;

}

    .select_option{
        height: 35px;
    padding-left: 10px;
    width: 100%;
    }

    .input-content input {
        height: 35px;
        padding-left: 10px;
    }

    .input-content label {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px !important;
        font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }

    .form-list {
        margin: 15px 0;
        align-items: center;
    }
    .client-text.client-text::nth-child(3){column-gap: 30px !important;}

    .Invoices-main {
        padding:10px 10px  20px 10px;
    }
    .client-col{align-items: center;}
    .date-col input{width: 100%;}
    /* .input-content{width: 776px;} */
    .label-text{width: 35%;}
    .input-text{width: 165px;}
    .input-text input{width: 100%;}
    .client-col input{width: 196px;}
    .client-btn{gap: 65px;}
    .client-text{gap: 72px;}
     .invoice-body{ margin: 0 auto;   margin-top: 20px;}
      .extra-warapper{background-color: #ffff;}  
      /* .client-col input{width: 165px;} */
      /* .client-btn input{width: 165px;} */
      .form-list label{font-weight: 500 !important;}
      .input-content label{margin-bottom: 0px !important;}
      .form-list input{font-size: 14px};
      .form-list select{font-size: 14px};
      .form-list::placeholder{font-size: 14px !important;}
        #view-invoice-table{ padding-bottom: 40px;}
        

    /* .form-list input{width: 150px;} */
    .input-content li {
        list-style: none;
        display: flex;
        gap: 20px;
    }

    .client-col {
        display: flex;
        gap: 16px;
    }

    .input-content input {
        height: 35px;
        padding-left: 10px;
    }

    .input-content label {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px !important;
        font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }

    .form-list {
        margin: 15px 0;
        align-items: center;
    }
    .Account_display{
        display: block !important;
    }
    .client-text.client-text::nth-child(3){column-gap: 30px !important;}

    .Invoices-main {
        padding:10px 10px  20px 10px;
    }
    .client-col{align-items: center;}
    /* .date-col input{width: 165px;} */
    /* .select_option{width: 165px;} */
     .invoice-body{ margin: 0 auto;    margin-top: 20px;}
 

    /* .form-list input{width: 150px;} */
    tbody tr{padding: 10px;}
     tbody tr td{padding: 10px !important;}

     table {
            width: 100%;
            border-collapse: collapse;
        }

        th,td {
            border: 1px solid #ddd;
            padding: 8px;
        }
            
        th {
            background-color: #f2f2f2;
        }

        .card{margin-top: 8px;}
        #driver_body>tr>th{padding: 10px !important;}
        .dt-scroll-headInner{width: 100% !important;}
        .card { margin: 0 auto;}
        #view-invoice-table{margin-top: 10px; padding-bottom: 40px;}
        /* #example_info{margin-left: 20px;} */
        .pagination{margin:5px 31px 11px 13px!important}
        .dt-search{margin-right: 30px;}
        div#example_wrapper {margin: 10px;}


</style>
<div class="content-wrapper extra-warapper">

    <div id="view-invoice-table" >
        <div class=" invoice-body"style=" border-bottom:1px solid rgb(180, 174, 174);">
            <div class="custom_table_header driver_header" style=" border-bottom:1px solid rgb(180, 174, 174);">
                <h3>Search Invoice </h3>
        
            </div>
            <div class="mb-4 ">
        
                <form action="{{route('admin.invoice.create')}}">
                    @csrf
                    <div class="input-content"> 
                        <div class="date-col  row col-12 form-list d-flex ">
                          <div class=" col-lg-2 col-md-3 Account_display ">
                            <p class="form-label mb-1">Account</p> 
                            <select class="select_option border_1" name="selected_client" id="selected_client">
                            <option value="all_client" {{isset($_GET['selected_client']) && $_GET['selected_client'] == 'all_client' ? 'selected' : '' }}
                            >All Account</option>
                            @foreach($account_list as $account)
                            <option value="{{$account->id}}" {{isset($_GET['selected_client']) && $_GET['selected_client'] == $account->id ? 'selected' : '' }}>{{$account->account_name}}</option>
                            @endforeach
                            </select>
                            
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <p class="form-label mb-1">Type</p> 
                            <select class="select_option border_1" name="job_type" id="job_type">
                                <option value="job" {{isset($_GET['job_type']) && $_GET['job_type'] == 'job' ? 'selected' : '' }}>Job</option>
                                <option value="invoice" {{isset($_GET['job_type']) && $_GET['job_type'] == 'invoice' ? 'selected' : '' }}>Invoice</option> 
                            </select>
                            
                        </div>
                        <div class="col-lg-2 col-md-3">
                                <label for="" class="form-label">Start Date</label>
                                <input type="date" class="border_1 date_pickers" id="start_date" name="start_date" placeholder="dd/mm/yy" value="{{isset($_GET['start_date']) ? $_GET['start_date'] : ''}}">
                            </div>
                            <div class="col-lg-2 col-md-3">
                                <label >End Date</label>
                                <input class="border_1 date_pickers" type="date" id="end_date" placeholder="dd/mm/yy" name="end_date" 
                                value="{{isset($_GET['end_date']) ? $_GET['end_date'] : ''}}">
                               
                            </div>
                                <div class="form-list col-lg-2 col-md-3  client-btn border-start">
                                    <label for="">Job Number</label>
                                    <input class="border_1" type="text" id="job_number" name="job_number" value="{{isset($_GET['job_number']) ? $_GET['job_number'] : ''}}">
                                </div>
                                <div class="form-list col-lg-2 col-md-3  client-btn  border-start">
                                    <label for="">Inovice Number</label>
                                    <input class="border_1" type="text" id="invoice_number" name="invoice_number" value="{{ isset($_GET['job_number']) ? $_GET['invoice_number'] : ''}}">
                                </div>
                        </div>
        
                        <!-- <div class="form-list client-text d-flex  ">
                            <div class="client-col">
                                <label for="">Ledger</label>
                                <input type="text" neme="">
                            </div>
        
                            <div class="client-col">
                                <label for="">Client</label>
                                <input type="text" neme="">
                            </div>
        
                            <div class="client-col">
                                <label for="">to</label>
                                <input type="text" neme="">
                            </div>
                        </div> -->
        
                        <!-- <div class="form-list">
                            <div class="date-col d-flex gap-3 ">
                                <div class="gap-3 d-flex w-50">
                                    <div class="label-text"><label for="">Include Jobs To Date</label></div>
                                    <div class="input-text"> <input type="date"></div>
        
                                </div>
                                <div class="gap-3 w-50 d-flex">
                                    <div class="label-text"><label for="">Invoice Date</label></div>
                                    <div class="input-text"> <input type="date"></div>
                                </div>
                            </div>
                        </div> -->
        <!-- <----------------------------------------put it in setting page--------------------------------->
                        <!-- <div class="form-list gap-3 d-flex justify-content-between">
                            <div class=" d-flex gap-3 w-50">
                                <div class="label-text ">
                                    <label for="">Next Invoice Number </label>
                                </div>
                                <div class="input-text">
                                    <input type="number">
                                </div>
                            </div>
                            <div class=" d-flex gap-3 w-50">
                                <div class="label-text ">
                                    <label for="">Next batch Number </label>
        
                                </div>
                                <div class="input-text">
                                    <input type="number">
                                </div>
                            </div>
                        </div> -->
        <!-- <----------------------------------------put it in setting page--------------------------------->
                        <!-- <div class="form-list check-box d-flex gap-2">
                            <input type="checkbox">
                            <label for="">Client To Invoice Account</label>
        
                            <input type="checkbox">
                            <label for="">Credit Card</label>
        
                            <input type="checkbox">
                            <label for="">Cash</label>
                        </div> -->
        
                        <!-- <div class="form-list check-box d-flex gap-2">
                            <input type="checkbox">
                            <label for="">Client To Invoice Monthly</label>
        
                            <input type="checkbox">
                            <label for="">Fortnightly</label>
        
                            <input type="checkbox">
                            <label for="">weekly</label>
        
                            <input type="checkbox">
                            <label for="">daily</label>
        
                            <input type="checkbox">
                            <label for="">0.9</label>
                        </div> -->
        
                    </div>
        
                    <div class="btn-button">
                        <button type="submit" class="btn btn-success "> Search</button>
                    </div>
        
        
                </form>
        
            </div>
        
        </div>
        
    </div>
   
<!-- <-------------------------------------------------------------------View type----------------------------->
<div id="view-invoice-table">
    <div class="card "> 
        <div class="custom_table_header driver_header" style=" border-bottom:1px solid rgb(180, 174, 174);">
            <h3>View Invoices </h3> 
        </div> 
        @if(isset($_GET['job_type']) && $_GET['job_type'] == 'job')
        <table id="example" class="table table-striped w-100">
                <thead>
                    <tr>
                        <th>Account Name</th>
                        <th>Account No.</th>
                        <th>Jobs</th>
                        <th>Total Price</th>
                        <th>Status </th>
                    </tr>
                </thead>
                <tbody id="driver_body">

                    @foreach($result as $account)
                    <tr>
                        <td>{{$account->account_name}}</td> 
                        <td>{{$account->account_number}}</td> 
                        <td>{{count($account->getJob)}}</td>
                        <td>
                            <?php
$total_price = 0;
foreach ($account->getJob as $job)
    $total_price += $job->total_price
                          ?> 
                            ${{number_format($total_price, 2)}}
                    </td>
                        <td>
                        <?php
$job_ids = [];
$total_price = 0;
foreach ($account->getJob as $job) {
    $job_ids[] = $job->id;
}
$job_ids_string = implode(',', $job_ids);
                          ?> 

                            @if($_GET['job_type'] == 'job')
                            <a class="fs-6 ms-1" href="{{route('admin.invoice.handle-invoice', [$account->id, 'invoice', $job_ids_string])}}">Generate Invoice</a> 
                            @else
                            <a class="fs-6 ms-1" href="{{route('admin.invoice.handle-invoice', [$account->id, 'job', $job_ids_string])}}">View Invoice</a>
                            @endif
                        </td> 
                    </tr>
                    @endforeach

                      
                </tbody>
            </table>
            @elseif(isset($_GET['job_type']) && $_GET['job_type'] == 'invoice')
            <table id="example" class="table table-striped w-100">
                <thead>
                    <tr>
                        <th>Account Name</th>
                        <th>Account No.</th>
                        <th>Jobs</th>
                        <th>Total Price</th>
                        <th>Status </th>
                    </tr>
                </thead>
                <tbody id="driver_body"> 
                    @foreach($result as $invoice)
                    <tr>
                        <td>{{$invoice->getAccount->account_name}}</td> 
                        <td>{{$invoice->getAccount->account_number}}</td> 
                        <td>{{$invoice->job_count}}</td>
                        <td>{{$invoice->total_amount}}</td>
                        <td> 
                            <a class="fs-6 ms-1" href="{{url('public/'.$invoice->invoice)}}" target="_blank">View Invoice</a>
                        </td> 
                    </tr>
                    @endforeach 
                </tbody>
            </table>
            @endif
    </div>
</div>

</div>
<script>
    $(document).ready(function ()
    {
        console.clear()
        const table = createTable('#example')
        table.row.add(['Peter', 'Lustig', 'A', 'Global', '40', '1990-01-20', '$1M', '1', 'boss@comp'])
        rerenderDataTable(getDataTable('#example'))
    });
    const createTable = (selector) => new DataTable(selector, { scrollX: true, order: [[5, 'asc']] })
    const getDataTable = (selector) => new DataTable(selector, { retrieve: true })
    const rerenderDataTable = (table) =>
    {
        table.destroy()
        return createTable('#example')
        table.draw()
    }
</script>


<!-- <script>
        $(function() {
            $("#end_date11").datepicker({
                dateFormat: "dd/mm/yy",
                changeMonth: true,
                changeYear: true,
                onSelect: function(dateText, inst) {
              
                    console.log("Selected date: " + dateText);
                }
            });
        });
</script> -->

<!-- <script>
    $(function ()
    {
        $("#date_pick").datepicker({
            dateFormat: "dd/mm/yy"
        });
    });
</script> -->


<script>
     flatpickr(".date_pickers", {
      dateFormat: "d/m/Y",  
      onChange: function (selectedDates, dateStr, instance) {
        // console.log("Selected date:", dateStr);
      }
    });
</script>

   
@endsection