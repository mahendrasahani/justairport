@extends('layouts/frontend/main')
@section('main-section')

<form action="https://pay.sandbox.realexpayments.com/pay" method="POST" target="iframe">
  <input type="hidden" name="TIMESTAMP" value=""> 
  <input type="hidden" name="MERCHANT_ID" value="justairportchauffeur">
  <input type="hidden" name="ACCOUNT" value="internet">
  <input type="hidden" name="ORDER_ID" value="700303">
  <input type="hidden" name="AMOUNT" value="1001">
  <input type="hidden" name="CURRENCY" value="EUR">
  <input type="hidden" name="SHA1HASH" value="308bb8dfbbfcc67c28d602d988ab104c3b08d012">
  <input type="hidden" name="AUTO_SETTLE_FLAG" value="1">
  <input type="hidden" name="HPP_VERSION" value="2">
  <!-- iFrame Optimization Fields -->
  <input type="hidden" name="HPP_POST_DIMENSIONS" value="https://www.example.com">
  <input type="hidden" name="HPP_POST_RESPONSE" value="https://www.example.com">
  <!-- End iFrame Optimization Fields -->
  <input type="hidden" name="MERCHANT_RESPONSE_URL" value="https://www.example.com/responseUrl">
  <input type="submit" value="Click here to Purchase">
</form>

@section('javascript-section')

@endsection
@endsection