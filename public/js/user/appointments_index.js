
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
  showPaginates(res.result.paginator);
  showAppointments(res.result.data);
}

function showAppointments(appointments) {
  $.each(appointments, function (index, appointment) {
    $('.appointment:first-child').clone().appendTo('#appointments');
    currentAppointment = $('.appointment:last-child');
    currentAppointment.find('.clinic-name').text(appointment.clinic.name);

    let currentStatus = appointment.status;
    if (currentStatus == STATUS_LABELS[STATUS_CONFIRMED] || currentStatus == STATUS_LABELS[STATUS_PENDING]) {
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
function removeOldPage(nextLinkPage) {
  let nextPageHref = nextLinkPage.attr("href");
  let nextPageQuery = nextPageHref.substring(nextPageHref.indexOf('?'));
  history.pushState({}, '', window.location.pathname + nextPageQuery); //Set query to URL before call Ajax
  let currentPageElement = $('.appointment:first-child').clone();
  $('.appointment').remove();
  currentPageElement.appendTo('#appointments');
}

$(document).ready(function () {
  getAppointments();

  // Redirect page using ajax
  $(document).on('click', '.page-link', function (e) {
    e.preventDefault();
    removeOldPage($(this));
    getAppointments();
  });
});
