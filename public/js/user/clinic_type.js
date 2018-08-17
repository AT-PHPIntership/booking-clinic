function getClinicTypes() {
  $.ajax({
    url: "/api/clinic-types",
    type: 'GET',
  })
  .done(function (response) {
    showClinicTypes(response.result);
  });
}

function showClinicTypes(data) {
  data.forEach(function(type) {
    let item = `<li><a href="/clinics?clinic_type_id=${type.id}">${type.name}</a></li>`
    $('#js-clinic-types').append(item);
  });
}

$(document).ready(function() {
  getClinicTypes();
});
