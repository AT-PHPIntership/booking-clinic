$(document).ready(function() {
  let user = getUser();

  $('#user-name').html(user.name);
  $('#user-email').html(user.email);

  setTimeout(function() {
    window.location.replace(route('user.home'));
  }, 5000);
});
