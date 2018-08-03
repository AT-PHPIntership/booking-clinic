@extends('admin_clinic.layouts.app')

@section('title')
  @lang('admin_clinic/appointment.show.title')
@endsection

@section('content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">@lang('admin_clinic/appointment.show.heading', ['id' => $appointment->id])</h1>
  </div>
  <div>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label font-weight-bold">@lang('admin_clinic/appointment.fields.user_name')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $appointment->user->name }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label font-weight-bold">@lang('admin_clinic/appointment.fields.created_at')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $appointment->created_at }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="gender" class="col-sm-2 col-form-label font-weight-bold">@lang('admin_clinic/appointment.fields.book_time')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $appointment->book_time }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="dob" class="col-sm-2 col-form-label font-weight-bold">@lang('admin_clinic/appointment.fields.description')</label>
      <div class="col-sm-10">
        <textarea readonly class="form-control" rows="3">{{ $appointment->description }}</textarea>
      </div>
    </div>
  </div>
@endsection
