function register(name, email, password, passwordConfirmation) {
  $.ajax({
      headers: {
        'Accept': 'application/json',
      },
      url: route('api.register'),
      type: 'POST',
      data: {
        name: name,
        email: email,
        password: password,
        password_confirmation: passwordConfirmation,
        beforeSend: removeOldErrors
      },
  })
  .done(registerSuccess)
  .fail(registerFail);
};

function registerSuccess(res) {
    window.location.replace('/');
}

function registerFail(res) {
    let errors = JSON.parse(res.responseText).errors;
    $.each(errors, function(field, message) {
      let currentInput = $(`input[name=${field}]`);
      if (field == 'password') $(`input[name=password_confirmation`).addClass('is-invalid');
      currentInput.addClass('is-invalid');
      currentInput.next(".invalid-feedback").text(message);
    });
}

function removeOldErrors() {
    $('.invalid-feedback').text(""); //remove errors of last request
    $('.is-invalid').removeClass('is-invalid');  //remove red border of error input
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
