@extends('admin_clinic.layouts.app')

@section('title')
  @lang('admin_clinic/appointment.index.title')
@endsection

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">@lang('admin_clinic/appointment.index.heading')</h1>
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
                  @foreach (App\Appointment::STATUS as $key=>$status)
                    @if ($status == $appointment->status )
                      <option value="{{ $key }}" selected>{{$status}}</option>
                    @else
                      <option value="{{ $key }}">{{$status}}</option>
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
