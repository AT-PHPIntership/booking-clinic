@extends('admin_clinic.layouts.app')

@section('title')
  @lang('admin_clinic/dashboard.title')
@endsection

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">@lang('admin_clinic/dashboard.heading')</h1>
  </div>
  <div class="row">
    <div class="col-md-6">
        <div class="card-header">
          <i class="fas fa-address-card">@lang('admin_clinic/dashboard.statitics')</i>
        </div>
      <div class="col-xl-12 col-sm-6 mb-3 pt-5">
        <div class="card text-white bg-success o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-users"></i>
            </div>
            <div class="mr-5 font-weight-bold"><span>{{ $clinic->users()->count() }}</span> @lang('admin_clinic/dashboard.users')</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">@lang('admin_clinic/dashboard.views')</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-12 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-book"></i>
            </div>
            <div class="mr-5 font-weight-bold"><span></span> @lang('admin_clinic/dashboard.examinations')</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left"> @lang('admin_clinic/dashboard.views')</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
    </div>
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-pie">@lang('admin_clinic/dashboard.appointments')</i>
          </div>
          @include('layouts.partials.chart')
        </div>
      </div>
  </div>
  <input id="count" type="hidden" name="count" data-pending="{{ $count['countPending'] }}" data-confirmed="{{ $count['countConfirmed'] }}"
    data-completed="{{ $count['countCompleted'] }}" data-cancel="{{ $count['countCancel'] }}">
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
              <input type="text" class="col-md-4 d-inline form-control text-body font-weight-bold status-pending"
                readonly name="status" value="{{ $appointment->status }}">
              <button id="accept-{{ $appointment->id }}" class="btn btn-outline-success accept" title="@lang('admin_clinic/dashboard.confirm')">
                <i class="fas fa-check"></i>
              </button>
              <button id="cancel-{{ $appointment->id }}" class="btn btn-outline-danger cancel" title="@lang('admin_clinic/dashboard.cancel')">
                <i class="fas fa-times"></i>
              </button>
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

@include('layouts.partials.dashboard')
