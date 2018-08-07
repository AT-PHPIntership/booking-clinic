@section('additional_js')
  <script src="{{ asset('js/google_map_config.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API_KEY', null) }}&callback=myMap"></script>
@endsection
