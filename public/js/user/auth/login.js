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
    }
  })
  .done(loginSuccess)
  .error(showError);
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
      let text = data.message;
      $.each(data.errors, function(index, error) {
        text += '\n' + error;
      });
      alert(text);
      break;
    default:
      alert('Unknown error!');
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
