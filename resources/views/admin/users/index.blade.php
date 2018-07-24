@extends('admin.layouts.app')

@section('title')
  @lang('admin/user.index.title')
@endsection

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">@lang('admin/user.index.heading')</h1>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>@lang('admin/user.fields.name')</th>
          <th>@lang('admin/user.fields.email')</th>
          <th>@lang('admin/user.fields.gender')</th>
          <th>@lang('admin/user.fields.dob')</th>
          <th>@lang('admin/user.fields.phone')</th>
          <th>@lang('admin/user.fields.address')</th>
          <th>@lang('admin/user.fields.created_at')</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            @if ($user->gender === App\User::GENDER_MALE)
              <td>@lang('admin/user.fields.gender_type.male')</td>
            @else
              <td>@lang('admin/user.fields.gender_type.female')</td>
            @endif
            <td>{{ $user->dob }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->created_at }}</td>
            <td><a href="{{ route('admin.users.show', $user->id) }}">detail</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $users->links() }}
  </div>
@endsection
