@extends('admin.layouts.app')

@section('breadcrumbs')
  {{ Breadcrumbs::render('admin.clinics.index') }}
@endsection

@section('title')
  {{ __('admin/clinic.index.title') }}
@endsection
@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ __('admin/clinic.index.heading') }}</h1>
    <div class="input-group col-md-6">
      <form class="form-inline" action="{{ route('admin.clinics.index') }}" method="GET">
        <input type="text" name="search" class="form-control" value="{{ request('search') }}">
        <div class="input-group-append">
          <button type="submit" class="btn btn-outline-secondary" href="#">{{ __('admin/clinic.index.search') }}</button>
        </div>
      </form>
    </div>
    <div class="dropdown">
      <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('admin/clinic.index.filter') }}
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ route('admin.clinics.index') }}">{{ __('admin/clinic.index.all') }}</a>
        @foreach (App\ClinicType::all() as $type)
          <a class="dropdown-item" href="{{ route('admin.clinics.index', ['clinic_type_id' => $type->id]) }}">{{ $type->name }}</a>
        @endforeach
      </div>
    </div>

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
          <th>{{ __('admin/clinic.fields.phone') }}</th>
          <th>{{ __('admin/clinic.index.edit') }}</th>
          <th>{{ __('admin/clinic.index.delete') }}</th>
          <th>{{ __('admin/clinic.index.show') }}</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @php
          $index = $clinics->firstItem();
        @endphp
        @foreach($clinics as $clinic)
          <tr>
            <td>{{ $index++ }}</td>
            <td>{{ $clinic->clinicType->name }}</td>
            <td>{{ $clinic->name }}</td>
            <td>{{ $clinic->phone }}</td>
            <td>
              <a href="{{ route('admin.clinics.edit', $clinic->id) }}" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
            </td>
            <td>
              <form action="{{ route('admin.clinics.destroy', $clinic->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('admin/clinic.delete.confirm') }}')">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            </td>
            <td><a href="{{ route('admin.clinics.show', $clinic->id) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-info-circle"></i></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-center mt-2">
    {{ $clinics->appends(['search' => request()->get('search')])->links() }}
  </div>
@endsection
