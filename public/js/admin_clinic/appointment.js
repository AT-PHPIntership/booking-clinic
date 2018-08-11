$(document).ready(function() {

  $(".status-select").change(function(e) {
    e.preventDefault();
    var ele = $(this);
    var appointmentId = ele.attr('id').substring(12);
    var slug = $("#slug").val();
    var status = '3';

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
      }
    });
    $.confirm({
      title: 'Appointments!',
      theme: 'dark',
      content: 'Do you want cancel this appointment!',
      buttons: {
        confirm: {
          btnClass: 'btn-blue',
          action: function() {
          ele.after('<i class="fa fa-spinner fa-pulse fa-2x fa-fw margin-bottom"></i>')
          var doneStatus = function() {

            // delete sync icon and show success message in 2 seconds, remove option Confirmed when chose option Cancel
            ele.next().remove();
            ele.after('<div class="pr-5 pl-5 d-inline alert alert-success status-flash">The status is updated</div>');
            ele.next().slideUp(2000);
            setTimeout(function() {
            ele.next().remove();
            }, 2000);
            ele.children("option:nth-child(1)").remove();
          };
          updateAppointmentStatus(slug, appointmentId, status, doneStatus)   ;
          },
        },
        cancel: function() {

          // set right color and value for option Confirmed when cancel select
          ele.css("background-color", "#007bff");
          ele.val("1");
        },
      }
    });
  });
});
