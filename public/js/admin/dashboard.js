var COLOR_STATUS = ['#ffc107', '#007bff', '#28a745', '#dc3545'];
const CONFIRMED = 'Confirmed';
const CANCEL = 'Cancel';

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
};

$(".status-select").click(function() {
$(this).css("background-color", COLOR_STATUS[$(this).val()]);
});

$(document).ready(function() {
  $("#flash").delay(3000).slideUp();
  $(".status-select").each(function() {
    $(this).css("background-color", COLOR_STATUS[$(this).val()]);
  });
});
