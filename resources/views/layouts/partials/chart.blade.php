<div class="card-body">
  <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
      <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
    </div>
    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
      <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
    </div>
  </div>
  <canvas id="myPieChart" width="301" height="301" class="chartjs-render-monitor" style="display: block; width: 301px; height: 301px;"></canvas>
  <div class="donut-chart-label">
  <div class="donut-chart-value">{{ $clinic->appointments->count() }}</div>
    <div class="donut-chart-title">@lang('admin_clinic/dashboard.appointments')</div>
  </div>
</div>
