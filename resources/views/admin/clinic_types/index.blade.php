@extends('admin.layouts.app')

@section('title')
  Clinic Types
@endsection

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">List Clinic Types</h1>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>name</th>
          <th>created_at</th>
        </tr>
      </thead>
      <tbody>
        @foreach($clinicTypes as $type)
          <tr>
            <td>{{ $type->id }}</td>
            <td>{{ $type->name }}</td>
            <td>{{ $type->created_at }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
