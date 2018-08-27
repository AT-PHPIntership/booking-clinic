
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
  let queryOption = Lang.messages[Lang.getLocale() + '.pagination'].default_query;

  $.each(queryOption, function (key, value) {
    let suffixeId = $(`select[name=${key}]`).attr('sb');

    $(`#sbOptions_${suffixeId} li a`).click(function (e) {
      e.preventDefault();
      let currentOption = $(this).attr('href').substring(1);    // Remove '?' character

      queryOption[key] = $(`select[sb=${suffixeId}] option[value=${currentOption}]`).data("href");  // Get data-href when chose option filter
      history.pushState({}, '', window.location.pathname + queryOption.order_by + '&' + queryOption.perpage.substring(1)); //Set queryOption to URL before call Ajax
      removeOldPage();
      getAppointments();
    });
  })
}
$(document).ready(function () {
  getAppointments();
  clickPaginate();
  filter();
});
