<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          {{ Auth::user()->username }}
          <i class="fas fa-caret-down ml-1"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <a href="{{ route('petugas.profile') }}" class="dropdown-item">
          <i class="fas fa-user mr-2"></i>Profile User
        </a>
          <div class="dropdown-divider"></div>
  
        <a href="{{ route('petugas.logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
          class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i>Logout
          </a>
          <form action="{{ route('petugas.logout') }}" id="logout-form" method="post">
              @csrf
          </form>
      </li>
    </ul>
  </nav>