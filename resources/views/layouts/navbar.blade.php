<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
      <a class="navbar-brand" href="#"><img src="https://nipunasewa.com/wp-content/uploads/2020/01/nipuna-prabidhik-sewa.png
          " alt="" style="width: 100px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
          aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Tables</a>
              </li>

          </ul>
          @if(Auth::check())
            <form action="{{route('logout')}}" method="POST">
              @csrf
              <button class="btn btn-outline-primary">Logout</button>
            </form>
            {{-- <a class="btn btn-outline-primary" href="{{ route('login.form') }}">Logout</a> --}}
            {{-- <button class="btn btn-outline-primary">Logout</button> --}}
          @else
            <a class="btn btn-outline-primary" href="{{ route('login.form') }}">Login</a>
            <a class="btn btn-outline-primary" href="{{ route('register.form') }}">Signup</a>
          @endif
      </div>
  </div>
</nav>
