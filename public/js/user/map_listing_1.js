// 'use strict';
/** @type {!Array} */
var _0xbaa2 = ["prototype", "forEach", "length", "call", "Dr. Jhoanna Steel", "img/doctor_listing_1.jpg", "Psicologist - Pediatrician", "detail-page.html", "35 Newtownards Road, Belfast, BT4.", "", "+3934245255", "Dr. Robert Carl", "Psicologist", "Dr. Mark Twain", "Primary Care", "maps", "ROADMAP", "MapTypeId", "DROPDOWN_MENU", "MapTypeControlStyle", "LEFT_CENTER", "ControlPosition", "TOP_RIGHT", "LARGE", "ZoomControlStyle", "RIGHT_BOTTOM", "landscape", "#FFBB00", "road.highway", "#FFC200", "road.arterial",
"#FF0300", "road.local", "water", "#0078FF", "poi", "#00FF6A", "map_listing", "getElementById", "location_latitude", "location_longitude", "/images/user/pin/", ".png", "undefined", "push", "click", "open", "setCenter", "addListener", "event", "setMap", "Animation", "setAnimation", "remove", "div.infoBox", '<div class="marker_info">', "<figure><a href=", "url_detail", '><img src="', "map_image_url", '" alt="Image"></a></figure>', "<small>", "type", "</small>", "<h3><a href=", ">", "name_point", "</a></h3>",
"<span>", "description_point", "</span>", '<div class="marker_tools">', '<form action="http://maps.google.com/maps" method="get" target="_blank" style="display:inline-block""><input name="saddr" value="', "get_directions_start_address", '" type="hidden"><input type="hidden" name="daddr" value="', ",", '"><button type="submit" value="Get directions" class="btn_infobox_get_directions">Directions</button></form>', '<a href="tel://', "phone", '" class="btn_infobox_phone">', "</a>", "</div>", "img/close_infobox.png",
"floatPane", "trigger"];

initContruct();
var mapObject;
/** @type {!Array} */
var markers = [];

var markersData = {
  "Doctors" : []
};
initMarkersData(clinicsData);

var mapOptions;
initMapOptions();

var marker;
mapObject = new google[_0xbaa2[15]].Map(document[_0xbaa2[38]](_0xbaa2[37]), mapOptions);
var key;
initMarker();
/**
 * @return {undefined}
 */
function hideAllMarkers() {
  var i;
  for (i in markers) {
    markers[i][_0xbaa2[1]](function(canCreateDiscussions) {
      canCreateDiscussions[_0xbaa2[50]](null);
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
  if (_0xbaa2[43] === typeof markers[gutterID]) {
    return false;
  }
  markers[gutterID][_0xbaa2[1]](function(canCreateDiscussions) {
    canCreateDiscussions[_0xbaa2[50]](mapObject);
    canCreateDiscussions[_0xbaa2[52]](google[_0xbaa2[15]][_0xbaa2[51]].DROP);
  });
}
/**
 * @return {undefined}
 */
function closeInfoBox() {
  $(_0xbaa2[54])[_0xbaa2[53]]();
}
/**
 * @param {?} text
 * @return {?}
 */
function getInfoBox(text) {
  return new InfoBox({
    content : _0xbaa2[55] + _0xbaa2[56] + text[_0xbaa2[57]] + _0xbaa2[58] + text[_0xbaa2[59]] + _0xbaa2[60] + _0xbaa2[61] + text[_0xbaa2[62]] + _0xbaa2[63] + _0xbaa2[64] + text[_0xbaa2[57]] + _0xbaa2[65] + text[_0xbaa2[66]] + _0xbaa2[67] + _0xbaa2[68] + text[_0xbaa2[69]] + _0xbaa2[70] + _0xbaa2[71] + _0xbaa2[72] + text[_0xbaa2[73]] + _0xbaa2[74] + text[_0xbaa2[39]] + _0xbaa2[75] + text[_0xbaa2[40]] + _0xbaa2[76] + _0xbaa2[77] + text[_0xbaa2[78]] + _0xbaa2[79] + text[_0xbaa2[78]] + _0xbaa2[80] + _0xbaa2[81] +
    _0xbaa2[81],
    disableAutoPan : false,
    maxWidth : 0,
    pixelOffset : new google[_0xbaa2[15]].Size(10, 105),
    closeBoxMargin : _0xbaa2[9],
    closeBoxURL : '/images/user/close_infobox.png',
    isHidden : false,
    alignBottom : true,
    pane : _0xbaa2[83],
    enableEventPropagation : true
  });
}
/**
 * @param {?} type
 * @param {?} i
 * @return {undefined}
 */
function onHtmlClick(type, i) {
  google[_0xbaa2[15]][_0xbaa2[49]][_0xbaa2[84]](markers[type][i], _0xbaa2[45]);
}
;

function initContruct() {
  (function(canCreateDiscussions) {
    if (!Array[_0xbaa2[0]][_0xbaa2[1]]) {
      canCreateDiscussions[_0xbaa2[1]] = canCreateDiscussions[_0xbaa2[1]] || function(DeviceMatchers, agentService) {
        /** @type {number} */
        var undoStackPos = 0;
        var undoStackLength = this[_0xbaa2[2]];
        for (; undoStackPos < undoStackLength; undoStackPos++) {
          if (undoStackPos in this) {
            DeviceMatchers[_0xbaa2[3]](agentService, this[undoStackPos], undoStackPos, this);
          }
        }
      };
    }
  })(Array[_0xbaa2[0]]);
}

function initMarkersData(data) {
  markersData['Doctors'] = [];
  data.forEach(clinic => {
    clinicObj = {
      name : clinic.name,
      location_latitude : +clinic.lat,
      location_longitude : +clinic.lng,
      map_image_url : getAvatarClinic(clinic),
      type : clinic.clinic_type.name,
      url_detail : route('user.clinics.show', clinic.id),
      name_point : clinic.name,
      description_point : clinic.address,
      get_directions_start_address : _0xbaa2[9],
      phone : clinic.phone
    }
    markersData['Doctors'].push(clinicObj);
  });
}

function initMapOptions() {
  mapOptions = {
    zoom : 10,
    center : new google[_0xbaa2[15]].LatLng(48.865633, 2.321236),
    mapTypeId : google[_0xbaa2[15]][_0xbaa2[17]][_0xbaa2[16]],
    mapTypeControl : false,
    mapTypeControlOptions : {
      style : google[_0xbaa2[15]][_0xbaa2[19]][_0xbaa2[18]],
      position : google[_0xbaa2[15]][_0xbaa2[21]][_0xbaa2[20]]
    },
    panControl : false,
    panControlOptions : {
      position : google[_0xbaa2[15]][_0xbaa2[21]][_0xbaa2[22]]
    },
    zoomControl : true,
    zoomControlOptions : {
      style : google[_0xbaa2[15]][_0xbaa2[24]][_0xbaa2[23]],
      position : google[_0xbaa2[15]][_0xbaa2[21]][_0xbaa2[25]]
    },
    scrollwheel : false,
    scaleControl : false,
    scaleControlOptions : {
      position : google[_0xbaa2[15]][_0xbaa2[21]][_0xbaa2[20]]
    },
    streetViewControl : true,
    streetViewControlOptions : {
      position : google[_0xbaa2[15]][_0xbaa2[21]][_0xbaa2[25]]
    },
    styles : [{
      "featureType" : _0xbaa2[26],
      "stylers" : [{
        "hue" : _0xbaa2[27]
      }, {
        "saturation" : 43.400000000000006
      }, {
        "lightness" : 37.599999999999994
      }, {
        "gamma" : 1
      }]
    }, {
      "featureType" : _0xbaa2[28],
      "stylers" : [{
        "hue" : _0xbaa2[29]
      }, {
        "saturation" : -61.8
      }, {
        "lightness" : 45.599999999999994
      }, {
        "gamma" : 1
      }]
    }, {
      "featureType" : _0xbaa2[30],
      "stylers" : [{
        "hue" : _0xbaa2[31]
      }, {
        "saturation" : -100
      }, {
        "lightness" : 51.19999999999999
      }, {
        "gamma" : 1
      }]
    }, {
      "featureType" : _0xbaa2[32],
      "stylers" : [{
        "hue" : _0xbaa2[31]
      }, {
        "saturation" : -100
      }, {
        "lightness" : 52
      }, {
        "gamma" : 1
      }]
    }, {
      "featureType" : _0xbaa2[33],
      "stylers" : [{
        "hue" : _0xbaa2[34]
      }, {
        "saturation" : -13.200000000000003
      }, {
        "lightness" : 2.4000000000000057
      }, {
        "gamma" : 1
      }]
    }, {
      "featureType" : _0xbaa2[35],
      "stylers" : [{
        "hue" : _0xbaa2[36]
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

function initMarker() {
  for (key in markersData) {
    markersData[key][_0xbaa2[1]](function(address) {
      marker = new google[_0xbaa2[15]].Marker({
        position : new google[_0xbaa2[15]].LatLng(address[_0xbaa2[39]], address[_0xbaa2[40]]),
        map : mapObject,
        icon : _0xbaa2[41] + key + _0xbaa2[42]
      });
      if (_0xbaa2[43] === typeof markers[key]) {
        /** @type {!Array} */
        markers[key] = [];
      }
      markers[key][_0xbaa2[44]](marker);
      google[_0xbaa2[15]][_0xbaa2[49]][_0xbaa2[48]](marker, _0xbaa2[45], function() {
        closeInfoBox();
        getInfoBox(address)[_0xbaa2[46]](mapObject, this);
        mapObject[_0xbaa2[47]](new google[_0xbaa2[15]].LatLng(address[_0xbaa2[39]], address[_0xbaa2[40]]));
      });
    });
  }
}