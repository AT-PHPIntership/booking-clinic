<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link{{ Request::route()->getName() === 'admin.dashboard' ? ' active' : '' }}" href="{{ route('admin.dashboard') }}">
          <span data-feather="home"></span>
          @lang('admin/layout.sidebar.dashboard')
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link{{ Request::route()->getName() === 'admin.clinic-types.index' ? ' active' : '' }}" href="{{ route('admin.clinic-types.index') }}">
          <span data-feather="file"></span>
          @lang('admin/layout.sidebar.clinic_types')
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link{{ Request::route()->getName() === 'admin.clinics.index' ? ' active' : '' }}" href="{{ route('admin.clinics.index')}}">
          <span data-feather="map-pin"></span>
          @lang('admin/layout.sidebar.clinics')
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link{{ Request::route()->getName() === 'admin.users.index' ? ' active' : '' }}" href="{{ route('admin.users.index') }}">
          <span data-feather="users"></span>
          @lang('admin/layout.sidebar.users')
        </a>
      </li>
    </ul>
  </div>
</nav>
