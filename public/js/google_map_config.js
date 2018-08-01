function myMap() {
  var mapCanvas = document.getElementById("googleMap");
  var markerTitle = mapCanvas.getAttribute('title');
  var myCenter = new google.maps.LatLng(mapCanvas.getAttribute('data-lat'), mapCanvas.getAttribute('data-lng'));
  var mapOptions = {center: myCenter, zoom: 15};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter, title: markerTitle});
  marker.setMap(map);
}
