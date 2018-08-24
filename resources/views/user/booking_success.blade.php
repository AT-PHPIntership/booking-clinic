@extends('user.layouts.app')

@section('content')
<div class="container margin_120">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div id="confirm">
        <div class="icon icon--order-success svg add_bottom_15">
          <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
            <g fill="none" stroke="#8EC343" stroke-width="2">
              <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
              <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
            </g>
          </svg>
        </div>
      <h2>@lang('user/booking.thanks') <strong id="user-name"></strong> @lang('user/booking.for_your_booking')</h2>
      <p>@lang('user/booking.receive_email') <strong id="user-email"></strong></p>
      <i>@lang('user/booking.redirect')</i>
      </div>
    </div>
  </div>
  <!-- /row -->
</div>
@endsection

@section('additional_js')
  <script src="{{ asset('js/user/booking_success.js') }}"></script>
@endsection
