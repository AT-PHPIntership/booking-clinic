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
    url: '/api/user',
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
  const route = {
    guest: ['/login', '/register'],
    user: ['/profile']
  }

  const user = getUser();

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

function showUserNavbar() {
  const user = getUser();
  if (user) {
    let html = `<span><a href="#"><strong>${user.name}</strong></a></span>
                <ul>
                  <li><a id="btn-logout" href="/logout">Logout</a></li>
                </ul>`;
    $('#js-navbar-user').append(html);
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
    url: '/api/logout',
    type: 'POST'
  })
  .done(function(response) {
    window.localStorage.removeItem('access_token');
    window.localStorage.removeItem('user');
    window.location.replace('/login');
  })
}

$(document).ready(function() {
  checkToken();
});
