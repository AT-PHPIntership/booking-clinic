function login(email, password) {
  $.ajax({
    headers: {
      'Accept': 'application/json'
    },
    url: route('api.login'),
    type: 'POST',
    data: {
      email: email,
      password: password
    },
    beforeSend: clearError,
  })
  .done(loginSuccess)
  .fail(showError);
}

function loginFB(userInfo) {
  $.ajax({
    headers: {
      'Accept': 'application/json'
    },
    url: route('api.facebook.login'),
    type: 'POST',
    data: userInfo,
    beforeSend: clearError,
  })
  .done(loginSuccess)
  .fail(showError);
}

function fetchInfo() {
  FB.login(function(response) {
    if (response.authResponse) {
      FB.api('/me', { locale: 'en_US', fields: 'name, email' }, loginFB);
    }
  }, {scope: 'email'});
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
      $.each(data.errors, function(field, error) {
        $('#input-' + field).addClass('is-invalid');
        $('#input-' + field + ' + .invalid-feedback strong').html(error);
      });
      break;
    default:
      alert('Unknown error! status code ' + status);
  }
}

function clearError() {
  $('.invalid-feedback strong').html('');
  $('.is-invalid').removeClass('is-invalid');
  $('#js-error-login').addClass('d-none').html('');
}

$(document).ready(function() {
  window.fbAsyncInit = function() {
    FB.init({
      appId            : $('input[name=app_id]').val(),
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.1'
    });
  };

  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  $('#btn-submit').click(function(e) {
    e.preventDefault();
    let email = $('#input-email').val();
    let password = $('#input-password').val();
    login(email, password);
  });

  $('.social_bt.facebook').click(function(e) {
    e.preventDefault();
    fetchInfo();
  });
});
