<div id="googleMap" style="width:100%;height:400px;" data-lat="{{ $clinic->lat }}" data-lng=" {{ $clinic->lng }} " title=" {{ $clinic->address }}"></div>
<script src="{{ asset('js/google_map_config.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuT3AlLRi1Y2XdfPX4q6tf7OzvLRt1JTU&callback=myMap"></script>