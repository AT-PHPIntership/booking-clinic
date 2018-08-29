const STATUS_COLOR = ['#ffc107', '#007bff', '#28a745', '#dc3545'];
const STATUS_LABELS = Lang.messages[Lang.getLocale() + '.admin.appointment'].status;
const STATUS_PENDING = 0;
const STATUS_CONFIRMED = 1;
const STATUS_COMPLETED = 2
const STATUS_CANCEL = 3;

// admin clinic update appointment status
function updateAppointmentStatus(slug, appointmentId, status, callback, currentElement=[]) {
  $.ajax({
    url: route('admin_clinic.appointments.update', [slug, appointmentId]),
    type: 'PATCH',
    cache: false,
    data: {status: status},
  })
  .done(function(res) {
    callback(res, currentElement);
  });
}

function updateAppointmentStatusWithAccept(res, currentElement) {
  // Remove 2 button and hide appointment is changed status
  currentElement.closest("tr").addClass("delete");
  $(".delete input[name=status]").css("background-color", STATUS_COLOR[STATUS_CONFIRMED]).val(STATUS_LABELS.confirmed);
  $(".delete button").remove();
  $(".delete").fadeOut(3000);
};

function updateAppointmentStatusWithCancel(res, currentElement) {
  // Remove 2 button and hide appointment is changed status
  currentElement.closest("tr").addClass("delete");
  $(".delete input[name=status]").css("background-color", STATUS_COLOR[STATUS_CANCEL]).val(STATUS_LABELS.cancel);
  $(".delete button").remove();
  $(".delete").fadeOut(3000);
};

function createExamination(slug, data) {
  $.ajax({
    url: route('admin_clinic.examinations.store', slug),
    type: 'POST',
    cache: false,
    data: data,
  })
  .done(createExaminationSuccess);
}

function createExaminationSuccess(res) {
  let currentSelect = $('.status-select');
  let currentEle = $("#create-examination");

  currentSelect.css("background-color", STATUS_COLOR[STATUS_COMPLETED]);
  currentSelect.children().remove();
  currentSelect.append(`<option value="${STATUS_COMPLETED}" selected>${STATUS_LABELS.completed}</option>`)
  currentEle.after(showExamination(res));
  currentEle.remove();
  };

$(".status-select").click(function() {
  $(this).css("background-color", STATUS_COLOR[$(this).val()]);
});

$(document).ready(function() {
  $("#flash").delay(3000).slideUp();
  $(".status-select").each(function() {
    $(this).css("background-color", STATUS_COLOR[$(this).val()]);
  });
});
