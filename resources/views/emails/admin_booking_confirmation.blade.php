<div>
    <img src="https://test.justairports.com/public/assets/frontend/imgs/email_logo.jpg">
</div>
<br> 

<table>
    <tbody>
        <tr><td valign="top" width="190px;"><b>Thanks for your order, {{strtoupper($admin_booking_confirmation_mail_data['passenger_name'])}}</b><br><br><br><br><b>Justairports</b><br><b>Tel:</b> 020 8900 1666<br><b>Email: </b><a href="mailto:book@justairports.com" target="_blank">book@justairports.com</a><br><br><a href="http://www.justairports.com" target="_blank" >www.justairports.com</a><br><br><br><div style="font-size:small;font-style:italic">sent by control</div></td><td><div>
	
        <table rules="cols" id="m_840442786270657750grid_JobTable" style="color:Black;background-color:White;border-color:Black;border-width:1px;border-style:solid;font-size:small;width:600px;border-collapse:collapse" align="Left" border="1" cellpadding="4" cellspacing="0">
		    <tbody>
                <tr style="color:White;background-color:rgb(000,000,000);border-color:Black;border-width:1px;border-style:solid;font-size:16pt;font-weight:bold" align="left">
			        <td colspan="2">Booking Reference: {{$admin_booking_confirmation_mail_data['job_number']}}<span style="font-weight:lighter"><br>Booked for: {{Carbon\Carbon::parse($admin_booking_confirmation_mail_data['job_date'])->format('l d F Y')}} at {{$admin_booking_confirmation_mail_data['job_time']}}</span>
                </td> 
		    </tr>
            <tr style="background-color:White" align="left">
			    <td style="font-weight:bold;width:155px" align="left">Service</td><td>{{strtoupper($admin_booking_confirmation_mail_data['service'])}}</td>
		    </tr>
            <tr style="background-color:rgb(242,242,242)" align="left">
			    <td style="font-weight:bold;width:155px" align="left">Payment Method</td><td>{{strtoupper($admin_booking_confirmation_mail_data['payment_method'])}}</td>
		    </tr>
            <tr style="background-color:White" align="left">
			    <td style="font-weight:bold;width:155px" align="left">Passenger Name</td><td>{{strtoupper($admin_booking_confirmation_mail_data['passenger_name'])}}</td>
		    </tr>
            <tr style="background-color:rgb(242,242,242)" align="left">
			<td style="font-weight:bold;width:155px" align="left">Contact Phone with Country Code</td><td>{{$admin_booking_confirmation_mail_data['contact_phone']}}</td>
		    </tr>
            <tr><td><u></u></td></tr>
            <tr style="background-color:White" align="left">
			    <td style="font-weight:bold;width:155px" align="left">Pickup From</td><td>P/UP {{strtoupper($admin_booking_confirmation_mail_data['pickup_from'])}}<br><u></u></td>
		    </tr>
            <tr><td><u></u></td></tr>
            <tr style="background-color:rgb(242,242,242)" align="left">
			    <td style="font-weight:bold;width:155px" align="left">Drop Off</td><td>DROP {{strtoupper($admin_booking_confirmation_mail_data['drop_of_at'])}}<br></td>
		    </tr>
            <tr style="background-color:White" align="left">
			    <td style="font-weight:bold;width:155px" align="left">Price</td><td>£{{$admin_booking_confirmation_mail_data['price']}}.00<br>All airport pickups are subject to additional parking charges</td>
		    </tr>
            <tr style="background-color:rgb(242,242,242)" align="left">
			    <td style="font-weight:bold;width:155px" align="left">Additional Info</td><td>NOTE: 
                    {{strtoupper($admin_booking_confirmation_mail_data['flight_number'])}}
                    {{strtoupper($admin_booking_confirmation_mail_data['departure_city'])}}
                     HANDLUGGAGE: {{strtoupper($admin_booking_confirmation_mail_data['no_of_hand_luggage'])}}<br>
                </td>
		    </tr>
            <tr style="background-color:White" align="left">
			    <td style="font-weight:bold;width:155px" align="left">Booking made at:</td>
                <td>{{Carbon\Carbon::parse($admin_booking_confirmation_mail_data['booking_made_at'])->format('l d F Y \a\t H:i')}}</td>
		    </tr>

            @if($admin_booking_confirmation_mail_data['journey_type'] == 'from_airport')
            <tr style="background-color:rgb(242,242,242)" align="left">
			    <td style="font-weight:bold;width:155px" align="left">Meeting Point</td><td>Arrivals Barrier ( Driver will be holding name board)</td>
		    </tr>
            @endif

            <tr style="background-color:White" align="left">
		    	<td style="font-weight:bold;width:155px" align="left">Contact Us</td><td>Please contact us on 0208 900 1666 or email us if any problem locating your driver.</td>
		    </tr>
        </tbody>
    </table>
</div>
</td>
</tr>
<tr style="background-color:White" align="left">
<td style="font-weight:bold;width:155px" align="left">Terms and Conditions</td><td><a href="https://www.justairports.com/terms.php" target="_blank" >https://www.justairports.com/<wbr>terms.php</a></td>
</tr>	
</tbody>
</table>