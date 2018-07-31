$(document).ready(function() {
  var indexOfEditColumn = $('table thead tr th').index($('table thead tr').find("th:contains('Edit')"));
  var indexOfDeleteColumn = $('table thead tr th').index($('table thead tr').find("th:contains('Delete')"));
  var indexOfDetailColumn = $('table thead tr th').index($('table thead tr').find("th:contains('Detail')"));
  $('#list-data').DataTable( {
    "paging": false,
    "columnDefs": [
      { "orderable": false, "targets": indexOfEditColumn },
      { "orderable": false, "targets": indexOfDeleteColumn },
      { "orderable": false, "targets": indexOfDetailColumn }
    ]
  });
});
