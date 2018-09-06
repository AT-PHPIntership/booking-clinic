function booking(clinicId, bookTime, description) {
  const token = getToken();
  $.ajax({
    headers: {
      Accept: 'application/json',
      Authorization: 'Bearer ' + token
    },
    url: route('api.appointments.store'),
    type: 'POST',
    data: {
      clinic_id: clinicId,
      book_time: bookTime,
      description: description
    }
  })
  .done(bookingSuccess)
  .fail(bookingFail);
}

function bookingSuccess(response) {
  window.localStorage.removeItem('appointment');
  window.location.replace(route('user.booking_success'));
}

function bookingFail(response) {
  let message = '';
  let data = response.responseJSON;

  $.each(data.errors, function(field, error) {
    message += field + ': ' + error + '\n';
  });
  message += Lang.get('user/booking.booking_fail_message');

  alert(message);

  setTimeout(function() {
    let id = getAppointment().clinic_id;
    window.location.replace(route('user.clinics.show', id));
  }, 1000);
}

function showBookingInfo() {
  let user = getUser();
  let appointment = getAppointment();

  $('input[name=name]').val(user.name);
  $('input[name=email]').val(user.email);
  $('input[name=dob]').val(user.dob);
  $('input[name=phone]').val(user.phone);
  $('input[name=address]').val(user.address);
  $('#booking-date').html(appointment.date);
  $('#booking-time').html(appointment.time);
  $('#booking-name').html(appointment.name);
  $('#booking-phone').html(appointment.phone);
}

$(document).ready(function() {
  if (!getAppointment()) {
    window.location.replace(route('user.home'));
    return;
  }

  showBookingInfo();

  $('#btn-confirm').click(function(e) {
    e.preventDefault();
    if (confirm(Lang.get('user/booking.confirm_message'))) {
      let description = $('#description').val();
      if (!description) {
        alert('Please fill description!');
        return;
      }
      let appointment = getAppointment();
      let clinicId = appointment.clinic_id;
      let bookTime = appointment.date + ' ' + appointment.time + ':00'; // format yyyy-mm-dd hh:mm:ss
      booking(clinicId, bookTime, description);
    }
  });
});
