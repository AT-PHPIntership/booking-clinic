function showProfile() {
  const user = getUser()
  $('input[name=name]').val(user.name);
  $('input[name=email]').val(user.email);
  $('input[name=dob]').val(user.dob);
  $('input[name=address]').val(user.address);
  $('input[name=phone]').val(user.phone);
  $('input[name=gender][value=' + user.gender + ']').prop('checked', true);
}

$(document).ready(function() {
  showProfile();
});
