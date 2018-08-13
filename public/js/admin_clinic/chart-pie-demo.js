// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
$(document).ready(function() {
  var ctx = $("#myPieChart");
  var count = $("#count");
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["Pending", "Confirmed", "Completed", "Cancel"],
      datasets: [{
        data: [count.data("pending"), count.data("confirmed"), count.data("completed"), count.data("cancel")],
        backgroundColor: ['#ffc107', '#007bff', '#28a745', '#dc3545'],
      }],
    },
  });
});
