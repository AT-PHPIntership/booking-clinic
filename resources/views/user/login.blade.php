@extends('user.layouts.app')

@section('content')

<div class="bg_color_2">
  <div class="container margin_60_35">
    <div id="login-2">
      <h1>@lang('user/login.please_login') {{ config('app.name') }}</h1>
      <form>
        <div class="box_form clearfix">
          <div class="box_login">
            <a href="#" class="social_bt facebook">@lang('user/login.login_facebook')</a>
            <a href="#" class="social_bt google">@lang('user/login.login_google')</a>
            <a href="#" class="social_bt linkedin">@lang('user/login.login_linkedin')</a>
          </div>
          <div class="box_login last">
            <div class="form-group">
              <input id="input-email" type="email" class="form-control" placeholder="@lang('user/login.your_email')">
              <div class="invalid-feedback" role="alert">
                <strong></strong>
              </div>
            </div>
            <div class="form-group">
              <input id="input-password" type="password" class="form-control" placeholder="@lang('user/login.your_password')">
              <div class="invalid-feedback" role="alert">
                <strong></strong>
              </div>
              <a href="#" class="forgot"><small>@lang('user/login.forgot_password')</small></a>
              <div id="js-error-login" class="alert alert-danger d-none">
              </div>
            </div>
            <div class="form-group">
              <input id="btn-submit" class="btn_1" type="submit" value="Login">
            </div>
          </div>
        </div>
      </form>
    <p class="text-center link_bright">@lang('user/login.not_have_account') <a href="{{ route('user.register') }}"><strong>@lang('user/login.register_now')</strong></a></p>
    </div>
    <!-- /login -->
    <input type="hidden" name="app_id" value="{{ env('FACEBOOK_ID') }}">
  </div>
</div>
@endsection

@section('additional_js')
  <script src="{{ asset('js/user/auth/login.js') }}"></script>
@endsection
