$(document).ready(function() {
  $('.status-pending').each(function() {
    $(this).css("background-color", STATUS_COLOR[STATUS_PENDING]);
  });
  $('[data-toggle="tooltip"]').tooltip();

  var slug = $("#slug").val();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
    }
  });

  // handle accept button
  $(".accept").click(function(e) {
    var ele = $(this);
    var appointmentId = ele.attr('id').substring(7);
    var status = STATUS_CONFIRMED;
    e.preventDefault();
    var doneStatus = function() {

      // Remove 2 button and hide appointment is changed status
      ele.closest("tr").addClass("delete");
      ele.prev().css("background-color", STATUS_COLOR[STATUS_CONFIRMED]).val(STATUS_LABELS.STATUS_CONFIRMED).next().next().remove();
      ele.remove();
      $(".delete").fadeOut(3000);
    };
    updateAppointmentStatus(slug, appointmentId, status, doneStatus);
  });

  // handle cancel button
  $(".cancel").click(function(e) {
    var ele = $(this);
    var appointmentId = ele.attr('id').substring(7);
    var status = STATUS_CANCEL;
    $.confirm({
      title: 'Appointments!',
      theme: 'dark',
      content: 'Do you want cancel this appointment!',
      buttons: {
        confirm: {
          btnClass: 'btn-blue',
          action: function() {
          updateAppointmentStatus(slug, appointmentId, status, doneStatus);
          }
        },
        cancel: function() {},
      }
    });
    e.preventDefault();
    var doneStatus = function() {

      // Remove 2 button and hide appointment is changed status
      ele.closest("tr").addClass("delete");
      ele.prev().prev().css("background-color", STATUS_COLOR[STATUS_CANCEL])
        .val(STATUS_LABELS.STATUS_CANCEL).next().remove();
      ele.remove();
      $(".delete").fadeOut(3000);
    };
  });
});
