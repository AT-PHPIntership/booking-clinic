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
            function search() {
                var query_value = $('input#search').val();
                 $('b#search-string').text(query_value);
                if(query_value !== ''){
                    $.ajax({
                        type: "POST",
                        url: "/search/",
                        data: { query: query_value}, //this can be more complex if needed
                        cache: false,
                        success: function(data){
                            //at each request - every written letter is request, firstly we delete old results, and fetch new ones.
                            $('#results').empty();
                            $.each(data.result, function(index, item) {
                                //now you can access properties using dot notation
                                //  console.log(data.result[index].first_name);
                                // Here I am fetching users names from users table, and echoing ther profile url
                                  $('#results').append("<li><a href='" + data.result[index].permalink + "'>" + data.result[index].first_name + "</a></li>");
                            });
                        }
                    });
                }return false;
            }
            $("input#search").live("keyup", function(e) {
                // Set Timeout
                clearTimeout($.data(this, 'timer'));
                // Set Search String
                var search_string = $(this).val();
                // Do Search
                if (search_string == '') {
                    $("ul#results").fadeOut();
                    $('h4#results-text').fadeOut();
                }else{
                    $("ul#results").fadeIn();
                    $('h4#results-text').fadeIn();
                    $(this).data('timer', setTimeout(search, 100));
                };
            });
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
