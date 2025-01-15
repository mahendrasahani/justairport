<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container{max-width: 800px;}
        .invoice-title {
            margin-bottom: 20px;
        }
        

        .table th {
            vertical-align: middle;
            border: 1px solid #000;
            text-align: left;
        }
        .table td {
            vertical-align: middle;
            border: 1px solid #000;
            text-align: left;
        }

        .terms p {
            font-size: 0.9rem;
        }

        .remittance-table img {
            width: 150px;
        }

        .remittance-table p {
            margin: 0;
        }

        .journey-schedule .table th,
        .journey-schedule .table td {
            vertical-align: middle;
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }


        h1 {
  position: relative;
  margin-top: 20px;
  font-family: "Open Sans Condensed", sans-serif;
  text-align: center;
  position: relative;
  margin-top: 20px;
}

.one {
  margin-top: 0;
}

.one:before {
  content: "";
  display: block;
  border-top: solid 1px black;
  width: 100%;
  height: 1px;
  position: absolute;
  top: 50%;
  z-index: 1;
}

.one span {
  background: #fff;
  padding: 0 20px;
  position: relative;
  z-index: 5;
}
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:left;vertical-align:top}


    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
        <table class="tg">
    <thead>
  <tr>
    <th class="tg-0lax" style="width: 350px;"><p>1378 Uxbridge Road
        Hillingdon
        UB10 0NQ</p><br>
     <p> Accounts: 020 8900 1333 Fax: 08454 026793
            Email: info@justairports.com</p>
      </th>
      <th class="tg-0lax" style="
    text-align: center;
"> 
        <img src="{{ url('public/assets/backend/images/brand_logo.png') }}" class="logo img-fluid" alt="" width="200px">
        </thead>
<tbody>
  
    <tr>
  
    </tr>
</tbody>
</table>
        </div>


        
        <table class="table table-bordered mt-4 journey-schedule" style="
    border: 1px solid #000;
">
<tr>
<td> <p>FLORA FRASER<br>32 BRUNSWICK GARDENS<br>LONDON<br>W8 4AL<br>UK<br>07949523953</p></td>
<td> <h1 class="invoice-title one "><span>INVOICE</span></h1>
                <p><b>TERMS: 30 DAYS NET</b></p>
                <p><b>VAT Reg: GB 744 2786 12</b></p></td>
</tr>

</table>

        
       


        <table class="table table-bordered mt-4 journey-schedule" style="
    border: 1px solid #000;
">
            <tr>
            <th style="
    width: 100%;
">Your Account No.</th>
                <th></th>
                <th>Invoice Date</th>
                <th>Invoice No.</th>
            </tr>
            <tr>
                <td>217</td>
                <td></td>
                <td>30/06/2024</td>
                <td>9434</td>
            </tr>
        </table>




        <table class="table table-bordered mt-4" style="
    border: 1px solid #000;
">
            <tr>
                <th colspan="3">Item </th>
                <th></th>
                <th> Total GBp</th>
                <th>VATCode</th>
            </tr>
            <tr>
            <td colspan="3" style="vertical-align: top; height:200px;">Jobs as per attached Schedule. VAT at 20.00%</td>
            <td></td>
                <td>264.00</td>
                <td>264.00</td>
            </tr>
            <tr>
    <td class="tg-0lax" colspan="3" rowspan="2">All goods carried are subject to our Terms of Trade and Standard Conditions of Carriage. Please note that all queries must be made within 30 days of the invoice date, any queries made after this time will not be considered.</td>
    <td class="tg-0lax">Sub Total</td>
    <td  class="tg-0lax">2264.00 GBP</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">VAT</td>
    <td class="tg-0lax">264.00 GBP
    264.00 GBP</td>
    <td class="tg-0lax"></td>
  </tr>
         

            <tr>
            <td colspan="1">
            TERMS
</td>
            <td>30 Days</td>
                <td>DUE DATE </td>
                <td>30/07/2024</td>
                <td>TOTAL GBP</td>
                <td>348.48</td>
            </tr>

    


           
        </table>

        <div class="terms mt-4">
        ------------------------------------------------------------------------------------------------------------------------------------------------
        <table class="table table-bordered mt-4" style="
    border: 1px solid #000;
">

        
            <tr>
                <td> Blank</td>
        
        </tr>

        
            </table>
        </div>

        <hr>

        <div class="row mt-5">
            <div class="col-md-2">
                <img src="{{ url('public/assets/backend/images/brand_logo.png') }}" class="logo img-fluid" alt="">
            </div>
            <div class="col-md-8 text-center">
                <h4 class="bold">REMITTANCE ADVICE</h4>
                <p>Please return the remittance advice with your payment</p>
            </div>
            <div class="col-md-2 text-end">
                <p>1378 Uxbridge Road<br>Hillingdon<br>UB10 0NQ</p>
            </div>
        </div>

        
        <table class="table table-bordered mt-4 remittance-table" style="
    border: 1px solid #000;
">
        <div class="col-md-2 text-end">
            
       
            <tr>
                <th  >Your Account No.</th>
                <th></th>
                <th>Invoice No.</th>
                <th>Terms</th>
               
            </tr>
            <tr>
            <th >217</td>
                <td></td>
                <td>30/06/2024</td>
                <td>30 Days</td>
               
            </tr>
            </table>

            <table class="table table-bordered mt-4 remittance-table" style="
    border: 1px solid #000;">

            <tr style="
    border: 1px solid #000;">
                
            <td  rowspan="2" >
                    <p>CUSTOMER PAYMENT DETAILS</p>
                    <p>Just Airports
                    1378 Uxbridge Road
                    Hillingdon
                    UB10 0NQ</p>
                </td>
                </tr>

                    <tr>
                <th colspan="4">TERMS</th>
                <th>DUE DATE</th>
                <th>TOTAL DUE</th>


                
            </tr>




            <tr>
               
            <td >
                <p>Account: Just Airports Chauffeur Services Ltd </p>
                    <p>Sort Code: 40-42-13 Account Number: 71367129</p>
                </td>
                <td colspan="4">30 Days</td>
                <td>30/07/2024</td>
                <td>348.48</td>
               
                

            </tr>


            <tr>
    
           
        </table>


        <hr>

        <div class="row mt-4">
            <div class="col-md-6">
                <p>Trinity House<br>Heather Park Drive Wembley<br>Middlesex<br>HA0 1SU</p>
                <p>Accounts: 020 8900 1333<br>Fax: 08454 026793<br>Email: info@justairports.com</p>
            </div>
            <div class="col-md-6 text-end">
                <img src="{{ url('public/assets/backend/images/brand_logo.png') }}" class="logo img-fluid" alt="" width="120px">
                <h1 class="invoice-title">SCHEDULE OF JOURNEYS</h1>
            </div>
        </div>

        <table class="table table-bordered mt-4 journey-schedule" style="
    border: 1px solid #000;
">
            <tr>
                <th>Your Account No.</th>
                <th>Customer</th>
                                <th>Invoice Date</th>
                <th>Invoice No.</th>
                <th>Page No</th>
            </tr>
            <tr>
                <td>217</td>
                                <td>FLORA FRASER</td>
                <td>30/06/2024</td>
                <td>9434</td>
                <td>1</td>
            </tr>
        </table>



        <table class="table table-bordered journey-schedule mt-4" style="
    border: 1px solid #000;
">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Service</th>
                    <th>Our Ref</th>
                    <th>Your Reference</th>
                    <th>Price</th>
                    <th>Mins</th>
                    <th>Wait</th>
                    <th>Misc</th>
                    <th>Total GBP</th>
                    <th>VAT Code</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>07/05/2024</td>
                    <td>18:03</td>
                    <td>A SuCar</td>
                    <td>65804</td>
                    <td>FLORA FRASER<br>TS:LHR<br>32 BRUNSWICK GARDENS W8 4AL</td>
                    <td>78.00</td>
                    <td>0m</td>
                    <td>0m</td>
                    <td>0.00</td>
                    <td>78.00</td>
                    <td>01</td>
                </tr>
                <tr>
                    <td>08/05/2024</td>
                    <td>12:10</td>
                    <td>A SuCar</td>
                    <td>65856</td>
                    <td>MRS FRASER<br>EAL:-<br>32 BRUNSWICK GARDENS W8 4AL<br>Pax: ROSIE</td>
                    <td>54.00</td>
                    <td>0m</td>
                    <td>0m</td>
                    <td>0.00</td>
                    <td>54.00</td>
                    <td>01</td>
                </tr>
                <tr>
                    <td>11/05/2024</td>
                    <td>15:35</td>
                    <td>A SuCar</td>
                    <td>65856</td>
                    <td>MRS FRASER<br>TS:LHR<br>32 BRUNSWICK GARDENS W8 4AL<br>Pax: FLORA FRASER</td>
                    <td>78.00</td>
                    <td>0m</td>
                    <td>0m</td>
                    <td>0.00</td>
                    <td>78.00</td>
                    <td>01</td>
                </tr>
                <tr>
                    <td>10/06/2024</td>
                    <td>10:30</td>
                    <td>A SuCar</td>
                    <td>66237</td>
                    <td>MR FRASER<br>EAL:-<br>32 BRUNSWICK GARDENS W8 4AL<br>Pax: FLORA FRASER</td>
                    <td>54.00</td>
                    <td>0m</td>
                    <td>0m</td>
                    <td>0.00</td>
                    <td>54.00</td>
                    <td>01</td>
                </tr>

                <tr>
                <td colspan="4"></td>
                 <td>TOTAL GBP</td>
                    <td>264.00 </td>
                    <td>0m</td>
                    <td>0m</td>
                    <td>0.00</td>
                    <td>54.00</td>
                    <td>01</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
