function getUser() {
  return JSON.parse(window.localStorage.getItem('user'));
}

function getToken() {
  return window.localStorage.getItem('access_token');
}

function getAppointment() {
  return JSON.parse(window.localStorage.getItem('appointment'));
}
