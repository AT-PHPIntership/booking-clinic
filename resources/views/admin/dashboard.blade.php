@extends('admin.layouts.app')

@section('breadcrumbs')
  {{ Breadcrumbs::render('admin.dashboard') }}
@endsection

@section('title')
  @lang('admin/dashboard.title')
@endsection

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">@lang('admin/dashboard.heading')</h1>
  </div>
@endsection
