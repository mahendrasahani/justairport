@extends('layouts/backend/main')
@section('main-section')

<style>
        .input-content li {
        list-style: none;
        display: flex;
        gap: 20px;
    }

    .client-col {
        display: flex;
        /* gap: 16px; */
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
    /* .label-text{width: 35%;} */
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
        .input_content{
             height: 35px;
        padding-left: 10px;
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

        .check_box{
             width: 16px;
             height: 16px;
        }

</style>


<div class="content-wrapper extra-warapper">
    <div class=" invoice-body"style=" border-bottom:1px solid rgb(180, 174, 174);">
        <div>
            <div class="custom_table_header driver_header" style=" border-bottom:1px solid rgb(180, 174, 174);">
                <h3 class="pb-2" style=" border-bottom:1px solid rgb(180, 174, 174);">Settings</h3>
            <div>
                <form  action="">
                           
                        <!-- <div class="row d-flex mt-2">
                             <div class="form-list col-md-4">
                            <div class="date-col d-flex gap-3 ">
                                <div class="gap-3  w-50">
                                    <div class="label-text fs-6"><label class="fs-6" for=""> Jobs Date</label></div>
                                    <div class="input-text"> <input class="input_content" type="date"></div>
        
                                </div> 
                               <div class="gap-3 w-50 ">
                                    <div class="label-text"><label class="fs-6" for="">Invoice Date</label></div>
                                    <div class="input-text"> <input class="input_content"  type="date"></div>
                                </div>
                            </div>
                        </div>   -->
        <!-- <----------------------------------------put it in setting page--------------------------------->
                        <div class="form-list gap-3  col-md-4">
                            <div class="  gap-3 w-100 d-flex">
                                <div class="label-text ">
                                    <label class="fs-6" for="">Next Invoice Number </label>
                                </div>
                                <div class="input-text">
                                    <input class="input_content" type="number">
                                </div>
                            </div>
                            <div class="  gap-3 mt-3  w-100 d-flex">
                                <div class="label-text me-2">
                                    <label class="fs-6" for="">Next batch Number </label>
        
                                </div>
                                <div class="input-text me">
                                    <input class="input_content" type="number">
                                </div>
                            </div>
                            <button class=" mt-3 btn btn-primary px-4">Edit</button>
                        </div> 
 
                        </div>
                              <!-- <----------------------------------------put it in setting page--------------------------------->
                    <!-- <div class="form-list check-box d-flex gap-2 w-100">
                        <input type="checkbox">
                        <label class="fs-6" for="">Client To Invoice Account</label>
                    
                        <input type="checkbox">
                        <label class="fs-6" for="">Credit Card</label>
                    
                        <input type="checkbox">
                        <label class="fs-6" for="">Cash</label>
                    </div>
                    
                    <div class="form-list check-box d-flex gap-2    ">
                        <input type="checkbox">
                        <label class="fs-6" for="">Client To Invoice Monthly</label>
                    
                        <input type="checkbox">
                        <label class="fs-6" for="">Fortnightly</label>
                    
                        <input type="checkbox">
                        <label class="fs-6" for="">weekly</label>
                    
                        <input type="checkbox">
                        <label class="fs-6" for="">daily</label>
                    
                        <input type="checkbox">
                        <label class="fs-6" for="">0.9</label>
                    </div> -->
        </form>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection