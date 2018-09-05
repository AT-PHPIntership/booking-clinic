const maxHeight = 25;
$(document).ready(function() {
  $('.status-pending').each(function() {
    $(this).css("background-color", STATUS_COLOR[STATUS_PENDING]);
  });
  $('p').each(function() {
    if (+$(this).css('height').split('px')[0] > maxHeight) {
      $(this).addClass('view-more');
      $(this).next().toggleClass('d-none');
    }
  });

  var slug = $("#slug").val();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
    }
  });

  // handle accept button
  $(".accept").click(function(e) {
    e.preventDefault();
    let ele = $(this);
    let appointmentId = ele.attr('id').substring(7);
    let status = STATUS_CONFIRMED;
    updateAppointmentStatus(slug, appointmentId, status, updateAppointmentStatusWithAccept, ele);
  });

  // handle cancel button
  $(".cancel").click(function(e) {
    e.preventDefault();
    let ele = $(this);
    let appointmentId = ele.attr('id').substring(7);
    let status = STATUS_CANCEL;
    $.confirm({
      title: Lang.get('admin_clinic/appointment.index.title'),
      theme: 'dark',
      content: Lang.get('admin_clinic/appointment.cancel'),
      buttons: {
        confirm: {
          btnClass: 'btn-blue',
          action: function() {
          updateAppointmentStatus(slug, appointmentId, status, updateAppointmentStatusWithCancel, ele);
          }
        },
        cancel: function() {},
      }
    });
  });
});
$(document).on('click', '.show-more', function(e) {
  e.preventDefault();
  $(this).prev().toggleClass('view-more');
});
