<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Booking Clinic - Login Admin Panel</title>
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin/signin.css') }}" rel="stylesheet">
</head>
<body class="text-center">
  <form class="form-signin" method="POST" action="/admin/login">
    <img class="mb-4" src="{{asset('images/admin/clinic_home-512.png')}}" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please login</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <hr>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    <div class="row mt-5 mb-3 text-muted">
      <div class="col-md-6 text-left mini-text">
        Copyright&nbsp;©&nbsp;2018
      </div>
      <div class="col-md-6 text-right mini-text">
        <strong>Clinic Booking Team</strong>
      </div>
    </div>
  </form>
</body>
</html>
