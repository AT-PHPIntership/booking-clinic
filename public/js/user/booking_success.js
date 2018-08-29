$(document).ready(function() {
  let user = getUser();

  $('#user-name').html(user.name);
  $('#user-email').html(user.email);

  setTimeout(function() {
    window.location.replace(route('user.appointments.index'));
  }, 5000);
});
