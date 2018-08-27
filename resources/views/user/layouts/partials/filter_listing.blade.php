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
          @php $i = 0 @endphp
          @foreach ($options as $option)
            <option value="{{ $i }}" data-href="{{ $option['href'] }}">{{ $option['text'] }}</option>
            @php $i++ @endphp
          @endforeach
        </select>
      </li>
      <li>
        <h6>@lang('user/filter.perpage')</h6>
        <select name="perpage" class="selectbox">
          <option value="0" data-href="?perpage=5">5</option>
          <option value="1" data-href="?perpage=10">10</option>
          <option value="3" data-href="?perpage=15">15</option>
          <option value="4" data-href="?perpage=20">20</option>
        </select>
      </li>
    </ul>
  </div>
  <!-- /container -->
  </div>
</div>
