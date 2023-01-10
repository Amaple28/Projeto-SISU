<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simulador Sisu Vemmed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

  <style>
    .cadastro{
      padding: 10%;
    }

    .forms{
      padding: 8%;
      padding-left: 5%;
      padding-right: 5%;
      
    }

    .forms a{
        color: black;
    }

    .forms a:hover{
        color: black;
    }

    .forms a:focus{
        color: black;
    }
  </style>
  
  <body>

    @include('front_telas.nav')


    <div class="container-fluid text-center conteudo">
        <div class="row">

            <div class="col-12 col-md-7 bg-warning cadastro">
              <h2>Simulador SISU 2023</h2>
              <br>
              <p>Com o Simulador SISU VEMMED você usa o resultado do Enem e confere suas chances de aprovação na faculdade dos seus sonhos!</p>
            </div>
            @include('flash-message')
            <div class="col-12 col-md-5 forms">
                
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                      <a class="nav-link" href="#cadastro" onclick="cadastro()"
                      data-bs-toggle="collapse" data-bs-target="#cadastro" aria-expanded="true" aria-controls="cadastro"
                      >Cadastro</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#login" onclick="login()"
                      data-bs-toggle="collapse" data-bs-target="#login" aria-expanded="false" aria-controls="login"
                      >Login</a>
                    </li>
                </ul>

                <div>
                    <div class="collapse collapse-horizontal" id="cadastro">
                        <div class="container-fluid">
                            @include('front_telas.cadastro')
                        </div>
                    </div>

                    <div class="collapse collapse-horizontal" id="login">
                        <div class="container-fluid">
                            @include('front_telas.login')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    @include('front_telas.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <script>

      // colapso do cadastro deve estar aparecendo ao abrir tela
      document.getElementById("cadastro").classList.add("show");

        function cadastro(){
            document.getElementById("login").classList.remove("show");
        }

        function login(){
            document.getElementById("cadastro").classList.remove("show");
        }
    </script>

</body>
</html>