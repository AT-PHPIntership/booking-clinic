'use strict';
/** @type {!Array} */
var shortWord = ["prototype", "forEach", "length", "call", "Dr. Jhoanna Steel", "img/doctor_listing_1.jpg", "Psicologist - Pediatrician", "detail-page.html", "35 Newtownards Road, Belfast, BT4.", "", "+3934245255", "Dr. Robert Carl", "Psicologist", "Dr. Mark Twain", "Primary Care", "maps", "ROADMAP", "MapTypeId", "DROPDOWN_MENU", "MapTypeControlStyle", "LEFT_CENTER", "ControlPosition", "TOP_RIGHT", "LARGE", "ZoomControlStyle", "RIGHT_BOTTOM", "landscape", "#FFBB00", "road.highway", "#FFC200", "road.arterial",
"#FF0300", "road.local", "water", "#0078FF", "poi", "#00FF6A", "map_listing", "getElementById", "location_latitude", "location_longitude", "/images/user/pin/", ".png", "undefined", "push", "click", "open", "setCenter", "addListener", "event", "setMap", "Animation", "setAnimation", "remove", "div.infoBox", '<div class="marker_info">', "<figure><a href=", "url_detail", '><img src="', "map_image_url", '" alt="Image"></a></figure>', "<small>", "type", "</small>", "<h3><a href=", ">", "name_point", "</a></h3>",
"<span>", "description_point", "</span>", '<div class="marker_tools">', '<form action="http://maps.google.com/maps" method="get" target="_blank" style="display:inline-block""><input name="saddr" value="', "get_directions_start_address", '" type="hidden"><input type="hidden" name="daddr" value="', ",", '"><button type="submit" value="Get directions" class="btn_infobox_get_directions">Directions</button></form>', '<a href="tel://', "phone", '" class="btn_infobox_phone">', "</a>", "</div>", "img/close_infobox.png",
"floatPane", "trigger"];

var mapObject;
/** @type {!Array} */
var markers = [];

var markersData = {
  "Clinics" : []
};

var mapOptions;
initMapOptions();

var marker;
mapObject = new google.maps.Map(document.getElementById('map_listing'), mapOptions);
var key;

/**
 * @return {undefined}
 */
function hideAllMarkers() {
  var i;
  for (i in markers) {
    markers[i].forEach(function(canCreateDiscussions) {
      canCreateDiscussions.setMap(null);
    });
  }
}

/**
 * @param {?} gutterID
 * @return {?}
 */
function toggleMarkers(gutterID) {
  hideAllMarkers();
  closeInfoBox();
  if (undefined === typeof markers[gutterID]) {
    return false;
  }
  markers[gutterID].forEach(function(canCreateDiscussions) {
    canCreateDiscussions.setMap(mapObject);
    canCreateDiscussions['setAnimation'](google.map['Animation'].DROP);
  });
}

/**
 * @return {undefined}
 */
function closeInfoBox() {
  $('div.infoBox').remove();
}

/**
 * @param {?} text
 * @return {?}
 */
function getInfoBox(text) {
  return new InfoBox({
    content : shortWord[55] + shortWord[56] + text[shortWord[57]] + shortWord[58] + text[shortWord[59]] + shortWord[60] + shortWord[61] + text[shortWord[62]] + shortWord[63] + shortWord[64] + text[shortWord[57]] + shortWord[65] + text[shortWord[66]] + shortWord[67] + shortWord[68] + text[shortWord[69]] + shortWord[70] + shortWord[71] + shortWord[72] + text[shortWord[73]] + shortWord[74] + text[shortWord[39]] + shortWord[75] + text[shortWord[40]] + shortWord[76] + shortWord[77] + text[shortWord[78]] + shortWord[79] + text[shortWord[78]] + shortWord[80] + shortWord[81] +
    shortWord[81],
    disableAutoPan : false,
    maxWidth : 0,
    pixelOffset : new google.maps.Size(10, 105),
    closeBoxMargin : '',
    closeBoxURL : '/images/user/close_infobox.png',
    isHidden : false,
    alignBottom : true,
    pane : 'floatPane',
    enableEventPropagation : true
  });
}

/**
 * @param {?} type
 * @param {?} i
 * @return {undefined}
 */
function onHtmlClick(type, i) {
  google.maps.event.trigger(markers[type][i], 'click');
}
;

function initContruct() {
  (function(canCreateDiscussions) {
    if (!Array[shortWord[0]][shortWord[1]]) {
      canCreateDiscussions[shortWord[1]] = canCreateDiscussions[shortWord[1]] || function(DeviceMatchers, agentService) {
        /** @type {number} */
        var undoStackPos = 0;
        var undoStackLength = this.length;
        for (; undoStackPos < undoStackLength; undoStackPos++) {
          if (undoStackPos in this) {
            DeviceMatchers[shortWord[3]](agentService, this[undoStackPos], undoStackPos, this);
          }
        }
      };
    }
  })(Array[shortWord[0]]);
}

/**
 * Init data about clinics info box before init markers
 *
 * @param {clinics} data
 */
function initMarkersData(data) {
  markersData['Clinics'] = [];
  data.forEach(clinic => {
    var clinicObj = {
      name : clinic.name,
      location_latitude : +clinic.lat,
      location_longitude : +clinic.lng,
      map_image_url : getAvatarClinic(clinic),
      type : clinic.clinic_type.name,
      url_detail : route('user.clinics.show', clinic.id),
      name_point : clinic.name,
      description_point : clinic.address,
      get_directions_start_address : '',
      phone : clinic.phone
    }
    markersData['Clinics'].push(clinicObj);
  });
}

/**
 * Init options for various terrain in showing Map
 */
function initMapOptions() {
  mapOptions = {
    zoom : 14,
    center : new google[shortWord[15]].LatLng(16.06143, 108.23837),
    mapTypeId : google[shortWord[15]][shortWord[17]][shortWord[16]],
    mapTypeControl : false,
    mapTypeControlOptions : {
      style : google[shortWord[15]][shortWord[19]][shortWord[18]],
      position : google[shortWord[15]][shortWord[21]][shortWord[20]]
    },
    panControl : false,
    panControlOptions : {
      position : google[shortWord[15]][shortWord[21]][shortWord[22]]
    },
    zoomControl : true,
    zoomControlOptions : {
      style : google[shortWord[15]][shortWord[24]][shortWord[23]],
      position : google[shortWord[15]][shortWord[21]][shortWord[25]]
    },
    scrollwheel : false,
    scaleControl : false,
    scaleControlOptions : {
      position : google[shortWord[15]][shortWord[21]][shortWord[20]]
    },
    streetViewControl : true,
    streetViewControlOptions : {
      position : google[shortWord[15]][shortWord[21]][shortWord[25]]
    },
    styles : [{
      "featureType" : 'landscape',
      "stylers" : [{
        "hue" : '#FFBB00'
      }, {
        "saturation" : 43.400000000000006
      }, {
        "lightness" : 37.599999999999994
      }, {
        "gamma" : 1
      }]
    }, {
      "featureType" : 'road.highway',
      "stylers" : [{
        "hue" : '#FFC200'
      }, {
        "saturation" : -61.8
      }, {
        "lightness" : 45.599999999999994
      }, {
        "gamma" : 1
      }]
    }, {
      "featureType" : 'road.arterial',
      "stylers" : [{
        "hue" : '#FF0300'
      }, {
        "saturation" : -100
      }, {
        "lightness" : 51.19999999999999
      }, {
        "gamma" : 1
      }]
    }, {
      "featureType" : 'road.local',
      "stylers" : [{
        "hue" : '#FF0300'
      }, {
        "saturation" : -100
      }, {
        "lightness" : 52
      }, {
        "gamma" : 1
      }]
    }, {
      "featureType" : 'water',
      "stylers" : [{
        "hue" : '#0078FF'
      }, {
        "saturation" : -13.200000000000003
      }, {
        "lightness" : 2.4000000000000057
      }, {
        "gamma" : 1
      }]
    }, {
      "featureType" : 'poi',
      "stylers" : [{
        "hue" : '#00FF6A'
      }, {
        "saturation" : -1.0989010989011234
      }, {
        "lightness" : 11.200000000000017
      }, {
        "gamma" : 1
      }]
    }]
  };
}

/**
 * Show markers on Map
 */
function initMarker() {
  hideAllMarkers();
  closeInfoBox();
  markers['Clinics'] = [];
  for (key in markersData) {
    markersData[key].forEach(function(address) {
      marker = new google.maps.Marker({
        position : new google.maps.LatLng(address[shortWord[39]], address[shortWord[40]]),
        map : mapObject,
        icon : '/images/user/pin/Clinics.png'

      });
      if (undefined === typeof markers[key]) {
        /** @type {!Array} */
        markers[key] = [];
      }
      markers[key]['push'](marker);
      google.maps[shortWord[49]]['addListener'](marker, shortWord[45], function() {
        closeInfoBox();
        getInfoBox(address)['open'](mapObject, this);
        mapObject['setCenter'](new google.maps.LatLng(address[shortWord[39]], address[shortWord[40]]));
      });
    });
  }
}
