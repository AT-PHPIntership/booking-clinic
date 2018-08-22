@extends('user.layouts.app')

@section('content')
<div class="container">
  <!-- Breadcrumbs-->
  {{ Breadcrumbs::render('user.change_password') }}
  <div class="box_general padding_bottom">
    <div class="col-md-6">
      <div class="header_box version_2">
        <h2><i class="fa fa-lock"></i>@lang('user/change_password.change_password')</h2>
      </div>
      <div class="form-group">
        <label>@lang('user/change_password.old_password')</label>
        <input class="form-control" type="password" name="current_password">
        <div class="invalid-feedback" role="alert">
          <strong></strong>
        </div>
      </div>
      <div class="form-group">
        <label>@lang('user/change_password.new_password')</label>
        <input class="form-control" type="password" name="new_password">
        <div class="invalid-feedback" role="alert">
          <strong></strong>
        </div>
      </div>
      <div class="form-group">
        <label>@lang('user/change_password.confirm_new_password')</label>
        <input class="form-control" type="password" name="new_password_confirmation">
        <div class="invalid-feedback" role="alert">
          <strong></strong>
        </div>
      </div>
      <div id="js-alert-block" class="alert alert-success d-none"></div>
      <p><a id="btn-submit" href="#" class="btn_1 medium mb-3">@lang('Change')</a></p>
    </div>
  </div>
</div>
@endsection

@section('additional_js')
  <script src="{{ asset('js/user/change_password.js') }}"></script>
@endsection
