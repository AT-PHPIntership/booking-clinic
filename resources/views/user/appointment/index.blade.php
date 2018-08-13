@extends('user.layouts.app')

@section('content')

@include('user.layouts.partials.filter_listing')

<div class="container margin_60_35">
  <div class="row">
    <div clas="col-lg-12" style="width:100%">
      {{ Breadcrumbs::render('user.appointments.index') }}
      <div id="appointments" class="col-lg-8 offset-lg-2">
        <div class="strip_list wow fadeIn animated appointment pl-4 pb-0 d-none">
          <small>{{ __('user/appointment.clinic_label') }}</small>
          <h3 class="clinic-name"></h3>
          <p class="description"></p>
          <ul class="m-0 pl-0">
            <li class="book-date">{{ __('user/appointment.book_date') }}<strong></strong></li>
            <li class="book-time">{{ __('user/appointment.time') }}<strong></strong></li>
            <li>
              <label class="status mb-0 btn btn-sm p-0 pl-2 pr-2"></label>
            </li>
            <li>
              <button class="cancel-button invisible">{{ __('user/appointment.cancel_button') }}</button>
              <a href="detail-page.html">{{ __('user/appointment.detail') }}</a>
            </li>
          </ul>
        </div>
        <!-- /strip_list -->
      </div>
      <div class="col-lg-8 offset-lg-2">
        @include('user.layouts.partials.paginate')
      </div>

    </div>
    <!-- /col -->
  </div>
  <!-- /row -->
</div>
@endsection

@section('additional_js')

<!-- SPECIFIC SCRIPTS -->
<script src="{{ asset('js/custom/paginate.js') }}"></script>
<script src="{{ asset('js/user/appointments_index.js') }}"></script>
@endsection
