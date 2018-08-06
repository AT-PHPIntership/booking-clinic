@extends('admin_clinic.layouts.app')

@section('title')
  @lang('admin_clinic/dashboard.title')
@endsection

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">@lang('admin_clinic/dashboard.heading')</h1>
  </div>
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-users"></i>
          </div>
          <div class="mr-5"><span></span>Users</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-book"></i>
          </div>
          <div class="mr-5"><span></span>Pendding appointments</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-book-open"></i>
          </div>
          <div class="mr-5"><span></span>Confirm Appointment</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-sm text-nowrap">
      <thead>
        <tr>
          <th>#</th>
          <th>@lang('admin_clinic/appointment.fields.user_name')</th>
          <th>@lang('admin_clinic/appointment.fields.created_at')</th>
          <th>@lang('admin_clinic/appointment.fields.book_time')</th>
          <th>@lang('admin_clinic/appointment.fields.status')</th>
        </tr>
      </thead>
      <tbody>
        <input id="slug" type="hidden" name="slug" value="{{ $clinic->slug }}">
        @foreach($appointments as $appointment)
          <tr>
            <td>{{ $appointment->id }}</td>
            <td>{{ $appointment->user->name }}</td>
            <td>{{ $appointment->book_time }}</td>
            <td>{{ $appointment->created_at }}</td>
            <td class="container">
                <select id="appointment-{{$appointment->id}}" class="col-md-4 d-inline custom-select text-body font-weight-bold status-select"
                  required name="status">
                @foreach (App\Appointment::STATUS as $key => $status)
                  @if ($status == $appointment->status)
                    <option value="{{ $key }}" selected>{{ $status }}</option>
                  @else
                    <option value="{{ $key }}">{{ $status }}</option>
                  @endif
                @endforeach
              </select>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>
<div class="d-flex justify-content-center mt-2">
  {{ $appointments->links() }}
</div>
@endsection

@include('layouts.partials.appointment')
