function showButtonBooking() {
  const user = getUser();
  if (user) {
    $('#btn-booking').removeClass('d-none');
  } else {
    $('#login-message').removeClass('d-none');
  }
}

$(document).ready(function() {
  showButtonBooking();

  $('#btn-booking').click(function(e) {
    e.preventDefault();
    let url = window.location.href;
    let clinic_id = url.substring(url.lastIndexOf('/') + 1);
    let date = $('#calendar').datepicker('getUTCDates')[0];
    let time = $('input[name=radio_time]:checked').val();
    let phone = $('#clinic-phone').html();
    let name = $('#clinic-name').html();

    if (date && time) {
      let appointment = {
        date: date.toISOString().slice(0,10),
        time: time,
        clinic_id: clinic_id,
        name: name,
        phone: phone
      }
      window.localStorage.setItem('appointment', JSON.stringify(appointment));
      window.location.href = route('user.booking');
    } else {
      alert(Lang.get('user/booking.select_datetime'));
    }
  });
});
