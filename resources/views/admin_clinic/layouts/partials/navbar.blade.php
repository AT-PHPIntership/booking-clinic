<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">@lang('admin_clinic/layout.navbar.app_name')</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="@lang('admin_clinic/layout.navbar.search')" aria-label="@lang('admin_clinic/layout.navbar.search')">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        @lang('admin_clinic/layout.navbar.logout')
      </a>
      <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-one">
        @csrf
      </form>
    </li>
  </ul>
</nav>
