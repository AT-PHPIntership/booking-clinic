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
    <form action="{{ route('admin.appointments.update_list_appointments', $clinic->id)}}" method="post">
        @csrf
        @method('PATCH')
      <table class="table table-striped table-sm text-nowrap">
        <thead>
          <tr>
            <th>#</th>
            <th>@lang('admin_clinic/appointment.fields.user_name')</th>
            <th>@lang('admin_clinic/appointment.fields.created_at')</th>
            <th>@lang('admin_clinic/appointment.fields.book_time')</th>
            <th>@lang('admin_clinic/appointment.fields.status')</th>
            <th>@lang('admin_clinic/appointment.fields.detail')</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($appointments as $appointment)
            <tr>
              <td>{{ $appointment->id }}</td>
              <td>{{ $appointment->user->name }}</td>
              <td>{{ $appointment->book_time }}</td>
              <td>{{ $appointment->created_at }}</td>
              <td>
                  <select class="custom-select d-block w-100 text-body font-weight-bold status-select" required name="status[]">
                  @foreach (App\Appointment::STATUS as $key=>$item)
                    @if ($item == $appointment->status )
                      <option value="{{ $key }}" selected>{{$item}}</option>
                    @else
                      <option value="{{ $key }}">{{$item}}</option>
                    @endif
                  @endforeach
                </select>
                <input type="hidden" name="id[]" value="{{ $appointment->id}}">
              </td>
              <td>
                <a href="{{ route('admin.appointments.edit', [$clinic->id, $appointment->id]) }}" class="btn btn-outline-primary">
                  <i class="fas fa-info-circle"></i>
                </a>
              </td>

            </tr>
          @endforeach
        </tbody>
      </table>
    <input type="submit" class="btn btn-primary" value="Update">
    </form>
  </div>
  <div class="d-flex justify-content-center mt-2">
    {{ $appointments->links() }}
  </div>
@endsection
