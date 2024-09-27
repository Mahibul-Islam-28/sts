<nav class="navbar navbar-expand-md">
  <div class="container">
    <a class="navbar-brand" href="{{route('index')}}">STS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#userNavbar">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse" id="userNavbar">
      <ul class="navbar-nav ms-auto">
        @if(Session::has('customer'))
        <li class="nav-item">
          <a class="nav-link {{Request::path() === '/' ? 'active' : '' }}" href="{{route('index')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('customerLogout')}}">Logout</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link {{Request::path() === '/login' ? 'active' : '' }}" href="{{route('customerLogin')}}">Login</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>