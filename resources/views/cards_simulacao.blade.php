
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

@if(isset($faculdades_escolhidas))
    @foreach($faculdades_escolhidas as $faculdade_escolhida)
        @if($faculdade_escolhida->getCalculoAnterior($user->id, $estado))
        <div class="col-10 mb-3">
            <div class="card reprovado">
                <div class="card-body">
                    <h5 class="card-title mb-3">{{$faculdade_escolhida->estado}} - {{$faculdade_escolhida->nome}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2022: {{$faculdade_escolhida->getsisu_anterior()}}</h6> 
                    <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2023: {{$faculdade_escolhida->nota}}</h6>

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
        @endif
    @endforeach

  
        <!-- <div class="col-10 mb-3">
            <div class="card aprovado">

                <div class="card-body">
                    <h5 class="card-title mb-3"></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2022: </h6> 
                    {{-- <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2023: </h6>  --}}

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
        </div> -->
    
@endif