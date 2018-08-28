<header class="header_sticky">
  <a href="#menu" class="btn_mobile">
    <div class="hamburger hamburger--spin" id="hamburger">
      <div class="hamburger-box">
        <div class="hamburger-inner"></div>
      </div>
    </div>
  </a>
  <!-- /btn_mobile-->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div id="logo_home">
        <h1><a href="{{ route('user.home') }}" title="{{ __('user/layout.app.app_name') }}">{{ __('user/layout.app.app_name') }}</a></h1>
        </div>
      </div>
      <div class="col-lg-9 col-6">
        <ul id="top_access">
          <li><a href="{{ route('user.login') }}"><i class="pe-7s-user"></i></a></li>
          <li><a href="{{ route('user.register') }}"><i class="pe-7s-add-user"></i></a></li>
        </ul>
        <nav id="menu" class="main-menu">
          <ul>
            <li>
              <span><a href="{{ route('user.home') }}">{{ __('user/layout.navbar.home') }}</a></span>
            </li>
            <li>
              <span><a href="{{ route('user.clinics.index') }}">{{  __('user/layout.navbar.clinic_types') }}</a></span>
              <ul id="js-clinic-types"></ul>
            </li>
            <li id="js-navbar-user" class="d-none">
              <span><a href="#"><i class="icon-user"></i><strong></strong></a></span>
              <ul>
                <li><a href="{{ route('user.appointments.index') }}"><i class="icon-th-large"></i>{{ __('user/layout.navbar.my_appointments') }}</a></li>
                <li><a href="{{ route('user.profile') }}"><i class="icon-info-circled-alt"></i>{{ __('user/layout.navbar.profile') }}</a></li>
                <li><a href="{{ route('user.change_password') }}"><i class="icon-edit"></i>{{ __('user/layout.navbar.change_password') }}</a></li>
                <li><a id="btn-logout" href="#"><i class="icon-logout-1"></i>{{ __('user/layout.navbar.logout') }}</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /main-menu -->
      </div>
    </div>
  </div>
  <!-- /container -->
</header>
<!-- /header -->
