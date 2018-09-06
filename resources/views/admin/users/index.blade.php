@extends('admin.layouts.app')

@section('breadcrumbs')
  {{ Breadcrumbs::render('admin.users.index') }}
@endsection

@section('title')
  @lang('admin/user.index.title')
@endsection

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">@lang('admin/user.index.heading')</h1>
    <div class="input-group col-md-6">
      <form class="form-inline" action="{{ route('admin.users.index') }}" method="GET">
        <input type="text" name="search" class="form-control" value="{{ request('search') }}">
        <div class="input-group-append">
          <button type="submit" class="btn btn-outline-secondary" href="#">{{ __('admin/clinic.index.search') }}</button>
        </div>
      </form>
    </div>
    <div class="dropdown">
      <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Filters
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ route('admin.users.index',
          ['search' => request('search'),
          'sort_by' => 'name',
          'order' => 'ASC']) }}">NAME A-Z</a>
        <a class="dropdown-item" href="{{ route('admin.users.index',
        ['search' => request('search'),
        'sort_by' => 'name',
        'order' => 'DESC']) }}">NAME Z-A</a>
        <a class="dropdown-item" href="{{ route('admin.users.index',
        ['search' => request('search'),
        'sort_by' => 'name',
        'order' => 'ASC',
        'gender' => App\User::GENDER_FEMALE]) }}">Female</a>
        <a class="dropdown-item" href="{{ route('admin.users.index',
        ['search' => request('search'),
        'sort_by' => 'name',
        'order' => 'ASC',
        'gender' => App\User::GENDER_MALE]) }}">Male</a>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-sm text-nowrap">
      <thead>
        <tr>
          <th>#</th>
          <th>@lang('admin/user.fields.name')</th>
          <th>@lang('admin/user.fields.email')</th>
          <th>@lang('admin/user.fields.gender')</th>
          <th>@lang('admin/user.fields.dob')</th>
          <th>@lang('admin/user.fields.phone')</th>
          <th>@lang('admin/user.fields.show')</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @php
          $index = $users->firstItem();
        @endphp
        @foreach($users as $user)
          <tr>
            <td>{{ $index++ }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->gender_string }}</td>
            <td>{{ $user->dob }}</td>
            <td>{{ $user->phone }}</td>
            <td><a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-info-circle"></i></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-center mt-2">
    {{ $users->appends(['search' => request()->get('search'),
        'sort_by' => request()->get('sort_by'),
        'order' => request()->get('order'),
        'gender' => request()->get('gender')])->links() }}
  </div>
@endsection
