const CONFIRMED = 'Confirmed';
const CANCEL = 'Cancel';

function callAjax(slug, appointmentId, status, ele, value) { 
  $.ajax({
    url: '/admin/' + slug + '/appointments/' + appointmentId,
    type: 'PATCH',
    cache: false,
    data: {status: status},
  })
  .done(function (res) {

    // Remove 2 button and hide appointment is changed status
    ele.closest("tr").addClass("delete");
    if (value == '.accept') {
      ele.prev().css("background-color", '#007bff').val(CONFIRMED).next().next().remove();
    } else {
      ele.prev().prev().css("background-color", '#dc3545').val(CANCEL).next().remove();
    }
    ele.remove();
    $(".delete").fadeOut(3000);
  });
};

$(document).ready(function() {
  $('.status-pending').each(function() {
    $(this).css("background-color", '#ffc107');
  });
  var slug = $("#slug").val();
  $.each({1: ".accept", 3: ".cancel"}, function (index, value) {
    $(value).click(function(e) {
      var ele = $(this);
      var appointmentId = ele.attr('id').substring(7);
      var status = index;
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
        }
      });
      e.preventDefault();
      if (value == '.cancel') {
        $.confirm({
          title: 'Appointments!',
          theme: 'dark',
          content: 'Do you want cancel this appointment!',
          buttons: {
            confirm: function () {
              callAjax(slug, appointmentId, status, ele, value);
            },
            cancel: function () {},
          }
        });
        }
      else callAjax(slug, appointmentId, status, ele, value);
    });
  })
});
