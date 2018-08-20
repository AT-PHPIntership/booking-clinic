@extends('admin.layouts.app')

@section('breadcrumbs')
  {{ Breadcrumbs::render('admin.clinics.edit', $clinic) }}
@endsection

@section('title')
  @lang('admin/clinic.edit.title')
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">@lang('admin/clinic.edit.heading')</h1>
</div>
<form action="{{ route('admin.clinics.update', $clinic->id) }}" method="POST" class="col-md-6">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label>@lang('admin/clinic.fields.clinic_type')</label>
    <select class="form-control{{ $errors->has('clinic_type_id') ? ' is-invalid' : '' }}" name="clinic_type_id">
      @foreach($clinicTypes as $type)
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
    <label>@lang('admin/clinic.fields.name')</label>
    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $clinic->name }}">
    @if ($errors->has('name'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('name') }}</strong>
      </span>
    @endif
  </div>
  <div class="form-group">
    <label>@lang('admin/clinic.fields.description')</label>
    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ $clinic->description }}</textarea>
    @if ($errors->has('description'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('description') }}</strong>
      </span>
    @endif
  </div>
  <div class="form-group">
    <label>@lang('admin/clinic.fields.email')</label>
    <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $clinic->email }}">
    @if ($errors->has('email'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
    @endif
  </div>
  <div class="form-group">
    <label>@lang('admin/clinic.fields.phone')</label>
    <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $clinic->phone }}">
    @if ($errors->has('phone'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('phone') }}</strong>
      </span>
    @endif
  </div>
  <div class="form-group">
    <label>@lang('admin/clinic.fields.address')</label>
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
        <span class="input-group-text">@lang('admin/clinic.fields.lat') & @lang('admin/clinic.fields.lng')</span>
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

  <hr class="mb-4">
  <div class="form-group">
    <button type="submit" class="btn btn-primary col-md-2 d-inline mr-3">@lang('admin/layout.btn.update')</button>
  </div>
<form>
@endsection
