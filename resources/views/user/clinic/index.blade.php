@extends('user.layouts.app')

@section('content')

<div id="results">
  <div class="container">
      <div class="row">
          <div class="col-md-6" id="js_count_clinic">
              <h4><strong>Showing <span>10</span></strong> of <span>140</span> results</h4>
          </div>
          <div class="col-md-6">
               <div class="search_bar_list">
               <input type="text" class="form-control" placeholder="Ex. Clinic types, Name, Clinic...">
               <input type="submit" value="Search">
           </div>
          </div>
      </div>
      <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /results -->

<div class="filters_listing">
<div class="container">
 <ul class="clearfix">
   <li>
     <h6>Type</h6>
     <div class="switch-field">
       <input type="radio" id="all" name="type_patient" value="all" checked>
       <label for="all">All</label>
       <input type="radio" id="doctors" name="type_patient" value="doctors">
       <label for="doctors">Doctors</label>
       <input type="radio" id="clinics" name="type_patient" value="clinics">
       <label for="clinics">Clinics</label>
     </div>
   </li>
   <li>
     <h6>Layout</h6>
     <div class="layout_view">
       <a href="#0" class="active"><i class="icon-th"></i></a>
       <a href="list.html"><i class="icon-th-list"></i></a>
       <a href="list-map.html"><i class="icon-map-1"></i></a>
     </div>
   </li>
   <li>
     <h6>Sort by</h6>
     <select name="orderby" class="selectbox">
     <option value="Closest">Closest</option>
     <option value="Best rated">Best rated</option>
     <option value="Men">Men</option>
     <option value="Women">Women</option>
     </select>
   </li>
 </ul>
</div>
<!-- /container -->
</div>
<!-- /filters -->

<div class="container margin_60_35">
<div class="row">
 <div class="col-lg-8">
   <div class="row" id="js-clinic">

   </div>
   <!-- /row -->

   <nav aria-label="" class="add_top_20">
     <ul class="pagination pagination-sm" id="js-pagination-clinic">
     </ul>
   </nav>
   <!-- /pagination -->
 </div>
 <!-- /col -->

 <aside class="col-lg-4" id="sidebar">
   <div id="map_listing" class="normal_list">
   </div>
 </aside>
 <!-- /aside -->

</div>
<!-- /row -->
</div>
<!-- /container -->

@endsection

@section('additional_js')

  <!-- SPECIFIC SCRIPTS -->
  <script src="http://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API_KEY') }}"></script>
  <script src="{{ asset('js/user/map_listing.js') }}"></script>
  <script src="{{ asset('js/user/infobox.js') }}"></script>
  <script src="{{ asset('js/user/clinics_show.js') }}"></script>
@endsection
