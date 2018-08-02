var statusColor = ['#ffc107', '#007bff', '#28a745', '#dc3545'];
$(document).ready(function () {
  $("#flash").delay(3000).slideUp();
  $(".status").each(function() {
  $(this).css("background-color",statusColor[$(this).val()]);
  });
  $(".status").click(function() {
    $(this).css("background-color",statusColor[$(this).val()]);
  });
});
