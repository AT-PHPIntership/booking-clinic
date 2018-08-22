@extends('user.layouts.app')

@section('content')

<div class="container margin_60">
    <div class="row">

      <aside class="col-xl-3 col-lg-4" id="sidebar">
        <div class="box_profile">
          <figure>
            <img src="{{ asset('images/user/doctor_listing_2.jpg') }}" alt="" class="img-fluid">
          </figure>
          <small>Primary care - Internist</small>
          <h1>DR. Julia Jhones</h1>
          <span class="rating">
            <i class="icon_star voted"></i>
            <i class="icon_star voted"></i>
            <i class="icon_star voted"></i>
            <i class="icon_star voted"></i>
            <i class="icon_star"></i>
            <small>(145)</small>
            <a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="{{ asset('images/user/badges/badge_1.svg') }}" width="15" height="15" alt=""></a>
          </span>
          <ul class="statistic">
            <li>854 Views</li>
            <li>124 Patients</li>
          </ul>
          <ul class="contacts">
            <li><h6>Address</h6>859 60th, Brooklyn, NY, 11220</li>
            <li><h6>Phone</h6><a href="tel://000434323342">+00043 4323342</a></li>
            <li><h6>Email</h6><a href="mailto:abc@gmail.com">abc@gmail.com</a></li>
          </ul>
          <div class="text-center"><a href="https://www.google.com/maps/dir//Assistance+–+Hôpitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/" class="btn_1 outline" target="_blank"><i class="icon_pin"></i> View on map</a></div>
        </div>
      </aside>
      <!-- /asdide -->

      <div class="col-xl-9 col-lg-8">

        <div class="tabs_styled_2">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-expanded="true">General info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="book-tab" data-toggle="tab" href="#book" role="tab" aria-controls="book">Book an appointment</a>
            </li>
          </ul>
          <!--/nav-tabs -->

          <div class="tab-content">

            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
              <p class="lead add_bottom_30">Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
              <div class="indent_title_in">
                <i class="pe-7s-user"></i>
                <h3>Professional statement</h3>
                <p>Mussum ipsum cacilds, vidis litro abertis.</p>
              </div>
              <div class="wrapper_indent">
                <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Nullam mollis. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapi.</p>
                <h6>Specializations</h6>
                <div class="row">
                  <div class="col-lg-6">
                    <ul class="bullets">
                      <li>Abdominal Radiology</li>
                      <li>Addiction Psychiatry</li>
                      <li>Adolescent Medicine</li>
                      <li>Cardiothoracic Radiology </li>
                    </ul>
                  </div>
                  <div class="col-lg-6">
                    <ul class="bullets">
                      <li>Abdominal Radiology</li>
                      <li>Addiction Psychiatry</li>
                      <li>Adolescent Medicine</li>
                      <li>Cardiothoracic Radiology </li>
                    </ul>
                  </div>
                </div>
                <!-- /row-->
              </div>
              <!-- /wrapper indent -->

              <hr>

              <div class="indent_title_in">
                <i class="pe-7s-news-paper"></i>
                <h3>Education</h3>
                <p>Mussum ipsum cacilds, vidis litro abertis.</p>
              </div>
              <div class="wrapper_indent">
                <p>Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Nullam mollis. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapi.</p>
                <h6>Curriculum</h6>
                <ul class="list_edu">
                  <li><strong>New York Medical College</strong> - Doctor of Medicine</li>
                  <li><strong>Montefiore Medical Center</strong> - Residency in Internal Medicine</li>
                  <li><strong>New York Medical College</strong> - Master Internal Medicine</li>
                </ul>

              </div>
              <!--  End wrapper indent -->

              <hr>
              <div class="d-none">
                <div class="indent_title_in">
                  <i class="pe-7s-photo"></i>
                  <h3>Image</h3>
                  <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                </div>
                <div class="wrapper_indent">

                  <div class="row" style="width:500px;">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      </ol>
                      <div class="carousel-inner">
                        <div class="carousel-item">
                          <img class="d-block w-100" src="" alt="First slide" style="object-fit:cover;height:300px">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>

                  </div>

                </div>
                <!--  End wrapper indent -->
              </div>
            </div>
            <!-- /tab_1 -->

            <div class="tab-pane fade" id="book" role="tabpanel" aria-labelledby="book-tab">
              <p class="lead add_bottom_30">Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
              <form>
                <div class="main_title_3">
                  <h3><strong>1</strong>Select your date</h3>
                </div>
                <div class="form-group add_bottom_45">
                  <div id="calendar"></div>
                  <input type="hidden" id="my_hidden_input">
                  <ul class="legend">
                    <li><strong></strong>Available</li>
                    <li><strong></strong>Not available</li>
                  </ul>
                </div>
                <div class="main_title_3">
                  <h3><strong>2</strong>Select your time</h3>
                </div>
                <div class="row justify-content-center add_bottom_45">
                  <div class="col-md-3 col-6 text-center">
                    <ul class="time_select">
                      <li>
                        <input type="radio" id="time1" name="radio_time" value="08:00">
                        <label for="time1">08.00am</label>
                      </li>
                      <li>
                        <input type="radio" id="time2" name="radio_time" value="08:30">
                        <label for="time2">08.30am</label>
                      </li>
                      <li>
                        <input type="radio" id="time3" name="radio_time" value="09:00">
                        <label for="time3">09.00am</label>
                      </li>
                      <li>
                        <input type="radio" id="time4" name="radio_time" value="09:30">
                        <label for="time4">09.30am</label>
                      </li>
                      <li>
                        <input type="radio" id="time5" name="radio_time" value="10:00">
                        <label for="time5">10.00am</label>
                      </li>
                      <li>
                        <input type="radio" id="time6" name="radio_time" value="10:30">
                        <label for="time6">10.30am</label>
                      </li>
                      <li>
                        <input type="radio" id="time7" name="radio_time" value="11:00">
                        <label for="time7">11.00am</label>
                      </li>
                      <li>
                        <input type="radio" id="time8" name="radio_time" value="11:30">
                        <label for="time8">11.30am</label>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-3 col-6 text-center">
                    <ul class="time_select">
                      <li>
                        <input type="radio" id="time9" name="radio_time" value="13:30">
                        <label for="time9">01.30pm</label>
                      </li>
                      <li>
                        <input type="radio" id="time10" name="radio_time" value="14:00">
                        <label for="time10">02.00pm</label>
                      </li>
                      <li>
                        <input type="radio" id="time11" name="radio_time" value="14:30">
                        <label for="time11">02.30pm</label>
                      </li>
                      <li>
                        <input type="radio" id="time12" name="radio_time" value="15:00">
                        <label for="time12">03.00pm</label>
                      </li>
                      <li>
                        <input type="radio" id="time13" name="radio_time" value="15:30">
                        <label for="time13">03.30pm</label>
                      </li>
                      <li>
                        <input type="radio" id="time14" name="radio_time" value="16:00">
                        <label for="time14">04.00pm</label>
                      </li>
                      <li>
                        <input type="radio" id="time15" name="radio_time" value="16:30">
                        <label for="time15">04.30pm</label>
                      </li>
                      <li>
                        <input type="radio" id="time16" name="radio_time" value="17:00">
                        <label for="time16">05.00pm</label>
                      </li>
                    </ul>
                  </div>
                </div>
                  <!-- /row -->


                </form>
                <hr>
                <p class="text-center"><a href="booking-page.html" class="btn_1 medium">Book Now</a></p>
            </div>
            <!-- /tab_2 -->

          </div>
          <!-- /tab-content -->
        </div>
        <!-- /tabs_styled -->
      </div>
      <!-- /col -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->

@endsection

@section('additional_css')
  <!-- SPECIFIC CSS -->
  <link href="{{ asset('css/user/date_picker.css') }}" rel="stylesheet">
@endsection

@section('additional_js')
  <!-- SPECIFIC SCRIPTS -->
  <script src="{{ asset('js/user/bootstrap-datepicker.js') }}"></script>
  <script>
    $('#calendar').datepicker({
      todayHighlight: true,
      daysOfWeekDisabled: [0,6],
      weekStart: 1,
      format: "yyyy-mm-dd",
      datesDisabled: ["2017/10/20", "2017/11/21", "2017/12/21", "2018/01/21", "2018/02/21", "2018/03/21"],
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
@endsection