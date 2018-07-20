@extends('admin.layouts.app')
@section('title')
  Add Clinic Type
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Add Clinic Type</h1>
</div>
@include('admin.layouts.partials.block-error')
<form action="{{ route('admin.clinic-types.store') }}" method="POST" class="col-md-6">
  @csrf
  <div class="form-group">
    <label>Name</label>
  <input type="text"class="form-control" name="name" placeholder="Please Enter Clinic Name" value="{{ old('name') }}"/>
  </div>
  <hr class="mb-4">
  <div class="form-group">
    <button type="submit" class="btn btn-primary col-md-2 d-inline mr-3">Add</button>
    <button type="reset" class="btn btn-default col-md-2 d-inline">Reset</button>
  </div>
<form>
@endsection
