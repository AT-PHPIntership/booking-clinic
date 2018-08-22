function changePassword(currentPassword, newPassword, newPasswordConfirm) {
  const token = getToken();
  $.ajax({
    headers: {
      Accept: 'application/json',
      Authorization: 'Bearer ' + token
    },
    url: route('api.password'),
    type: 'PUT',
    data: {
      current_password: currentPassword,
      new_password: newPassword,
      new_password_confirmation: newPasswordConfirm
    },
    beforeSend: clearError
  })
  .done(changePasswordSuccess)
  .fail(showError)
}

function changePasswordSuccess(response) {
  $('#js-alert-block').removeClass('d-none').append(response.result);
}

function showError(response) {
    const data = response.responseJSON;
    $.each(data.errors, function(field, error) {
      $('input[name=' + field + ']').addClass('is-invalid');
      $('input[name=' + field + '] + .invalid-feedback strong').html(error);
    });
}

function clearError() {
  $('.invalid-feedback strong').html('');
  $('.is-invalid').removeClass('is-invalid');
  $('#js-alert-block').addClass('d-none').html('');
}

$(document).ready(function() {
  $('#btn-submit').click(function(e) {
    e.preventDefault();
    let currentPassword = $('input[name=current_password]').val();
    let newPassword = $('input[name=new_password]').val();
    let newPasswordConfirm = $('input[name=new_password_confirmation]').val();
    changePassword(currentPassword, newPassword, newPasswordConfirm);
  });
});
