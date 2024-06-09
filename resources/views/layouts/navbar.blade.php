<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        {{-- If admin is logged in  --}}
        @if(Auth::check())
          <li class="nav-item active">
            <a class="nav-link" href="#">{{Auth::user()}} <span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tables</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{route('admin.logout')}}">Logout</a>
          </li>
          {{-- If admin is not logged in  --}}
        @else
          <li class="nav-item active">
            <a class="nav-link" href="#">DashBoard<span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tables</a>
          </li>
        @endif
        
      </ul>
    </div>
</nav>
