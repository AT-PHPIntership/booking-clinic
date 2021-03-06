@extends('user.layouts.app')

@section('content')

<div class="hero_home version_1">
  <div class="content">
    <h3>@lang('user/home.section_search.heading')</h3>
    <p>
      @lang('user/home.section_search.description')
    </p>
    <form method="GET" action="{{ route('user.clinics.index') }}">
      <div id="custom-search-input">
        <div class="input-group">
          <input type="text" class="search-query" name="search" placeholder="@lang('user/home.section_search.placeholder')">
          <input type="submit" class="btn_search" value="Search">
        </div>
        <ul>
          <li>
            <input type="radio" id="all" name="radio_search" value="all" checked>
            <label for="all">@lang('user/home.section_search.all')</label>
          </li>
          <li>
            <input type="radio" id="doctor" name="radio_search" value="doctor">
            <label for="doctor">@lang('user/home.section_search.doctor')</label>
          </li>
          <li>
            <input type="radio" id="clinic" name="radio_search" value="clinic">
            <label for="clinic">@lang('user/home.section_search.clinic')</label>
          </li>
        </ul>
      </div>
    </form>
  </div>
</div>
<!-- /Hero -->

<div class="container margin_120_95">
  <div class="main_title">
    <h2>Discover the <strong>online</strong> appointment!</h2>
    <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie. Sed ad debet scaevola, ne mel.</p>
  </div>
  <div class="row add_bottom_30">
    <div class="col-lg-4">
      <div class="box_feat" id="icon_1">
        <span></span>
        <h3>Find a Clinic</h3>
        <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="box_feat" id="icon_2">
        <span></span>
        <h3>View profile</h3>
        <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="box_feat" id="icon_3">
        <h3>Book a visit</h3>
        <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
      </div>
    </div>
  </div>
  <!-- /row -->
  <p class="text-center"><a href="{{ route('user.clinics.index') }}" class="btn_1 medium">@lang('user/home.section_main.find_clinic')</a></p>

</div>
<!-- /container -->

<div class="bg_color_1">
  <div class="container margin_120_95">
    <div class="main_title">
      <h2>Most Viewed Clinic</h2>
      <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri.</p>
    </div>
    <div id="reccomended" class="owl-carousel owl-theme">
      <div class="item">
        <a href="detail-page.html">
          <div class="views"><i class="icon-eye-7"></i>140</div>
          <div class="title">
            <h4>Dr. Julia Holmes<em>Pediatrician - Cardiologist</em></h4>
          </div><img src="/images/user/doctor_1_carousel.jpg" alt="">
        </a>
      </div>
      <div class="item">
        <a href="detail-page.html">
          <div class="views"><i class="icon-eye-7"></i>120</div>
          <div class="title">
            <h4>Dr. Julia Holmes<em>Pediatrician</em></h4>
          </div><img src="/images/user/doctor_2_carousel.jpg" alt="">
        </a>
      </div>
      <div class="item">
        <a href="detail-page.html">
          <div class="views"><i class="icon-eye-7"></i>115</div>
          <div class="title">
            <h4>Dr. Julia Holmes<em>Pediatrician</em></h4>
          </div><img src="/images/user/doctor_3_carousel.jpg" alt="">
        </a>
      </div>
      <div class="item">
        <a href="detail-page.html">
          <div class="views"><i class="icon-eye-7"></i>98</div>
          <div class="title">
            <h4>Dr. Julia Holmes<em>Pediatrician</em></h4>
          </div><img src="/images/user/doctor_4_carousel.jpg" alt="">
        </a>
      </div>
      <div class="item">
        <a href="detail-page.html">
          <div class="views"><i class="icon-eye-7"></i>98</div>
          <div class="title">
            <h4>Dr. Julia Holmes<em>Pediatrician</em></h4>
          </div><img src="/images/user/doctor_5_carousel.jpg" alt="">
        </a>
      </div>
    </div>
    <!-- /carousel -->
  </div>
  <!-- /container -->
</div>
<!-- /white_bg -->

@endsection()
