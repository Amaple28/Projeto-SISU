<!doctype html>
<html lang="pt-br">

  @include('layouts.base.base')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">

  <style>
    .accordion{
      -- bs-accordion-active-color: #FFC107 !important;
    }
  </style>
  
  <body>

    @include('layouts.base.nav')

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

            {{-- <a class="btn btn-info" href="{{route('send-email-cadastro')}}"  role="button">Enviar E-mail</a> --}}

            @include('notas')
          </div>

            
            <div class="col-12 col-md-5 forms">
              @include('layouts.base.flash-message')
                
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
                            @include('cadastro')
                        </div>
                    </div>

                    <div class="collapse collapse-horizontal" id="login">
                        <div class="container-fluid">
                            @include('login')
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row passos">
            <div class="col-12">
                <h2>Como funciona o Simulador SISU VEMMED?</h2>
            </div>


            <div class="col-12 col-md-4 passo">
                <h3>1</h3>
                <h5>Preencha suas notas e fa??a o seu cadastro ou fa??a login.</h5>
            </div>

            <div class="col-12 col-md-4 passo">
              <h3>2</h3>
              <h5>Escolha 1 estado, 3 op????es de faculdade e sua modalidade.</h5>
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
                    O que ?? o SISU?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    O Sistema de Sele????o Unificada (SiSU) ?? um programa criado pelo MEC que viabiliza o ingresso de estudantes nas melhores universidades p??blicas do Pa??s. Com base na nota do Enem, o SiSU oferece vagas em diferentes modalidades de concorr??ncia e em diversas universidades. Existem as notas de corte do SiSU, que indicam ao candidato o quanto ele precisa tirar para conseguir uma vaga em seu curso desejado. Cada institui????o de ensino pode adotar pesos diferentes para cada ??rea do conhecimento do Enem ou, at?? mesmo, notas m??nimas.
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
                    A inscri????o do Sisu abre duas vezes ao ano, no in??cio de cada semestre. Elas ficam abertas durante tr??s dias e voc?? pode alterar as op????es de curso e faculdade durante este per??odo. No final de cada dia, o sistema ?? atualizado e voc?? pode ver qual a probabilidade de ingressar nas op????es selecionadas. Caso seja aprovado em uma das op????es escolhidas, voc?? deixa a lista de espera. Por isso, ?? fundamental pensar bem nas suas escolhas de curso.
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
                    Para se inscrever no Sisu ?? necess??rio j?? ter se formado no Ensino M??dio, realizar o Enem da ??ltima edi????o e n??o zerar a reda????o. Um ponto importante ?? que algumas institui????es exigem notas m??nimas para inscri????o em seus cursos, ent??o fique de olho.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Como fazer a inscri????o no SISU?
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    A inscri????o ?? feita pelo <a href="https://acessounico.mec.gov.br/" target="_blank">site oficial do Sisu</a> , informa????es necess??rias:
                    <ul>
                      <li>CPF</li>
                      <li>Senha do Enem</li>
                      <li>Op????es de curso e institui????o</li>
                    </ul>
                    Ap??s confirmar sua inscri????o, voc?? ir?? para a tela Minha inscri????o e poder?? conferir as informa????es da op????o escolhida, com a possibilidade de alterar suas op????es durante o per??odo de inscri????es.
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
                    Vamos confessar que quando sai a nota do Enem ficamos ansiosos para saber se vamos ser aprovados ou n??o na faculdade dos sonhos. Ent??o para aliviar essa ansiedade, o simulador atua entre a libera????o da nota do enem e abertura das inscri????es para o Sisu. Ele utiliza a sua nota do Enem e compara com a nota de corte do Sisu 2022, estipulando a probabilidade de voc?? ser aprovado no Sisu 2023!
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

    </div>


    @include('layouts.base.footer')

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
    
    <!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '525431748084092');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=525431748084092&ev=PageView&noscript=1"
/></noscript>

    

</body>
</html>