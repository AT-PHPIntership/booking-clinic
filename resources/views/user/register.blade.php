@extends('user.layouts.app')

@section('content')

<div id="hero_register">
  <div class="container margin_120_95">
  <div class="row">
    <div class="col-lg-6">
    <h1>{{ __('api/user.register.find') }}</h1>
    <p class="lead">{{ __('api/user.register.p_1') }}</p>
    <div class="box_feat_2">
      <i class="pe-7s-map-2"></i>
      <h3>{{ __('api/user.register.h_1') }}</h3>
      <p>{{ __('api/user.register.p_2') }}</p>
    </div>
    <div class="box_feat_2">
      <i class="pe-7s-date"></i>
      <h3>{{ __('api/user.register.h_2') }}</h3>
      <p>{{ __('api/user.register.p_3') }}</p>
    </div>
    <div class="box_feat_2">
      <i class="pe-7s-phone"></i>
      <h3>{{ __('api/user.register.h_3') }}</h3>
      <p>{{ __('api/user.register.p_4') }}</p>
    </div>
    </div>
    <!-- /col -->
    <div class="col-lg-5 ml-auto">
    <div class="box_form">
      <form>
      <div class="row">
        <div class="col-md-12 ">
        <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="{{ __('api/user.register.name') }}">
          <div class="invalid-feedback font-weight-bold" role="alert">
          </div>
        </div>
        </div>
      </div>
      <!-- /row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="{{ __('api/user.register.email') }}">
            <div class="invalid-feedback font-weight-bold" role="alert"></div>
          </div>
        </div>
      </div>
      <!-- /row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="{{ __('api/user.register.password') }}">
            <div class="invalid-feedback font-weight-bold" role="alert"></div>
          </div>
        </div>
      </div>
      <!-- /row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('api/user.register.confirm_pass') }}">
          </div>
        </div>
      </div>
      <!-- /row -->
      <p class="text-center add_top_30"><input type="submit" class="btn_1" value="Submit"></p>
      <div class="text-center"><small>{{ __('api/user.register.p_5') }}</small></div>
      </form>
    </div>
    <!-- /box_form -->
    </div>
    <!-- /col -->
  </div>
  <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /hero_register -->

@endsection

@include('user.layouts.partials.register')
