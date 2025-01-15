@extends('layouts/frontend/main') 
@section('main-section') 

@section('meta-tags')
  <title>Just Airports™- Official Site | Best London Airport Transfer Service</title>
  <meta name="description" content="Just Airports is a leading airport transfer taxi service in London including Heathrow Airport, Gatwick, Stansted, London City & Luton Airport and available at very affordable prices.">  
  <meta name="keywords" content="Airport Transfer, Airport Transfer Service, Airport Transfers, London City Airport Taxi, Cheap Airport Taxi, Gatwick Airport Taxi, London Gatwick Airport, Taxi From Gatwick, Taxi To Gatwick, Stansted Airport Taxi, Airport Transfers UK, Heathrow Airport, London Heathrow Airport, Airport Taxi, Airport Taxis, London, UK">
  <meta name="author" content=" London airport transfer, pre book London airport transfer, heathrow airport transfers, gatwick airport transfers, luton airport transfers, stansted airport transfers, london city airport transfers, southend airport transfers">

@endsection
<style>.additional_notes a {
    text-decoration: none;
    color: #000;
}</style>

<section class="section mt-25 mb-30">
  <div class="container">
    <h2 class="comman-hedding">AIRPORTS</h2>
    <p class="red_border_line mb-0"></p>
    <p class="para_class">London Airport Information</p>
    <div class="table">
      <table class="table table-bordered  airport_table mt-25  ">
        <thead>
          <tr>
            <th scope="col">Airports</th>
            <th scope="col">Terminals</th>
            <th scope="col">Pick-up Point</th>
            <th scope="col">Nearby Destinations</th>
            <th scope="col">Average Cab Fare To London</th>
            <th scope="col">key Features</th>
          </tr>
        </thead>
        <tbody>
          <tr>

            <td ><a href="/heathrow-airport-transfer.php" class="">Heathrow(LHR)</a></td>
            <td>5 Terminals (T2, T3, T4, T5)</td>
            <td>Each terminal has designated pickup zones, typically at the arrivals level</td>
            <td>Windsor, Richmond, Hounslow</td>
            <td>£50-£70</td>
            <td>Free Wi-Fi, lounges, shops, restaurants, hotels, shower facilities</td>
          </tr>
          <tr>
            <td><a href="/gatwick-airport-transfer.php" class="">Gatwick(LGW)</a></td>
            <td>2 Terminals (North, South)</td>
            <td>North Terminal: Lower forecourt. South Terminal: Lower forecourt</td>
            <td>Brighton, Crawley, East Grinstead</td>
            <td>£60-£80</td>
            <td>Free Wi-Fi, lounges, shops, restaurants, hotels, shower facilities</td>

          </tr>
          <tr>
            <td><a href="/luton-airport-transfer.php" class="">Luton(LTN)</a></td>
            <td>1 Terminal</td>
            <td>Short-term car park near the terminal entrance</td>
            <td>Milton Keynes, St Albans, Watford</td>
            <td>£80-£100</td>
            <td>Free Wi-Fi, lounges, shops, restaurants, nearby hotels</td>

          </tr>
          <tr>
            <td><a href="/stansted-airport-transfer.php" class="">Stansted(STN)</a></td>
            <td>1 Terminal</td>
            <td>Express set-down area or Orange car park</td>
            <td>Cambridge, Harlow, Braintree</td>
            <td>£100-£120</td>
            <td>Free Wi-Fi, lounges, shops, restaurants, nearby hotels</td>

          </tr>
          <tr>
            <td><a href="/london-city-airport-transfer.php" class="">City(LCW)</a></td>
            <td>1 Terminal</td>
            <td>Pick-up and drop-off area right outside the terminal</td>
            <td>Canary Wharf, Greenwich, Stratford</td>
            <td>£40-£60</td>
            <td>Free Wi-Fi, lounges, limited shops and restaurants</td>

          </tr>
          <tr>
            <td><a href="/southend-airport-transfer.php" class="">Southend(SEN)</a></td>
            <td>1 Terminal</td>
            <td>Short-stay car park adjacent to the terminal</td>
            <td>Southend-on-Sea, Chelmsford, Basildon</td>

            <td>£100-£120</td>
            <td>Free Wi-Fi, lounges, shops, restaurants, nearby hotels</td>

          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>


<section style="background: #F5F5F5;" class="airport-content pt-40 pb-40" >
  <div class="container">
    <h6 style="font-size: 32px;font-weight: 700;" class="airport-hedding">Additional Notes for Travelling Customers</h6>
    <div class="row">
      <div class="col-md-6 additional_notes">
        <h6><a href="/heathrow-airport-transfer.php" class="">Heathrow Airport</a></h6>
         <ul class="pt-20">
          <li>Terminals: T2 (Queen's Terminal), T3, T4, T5 (British Airways main hub).</li>
          <li>Pickup Points: Arrivals forecourt. Follow signs to 'Car Services'.</li>
          <li>Transportation Options: Heathrow Express, London Underground (Piccadilly Line).</li>
        </ul>
      </div>
      <div class="col-md-6 additional_notes">
        <h6><a href="/stansted-airport-transfer.php" class="">Stansted Airport</a></h6>
         <ul class="pt-20">
          <li>Terminals: Single terminal.</li>
          <li>Pickup Points: Orange car park or express set-down area.</li>
          <li>Transportation Options: Stansted Express train.</li>
        </ul>
      </div>
      <div class="col-md-6 additional_notes">
        <h6><a href="/gatwick-airport-transfer.php" class="">

          Gatwick Airport</a></h6>
 <ul class="pt-20">
          <li>Terminals: North and South Terminal.</li>
          <li>Pickup Points: Each terminal has a dedicated pickup zone. Follow signs for 'Car Services'.</li>
          <li>Transportation Options: Gatwick Express, Southern Railway.
          </li>
        </ul>
      </div>
      <div class="col-md-6 additional_notes">
        <h6><a href="/london-city-airport-transfer.php" class="">
          London City Airport</a></h6>
          <ul class="pt-20">
          <li>Terminals: Single compact terminal.</li>
          <li>Pickup Points: Directly outside the terminal.</li>
          <li>Transportation Options: Docklands Light Railway (DLR).</li>
        </ul>
      </div>
      <div class="col-md-6 additional_notes">
        <h6><a href="/luton-airport-transfer.php" class="">

          Luton Airport</a></h6>
  <ul class="pt-20">
          <li>Terminals: Single terminal with easy navigation.</li>
          <li>Pickup Points: Designated area at the short-term car park.</li>
          <li>Transportation Options: Thames link train, shuttle bus to Luton Airport Parkway station.</li>
        </ul>
      </div>
      <div class="col-md-6 additional_notes">
        <h6><a href="/southend-airport-transfer.php" class="">Southend Airport</a></h6>
        <ul class="pt-20">
          <li>Terminals: Single terminal.</li>
          <li>Pickup Points: Short-stay car park.</li>
          <li>Transportation Options: Train to London Liverpool Street</li>
        </ul>
      </div>
    </div>

  </div>
</section>

<section class="pt-30 pb-50">
  <div class="container">
    <h6 class="airport-hedding" style="font-size: 32px;">General Travel Tips</h6>
    <ul class="travel_tips pt-20">
      <li>Booking Cabs: <span> Pre-booking cabs can ensure a smoother and quicker experience, especially during peak
          hours.</span></li>
      <li>Payment: <span>Most cabs accept credit/debit cards and cash. Confirm payment methods in advance.</span></li>
      <li>Estimated Travel Times: <span>Central London travel times can vary based on traffic. Typically, 45 minutes to
          1.5 hours.</span> </li>
      <li>Luggage:  <span>Make sure to confirm the cab can accommodate your luggage, especially if traveling in a
          group.</span></li>
      <li>Accessibility: <span>Inform the cab service if you require special assistance or wheelchair access.</span> 
      </li>
    </ul>
  </div>
</section>


@endsection