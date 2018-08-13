$(document).ready(function() {
  $('.status-pending').each(function() {
    $(this).css("background-color", '#ffc107');
  });

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
    var status = '1';
    e.preventDefault();
    var doneStatus = function() {

      // Remove 2 button and hide appointment is changed status
      ele.closest("tr").addClass("delete");
      ele.prev().css("background-color", '#007bff').val(CONFIRMED).next().next().remove();
      ele.remove();
      $(".delete").fadeOut(3000);
    };
    updateAppointmentStatus(slug, appointmentId, status, doneStatus);
  });

  // handle cancel button
  $(".cancel").click(function(e) {
    var ele = $(this);
    var appointmentId = ele.attr('id').substring(7);
    var status = '3';
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
      ele.prev().prev().css("background-color", '#dc3545').val(CANCEL).next().remove();
      ele.remove();
      $(".delete").fadeOut(3000);
    };
  });
});
