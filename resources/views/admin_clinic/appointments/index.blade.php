@extends('admin_clinic.layouts.app')

@section('title')
  @lang('admin_clinic/user.index.title')
@endsection

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">@lang('admin_clinic/appointment.index.heading')</h1>
  </div>
  @include('admin_clinic.layouts.partials.block-flash')
  <div class="table-responsive">
    <form action="" method="post">
      <table class="table table-striped table-sm text-nowrap">
        <thead>
          <tr>
            <th>#</th>
            <th>@lang('admin_clinic/appointment.fields.user_name')</th>
            <th>@lang('admin_clinic/appointment.fields.created_at')</th>
            <th>@lang('admin_clinic/appointment.fields.book_time')</th>
            <th>@lang('admin_clinic/appointment.fields.status')</th>
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
                  <select class="status custom-select d-block w-100 text-body font-weight-bold" required>
                  @foreach (App\Appointment::STATUS as $key=>$item)
                    @if ($item == $appointment->status )
                      <option value="{{ $key }}" selected>{{$item}}</option>
                    @else
                      <option value="{{ $key }}">{{$item}}</option>
                    @endif
                  @endforeach
                </select>
              </td>
            </tr>
          @endforeach


        </tbody>
      </table>
    <input type="button" class="btn btn-primary" value="Update">
    </form>
  </div>
  <div class="d-flex justify-content-center mt-2">
    {{ $appointments->links() }}
  </div>
@endsection
