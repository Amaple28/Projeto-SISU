
<style>
    @include('layouts.css.cards');
</style>

{{-- <div class="col-10 mb-3">
    <div class="card reprovado">
        <div class="card-body">
            <h5 class="card-title mb-3">Universidade Federal de Minas Gerais</h5>
           <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2022: 817.22</h6> 

            <div class="quadro_resultado">
                <div class="notas_corte col-6">
                    <h6 class="card-subtitle mb-2">Notas de Corte</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">2022: 817.22</li>
                        <li class="list-group-item">2023: 817.22</li>
                    </ul>
                </div>

                <div class="col-12">
                    <p class="text-muted chances">
                        <i class="fas fa-long-arrow-alt-down"></i>
                        Chances Baixas de Aprovação
                        <i class="fas fa-frown"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@if(isset($simulacoes_positivas2023 , $simulacoes_negativas2023))
    @foreach($simulacoes_negativas2023 as $simulacao_negativa2023)
        <div class="col-10 mb-3">
            <div class="card reprovado">
                <div class="card-body">
                    <h5 class="card-title mb-3">{{$simulacao_negativa2023->getfaculdadeEstado()}} - {{$simulacao_negativa2023->getfaculdadeNome()}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2022: {{$simulacao_negativa2023->getsisu_anterior()}}</h6> 
                    {{-- <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2023: {{$simulacao_negativa2023->nota}}</h6>  --}}

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

    @foreach($simulacoes_positivas2023 as $simulacao_positiva2023)
        <div class="col-10 mb-3">
            <div class="card aprovado">

                <div class="card-body">
                    <h5 class="card-title mb-3">{{$simulacao_positiva2023->getfaculdadeEstado()}} - {{$simulacao_positiva2023->getfaculdadeNome()}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2022: {{$simulacao_positiva2023->getsisu_anterior()}}</h6> 
                    {{-- <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2023: {{$simulacao_positiva2023->nota}}</h6>  --}}

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
        </div>
    @endforeach
@endif