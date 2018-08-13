{{-- Filter listing templete --}}

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
