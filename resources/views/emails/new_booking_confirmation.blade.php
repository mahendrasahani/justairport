<font color='#000' size='5'><b>{{$booking_data['heading']}}</b></font>
<table align='center' style='color:#000;border-collapse:collapse;border-color:#cac8c7;font-fanily:Arial, Helvetica, sans-serif;'>
    <tr>
       <td colspan='2' style='padding:5px 0px 0px 10px;'><font size='4'><b>Dear {{$booking_data['passenger_name']}}</b></font><br/><hr/ width='90%' align='left'> 
    </tr>
    <tr>
        <td width='250px' style='padding:5px 0px 0px 10px;'><b>Pick Up From:</b></td>
        <td width='415px' style='color:#000;font-weight:bold;font-size:16px;'>{{$booking_data['pickup_from']}}</td> 
    </tr> 
    <tr> 
        <td style='padding:5px 0px 0px 10px;'><b>Drop Off At:</b></td>
        <td  style='color:#000;font-weight:bold;font-size:16px;'>{{$booking_data['drop_of_at']}}</td> 
    </tr> 
    <tr> 
        <td style='padding:5px 0px 0px 10px;'><b>Vehicle:</b></td>
        <td>{{$booking_data['vehicle']}}</td>	
    </tr>
     <tr>
         <td style='padding:5px 0px 0px 10px;'><b>Date:</b></td>
        <td>{{Carbon\Carbon::parse($booking_data['job_date'])->format('d-m-Y')}}</td>
    </tr>
    <tr>
        <td height='30px' valign='top' style='padding:5px 0px 0px 10px;'><b>Time:</b></td>
        <td valign='top'>{{$booking_data['job_time']}}</td>	
    </tr>
    <tr>
        <td colspan='2' style='padding:5px 0px 0px 10px;'><hr width='90%' align='left'><b><font size='4'>Further Details</font></b><br/><hr/ width='90%' align='left'></td>						
    </tr>
     <tr>
        <td width='150px' style='padding:5px 0px 0px 10px;'><b>Terminal:</b></td><td width='515px'>{{$booking_data['terminal'] ?? ''}}</td>
    </tr> 					
    <tr>
        <td style='padding:5px 0px 0px 10px;'><b>Flight No:</b></td><td  style='color:#000;font-weight:bold;font-size:16px;'>{{$booking_data['flight_number']}}</td>
    </tr>
    <tr>
        <td style='padding:5px 0px 0px 10px;'><b>City of departure:</b></td><td  style='color:#000;font-weight:bold;font-size:16px;'>{{$booking_data['departure_city']}}</td>
    </tr>
    <tr>
	    <td width='150px' style='padding:5px 0px 0px 10px;'><b>Name:</b></td> 
	    <td width='515px'>{{$booking_data['passenger_name']}}</td>	 
	</tr> 
    <tr> 
        <td style='padding:5px 0px 0px 10px;'><b>Mobile no. (with country code):</b></td> 
        <td>+{{$booking_data['contact_phone']}}</td> 
    </tr> 
    <tr> 
    	<td style='padding:5px 0px 0px 10px;'><b>Email Address:</b></td> 
    	<td>{{$booking_data['contact_email']}}</td> 
    </tr>
    <tr> 
        <td style='padding:5px 0px 0px 10px;'><b>No. of Passengers:</b></td> 
        <td>{{$booking_data['no_of_passenger']}}</td> 
    </tr> 
    <tr> 
        <td style='padding:5px 0px 0px 10px;'><b>No. of Luggages:</b></td> 
        <td>{{$booking_data['no_of_checkin_luggage']}}</td> 
    </tr> 
    <tr> 
        <td style='padding:5px 0px 0px 10px;'><b>No. of hand Luggages:</b></td> 
        <td>{{$booking_data['no_of_hand_luggage']}}</td> 
    </tr> 
	<tr>
		<td style='padding:5px 0px 0px 10px;'><b>Address:</b></td>
		<td>{{$booking_data['address']}}</td>
	</tr> 
	<tr>
		<td style='padding:5px 0px 0px 10px;'><b>Full Post Code:</b></td>
		<td>{{strtoupper($booking_data['full_post_code'])}}</td>
	</tr> 	
    <tr>
		<td style='padding:5px 0px 0px 10px;'><b>PAX NOTES:</b></td>
		<td> {{$booking_data['notes']}}</td>
	</tr>
    <tr>
        <td style="padding:5px 0px 0px 10px;"><b>URGENT: {{$booking_data['baby_seat']}} BABY SEATS:</b></td>  
        <td>
        @for($i = 0; $i < $booking_data['baby_seat']; $i++)
        {{$booking_data['child_age'][$i] ?? ''}} YEARS,
        @endfor
        </td> 
    </tr> 
        <tr><td colspan='2' style='padding:10px 0px 0px 10px;'>cash airport pick up is subject to parking charges and credit card airport pick up already included parking charges.</td></tr>
		<tr><td colspan='2' style='padding:10px 0px 0px 10px;'>Bookings made for pickup within next 4 hours are subject to availability of drivers.</td></tr>
    <tr>
		<td style='padding:10px 0px 10px 10px;font-size:20px;' colspan='2'><b>Total Payment:</b><b>&#163;{{$booking_data['price']}}.00</b></td>
	</tr>
    
    <tr>
        <td>Web reference No. <b># {{$booking_data['job_number']}}</b></td> <td> Booking From :  www.justairports.com</td>
    </tr>
 
     <tr>
	    <td style='padding:10px 0px 10px 10px;font-size:14px;' colspan='2'>
            <b>Regards:</b>
			Just Airport<br/>
			Toll free number: 0800 096 8 096
			<br/><b>Call Us: </b>+44 208 900 1666
        </td>
	</tr>
</table>