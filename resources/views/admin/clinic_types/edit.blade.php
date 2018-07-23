@extends('admin.layouts.app')
@section('title')
  {{ __('admin/clinic_type.edit.title') }}
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ __('admin/clinic_type.edit.heading') }}</h1>
</div>
<form action="{{ route('admin.clinic-types.update', $type->id) }}" method="POST" class="col-md-6">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label>{{ __('admin/clinic_type.create.name') }}</label>
    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $type->name }}">
    @if ($errors->has('name'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('name') }}</strong>
      </span>
    @endif
  </div>
  <hr class="mb-4">
  <div class="form-group">
    <button type="submit" class="btn btn-primary col-md-2 d-inline mr-3">{{ __('admin/layout.btn.update') }}</button>
  </div>
<form>
@endsection
