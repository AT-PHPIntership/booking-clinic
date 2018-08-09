@extends('admin_clinic.layouts.app')

@section('title')
  @lang('admin_clinic/appointment.index.title')
@endsection

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">@lang('admin_clinic/appointment.index.heading')</h1>
    <div class="input-group col-md-6">
      <form class="form-inline" action="{{ route('admin_clinic.appointments.index', ['slug' => request('slug')]) }}" method="GET">
        <input type="date" name="from" class="form-control" value="{{ request('from') }}">
        <input type="date" name="to" class="form-control" value="{{ request('to') }}">
        <div class="input-group-append">
          <button type="submit" class="btn btn-outline-secondary" href="#">@lang('admin_clinic/appointment.index.search')</button>
        </div>
      </form>
    </div>
    <div class="dropdown">
      <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ request()->has('status') ? App\Appointment::STATUS[request('status')] : __('admin_clinic/appointment.index.filter') }}
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ route('admin_clinic.appointments.index', ['slug' => request('slug'), 'from' => request('from'), 'to' => request('to')]) }}">@lang('admin_clinic/appointment.index.status.all')</a>
        <a class="dropdown-item" href="{{ route('admin_clinic.appointments.index', ['slug' => request('slug'), 'from' => request('from'), 'to' => request('to'), 'status' => array_search('Confirmed', App\Appointment::STATUS)]) }}">@lang('admin_clinic/appointment.index.status.confirmed')</a>
        <a class="dropdown-item" href="{{ route('admin_clinic.appointments.index', ['slug' => request('slug'), 'from' => request('from'), 'to' => request('to'), 'status' => array_search('Success', App\Appointment::STATUS)]) }}">@lang('admin_clinic/appointment.index.status.success')</a>
        <a class="dropdown-item" href="{{ route('admin_clinic.appointments.index', ['slug' => request('slug'), 'from' => request('from'), 'to' => request('to'), 'status' => array_search('Cancel', App\Appointment::STATUS)]) }}">@lang('admin_clinic/appointment.index.status.cancel')</a>
      </div>
    </div>
  </div>
  @include('admin_clinic.layouts.partials.block-flash')
  <div class="table-responsive">
      <table class="table table-striped table-sm text-nowrap">
        <thead>
          <tr>
            <th>#</th>
            <th>@lang('admin_clinic/appointment.fields.user_name')</th>
            <th>@lang('admin_clinic/appointment.fields.created_at')</th>
            <th>@lang('admin_clinic/appointment.fields.book_time')</th>
            <th>@lang('admin_clinic/appointment.fields.detail')</th>
            <th>@lang('admin_clinic/appointment.fields.status')</th>
          </tr>
        </thead>
        <tbody>
          <input id="slug" type="hidden" name="slug" value="{{ $clinic->slug }}">
          @foreach($appointments as $appointment)
            <tr>
              <td>{{ $appointment->id }}</td>
              <td>{{ $appointment->user->name }}</td>
              <td>{{ $appointment->created_at }}</td>
              <td>{{ $appointment->book_time }}</td>
              <td>
                <a href="{{ route('admin_clinic.appointments.show', [$clinic->slug, $appointment->id]) }}"
                  class="btn btn-outline-primary">
                  <i class="fas fa-info-circle"></i>
                </a>
              </td>
              <td class="container">
                  <select id="appointment-{{ $appointment->id }}"
                    class="col-md-4 d-inline custom-select text-body font-weight-bold status-select"
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
