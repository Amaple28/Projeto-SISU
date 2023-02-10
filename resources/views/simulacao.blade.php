<!doctype html>
<html lang="pt-br">
    @include('layouts.base.base')
    <link rel="stylesheet" href="{{ asset('css/simulacao.css') }}">

    <body>
        @include('layouts.base.nav')
        @include('layouts.base.flash-message')


        <div class="container-fluid text-center">
            <div class="row">

                @include('form_simulacao')

               <div class="col-12 bg-warning mb-3 nota_corte">
                    <h1>Sua Média Simples: {{$simulacao->nota_corte}}</h1>
               </div>

            </div>
        </div>

        <div class="container-fluid text-center">
            <div class="row">

                <div class="col-12 mb-3">
                    <h3>Resultado - Faculdades da sua Preferência</h3>

                    {{-- <span class="span text-muted mb-3">
                        **A nota de corte de 2023 é uma estimativa, podendo sofrer alterações.
                    </span> --}}
                </div>

                @include('cards_simulacao')

                <div class="col-12 mb-3">
                    <h3>Demais Faculdades</h3>

                    @if($user->tipo_user == 1)
                        <div class="div_filtro">
                            <p onclick="adicionarClasse('aprovado')" class="filtro"><i class="fas fa-laugh-squint" style="color:#00cc00;"></i> Aprovadas</p>
                            <p onclick="adicionarClasse('reprovado')" class="filtro"><i class="fas fa-frown" style="color:#ff3300;"></i> Reprovadas</p>
                        </div>
                    @endif
                </div>
                @include('cards_simulacao_demais')
            </div>
        </div>




        @include('layouts.base.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="{{asset('js/filter.js')}}"></script>
    </body>
</html>
