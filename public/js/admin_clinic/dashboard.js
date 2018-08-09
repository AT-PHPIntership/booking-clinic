const CONFIRMED = 'Confirmed';
const CANCEL = 'Cancel';

function updateStatus(slug, appointmentId, status, callback) {
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

$(document).ready(function() {
  $('.status-pending').each(function() {
    $(this).css("background-color", '#ffc107');
  });
  var slug = $("#slug").val();

    $(".accept").click(function(e) {
      var ele = $(this);
      var appointmentId = ele.attr('id').substring(7);
      var status = '1';
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
        }
      });
      e.preventDefault();
      var doneStatus = function() {

        // Remove 2 button and hide appointment is changed status
        ele.closest("tr").addClass("delete");
        // if (value == '.accept') {
          ele.prev().css("background-color", '#007bff').val(CONFIRMED).next().next().remove();
        // } else {
        //   ele.prev().prev().css("background-color", '#dc3545').val(CANCEL).next().remove();
        // }
        ele.remove();
        $(".delete").fadeOut(3000);
      };
      // if (value == '.cancel') {
      //   $.confirm({
      //     title: 'Appointments!',
      //     theme: 'dark',
      //     content: 'Do you want cancel this appointment!',
      //     buttons: {
      //       confirm: function () {
      //         updateStatus(slug, appointmentId, status, doneStatus);
      //       },
      //       cancel: function () {},
      //     }
      //   });
      //   }
      // else
      updateStatus(slug, appointmentId, status, doneStatus);
    });

    $(".cancel").click(function(e) {
      var ele = $(this);
      var appointmentId = ele.attr('id').substring(7);
      var status = '0';
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
          confirm: function () {
            updateStatus(slug, appointmentId, status, doneStatus);
          },
          cancel: function () {},
        }
      });
      e.preventDefault();
      var doneStatus = function() {
        // Remove 2 button and hide appointment is changed status
        ele.closest("tr").addClass("delete");
        ele.prev().prev().css("background-color", '#dc3545').val(CANCEL).next().remove();
        ele.remove();
        $(".delete").fadeOut(3000);
        debugger;

      };
    });

});
