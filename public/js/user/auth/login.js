function login(email, password) {
  $.ajax({
    headers: {
      'Accept': 'application/json'
    },
    url: '/api/login',
    type: 'POST',
    data: {
      email: email,
      password: password
    },
    beforeSend: function() {
      $('.invalid-feedback').remove();
      $('.is-invalid').removeClass('is-invalid');
      $('#js-error-login').addClass('d-none').html('');
  },
  })
  .done(loginSuccess)
  .fail(showError);
}

function loginSuccess(response) {
  window.localStorage.setItem('access_token', response.result.access_token);
  window.location.replace('/');
}

function showError(response) {
  let status = response.status;
  switch (status) {
    case 401:
      $('#js-error-login').removeClass('d-none').html(response.responseJSON.error);
      break;
    case 422:
      let data = response.responseJSON;
      $.each(data.errors, function(key, error) {
        let currentInput = $('#input-' + key);
        currentInput.addClass('is-invalid');
        currentInput.after (
          `<div class="invalid-feedback" role="alert">
            <strong>${error}</strong>
          </div>`);
      });
      break;
    default:
      alert('Unknown error! status code ' + status);
  }
}

$(document).ready(function() {
  $('#btn-submit').click(function(e) {
    e.preventDefault();
    let email = $('#input-email').val();
    let password = $('#input-password').val();
    login(email, password);
  });
});
