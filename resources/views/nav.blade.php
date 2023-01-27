
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
              <h5>SISU MED</h5>
          </a>
      </div>
      
      @if(Auth::check())
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        @if(!empty($user))
          <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h6 class="offcanvas-title" id="offcanvasDarkNavbarLabel">{{$user->name}}</h6>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body body-nav">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                @if($user->tipo_user == 1)
                
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin',$user->id)}}">
                      <i class="fas fa-user-cog"></i>
                      Dashboard
                    </a>
                  </li>
                
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">
                      <i class="fas fa-clipboard-list"></i>
                      Simulação
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('notas2023')}}">
                      <i class="fas fa-edit"></i>
                      Notas Sisu 2023
                    </a>
                  </li>

                @else
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">
                      <i class="fas fa-trash-alt"></i>
                      Excluir Conta
                    </a>
                  </li>
                @endif

                
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#">
                    <i class="fas fa-lock"></i>
                    Trocar Senha
                  </a>
                </li>

                <li>
                  <hr class="divider">
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{route('logout')}}">
                    <i class="fas fa-sign-out-alt"></i>
                    Sair
                  </a>
                </li>
              </ul>

            </div>
          </div>
          
        @else
          <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h6 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Olá, Visitante</h6>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
          </div>
        @endif

      @endif
    </div>
  </nav>