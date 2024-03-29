<!doctype html>
<html lang="pt-br">

{{-- header --}}
@include('layouts.base.base')

{{-- styles --}}
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<style>
    .accordion {
        -- bs-accordion-active-color: #FFC107 !important;
    }
</style>

<body>
    {{-- navbar --}}
    @include('layouts.base.nav')

    {{-- variável para verificar se o usuário está logado --}}
    <?php
    if ($message = Session::get('success')) {
        $input = 'login';
    } else {
        $input = 'false';
    }
    ?>
    <input type="hidden" id="tabsuc" value="{{ $input }}">

    <div class="container-fluid text-center conteudo">
        <div class="row">
            {{-- form para preencher notas do enem --}}
            <div class="col-12 col-md-7 cadastro bg-dark" id="simular">
                @include('index.notas')
            </div>

            <div class="col-12 col-md-5 forms">
                {{-- include necessário para aparecer mensagens de erro e sucesso --}}
                @include('layouts.base.flash-message')

                {{-- collapse de login e cadastro --}}
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link form-user" href="#cadastro" onclick="cadastro()" data-bs-toggle="collapse"
                            data-bs-target="#cadastro" aria-expanded="true" aria-controls="cadastro">
                            <i class="fas fa-user-plus"></i>
                            Cadastro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link form-user" href="#login" onclick="login()" data-bs-toggle="collapse"
                            data-bs-target="#login" aria-expanded="false" aria-controls="login">
                            <i class="fas fa-sign-in-alt"></i>
                            Login</a>
                    </li>
                </ul>

                <div>
                    <div class="collapse collapse-horizontal" id="cadastro">
                        <div class="container-fluid">
                            @include('index.cadastro')
                        </div>
                    </div>

                    <div class="collapse collapse-horizontal" id="login">
                        <div class="container-fluid">
                            @include('index.login')
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- sobre como o simulador funciona --}}
        <div class="row passos">
            <div class="col-12">
                <h2>Como funciona o Simulador SISU VEMMED?</h2>
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

        {{-- accordion com informações adicionais sobre o sisu --}}
        <div class="row duvidas">

            <div class="col-12">
                <h2>Tudo sobre o SISU!</h2>
            </div>

            <div class="col-12">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                O que é o SISU?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                O Sistema de Seleção Unificada (SiSU) é um programa criado pelo MEC que viabiliza o
                                ingresso de estudantes nas melhores universidades públicas do País. Com base na nota do
                                Enem, o SiSU oferece vagas em diferentes modalidades de concorrência e em diversas
                                universidades. Existem as notas de corte do SiSU, que indicam ao candidato o quanto ele
                                precisa tirar para conseguir uma vaga em seu curso desejado. Cada instituição de ensino
                                pode adotar pesos diferentes para cada área do conhecimento do Enem ou, até mesmo, notas
                                mínimas.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Como funciona o SISU?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                A inscrição do Sisu abre duas vezes ao ano, no início de cada semestre. Elas ficam
                                abertas durante três dias e você pode alterar as opções de curso e faculdade durante
                                este período. No final de cada dia, o sistema é atualizado e você pode ver qual a
                                probabilidade de ingressar nas opções selecionadas. Caso seja aprovado em uma das opções
                                escolhidas, você deixa a lista de espera. Por isso, é fundamental pensar bem nas suas
                                escolhas de curso.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Quem pode se inscrever no SISU?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Para se inscrever no Sisu é necessário já ter se formado no Ensino Médio, realizar o
                                Enem da última edição e não zerar a redação. Um ponto importante é que algumas
                                instituições exigem notas mínimas para inscrição em seus cursos, então fique de olho.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Como fazer a inscrição no SISU?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                A inscrição é feita pelo <a href="https://acessounico.mec.gov.br/"
                                    target="_blank">site oficial do Sisu</a> , informações necessárias:
                                <ul>
                                    <li>CPF</li>
                                    <li>Senha do Enem</li>
                                    <li>Opções de curso e instituição</li>
                                </ul>
                                Após confirmar sua inscrição, você irá para a tela Minha inscrição e poderá conferir as
                                informações da opção escolhida, com a possibilidade de alterar suas opções durante o
                                período de inscrições.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Como o Simulador SISU pode me ajudar?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Vamos confessar que quando sai a nota do Enem ficamos ansiosos para saber se vamos ser
                                aprovados ou não na faculdade dos sonhos. Então para aliviar essa ansiedade, o simulador
                                atua entre a liberação da nota do enem e abertura das inscrições para o Sisu. Ele
                                utiliza a sua nota do Enem e compara com a nota de corte do Sisu 2022, estipulando a
                                probabilidade de você ser aprovado no Sisu 2023!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- footer --}}
    @include('layouts.base.footer')

    {{-- js bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    {{-- colapso do cadastro deve estar aparecendo ao abrir tela --}}
    <script>
        document.getElementById("cadastro").classList.add("show");

        function cadastro() {
            document.getElementById("login").classList.remove("show");
        }

        function login() {
            document.getElementById("cadastro").classList.remove("show");
        }
    </script>
    {{-- <!-- Meta Pixel Code --> --}}
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '525431748084092');
        fbq('track', 'PageView');
    </script>

    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=525431748084092&ev=PageView&noscript=1" />
    </noscript>
    {{-- <!-- End Meta Pixel Code --> --}}
</body>

</html>
