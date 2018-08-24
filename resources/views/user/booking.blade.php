@extends('user.layouts.app')

@section('content')
<div class="container margin_60" style="transform: none;">
  {{ Breadcrumbs::render('user.booking') }}
  <div class="row" style="transform: none;">
    <div class="col-xl-8 col-lg-8">
    <div class="box_general_3 cart">
      <div class="form_title">
        <h3><strong>1</strong>@lang('user/booking.your_details')</h3>
      </div>
      <div class="step">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <label>@lang('user/profile.fields.name')</label>
              <input type="text" class="form-control" name="name" disabled>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <label>@lang('user/profile.fields.email')</label>
              <input type="text" class="form-control" name="email" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <label>@lang('user/profile.fields.dob')</label>
              <input type="email" class="form-control" name="dob" disabled>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <label>@lang('user/profile.fields.phone')</label>
              <input type="email" class="form-control" name="phone" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="form-group">
              <label>@lang('user/profile.fields.address')</label>
              <input type="text" class="form-control" name="address" disabled>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <!--End step -->

      <div class="form_title">
        <h3><strong>2</strong>@lang('user/booking.additional_information')</h3>
      </div>
      <div class="step">
        <div class="form-group">
          <label>@lang('user/booking.description')</label>
          <textarea id="description" class="form-control" name="description" placeholder="@lang('user/booking.type_something')"></textarea>
        </div>
      </div>
      <!--End step -->
    </div>
    </div>
    <!-- /col -->
    <aside class="col-xl-4 col-lg-4" id="sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

      <!-- /box_general -->
    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 880.5px;"><div class="box_general_3 booking">
        <form>
          <div class="title">
            <h3>@lang('user/booking.your_booking')</h3>
          </div>
          <div class="summary">
            <ul>
              <li>@lang('user/booking.info.date'): <strong id="booking-date" class="float-right"></strong></li>
              <li>@lang('user/booking.info.time'): <strong id="booking-time" class="float-right"></strong></li>
              <li>@lang('user/booking.info.clinic_name'): <strong id="booking-name" class="float-right"></strong></li>
              <li>@lang('user/booking.info.phone'): <strong id="booking-phone" class="float-right"></strong></li>
            </ul>
          </div>
          <hr>
          <a href="#" id="btn-confirm" class="btn_1 full-width">@lang('user/booking.confirm')</a>
        </form>
      </div><div class="resize-sensor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: 0s; width: 390px; height: 1542px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div></aside>
    <!-- /asdide -->
  </div>
  <!-- /row -->
</div>
@endsection

@section('additional_js')
  <script src="{{ asset('js/user/booking_appointment.js') }}"></script>
@endsection
