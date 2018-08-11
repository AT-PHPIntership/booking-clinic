const STATUS_COLOR = ['#ffc107', '#007bff', '#28a745', '#dc3545'];
const STATUS_LABELS = {
    STATUS_PENDING: 'Pending',
    STATUS_CONFIRMED: 'Confirmed',
    STATUS_COMPLETED: 'Completed',
    STATUS_CANCEL: 'Cancel'
}
const STATUS_PENDING = 0;
const STATUS_CONFIRMED = 1;
const STATUS_COMPLETED = 2
const STATUS_CANCEL = 3;

// admin clinic update appointment status
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

// admin clinic create examiantion for confirmed appointment
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
