@extends('admin.layouts.app')
@section('title')
  Add Clinic Type
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Add clinic type</h1>
</div>
<form action="{{ route('admin.clinic-types.store') }}" method="POST" class="col-md-6">
  @csrf
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Please Enter Clinic Type" name="name" value="{{ old('name') }}">
    @if ($errors->has('name'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('name') }}</strong>
      </span>
    @endif
  </div>
  <hr class="mb-4">
  <div class="form-group">
    <button type="submit" class="btn btn-primary col-md-2 d-inline mr-3">Add</button>
    <button type="reset" class="btn btn-default col-md-2 d-inline">Reset</button>
  </div>
<form>
@endsection
