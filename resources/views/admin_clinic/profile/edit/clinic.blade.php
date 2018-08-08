@extends('admin_clinic.layouts.app')

@section('title')
  @lang('admin_clinic/profile.show.title')
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">@lang('admin_clinic/profile.edit.clinic.heading')</h1>
</div>
<form action="{{ route('admin_clinic.profile.update', $clinic->slug) }}" method="POST" class="col-md-12" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="col-md-6">
    <div class="form-group">
      <label>@lang('admin_clinic/profile.fields.clinic.clinic_type')</label>
      <select class="form-control{{ $errors->has('clinic_type_id') ? ' is-invalid' : '' }}" name="clinic_type_id">
        @foreach ($clinicTypes as $type)
          @if ($type->id === $clinic->clinicType->id)
            <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
          @else
            <option value="{{ $type->id }}" >{{ $type->name }}</option>
          @endif
        @endforeach
      </select>
      @if ($errors->has('clinic_type_id'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('clinic_type_id') }}</strong>
        </span>
      @endif
    </div>
    <div class="form-group">
      <label>@lang('admin_clinic/profile.fields.clinic.name')</label>
      <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $clinic->name }}">
      @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
      @endif
    </div>
    <div class="form-group">
      <label>@lang('admin_clinic/profile.fields.clinic.description')</label>
      <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ $clinic->description }}</textarea>
      @if ($errors->has('description'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('description') }}</strong>
        </span>
      @endif
    </div>
    <div class="form-group">
      <label>@lang('admin_clinic/profile.fields.clinic.email')</label>
      <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $clinic->email }}">
      @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
      @endif
    </div>
    <div class="form-group">
      <label>@lang('admin_clinic/profile.fields.clinic.phone')</label>
      <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $clinic->phone }}">
      @if ($errors->has('phone'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('phone') }}</strong>
        </span>
      @endif
    </div>
    <div class="form-group">
      <label>@lang('admin_clinic/profile.fields.clinic.address')</label>
      <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $clinic->address }}">
      @if ($errors->has('address'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('address') }}</strong>
        </span>
      @endif
    </div>
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">@lang('admin_clinic/profile.fields.clinic.lat') & @lang('admin_clinic/profile.fields.clinic.lng')</span>
        </div>
        <input type=number step=any class="form-control{{ $errors->has('lat') ? ' is-invalid' : '' }}" name="lat" value="{{ $clinic->lat }}">
        <input type=number step=any class="form-control{{ $errors->has('lng') ? ' is-invalid' : '' }}" name="lng" value="{{ $clinic->lng }}">
        @if ($errors->has('lat'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('lat') }}</strong>
          </span>
        @endif
        @if ($errors->has('lng'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('lng') }}</strong>
          </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <label>@lang('admin_clinic/profile.fields.clinic.image')</label>
      <input type="file" class ="form-control{{ $errors->has('images.*') ? ' is-invalid' : '' }}" name="images[]" multiple>
      @if ($errors->has('images.*'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('images.*') }}</strong>
      </span>
      @endif
    </div>
  </div>

  <div class="col-md-10">
    @foreach ($clinic->images as $key => $image)
      <div class="img-wrap">
      <span class="close" data-confirm=" {{ __('admin_clinic/profile.edit.clinic.confirm') }}">&times;</span>
      <img src="{{ asset($image->path) }}" alt="..." class="img-thumbnail" style="width:150px;height:150px" data-id=" {{ $image->id }} ">
      </div>  
    @endforeach
    <input type="hidden" name="image_deleted" value="">
  </div>
  
  <hr class="mb-4">
  <div class="form-group">
    <button type="submit" class="btn btn-primary col-md-1 d-inline mr-3">@lang('admin_clinic/layout.btn.update')</button>
  </div>
<form>
@endsection

@include('admin_clinic.layouts.partials.update_clinic_image')
