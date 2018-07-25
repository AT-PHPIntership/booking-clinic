@extends('admin.layouts.app')

@section('title')
  {{ __('admin/clinic.index.title') }}
@endsection
@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ __('admin/clinic.index.heading') }}</h1>
    <a href="{{ route('admin.clinics.create') }}" class="btn btn-outline-primary">
      <i class="fas fa-plus"> {{ __('admin/layout.btn.add') }}</i>
    </a>
  </div>
  @include('admin.layouts.partials.block-flash')
  <div class="table-responsive">
    <table class="table table-striped table-sm text-nowrap">
      <thead>
        <tr>
          <th>#</th>
          <th>{{ __('admin/clinic.fields.clinic_type') }}</th>
          <th>{{ __('admin/clinic.fields.name') }}</th>
          <th>{{ __('admin/clinic.fields.email') }}</th>
          <th>{{ __('admin/clinic.fields.phone') }}</th>
          <th>{{ __('admin/clinic.fields.address') }}</th>
          <th>{{ __('admin/clinic.fields.created_at') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($clinics as $clinic)
          <tr>
            <td>{{ $clinic->id }}</td>
            <td>{{ $clinic->clinicType->name }}</td>
            <td>{{ $clinic->name }}</td>
            <td>{{ $clinic->email }}</td>
            <td>{{ $clinic->phone }}</td>
            <td>{{ $clinic->address }}</td>
            <td>{{ $clinic->created_at }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-center mt-2">
    {{ $clinics->links() }}
  </div>
@endsection
