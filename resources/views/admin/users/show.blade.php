@extends('admin.layouts.app')

@section('title')
  @lang('admin/user.show.title')
@endsection

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">@lang('admin/user.show.heading', ['id' => $user->id])</h1>
  </div>
  <div>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label font-weight-bold">@lang('admin/user.fields.name')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $user->name }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label font-weight-bold">@lang('admin/user.fields.email')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $user->email }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="gender" class="col-sm-2 col-form-label font-weight-bold">@lang('admin/user.fields.gender')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $user->gender_string }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="dob" class="col-sm-2 col-form-label font-weight-bold">@lang('admin/user.fields.dob')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $user->dob }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="phone" class="col-sm-2 col-form-label font-weight-bold">@lang('admin/user.fields.phone')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $user->phone }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="address" class="col-sm-2 col-form-label font-weight-bold">@lang('admin/user.fields.address')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $user->address }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="created_at" class="col-sm-2 col-form-label font-weight-bold">@lang('admin/user.fields.created_at')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $user->created_at }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="updated_at" class="col-sm-2 col-form-label font-weight-bold">@lang('admin/user.fields.updated_at')</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $user->updated_at }}">
      </div>
    </div>
  </div>
@endsection
