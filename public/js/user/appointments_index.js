
function getAppointments() {

  const token = getToken();
  $.ajax({
    headers: {
      Accept: 'application/json',
      Authorization: 'Bearer ' + token
    },
    url: route('api.appointments.index') + getQueryString(),
    type: 'GET'
  })
    .done(getAppointmentsSuccess);
}

function getAppointmentsSuccess(res) {
  updateNumberResult(res.result.paginator);
  showPaginates(res.result.paginator);
  showAppointments(res.result.data);
}

function showAppointments(appointments) {
  $.each(appointments, function (index, appointment) {
    $('.appointment:first-child').clone().appendTo('#appointments');
    currentAppointment = $('.appointment:last-child');
    currentAppointment.find('.clinic-name').text(appointment.clinic.name);

    let currentStatus = appointment.status;
    if (currentStatus == STATUS_LABELS_LANG.pending || currentStatus == STATUS_LABELS_LANG.confirmed) {
      currentAppointment.find('.cancel-button').toggleClass('invisible');
    }

    currentAppointment.find('.status').text(currentStatus)
      .addClass(`btn-${STATUS_COLOR[$.inArray(currentStatus, STATUS_LABELS)]}`);
    currentAppointment.find('.description').text(appointment.description);

    let dateTime = getDateTime(appointment.book_time);
    currentAppointment.find('.book-date strong').text(dateTime.day);
    currentAppointment.find('.book-time strong').text(dateTime.time);
    currentAppointment.toggleClass('d-none');
  })
}

/**
 * Remove old paginate before call Ajax
 */
function removeOldPage() {
  let currentPageElement = $('.appointment:first-child').clone();
  $('.appointment').remove();
  currentPageElement.appendTo('#appointments');
}

/**
 * Action when select filter
 */
function filter() {
  let queryOption = {
      order_by: '?sort_by=created_at&order=DESC',
      perpage: '&perpage=5',
  };

  $.each(queryOption, function (key, value) {
    let suffixId = $(`select[name=${key}]`).attr('sb');

    $(`#sbOptions_${suffixId} li a`).click(function (e) {
      e.preventDefault();
      queryOption[key] = $(this).attr('rel');  // Get query when chose option filter
      history.pushState({}, '', window.location.pathname + queryOption.order_by + '&' + queryOption.perpage); //Set queryOption to URL before call Ajax
      removeOldPage();
      getAppointments();
    });
  })
}

$(document).ready(function () {
  getAppointments();

  // Redirect page using ajax
  $(document).on('click', '.page-link', function (e) {
    e.preventDefault();
    let nextPageHref = $(this).attr("href");
    let nextPageQuery = nextPageHref.substring(nextPageHref.indexOf('?'));

    removeOldPage();
    history.pushState({}, '', window.location.pathname + nextPageQuery); //Set query to URL before call Ajax
    getAppointments();
  });

  filter();
});
