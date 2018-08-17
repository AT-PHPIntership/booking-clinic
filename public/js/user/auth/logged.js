function checkLogged() {
  const user = JSON.parse(window.localStorage.getItem('user'));
  if (user) {
    let html = `<span><a href="#"><strong>${user.name}</strong></a></span>
                <ul>
                  <li><a id="btn-logout" href="#">Logout</a></li>
                </ul>`;
    $('#js-navbar-user').append(html);
    $('#btn-logout').click(logout);
    $('#top_access').hide();
  }
}

function checkToken() {
  const token = window.localStorage.getItem('access_token');
  $.ajax({
    headers: {
      Accept: 'application/json',
      Authorization: 'Bearer ' + token
    },
    url: '/api/user',
    type: 'GET'
  })
  .done(function(response) {
    window.localStorage.setItem('user', JSON.stringify(response));
  })
  .statusCode(401, function(response) {
    window.localStorage.removeItem('access_token');
    window.localStorage.removeItem('user');
  })
}

function logout() {
  let token = window.localStorage.getItem('access_token');
  $.ajax({
    headers: {
      Accept: 'application/json',
      Authorization: 'Bearer ' + token
    },
    url: '/api/logout',
    type: 'POST'
  })
  .done(function(response) {
    window.localStorage.removeItem('access_token');
    window.localStorage.removeItem('user');
    window.location.replace('/');
  })
}

function checkRoute() {
  const route = {
    guest: ['/login', '/register'],
    user: ['/profile']
  }

  const user = JSON.parse(window.localStorage.getItem('user'));

  if (user) {
    route.guest.forEach(function(path) {
      if (window.location.pathname.includes(path)) {
        window.location.replace('/');
      }
    });
  } else {
    route.user.forEach(function(path) {
      if (window.location.pathname.includes(path)) {
        window.location.replace('/');
      }
    });
  }
}

$(document).ready(function() {
  checkToken();
  checkLogged();
  checkRoute();
});
