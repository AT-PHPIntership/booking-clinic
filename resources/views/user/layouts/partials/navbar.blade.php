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
              <span><a href="#0">Home</a></span>
              <ul>
                <li><a href="index-2.html">Home Default</a></li>
                <li><a href="index-3.html">Home Version 2</a></li>
                <li><a href="index-4.html">Home Version 3</a></li>
                <li><a href="index-5.html">Home Version 4</a></li>
                <li><a href="index-6.html">Revolution Slider</a></li>
                <li><a href="index-7.html">With Cookie Bar (EU law)</a></li>
              </ul>
            </li>
            <li>
              <span><a href="#">{{  __('user/layout.navbar.clinic_types') }}</a></span>
              <ul id="js-clinic-types"></ul>
            </li>
            <li>
              <span><a href="#0">Extra Elements</a></span>
              <ul>
                <li><a href="detail-page-working-booking.html">Detail working booking</a></li>
                <li><a href="booking-page.html">Booking page</a></li>
                <li><a href="confirm.html">Confirm page</a></li>
                <li><a href="faq.html">Faq page</a></li>
                <li><a href="coming_soon/index.html">Coming soon</a></li>
                 <li><a href="pricing-tables.html">Responsive pricing tables</a></li>
                 <li><a href="pricing-tables-2.html">Responsive pricing tables 2</a></li>
                 <li><a href="register-doctor-working.html">Working doctor register</a></li>
                <li><a href="icon-pack-1.html">Icon pack 1</a></li>
                <li><a href="icon-pack-2.html">Icon pack 2</a></li>
                <li><a href="icon-pack-3.html">Icon pack 3</a></li>
                <li><a href="404.html">404 page</a></li>
              </ul>
            </li>
            <li id="js-navbar-user"></li>
          </ul>
        </nav>
        <!-- /main-menu -->
      </div>
    </div>
  </div>
  <!-- /container -->
</header>
<!-- /header -->
