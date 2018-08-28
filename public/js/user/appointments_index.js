
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
    currentAppointment.attr('id', `appointment-${appointment.id}`);
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
function cancelAppointment(id) {
    const token = getToken();
    $.ajax({
        headers: {
            Accept: 'application/json',
            Authorization: 'Bearer '  + token
        },
        url: route('api.appointments.cancel', id),
        type: 'PUT'
    })
    .done(cancelAppointmentSuccess)
    .fail(function(res) {
        $.alert({
            title: 'Alert!',
            theme: 'material',
            content: res.responseJSON.error,
        });
    });
}

function cancelAppointmentSuccess(res) {
    let currentId = res.result.id;
    let currentStatus = res.result.status;
    $(`#appointment-${currentId} .cancel-button`).addClass('invisible');
    $(`#appointment-${currentId} .status`)
      .addClass(`btn-${STATUS_COLOR[$.inArray(currentStatus, STATUS_LABELS)]}`)
      .text(currentStatus);
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

  // Cancel pending or confirmed appointment.
  $(document).on('click', '.cancel-button', function (e) {
    e.preventDefault();
    let appointmentId = $(this).closest('.appointment').attr('id');

    appointmentId = appointmentId.split('-')[1];
    $.confirm({
      title: 'Appointments!',
      theme: 'material',
      content: Lang.get('user/appointment.cancel.confirm'),
      autoClose: 'cancel|10000',
      buttons: {
        confirm: {
          btnClass: 'btn-blue',
          action: function () {
            cancelAppointment(appointmentId);
          }
        },
        cancel: {
          btnClass: 'btn-red',
          action: function () { },
        }
      }
    });
  });
});
