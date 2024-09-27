<nav class="navbar navbar-expand-md">
  <div class="container">
    <a class="navbar-brand" href="{{route('dashboard')}}">STS Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
      <span class="navbar-toggler-ichttps://www.torrentbd.com/activities.phpon"></span>
    </button>
    <div class="collapse navbar-collapse" id="adminNavbar">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{Request::path() === '/adminPanel' ? 'active' : '' }}" href="{{route('dashboard')}}">Dashbaord</a>
        </li>
        @if(Session::has('admin'))
        <li class="nav-item">
          <a class="nav-link {{Request::path() === '/adminPanel/logout' ? 'active' : '' }}" href="{{route('adminLogout')}}">Logout</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>