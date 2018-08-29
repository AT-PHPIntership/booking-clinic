@extends('user.layouts.app')

@php
    $options = [
        'latest_clinic' => [
            'href' => '?sort_by=created_at&order=DESC',
            'text' => __('user/filter.clinic.latest_clinic')
        ],
        'name_az' => [
            'href' => '?sort_by=name&order=ASC',
            'text' => __('user/filter.clinic.name_az')
        ],
        'name_za' => [
            'href' => '?sort_by=name&order=DESC',
            'text' => __('user/filter.clinic.name_za')
        ],
   ]
@endphp

@section('content')

@include('user.layouts.partials.results')

@include('user.layouts.partials.filter_listing', ['options' => $options])

<div class="container margin_60_35">
<div class="row">
 <div class="col-lg-8">
   <div class="row d-none" id="js-clinic">

    <div class="col-md-6 clinic-item">
      <div class="box_list wow fadeIn">
        <a href="#0" class="wish_bt"></a>
        <figure>
          <a class="clinic-detail" href="detail-page.html"><img class="img-fluid clinic-image" alt="" style="object-fit:cover;height:300px">
            <div class="preview"><span>{{ __('user/clinic.index.clinic_item.read_more') }}</span></div>
          </a>
        </figure>
        <div class="wrapper">
          <small class="clinic-type-name"></small>
          <h3 class="clinic-name"></h3>
          <p style="height:76px" class="clinic-description"></p>
        </div>
        <ul>
          <li><a href="#0" onclick="onHtmlClick('Doctors', 0)"><i class="icon_pin_alt"></i>{{ __('user/clinic.index.clinic_item.view_map') }}</a></li>
          <li>
            <a href="https://www.google.com/maps/dir//Assistance+–+Hôpitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/" target="_blank"><i class="icon_pin_alt"></i>
            {{ __('user/clinic.index.clinic_item.direction') }}
            </a>
          </li>
          <li><a class="clinic-detail" href="detail-page.html">{{ __('user/clinic.index.clinic_item.book') }}</a></li>
        </ul>
      </div>
    </div>

  </div>
  <!-- /row -->

  @include('user.layouts.partials.paginate')
 </div>
 <!-- /col -->

 <aside class="col-lg-4" id="sidebar">
   <div id="map_listing" class="normal_list">
   </div>
 </aside>
 <!-- /aside -->

</div>
<!-- /row -->
</div>
<!-- /container -->

@endsection

@section('additional_js')

  <!-- SPECIFIC SCRIPTS -->
  <script src="http://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API_KEY') }}"></script>
  <script src="{{ asset('js/user/map_listing.js') }}"></script>
  <script src="{{ asset('js/user/infobox.js') }}"></script>
  <script src="{{ asset('js/user/custom/paginate.js') }}"></script>
  <script src="{{ asset('js/user/clinics_index.js') }}"></script>
@endsection
