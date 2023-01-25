
<style>
  .navbar-brand{
  display: flex;
}

.navbar-brand h5{
  padding-left: 15px;
}

.body-nav ul li .nav-link{
  color: #fff !important;
}

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

<nav class="navbar navbar-light bg-warning">
    <div class="container-fluid">
        
      <div>
          <a class="navbar-brand" href="#">
              <h5>Sisu Vemmed</h5>
          </a>
      </div>
      
      @if(Auth::check())
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Olá, {{$user->name}}</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body body-nav">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Simulação</a>
            </li>
            <li>
              <hr class="divider">
            </li>
            @if($user->tipo_user == 1)
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin')}}">Dashboard Admin</a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="{{route('logout')}}">Logout</a>
            </li>
          </ul>
        </div>
      </div>
      @endif
    </div>
  </nav>