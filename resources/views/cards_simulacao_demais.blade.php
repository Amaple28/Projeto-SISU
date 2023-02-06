
<style>
    @include('layouts.css.cards');
</style>
{{-- 
<div class="col-10 mb-3">
    <div class="card aprovado">

        <div class="card-body">
            <h5 class="card-title mb-3">{{$simulacao_positiva->sigla}} - {{$simulacao_positiva->nome}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2022: {{$simulacao_positiva->getsisu_anterior()}}</h6> 
            <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2023: {{$simulacao_positiva->nota}}</h6>

            <div class="quadro_resultado">
                <div class="col-12">
                    <p class="text-muted chances">
                        <i class="fas fa-long-arrow-alt-up"></i>
                        Nota final acima da nota de corte.
                        <i class="fas fa-laugh-beam"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@foreach ($faculdades as $faculdade) 
    <div class="col-10 mb-3">
        <div class="card 
        @if($user_simulacao->nota_corte >= $faculdade->getsisu_anterior())
            aprovado
        @else
            reprovado
        @endif
        ">
            <div class="card-body">
                <h5 class="card-title mb-3">{{$faculdade->sigla}} - {{$faculdade->nome}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2022: {{$faculdade->getsisu_anterior()}}</h6> 
                {{-- <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2023: {{$faculdade->getsisu_atual()}}</h6>  --}}

                <div class="quadro_resultado">
                    <div class="col-12">
                        <p class="text-muted chances">
                            <i class="fas fa-long-arrow-alt-down"></i>
                            Nota final abaixo da nota de corte.
                            <i class="fas fa-frown"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
