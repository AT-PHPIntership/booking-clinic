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
        <input id="user-name" type="text" readonly class="form-control-plaintext" value="{{ $appointment->user->name }}">
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
    <div class="form-group row">
      <label for="dob" class="col-sm-2 col-form-label font-weight-bold">@lang('admin_clinic/appointment.fields.status')</label>
      <input id="slug" type="hidden" name="slug" value="{{ $slug }}">
      <div class="col-sm-10">
        <select id="appointment-{{ $appointment->id }}" class="col-md-4 d-inline custom-select text-body font-weight-bold status-select" required name="status">
          @php
            $status = App\Appointment::STATUS_LABELS;
          @endphp

          {{-- Admin can change status from Confirmed to Cancel in list appointments page --}}
          @if ($appointment->status == $status[App\Appointment::STATUS_CONFIRMED])
            <option value="{{ App\Appointment::STATUS_CONFIRMED }}" selected>@lang('admin_clinic/appointment.status.confirmed')</option>
            <option value="{{ App\Appointment::STATUS_CANCEL }}">@lang('admin_clinic/appointment.status.cancel')</option>
          @else
            <option value="{{ $appointment->status_code }}" selected>{{ $appointment->status }}</option>
          @endif
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="dob" class="col-sm-2 col-form-label font-weight-bold">@lang('admin_clinic/appointment.examination')</label>
      <div class="col-sm-10">
        @if ($appointment->status == $status[App\Appointment::STATUS_CONFIRMED])
          <button id="create-examination"class="btn btn-primary col-md-3 text-body font-weight-bold">Add examination</button>
        @elseif ($appointment->status == 'Completed')
          <a class="btn btn-success col-md-3 text-body font-weight-bold" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Show examination
          </a>
          <div class="collapse" id="collapseExample">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h2 class="h2">Examination {{ $appointment->user->name}}</h2>
              </div>
              <div class="form-group">
                  <label>Diagnostic</label>
                  <input type="text" name="diagnostic" class="name form-control" value="{{ $appointment->examination->diagnostic }}" readonly />
              </div>
              <div class="form-group">
                  <label>Result</label>
                  <textarea class="form-control" name="result" readonly>{{ $appointment->examination->result }}</textarea>
              </div>
              <div class="form-group">
                  <label>Created at</label>
                  <input type="text" name="created_at" class="name form-control" value="{{ $appointment->examination->created_at }}" readonly />
              </div>
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection

@include('layouts.partials.examination')
