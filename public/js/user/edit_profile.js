function updateProfile(name, email, dob, gender, phone, address) {
  const token = getToken();
  $.ajax({
    headers: {
      Accept: 'application/json',
      Authorization: 'Bearer ' + token
    },
    url: route('api.update_profile'),
    type: 'PUT',
    data: {
      name: name,
      email: email,
      dob: dob,
      gender: gender,
      phone: phone,
      address: address
    },
    beforeSend: clearError
  })
  .done(updateProfileSuccess)
  .fail(showError)
}

function updateProfileSuccess(response) {
  $('#js-alert-block').removeClass('d-none');
}

function showError(response) {
  const data = response.responseJSON;
  $.each(data.errors, function(field, error) {
    $('input[name=' + field + ']').addClass('is-invalid');
    $('input[name=' + field + '] + .invalid-feedback').html(error);
  });
}

function clearError() {
  $('.invalid-feedback strong').html('');
  $('.is-invalid').removeClass('is-invalid');
  $('#js-alert-block').addClass('d-none');
}

$(document).ready(function() {
  $('#btn-submit').click(function(e) {
    e.preventDefault();
    let name = $('input[name=name]').val();
    let email = $('input[name=email]').val();
    let dob = $('input[name=dob]').val();
    let gender = $('input[name=gender]:checked').val();
    let phone = $('input[name=phone]').val();
    let address = $('input[name=address]').val();
    updateProfile(name, email, dob, gender, phone, address)
  });
});
