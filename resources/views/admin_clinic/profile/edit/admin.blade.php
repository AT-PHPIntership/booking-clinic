@extends('admin_clinic.layouts.app')

@section('title')
  @lang('admin_clinic/profile.show.title')
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">@lang('admin_clinic/profile.edit.admin.heading')</h1>
</div>
<div class="container">
  <div class="row justify-content-center">
    {{-- section form password --}}
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('admin_clinic/profile.edit.admin.section.password') }}</div>
      
        <div class="card-body">
          <form method="POST" action="{{ route('admin_clinic.profile.admin.update', request()->slug) }}" aria-label="{{ __('admin/register.register') }}">
            @csrf
            @method('PUT')
              <div class="form-group row">
                <label for="password_current" class="col-md-4 col-form-label text-md-right">{{ __('admin_clinic/profile.fields.admin.current_password') }}</label>

                <div class="col-md-6">
                  <input id="password_current" type="password" class="form-control{{ $errors->has('password_current') ? ' is-invalid' : '' }}" name="password_current" autofocus>

                  @if ($errors->has('password_current'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password_current') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('admin_clinic/profile.fields.admin.new_password') }}</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                  @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('admin_clinic/profile.fields.admin.confirm_password') }}</label>

                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" >
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('admin_clinic/layout.btn.update') }}
                  </button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
    {{-- section form username --}}
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('admin_clinic/profile.edit.admin.section.adminname') }}</div>

        <div class="card-body">
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('admin_clinic/profile.fields.admin.name') }}</label>

            <div class="col-md-6">
              <input type="text" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" data-slug="{{ request()->slug }}" required>

              <span class="invalid-feedback d-none" role="alert">
                <strong></strong>
              </span>

            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button id="change_name" class="btn btn-primary">
                {{ __('admin_clinic/layout.btn.update') }}
              </button>
              <div class="circle-loader d-none" id="loader-icon">
                <div class="checkmark draw"></div>
                <span></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@include("admin_clinic.layouts.partials.change_username")
