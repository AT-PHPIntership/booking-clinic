var statusColor = ['#ffc107', '#007bff', '#28a745', '#dc3545'];
$(document).ready(function() {

  $(".status-select").each(function() {
    $(this).css("background-color", statusColor[$(this).val()]);
  });

  $(".status-select").click(function() {
    $(this).css("background-color", statusColor[$(this).val()]);
  });

  $(".status-select").change(function(e) {
    var ele = $(this);
    var appointmentId = ele.attr('id').substring(12);
    var status = ele.val();
    var slug = $("#slug").val();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
      }
    });
    e.preventDefault();
    $.ajax({
      url: '/admin/' + slug + '/appointments/' + appointmentId,
      type: 'PATCH',
      cache: false,
      data: {status: status},
    })
    .done(function (res) {
      if ($(".status-flash").length) {
        $(".status-flash").remove();
      }
      ele.after('<div class="d-inline alert alert-success status-flash">Success</div>');
      ele.next().fadeOut('slow');
    })
    .fail(function (e) {
      alert(e.status)});
    });
});
