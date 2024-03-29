<!doctype html>
<html lang="pt-br">
{{-- header --}}
@include('layouts.base.base')
{{-- style --}}
<link rel="stylesheet" href="{{ asset('css/faculdades.css') }}">

<body>
    {{-- navbar --}}
    @include('layouts.base.nav')
    {{-- include necessario para mensagens de erro e sucesso --}}
    @include('layouts.base.flash-message')

    <div class="header">
        <h2>Cadastrar Notas 2023</h2>
    </div>

    <form method="GET" action="/editar-notas-2023">
        {{-- form para cadastrar notas do sisu de 2023 --}}
        @csrf
        <div class="container">
            <div class="row notas_admin">

                @foreach ($faculdades as $faculdade)
                    <div class="col-md-6 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">{{ $faculdade->sigla }} -
                                {{ $faculdade->endereco }} - @if ($faculdade->modalidade === 'Cotas')
                                    {{ substr($faculdade->modalidade, 0, strlen($faculdade->modalidade) - 1) }}
                                @else
                                    {{ $faculdade->modalidade }}
                                @endif
                            </span>
                            <input type="number" class="form-control resultado" placeholder="000.0"
                                aria-describedby="basic-addon1" name="{{ $faculdade->id }}"
                                @foreach ($notas_2023 as $nota)
                                @if ($nota->faculdade_id == $faculdade->id)
                                    value="{{ $nota->nota }}"
                                @endif @endforeach>
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-warning col-8 mb-3"> Salvar Alterações</button>

            </div>
        </div>
    </form>

    {{-- footer --}}
    @include('layouts.base.footer')

    {{-- scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>
<script>
    // nao permite que o usuario digite um valor maior que 1000
    const notas = document.querySelectorAll(".resultado");

    notas.forEach(notas => {
        notas.addEventListener('change', (event) => {

            if (event.target.value > 1000) {
                event.target.value = 1000;
            }
            event.target.value = parseFloat(event.target.value).toFixed(1);
        });
    });
</script>
</html>
