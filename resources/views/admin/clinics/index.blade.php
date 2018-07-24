@extends('admin.layouts.app')

@section('title')
  {{ __('admin/clinic.index.title')}}
@endsection
@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ __('admin/clinic.index.heading') }}</h1>
  </div>
  @include('admin.layouts.partials.block-flash')
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>{{ __('admin/clinic.index.name') }}</th>
          <th>{{ __('admin/clinic.index.email') }}</th>
          <th>{{ __('admin/clinic.index.phone') }}</th>
          <th>{{ __('admin/clinic.index.address') }}</th>
          <th>{{ __('admin/clinic.index.created_at') }}</th>
          <th>{{ __('admin/clinic.index.clinic_type') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($clinics as $clinic)
          <tr>
            <td>{{ $clinic->id }}</td>
            <td>{{ $clinic->name }}</td>
            <td>{{ $clinic->email }}</td>
            <td>{{ $clinic->phone }}</td>
            <td>{{ $clinic->address }}</td>
            <td>{{ $clinic->created_at }}</td>
            <td>{{ $clinic->clinicType()->value('name') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
