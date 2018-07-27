@extends('admin.layouts.app')

@section('title')
  @lang('admin/clinic.show.title')
@endsection

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">@lang('admin/clinic.show.heading', ['id' => $clinic->id])</h1>
  </div>
  <div class="col-md-8">
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label font-weight-bold">@lang('admin/clinic.fields.name')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $clinic->name }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="clinicTypeName" class="col-sm-2 col-form-label font-weight-bold">@lang('admin/clinic.fields.clinic_type')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $clinic->clinicType->name }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="address" class="col-sm-2 col-form-label font-weight-bold">@lang('admin/clinic.fields.address')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $clinic->address }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="phone" class="col-sm-2 col-form-label font-weight-bold">@lang('admin/clinic.fields.phone')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $clinic->phone }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label font-weight-bold">@lang('admin/clinic.fields.email')</label>
      <div class="col-sm-10">
        <a href="mailto:{{ $clinic->email }}" target="_top">{{ $clinic->email }}</a>
      </div>
    </div>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label font-weight-bold">@lang('admin/clinic.fields.description')</label>
      <div class="col-sm-10">{{ $clinic->description }}</div>
    </div>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label font-weight-bold">@lang('admin/clinic.fields.created_at')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $clinic->created_at->toFormattedDateString() }}">
      </div>
    </div>
  </div>
</div>
@endsection  