<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simulador Sisu Vemmed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{asset('imagens/logo_clara.png')}}" type="image/x-icon">
  </head>

  <style>

    /* criar variaveis para cores */

    /* criar variaveis para cores */
    .accordion{
      -- bs-accordion-active-color: #FFC107 !important;
    }

    .cadastro{
      padding: 2%;
      padding-left: 5%;
      padding-right: 5%;
      color: #fff;
    }

    .forms{
      padding: 5%;
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

    .passos{
      background-color: #FFC107;
      color: #000;
      padding: 5%;
    }

    .passos h2{
      color: #000;
      padding-bottom: 3%;
    }

    .passos h3{
      color: #000;
      background-color: #fff;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      text-align: center;
      padding-top: 5px;
      font-weight: bold;
    }

    .passo{
      /* alinhar itens no centro da div */
      justify-content: center;
      align-items: center;
      /* alinhar itens no centro da div */
      display: flex;
      flex-direction: column;
      padding: 3%;

    }

    .duvidas{
      padding: 5%;
    }

    .accordion-button:not(.collapsed) {
      color: #000;
      background-color: #fff;
      font-weight: bold;
    }

    .accordion-button:focus {
      border-color: #000 !important;
      box-shadow: none !important;
    }

    .accordion-button:not(.collapsed)::after {
      background-image: var(--bs-accordion-btn-icon) !important;
    }

    .accordion-body{
      text-align: justify;
    }

    .accordion-body a{
      color: #FFC107;
    }

    .accordion-body a:hover{
      color: #362b0b;
    }

    .form-user{
      font-size: 100%;
      font-weight: bold;
    }
  </style>
  
  <body>

    @include('front_telas.nav')

    <?php
      if($message = Session::get('success')){
        $input = 'login';
      }else{
        $input = 'false';
      }
    ?>
    <input type="hidden" id="tabsuc" value="{{$input}}">

    <div class="container-fluid text-center conteudo">
        <div class="row">
          <div class="col-12 col-md-7 cadastro bg-dark" id="simular">
            @include('front_telas.notas')
          </div>

            
            <div class="col-12 col-md-5 forms">
              @include('flash-message')
                
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                      <a class="nav-link form-user" href="#cadastro" onclick="cadastro()"
                      data-bs-toggle="collapse" data-bs-target="#cadastro" aria-expanded="true" aria-controls="cadastro"
                      >
                      <i class="fas fa-user-plus"></i>
                      Cadastro</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link form-user" href="#login" onclick="login()"
                      data-bs-toggle="collapse" data-bs-target="#login" aria-expanded="false" aria-controls="login"
                      >
                      <i class="fas fa-sign-in-alt"></i>
                      Login</a>
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

        <div class="row passos">
            <div class="col-12">
                <h2>Como funciona o Simulador SISU VEMED?</h2>
            </div>


            <div class="col-12 col-md-4 passo">
                <h3>1</h3>
                <h5>Preencha suas notas e faça o seu cadastro ou faça login.</h5>
            </div>

            <div class="col-12 col-md-4 passo">
              <h3>2</h3>
              <h5>Escolha 1 estado, 3 opções de faculdade e sua modalidade.</h5>
            </div>

            <div class="col-12 col-md-4 passo">
              <h3>3</h3>
              <h5>Veja as chances de passar de acordo com sua nota de corte.</h5>
            </div>

            <div class="col-12">
              <a href="#simular" class="btn btn-light" style="width:30%;">Simular Nota</a>
            </div>
        </div>

        <div class="row duvidas">

          <div class="col-12">
            <h2>Tudo sobre o SISU!</h2>
          </div>

          <div class="col-12">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    O que é o SISU?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    O Sistema de Seleção Unificada (SiSU) é um programa criado pelo MEC que viabiliza o ingresso de estudantes nas melhores universidades públicas do País. Com base na nota do Enem, o SiSU oferece vagas em diferentes modalidades de concorrência e em diversas universidades. Existem as notas de corte do SiSU, que indicam ao candidato o quanto ele precisa tirar para conseguir uma vaga em seu curso desejado. Cada instituição de ensino pode adotar pesos diferentes para cada área do conhecimento do Enem ou, até mesmo, notas mínimas.
                  </div>
                </div>
              </div>
              
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Como funciona o SISU?
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    A inscrição do Sisu abre duas vezes ao ano, no início de cada semestre. Elas ficam abertas durante três dias e você pode alterar as opções de curso e faculdade durante este período. No final de cada dia, o sistema é atualizado e você pode ver qual a probabilidade de ingressar nas opções selecionadas. Caso seja aprovado em uma das opções escolhidas, você deixa a lista de espera. Por isso, é fundamental pensar bem nas suas escolhas de curso.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Quem pode se inscrever no SISU?
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Para se inscrever no Sisu é necessário já ter se formado no Ensino Médio, realizar o Enem da última edição e não zerar a redação. Um ponto importante é que algumas instituições exigem notas mínimas para inscrição em seus cursos, então fique de olho.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Como fazer a inscrição no SISU?
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    A inscrição é feita pelo <a href="https://acessounico.mec.gov.br/" target="_blank">site oficial do Sisu</a> , informações necessárias:
                    <ul>
                      <li>CPF</li>
                      <li>Senha do Enem</li>
                      <li>Opções de curso e instituição</li>
                    </ul>
                    Após confirmar sua inscrição, você irá para a tela Minha inscrição e poderá conferir as informações da opção escolhida, com a possibilidade de alterar suas opções durante o período de inscrições.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Como o Simulador SISU pode me ajudar?
                  </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Vamos confessar que quando sai a nota do Enem ficamos ansiosos para saber se vamos ser aprovados ou não na faculdade dos sonhos. Então para aliviar essa ansiedade, o simulador atua entre a liberação da nota do enem e abertura das inscrições para o Sisu. Ele utiliza a sua nota do Enem e compara com a nota de corte do Sisu 2022, estipulando a probabilidade de você ser aprovado no Sisu 2023!
                  </div>
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