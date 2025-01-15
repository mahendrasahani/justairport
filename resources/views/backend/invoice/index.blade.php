@extends('layouts/backend/main')
@section('main-section')

  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
      
<style>
  
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
    .client-text.client-text::nth-child(3){column-gap: 30px !important;}

    .Invoices-main {
        padding:10px 10px  20px 10px;
    }
    .client-col{align-items: center;}
    .date-col input{width: 165px;}
     .invoice-body{ margin: 0 auto;   border: 1px solid rgb(180, 174, 174); border-radius: 5px; margin-top: 20px;}
 

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
        .card {width: 70%; margin: 0 auto;}
        #view-invoice-table{margin-top: 10px; padding-bottom: 40px;}
        /* #example_info{margin-left: 20px;} */
        .pagination{margin:5px 31px 11px 13px!important}
        .dt-search{margin-right: 30px;}
        div#example_wrapper {margin: 10px;}

</style>
<div class="content-wrapper extra-warapper">
    <div id="view-invoice-table">
    <div class="card">
               
                <div class="custom_table_header driver_header" style=" border-bottom:1px solid rgb(180, 174, 174);">
                <h3>View Invoices </h3>
        
            </div>
           
            <table id="example" class="table table-striped w-100">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Number</th>
                        <th>Time</th>
                        <th>Details</th>
                        <th>srv</th>
                        <th>Reference</th>
                        <th>contact</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody id="driver_body">
                    <tr>
                        <td>17/05/2024</td>
                        <th>651057</th>
                        <td>07:61</td>
                        <td>Harplay CMS-18 LGW</td>
                        <td>E</td>
                        <td>EMAIL</td>
                        <td>JOLITA VIDAUSKE</td>
                        <td>152.00</td>
                    </tr>
                    <tr>
                        <td>28/05/2024</td>
                         <th>650057</th>
                         <td>09:63</td>
                        <td>T5LHR. HARLOW CM 18 SEE JOB BA</td>
                        <td>E</td>
                        <td>EMAIL</td>
                        <td>JOLITA VIDAUSKE</td>
                        <td>215.00</td>
                    </tr>
                    <tr>
                        <td>30/05/2024</td>
                      <th>659717</th>
                      <td>11:66</td>
                        <td>WIJ. LHR</td>
                        <td>E</td>
                        <td>EMAIL</td>
                        <td>JOLITA VIDAUSKE</td>
                      <td>180.00</td>
                    </tr>
                    <tr>
                       <td>30/05/2024</td>
                    <th>659757</th>
                    <td>10:22</td>
                        <td>T5LHR. HARLOW CM 18 SEE JOB BA</td>
                        <td>E</td>
                        <td>EMAIL</td>
                        <td>JOLITA VIDAUSKE</td>
                            <td>152.00</td>
                    </tr>
                    <tr>
                        <td>30/05/2024</td>
                        <th>659757</th>
                        <td>14:33</td>
                        <td>T5LHR. HARLOW CM 18 SEE JOB BA</td>
                        <td>E</td>
                        <td>EMAIL</td>
                        <td>JOLITA VIDAUSKE</td>
                            <td>152.00</td>
                    </tr>
                    <tr>
                        <td>25/04/2024</td>
                       <th>651157</th>
                       <td>13:61</td>
                        <td>T5LHR. HARLOW CM 18 SEE JOB BA</td>
                        <td>E</td>
                        <td>EMAIL</td>
                        <td>JOLITA VIDAUSKE</td>
                            <td>152.00</td>
                    </tr>
                    <tr>
                    <td>10/05/2024</td>
                    <th>769757</th>
                    <td>10:59</td>
                        <td>San Francisco</td>
                        <td>E</td>
                        <td>EMAIL</td>
                        <td>JOLITA VIDAUSKE</td>
                            <td>152.00</td>
                    </tr>
                    <tr>
                         <td>10/03/2024</td>
                        <th>959757</th>
                        <td>10:11</td>
                        <td>Tokyo</td>
                        <td>E</td>
                        <td>EMAIL</td>
                        <td>JOLITA VIDAUSKE</td>
                            <td>152.00</td>
                    </tr>
                    <tr>
                       <td>30/05/2024</td>
                        <th>654457</th>
                        <td>10:00</td>
                        <td>San Francisco</td>
                        <td>E</td>
                        <td>EMAIL</td>
                        <td>JOLITA VIDAUSKE</td>
                        <td>152.00</td>
                    </tr>
                   
                    
                </tbody>
            </table>
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

@endsection