{{-- style --}}
<link rel="stylesheet" href="{{ asset('css/cards.css') }}">

{{-- cards demais faculdades --}}
@if (isset($faculdades_demais))
    @foreach ($faculdades_demais as $faculdade)
        @if ($faculdade->getsisu_atual() == 0)
            {{-- se o sisu atual for 0, mostra o card com a nota de corte anterior primeiro --}}
            <div class="full-card col-10 mb-3">
                <div class="pagination">
                    <a data-bs-toggle="collapse" href="#collapsecard{{ $faculdade->id }}" role="button"
                        aria-expanded="false"
                        aria-controls="collapsecard{{ $faculdade->id }} collapsecard2{{ $faculdade->id }}">
                        <i class="fas fa-circle fa-2xs"></i>
                    </a>

                    <a data-bs-toggle="collapse" href="#collapsecard2{{ $faculdade->id }}" role="button"
                        aria-expanded="false"
                        aria-controls="collapsecard2{{ $faculdade->id }} collapsecard{{ $faculdade->id }}">
                        <i class="fa-regular fa-circle fa-2xs"></i>
                    </a>
                </div>
                {{-- card 1 --}}
                <div class="collapse show" id="collapsecard{{ $faculdade->id }}">
                    <div
                        {{-- se a nota de corte for 0 add classe zerada, se o calculo for menor que a nota de corte add classe reprovado, se for maior add classe aprovado --}}
                        class="card d-show
                        @if ($faculdade->getsisu_anterior() <= 100) zerada
                        @elseif (!$faculdade->getCalculoAnterior($user->id, $estado)) reprovado
                        @else aprovado @endif
                    ">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $faculdade->estado }} - {{ $faculdade->nome }}
                                {{ $faculdade->endereco }} ({{ $faculdade->modalidade }})</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2022:
                                {{ $faculdade->getsisu_anterior() }} *</h6>
                            
                            <div class="quadro_resultado">
                                <div class="col-12">
                                    <p class="text-muted chances">
                                        @if (!$faculdade->getCalculoAnterior($user->id, $estado))
                                            <i class="fas fa-long-arrow-alt-down"></i>
                                            Nota final abaixo da nota de corte. <b>Sua nota:
                                                {{ $faculdade->getCalculaNotaUserFacul($user->id, $estado) }}</b>
                                            <i class="fas fa-frown"></i>
                                        @elseif ($faculdade->getsisu_anterior() <= 100)
                                            Nota de Corte Zerada
                                        @else
                                            <i class="fas fa-long-arrow-alt-up"></i>
                                            Nota final acima da nota de corte. <b>Sua nota:
                                                {{ $faculdade->getCalculaNotaUserFacul($user->id, $estado) }}</b>
                                            <i class="fas fa-laugh-squint"></i>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- card 2 --}}
                <div class="collapse" id="collapsecard2{{ $faculdade->id }}">
                    <div
                    {{-- se a nota de corte for 0 add classe zerada, se o calculo for menor que a nota de corte add classe reprovado, se for maior add classe aprovado --}}
                        class="card
                        @if ($faculdade->getsisu_atual() <= 100) zerada
                        @elseif (!$faculdade->getCalculoAtual($user->id, $estado)) reprovado
                        @else aprovado @endif
                    ">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $faculdade->estado }} - {{ $faculdade->nome }}
                                {{ $faculdade->endereco }} ({{ $faculdade->modalidade }})</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2023:
                                {{ $faculdade->getsisu_atual() }} *</h6>
                            
                            <div class="quadro_resultado">
                                <div class="col-12">
                                    <p class="text-muted chances">
                                        @if (!$faculdade->getCalculoAtual($user->id, $estado))
                                            <i class="fas fa-long-arrow-alt-down"></i>
                                            Nota final abaixo da nota de corte. <b>Sua nota:
                                                {{ $faculdade->getCalculaNotaUserFacul($user->id, $estado) }}</b>
                                            <i class="fas fa-frown"></i>
                                        @elseif ($faculdade->getsisu_atual() <= 100)
                                            Nota de Corte Zerada
                                        @else
                                            <i class="fas fa-long-arrow-alt-up"></i>
                                            Nota final acima da nota de corte. <b>Sua nota:
                                                {{ $faculdade->getCalculaNotaUserFacul($user->id, $estado) }}</b>

                                            <i class="fas fa-laugh-squint"></i>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- se o sisu atual for diferente de 0 mostra ele primeiro --}}
            <div class="full-card col-10 mb-3">
                <div class="pagination">
                    <a data-bs-toggle="collapse" href="#collapsecard2{{ $faculdade->id }}" role="button"
                        aria-expanded="false"
                        aria-controls="collapsecard2{{ $faculdade->id }} collapsecard{{ $faculdade->id }}">
                        <i class="fa-regular fa-circle fa-2xs"></i>
                    </a>

                    <a data-bs-toggle="collapse" href="#collapsecard{{ $faculdade->id }}" role="button"
                        aria-expanded="false"
                        aria-controls="collapsecard{{ $faculdade->id }} collapsecard2{{ $faculdade->id }}">
                        <i class="fas fa-circle fa-2xs"></i>
                    </a>
                </div>
                {{-- card 1 --}}
                <div class="collapse  show" id="collapsecard2{{ $faculdade->id }}">
                    <div {{-- se a nota de corte for 0 add classe zerada, se o calculo for menor que a nota de corte add classe reprovado, se for maior add classe aprovado --}}
                        class="card
                        @if ($faculdade->getsisu_atual() <= 100) zerada
                        @elseif (!$faculdade->getCalculoAtual($user->id, $estado)) reprovado
                        @else aprovado @endif
                        ">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $faculdade->estado }} - {{ $faculdade->nome }}
                                {{ $faculdade->endereco }} ({{ $faculdade->modalidade }})</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2023:
                                {{ $faculdade->getsisu_atual() }} *</h6>
                            
                            <div class="quadro_resultado">
                                <div class="col-12">
                                    <p class="text-muted chances">
                                        @if (!$faculdade->getCalculoAtual($user->id, $estado))
                                            <i class="fas fa-long-arrow-alt-down"></i>
                                            Nota final abaixo da nota de corte. <b>Sua nota:
                                                {{ $faculdade->getCalculaNotaUserFacul($user->id, $estado) }}</b>
                                            <i class="fas fa-frown"></i>
                                        @elseif ($faculdade->getsisu_atual() <= 100)
                                            Nota de Corte Zerada
                                        @else
                                            <i class="fas fa-long-arrow-alt-up"></i>
                                            Nota final acima da nota de corte. <b>Sua nota:
                                                {{ $faculdade->getCalculaNotaUserFacul($user->id, $estado) }}</b>

                                            <i class="fas fa-laugh-squint"></i>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- card2 --}}
                <div class="collapse" id="collapsecard{{ $faculdade->id }}">
                    <div {{-- se a nota de corte for 0 add classe zerada, se o calculo for menor que a nota de corte add classe reprovado, se for maior add classe aprovado --}}
                        class="card d-show
                        @if ($faculdade->getsisu_anterior() <= 100) zerada
                        @elseif (!$faculdade->getCalculoAnterior($user->id, $estado)) reprovado
                        @else aprovado @endif
                    ">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $faculdade->estado }} - {{ $faculdade->nome }}
                                {{ $faculdade->endereco }} ({{ $faculdade->modalidade }})</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2022:
                                {{ $faculdade->getsisu_anterior() }} *</h6>

                            <div class="quadro_resultado">
                                <div class="col-12">
                                    <p class="text-muted chances">
                                        @if (!$faculdade->getCalculoAnterior($user->id, $estado))
                                            <i class="fas fa-long-arrow-alt-down"></i>
                                            Nota final abaixo da nota de corte. <b>Sua nota:
                                                {{ $faculdade->getCalculaNotaUserFacul($user->id, $estado) }}</b>
                                            <i class="fas fa-frown"></i>
                                        @elseif ($faculdade->getsisu_anterior() <= 100)
                                            Nota de Corte Zerada
                                        @else
                                            <i class="fas fa-long-arrow-alt-up"></i>
                                            Nota final acima da nota de corte. <b>Sua nota:
                                                {{ $faculdade->getCalculaNotaUserFacul($user->id, $estado) }}</b>
                                            <i class="fas fa-laugh-squint"></i>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        @endif
    @endforeach
@endif
