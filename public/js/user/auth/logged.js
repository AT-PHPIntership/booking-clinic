function checkToken() {
  const token = getToken();

  if (!token) {
    checkRoute();
    return;
  }

  $.ajax({
    headers: {
      Accept: 'application/json',
      Authorization: 'Bearer ' + token
    },
    url: route('api.user'),
    type: 'GET'
  })
  .done(function(response) {
    $.when(window.localStorage.setItem('user', JSON.stringify(response)))
      .then(function() {
        checkRoute();
        showUserNavbar();
      });
  })
  .statusCode(401, function(response) {
    window.localStorage.removeItem('access_token');
    window.localStorage.removeItem('user');
  })
}

function checkRoute() {
  const routes = {
    guest: [route('user.login'), route('user.register')],
    user: [route('user.profile')]
  }

  const user = getUser();

  if (user) {
    routes.guest.forEach(function(path) {
      if (window.location.href.includes(path)) {
        window.location.replace('/');
      }
    });
  } else {
    routes.user.forEach(function(path) {
      if (window.location.href.includes(path)) {
        window.location.replace('/');
      }
    });
  }
}

function showUserNavbar() {
  const user = getUser();
  if (user) {
    $('#js-navbar-user').removeClass('d-none');
    $('#js-navbar-user strong').html(user.name);
    $('#btn-logout').click(logout);
    $('#top_access').hide();
  }
}

function logout() {
  const token = getToken();
  $.ajax({
    headers: {
      Accept: 'application/json',
      Authorization: 'Bearer ' + token
    },
    url: route('api.logout'),
    type: 'POST'
  })
  .done(function(response) {
    window.localStorage.removeItem('access_token');
    window.localStorage.removeItem('user');
    window.location.replace('/');
  })
}

$(document).ready(function() {
  checkToken();
});
