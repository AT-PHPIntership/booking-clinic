@extends('admin_clinic.layouts.app')

@section('title')
  @lang('admin_clinic/appointment.edit.title')
@endsection

@section('content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">@lang('admin_clinic/appointment.edit.heading', ['id' => $appointment->id])</h1>
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
        <textarea class="form-control-plaintext" rows="3" disabled>{{ $appointment->description }}</textarea>
      </div>
    </div>
    <div class="form-group container">
      <label for="dob" class="col-sm-2 col-form-label font-weight-bold">@lang('admin_clinic/appointment.fields.status')</label>
      <input id="slug" type="hidden" name="slug" value="{{ $slug }}">
      <select id="appointment-{{$appointment->id}}" class="col-md-4 d-inline custom-select text-body font-weight-bold status-select"
          required name="status">
      @foreach (App\Appointment::STATUS as $key=>$status)
          @if ($status == $appointment->status )
          <option value="{{ $key }}" selected>{{$status}}</option>
          @else
          <option value="{{ $key }}">{{$status}}</option>
          @endif
      @endforeach
      </select>
    </div>
  </div>
@endsection

@include('layouts.partials.appointment')
