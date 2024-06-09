<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      {{-- If admin is logged in  --}}
      @if(Auth::check())
        <li class="nav-item active">
          <a class="nav-link" href="#">{{ Auth::user()->username}} <span class="sr-only"></span></a>
        </li>
        {{-- <li class="nav-item active"> --}}
          {{-- <a class="nav-link" href="#">{{ Auth::user()->name}} <span class="sr-only"></span></a> --}}
        {{-- </li> --}}
        <li class="nav-item">
          <a class="nav-link" href="#">Tables</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
        </li> --}}
      @else
        <li class="nav-item active">
          <a class="nav-link" href="#">DashBoard <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tables</a>
        </li>
      @endif
    </ul>
    <ul class="navbar-nav ml-auto">
      @if(!Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.login.form') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.register.form') }}">Signup</a>
        </li>
      @else
        <li class="nav-item">
          <form action="{{route('admin.logout')}}" method="POST">
            @csrf
            <button type="submit">Logout</button>
          </form>
        </li>
      @endif
    </ul>
  </div>
</nav>
