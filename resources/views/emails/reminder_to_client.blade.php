<body bgcolor="#0f3462" style="margin-top:20px;margin-bottom:20px">
 
 <!-- Main table -->
 <table border="0" align="center" cellspacing="0" cellpadding="0" bgcolor="white" width="750">
    <tr>
      <td>
        <!-- Child table -->
        <table border="0" cellspacing="0" cellpadding="0" style="color:#0f3462; font-family: sans-serif;">
          <tr>
            <td>
              <h2 style="text-align:center; margin: 0px; padding-bottom: 25px; margin-top: 25px;">
                <span style="color:lightcoral">Justairports</span></h2>
            </td>
          </tr>
          <tr>
            <td>
              <img src="https://www.justairports.com/public/assets/frontend/imgs/page/homepage2/justairportlogo.png" height="50px" style="display:block; margin:auto;padding-bottom: 25px; ">
            </td>
          </tr>
          <tr>        
            <td style="text-align: left;">
              <h4 style=" margin: 0px 40px;line-height:1; font-size: 20px;padding-bottom:10px;">Dear {{$reminder_data['passenger_name']}},</h4>
              
              <p style=" margin: 0px 40px;padding-bottom: 10px;line-height: 1.3; font-size: 15px;">Your booking is confirmed with Ref #{{$reminder_data['job_number']}}. Your Booking amount is £{{$reminder_data['total_price']}}. Unfortunately, we have not received payment for this booking. To complete your card payment please follow the link below to complete your credit card.
              </p>
             
              <h2 style=" margin: 0px 40px;padding-top: 10px;padding-bottom: 10px;line-height: 1; font-size:20px;">PAYMENT LINK:</h2>
              <a style=" margin: 0px 40px;padding-bottom: 0px;line-height: 1; font-size:15px;" href="https://www.justairports.com/direct-pay/{{$reminder_data['job_number']}}" target="_blank" >https://www.justairports.com/direct-pay/{{$reminder_data['job_number']}}</a>
            </td>
          </tr>
          <tr>
            <td>
              <p style=" margin: 0px 40px;padding-top: 15px;line-height: 2; font-size: 15px;" ><b>Note:</b> If you wish to pay cash to the driver than kindly advise. Kindly revert if already paid.</p>
            </td>
          </tr>
          <tr>
            <td style="text-align:left;">
              
              <div style=" margin: 0px 40px; padding-top: 15px;padding-bottom: 10px;line-height:1.3; font-size: 14px;">A Booking Confirmation Email has been sent to you. Please check all details are correct.
              If you need any further assistance you can email us.<a href="mailto:webbookings@justairports.com" target="_blank">webbookings@justairports.com</a> or you can call us in the office on 02089001666. We will be more than happy to assist you.
              </div>
            </td>
          </tr>


          <tr>
            <td style="text-align:left;">
              
              <div style=" margin: 0px 40px;padding-bottom: 10px;line-height: 1.2; font-size: 14px;">Thank you for booking with Just Airports.<br>
              Kind Regards<br>
              Justairports
              </div>
            </td>
          </tr>
        </table>
        <!-- /Child table -->
      </td>
    </tr>
  </table>
  <!-- / Main table -->

</body>