<!doctype html>
<html lang="pt-br">
{{-- header --}}
@include('layouts.base.base')
    
    {{-- style --}}
<link rel="stylesheet" href="{{ asset('css/simulacao.css') }}">

<body>
    {{-- navbar --}}
    @include('layouts.base.nav')

    {{-- include necessário para as mensagens de erro e sucesso --}}
    @include('layouts.base.flash-message')

    <div class="container-fluid text-center">
        <div class="row">
            {{-- div grupo whatsapp --}}
            <div class="col-md-4 grupo">
                <h5 class="m-4">Clique para entrar no grupo e receber todas as informações sobre o sisu: </h5>
                <a type="button" class="btn btn-success mt-3 mb-2" href="https://sendflow.pro/i/medsisu-geral"
                    target="_blank">
                    <i class="fab fa-whatsapp"></i>
                    Entrar no grupo
                </a>
            </div>

            {{-- form para realizar simulacao --}}
            <div class="col-12 bg-warning mb-2 nota_corte">
                <h4>Preencha o formulário e faça a sua simulação</h4>
            </div>
            @include('user.form_simulacao')

            <div class="col-12 bg-warning mb-3 nota_corte">
                <h1>Sua Média Simples: {{ $simulacao->nota_corte }}</h1>
            </div>

        </div>
    </div>

    <div class="container-fluid text-center">
        <div class="row">
            {{-- cards das faculdades escolhidas pelo user --}}
            <div class="col-12 mb-3">
                <h3>Resultado - Faculdades da sua Preferência</h3>
            </div>
            @include('user.cards_simulacao')

            {{-- cards das demais faculdades --}}
            <div class="col-12 mb-3">
                <h3>Demais Faculdades</h3>
                {{-- filtro de aprovadas e reprovadas --}}
                <div class="div_filtro">
                    <p onclick="showAprovadas(this)" class="filtro"><i class="fas fa-laugh-squint"
                            style="color:#00cc00;"></i> Aprovadas</p>
                    <p onclick="showReprovadas(this)" class="filtro"><i class="fas fa-frown" style="color:#ff3300;"></i>
                        Reprovadas</p>
                </div>
            </div>
            @include('user.cards_simulacao_demais')
        </div>
    </div>


    {{-- footer --}}
    @include('layouts.base.footer')

    {{-- scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/filter.js') }}"></script>
</body>

</html>
