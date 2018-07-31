@extends('admin.layouts.app')

@section('title')
  @lang('admin/user.index.title')
@endsection

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">@lang('admin/user.index.heading')</h1>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-sm text-nowrap" id="list-data">
      <thead>
        <tr>
          <th>#</th>
          <th>@lang('admin/user.fields.name')</th>
          <th>@lang('admin/user.fields.email')</th>
          <th>@lang('admin/user.fields.gender')</th>
          <th>@lang('admin/user.fields.dob')</th>
          <th>@lang('admin/user.fields.phone')</th>
          <th>@lang('admin/user.fields.detail')</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->gender_string }}</td>
            <td>{{ $user->dob }}</td>
            <td>{{ $user->phone }}</td>
            <td>
              <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-info-circle"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-center mt-2">
    {{ $users->links() }}
  </div>
@endsection
@include('layouts.partials.data_table')
