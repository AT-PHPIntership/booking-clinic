{{-- Filter listing templete --}}

<div class="filters_listing">
  <div class="container">
    <ul class="clearfix">
      <li>
        <h6>@lang('user/filter.type')</h6>
        <div class="switch-field">
          <input type="radio" id="all" name="type_patient" value="all" checked>
          <label for="all">@lang('user/filter.all')</label>
          <input type="radio" id="clinics" name="type_patient" value="clinics">
          <label for="clinics">@lang('user/filter.clinics')</label>
        </div>
      </li>
      <li>
        <h6>@lang('user/filter.filter')</h6>
        <select name="order_by" class="selectbox">
          @foreach ($options as $option)
            <option value="{{ $option['href'] }}">{{ $option['text'] }}</option>
          @endforeach
        </select>
      </li>
      <li>
        <h6>@lang('user/filter.perpage')</h6>
        <select name="perpage" class="selectbox">
          <option value="perpage=5">5</option>
          <option value="perpage=10">10</option>
          <option value="perpage=15">15</option>
          <option value="perpage=20">20</option>
        </select>
      </li>
    </ul>
  </div>
  <!-- /container -->
  </div>
</div>
