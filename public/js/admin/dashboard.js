const STATUS_COLOR = ['#ffc107', '#007bff', '#28a745', '#dc3545'];
const COMPLETED = 'Completed'
const CONFIRMED = 'Confirmed';
const CANCEL = 'Cancel';

function updateAppointmentStatus(slug, appointmentId, status, callback) {
  $.ajax({
    url: '/admin/' + slug + '/appointments/' + appointmentId,
    type: 'PATCH',
    cache: false,
    data: {status: status},
  })
  .done(function (res) {
    callback();
  });
}

function createExamination(slug, data, callback) {
  $.ajax({
    url: '/admin/' + slug + '/examinations',
    type: 'POST',
    cache: false,
    data: data,
  })
  .done(function (res) {
    callback(res);
  });
}


$(".status-select").click(function() {
$(this).css("background-color", STATUS_COLOR[$(this).val()]);
});

$(document).ready(function() {
  $("#flash").delay(3000).slideUp();
  $(".status-select").each(function() {
    $(this).css("background-color", STATUS_COLOR[$(this).val()]);
  });
});
