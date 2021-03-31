<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile not-navigation-link">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="">
            <img src="{{ url('assets/images/input.PNG') }}" width="80%" alt="profile image">
          </div>
        </div>
        <button class="btn btn-success btn-block">New Project <i class="mdi mdi-plus"></i>
        </button> 
      </div>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/home') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#basic-ui" aria-expanded="" aria-controls="basic-ui">
        <i class="menu-icon mdi mdi-account-multiple"></i>
        <span class="menu-title">Users</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse " id="basic-ui">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.user.index') }}">All Users</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.user.create') }}">Create User</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">User Role</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#Attendance-pages" aria-expanded="" aria-controls="user-pages">
        <i class="menu-icon mdi mdi-calendar-clock"></i>
        <span class="menu-title">Attendance</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse " id="Attendance-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.attendance')}}">New Attendance</a>
          </li>
        </ul>
      </div>
    </li> 
    <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#Report-pages" aria-expanded="" aria-controls="user-pages">
        <i class="menu-icon mdi mdi-file-document"></i>
        <span class="menu-title">Report</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse " id="Report-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.attendance.report')}}">Attendance</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#Settings-pages" aria-expanded="" aria-controls="user-pages">
        <i class="menu-icon mdi mdi-lock-outline"></i>
        <span class="menu-title">Settings</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse " id="Settings-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.logo.index')}}">Change Logo</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.footer.index')}}">Change footer</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('password.request') }}">Reset Password</a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
          </li>
        </ul>
      </div>
    </li>
  </ul>
</nav>