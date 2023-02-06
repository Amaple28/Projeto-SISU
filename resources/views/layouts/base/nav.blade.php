<style>
  @include('layouts.css.nav');
</style>

<nav class="navbar navbar-light bg-warning">
    <div class="container-fluid">
        
      <div>
          <a class="navbar-brand" href="#">
              <h5>SISU VEMMED</h5>
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
                    <a class="nav-link" href="{{route('admin')}}">
                      <i class="fas fa-home"></i>
                      Home
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('users')}}">
                      <i class="fas fa-user-cog"></i>
                      Usuários
                    </a>
                  </li>
                
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">
                      <i class="fas fa-clipboard-list"></i>
                      Simulação
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('faculdades')}}">
                      <i class="fas fa-graduation-cap"></i>
                      Faculdades
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('notas')}}">
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

  <script>
    function sendAjaxFormModal(formId){
                var frm = $('#'+formId);
                var url = frm.attr('action');
                
                $.ajax({
                    type: frm.attr('method'),
                    url: url,
                    data: frm.serialize(),
                    cache: false,
                    dataType:"json",
                    beforeSend: function(){
                        antesDeEnviarFormulario(formId);
                        showLoadingSendAjax(formId);                        
                    },
                    complete: function(){
                        depoisDeEnviarFormulario(formId);
                        hideLoadingSendAjax(formId); 
                    },
                    success: function(response){                        
                        processResponse(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                          //var err = eval("(" + xhr.responseText + ")");
                        erro = textStatus+" - Code: "+jqXHR.status + " "+errorThrown;
                        console.log('jqXHR: '+JSON.stringify(jqXHR));
                        console.log("Erro: "+erro);
                        mostraNotificacaoErro(erro);
                    }
                });
            }
  </script>