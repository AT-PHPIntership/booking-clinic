@extends('user.layouts.app')

@section('content')
<div class="container">
  <!-- Breadcrumbs-->
  {{ Breadcrumbs::render('user.profile') }}
  <div class="box_general padding_bottom">
    <div class="header_box version_2">
      <h2><i class="fa fa-file"></i>@lang('user/profile.basic_info')</h2>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>@lang('user/profile.fields.name')</label>
          <input name="name" class="form-control" disabled>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>@lang('user/profile.fields.email')</label>
          <input name="email" class="form-control" disabled>
        </div>
      </div>
    </div>
    <!-- /row-->
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>@lang('user/profile.fields.dob')</label>
          <input name="dob" class="form-control" disabled>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>@lang('user/profile.fields.gender')</label>
          <div class="form-check">
            <input class="form-check-input " type="radio" name="gender" id="gender-male" value="1" disabled>
            <label class="form-check-label" for="gender-male">@lang('user/profile.gender.male')</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender-female" value="0" disabled>
            <label class="form-check-label" for="gender-female">@lang('user/profile.gender.female')</label>
          </div>
        </div>
      </div>
    </div>
    <!-- /row-->
  </div>
<!-- /box_general-->
  <div class="box_general padding_bottom">
    <div class="header_box version_2">
      <h2><i class="fa fa-map-marker"></i>@lang('user/profile.contact')</h2>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label>@lang('user/profile.fields.phone')</label>
          <input name="phone" class="form-control" disabled>
        </div>
      </div>
      <div class="col-md-8">
        <div class="form-group">
          <label>@lang('user/profile.fields.address')</label>
          <input name="address" class="form-control" disabled>
        </div>
      </div>
    </div>
  </div>
  <!-- /box_general-->
  <p><a href="#" class="btn_1 medium mb-3">@lang('user/profile.edit')</a></p>
</div>
@endsection

@section('additional_js')
  <script src="{{ asset('js/user/profile.js') }}"></script>
@endsection
