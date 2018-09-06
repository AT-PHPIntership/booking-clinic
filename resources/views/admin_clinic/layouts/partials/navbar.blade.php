<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">@lang('admin_clinic/layout.navbar.app_name')</a>
  <input class="form-control form-control-dark w-100" type="text" aria-label="@lang('admin_clinic/layout.navbar.search')">
  <div class="dropdown navbar-nav px-2">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{ Auth::guard('web-admin')->user()->name }}
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        @lang('admin_clinic/layout.navbar.logout')
      </a>
      <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-one">
        @csrf
      </form>
    </div>
  </div>
</nav>
