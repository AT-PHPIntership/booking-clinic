@extends('admin.layouts.app')

@section('title')
  {{ __('admin/clinic_type.index.title') }}
@endsection

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ __('admin/clinic_type.index.heading') }}</h1>
    <a href="{{ route('admin.clinic-types.create') }}" class="btn btn-outline-primary">
      <i class="fas fa-plus"> {{ __('admin/layout.btn.add') }}</i>
    </a>
  </div>
  @include('admin.layouts.partials.block-flash')
  <div class="row">

        <script type="text/javascript">
            jQuery.fn.extend({
                live: function (event, callback) {
                   if (this.selector) {
                        jQuery(document).on(event, this.selector, callback);
                    }
                }
            });
            </script>

        <div class="col-md-2">
            <div class="icon"></div>
        </div>
        <div class="col-md-10">
            <input type="text" id="search" autocomplete="off">
        </div>
          <ul id="results"></ul>

    </div>
    <script type="text/javascript">
        // Search
        $(document).ready(function() {
            // Icon Click Focus
            $('div.icon').click(function(){
                $('input#search').focus();
            });
            // Live Search
            // On Search Submit and Get Results

            var delay = (function() {
            var timer = 0;
            return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
            };
            })();

             var save = $('tbody').val();
            $("input#search").keyup(
                function () {
                    delay(function () {
                        var keyword = $("#search").val();

                        if (keyword.trim()) $.ajax({
                            url: "/admin/clinic-types/search",
                            cache: false,
                            data: {query: keyword,  _token: '{{ csrf_token() }}'},
                            type: "POST",
                            success: function(response) {

                                $('tbody').empty();
                                $.each(response.result, function(index, value) {
                                    $('tbody').append('<tr><td></td><td>' + value['name'] + '</td><td></td><td></td><td></td></tr>');
                                })


                            }
                        });
                        else $('tbody').html() = save;
                    }, 500);
                }
            );
        });
        </script>
  <div class="table-responsive">
    <table class="table table-striped table-sm text-nowrap">
      <thead>
        <tr>
          <th>#</th>
          <th>{{ __('admin/clinic_type.index.name') }}</th>
          <th>{{ __('admin/clinic_type.index.created_at') }}</th>
          <th>{{ __('admin/clinic_type.index.edit') }}</th>
          <th>{{ __('admin/clinic_type.index.delete') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($clinicTypes as $type)
          <tr>
            <td>{{ $type->id }}</td>
            <td>{{ $type->name }}</td>
            <td>{{ $type->created_at }}</td>
            <td>
              <a href="{{ route('admin.clinic-types.edit', $type->id) }}" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
            </td>
            <td>
              <form action="{{ route('admin.clinic-types.destroy', $type->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('admin/clinic_type.delete.confirm') }}')">
                    <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
