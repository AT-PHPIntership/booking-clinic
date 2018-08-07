@extends('admin_clinic.layouts.app')

@section('title')
  @lang('admin_clinic/profile.show.title')
@endsection

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">@lang('admin_clinic/profile.show.heading', ['id' => $clinic->id])</h1>
    <div class="row">
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-edit"></i>
      </button>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href=" {{ route('admin_clinic.profile.edit', $clinic->slug) }} "><i class="fas fa-home"> Clinic</i></a>
        <a class="dropdown-item" href="#"><i class="fas fa-user"> Admin</i></a>
      </div>
    </div>
    </div>
  </div>
  @include('admin_clinic.layouts.partials.block-flash')
  <div class="row">
    <div class="col-sm-8">
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label font-weight-bold">@lang('admin_clinic/profile.fields.clinic.name')</label>
        <div class="col-sm-10">
          <input type="text" name="name" readonly class="form-control-plaintext" value="{{ $clinic->name }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="clinicTypeName" class="col-sm-2 col-form-label font-weight-bold">@lang('admin_clinic/profile.fields.clinic.clinic_type')</label>
        <div class="col-sm-10">
          <input type="text" name="clinic-type" readonly class="form-control-plaintext" value="{{ $clinic->clinicType->name }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label font-weight-bold">@lang('admin_clinic/profile.fields.clinic.address')</label>
        <div class="col-sm-10">
          <input type="text" name="address" readonly class="form-control-plaintext" value="{{ $clinic->address }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label font-weight-bold">@lang('admin_clinic/profile.fields.clinic.phone')</label>
        <div class="col-sm-10">
          <input type="text" name="phone" readonly class="form-control-plaintext" value="{{ $clinic->phone }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label font-weight-bold">@lang('admin_clinic/profile.fields.clinic.email')</label>
        <div class="col-sm-10">
          <a class="form-control-plaintext" href="mailto:{{ $clinic->email }}" target="_top">{{ $clinic->email }}</a>
        </div>
      </div>
      <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label font-weight-bold">@lang('admin_clinic/profile.fields.clinic.description')</label>
        <div class="col-sm-10">
          <textarea class="form-control-plaintext" rows="3" disabled>{{ $clinic->description }}</textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="slug" class="col-sm-2 col-form-label font-weight-bold">@lang('admin_clinic/profile.fields.clinic.slug')</label>
        <div class="col-sm-10">
            <input type="text" name="slug" readonly class="form-control-plaintext" value="{{ $clinic->slug }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="created_at" class="col-sm-2 col-form-label font-weight-bold">@lang('admin_clinic/profile.fields.clinic.created_at')</label>
        <div class="col-sm-10">
          <input type="text" name="created-at" readonly class="form-control-plaintext" value="{{ $clinic->created_at->toFormattedDateString() }}">
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div id="googleMap" style="width:100%;height:400px;" data-lat="{{ $clinic->lat }}" data-lng="{{ $clinic->lng }}" title="{{ $clinic->address }}"></div>

      <div class="form-group">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">@lang('admin_clinic/profile.fields.clinic.lat') & @lang('admin_clinic/profile.fields.clinic.lng')</span>
          </div>
          <input type=text readonly class="form-control" name="lat" value="{{ $clinic->lat }}">
          <input type=text readonly class="form-control" name="lng" value="{{ $clinic->lng }}">
        </div>
      </div>

    </div>
  </div>
  <div class="row" style="width:500px;height:500px">
    @include('layouts.partials.carousel', ['images' => $clinic->images])
  </div>
@endsection

@include('layouts.partials.google_map')
