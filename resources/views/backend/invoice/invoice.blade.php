@extends('layouts/backend/main')
@section('main-section')



<div class="content-wrapper extra-warapper">
    
    <div class=" invoice-body">
    <div class="custom_table_header  form-hedding">
        <h3>Generate Invoice </h3>

    </div>
        <div class="Invoices-main ">

            <form action="">
                <div class="input-content">
                    
                        <div class="date-col d-flex form-list gap-4" >
                           <div class=" gap-3 d-flex">
                            <label for="" class="form-label">Start Date</label>
                            <input type="date" id="startdate" >
                           </div>
                            <div class=" gap-3 d-flex ">
                                   <label for="" >End Date</label>
                            <input type="date"id="endtdate">
                            </div>
                        </div>
                
                     <div class="form-list d-flex client-btn ">
                            <label for="">To Invoices A Single Job Enter Job Number</label>
                            <input type="text" id="invoice-number">
                     </div>
                  

                <div class="form-list client-text d-flex  ">
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
                 </div>

                    <div class="form-list"> 
                        <div class="date-col d-flex gap-3 ">
                            <div class="gap-3 d-flex w-50">
                                <div class="label-text"><label for="">Include Jobs To Date</label></div>
                                <div class="input-text">  <input type="date"></div>
                              
                            </div>
                           <div class="gap-3 w-50 d-flex">
                            <div class="label-text"><label for="">Invoice Date</label></div>
                            <div class="input-text"> <input type="date"></div>
                           </div>
                        </div>
                    </div>

                    <div class="form-list gap-3 d-flex justify-content-between">
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
                    </div>

                    <div class="form-list check-box d-flex gap-2">
                        <input type="checkbox">
                        <label for="">Client To Invoice Account</label>

                        <input type="checkbox">
                        <label for="">Credit Card</label>

                        <input type="checkbox">
                        <label for="">Cash</label>
                    </div>

                    <div class="form-list check-box d-flex gap-2">
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
                    </div>

                </div>

                <div class="btn-button">
                    <button type="submit " class="btn btn-success "> Submit</button>
                    <button type="reset"class="btn btn-danger "> Reset</button>
                </div>


            </form>

        </div>

    </div>
</div>
@endsection