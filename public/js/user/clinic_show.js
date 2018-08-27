function getClinicDetail() {
  $.ajax({
    url: route('api.clinics.show', getClinicIdFromUrl()),
    type: 'GET',
  })
  .done(function (response) {
    showClinicDetail(response.result);
  })
  .fail(function(response) {
    window.location.replace(route('user.error'));
  })
}

function showClinicDetail(data) {
  console.log(data.images.length);
  $('#clinic-name').html(data.name);
  $('#clinic-type-name').html(data.clinic_type.name);
  $('#clinic-address').html(data.address);
  $('#clinic-email').html(data.email);
  $('#clinic-phone').html(data.phone);
  $('#clinic-description').html(data.description);
  $('#clinic-location').attr('href', `https://www.google.com/maps/dir//${data.lat},${data.lng}`);

  avatarPath = '';
  if (typeof data.images[0] !== 'undefined') {
    avatarPath = data.images[0].path;
  }
  else {
    avatarPath = `/images/clinic-${Math.floor(Math.random() * 5) + 1}.png`;
  }

  $('#clinic-avatar').attr('src', avatarPath);

  if(data.images.length > 0 ){
    renderImagePreview(data.images);
  }

}

function renderImagePreview(images){
  carousel = $('#carousel');
  firstIndicator = carousel.find('.carousel-indicators li:first-child');
  firstDivImage = carousel.find('.carousel-item:first-child');
  for (var i = 0; i < images.length; i++) {
    if (i != 0) {
      firstIndicator.clone().appendTo(firstIndicator.parent());
      firstDivImage.clone().appendTo(firstDivImage.parent());
    }
    lastestIndicator = firstIndicator.parent().find('li:last-child');
    lastestIndicator.attr('data-slide-to', i);
    lastestImageElement = firstDivImage.parent().find('div:last-child img');
    lastestImageElement.attr('src', images[i].path);
  }

  firstIndicator.toggleClass('active');
  firstDivImage.toggleClass('active');
  carousel.toggleClass('d-none');
}

function getClinicIdFromUrl(){
  var url = window.location.pathname;
  var id = url.substring(url.lastIndexOf('/') + 1);
  return id;
}

function successUserLocation(position) {
  var lat = position.coords.latitude;
  var long = position.coords.longitude;
  console.log('Your latitude is :'+lat+' and longitude is '+long);
}


function successFunction(position) {
  var lat = position.coords.latitude;
  var long = position.coords.longitude;
  console.log('Your latitude is :'+lat+' and longitude is '+long);
}

$(document).ready(function() {
  getClinicDetail();
});