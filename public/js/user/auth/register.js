function register(name, email, password, passwordConfirmation) {
  $.ajax({
      headers: {
        'Accept': 'application/json',
      },
      url: '/api/register',
      type: 'POST',
      data: {
        name: name,
        email: email,
        password: password,
        password_confirmation: passwordConfirmation
      },
  })
  .done(registerSuccess)
  .fail(registerFail);
};

function registerSuccess(res) {
    window.location.replace('/');
}

function registerFail(res) {
    let message = JSON.parse(res.responseText);
    let errors = message.errors;
    $.each(errors, function(key, message) {
      $(`input[name=${key}]`).after (
        `<div class="invalid-feedback inline" role="alert">
            <strong>${message}</strong>
        </div>`);
    });
    debugger;
}

$(document).ready(function () {
    $('input[type=submit]').click(function(e) {
      e.preventDefault();
      let name = $('input[name=name]').val();
      let email = $('input[name=email]').val();
      let password = $('input[name=password]').val();
      let passwordConfirmation = $('input[name=password_confirmation]').val();
      register(name, email, password, passwordConfirmation);
    });
});
