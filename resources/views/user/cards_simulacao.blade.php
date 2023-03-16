{{-- style --}}
<link rel="stylesheet" href="{{ asset('css/cards.css') }}">

{{-- cards faculdades escolhidas --}}
@if (isset($faculdades_escolhidas))
    @foreach ($faculdades_escolhidas as $faculdade_escolhida)
        {{-- se o sisu atual for 0, mostra o card com a nota de corte anterior primeiro --}}
        @if ($faculdade_escolhida->getsisu_atual() == 0)
            <div class=" col-10 mb-3">

                <div class="pagination">
                    <a data-bs-toggle="collapse" href="#collapsecard{{ $faculdade_escolhida->id }}" role="button"
                        aria-expanded="false"
                        aria-controls="collapsecard{{ $faculdade_escolhida->id }} collapsecard2{{ $faculdade_escolhida->id }}">
                        <i class="fas fa-circle fa-2xs"></i>
                    </a>

                    <a data-bs-toggle="collapse" href="#collapsecard2{{ $faculdade_escolhida->id }}" role="button"
                        aria-expanded="false"
                        aria-controls="collapsecard2{{ $faculdade_escolhida->id }} collapsecard{{ $faculdade_escolhida->id }}">
                        <i class="fa-regular fa-circle fa-2xs"></i>
                    </a>
                </div>
                {{-- card1 --}}
                <div class="collapse show" id="collapsecard{{ $faculdade_escolhida->id }}">
                    <div
                        {{-- se a nota de corte for 0 add classe zerada, se o calculo for menor que a nota de corte add classe reprovado, se for maior add classe aprovado --}}
                        class="card  @if ($faculdade_escolhida->getsisu_anterior() <= 100) zerada
                        @elseif (!$faculdade_escolhida->getCalculoAnterior($user->id, $estado)) reprovado
                        @else aprovado @endif">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $faculdade_escolhida->estado }} -
                                {{ $faculdade_escolhida->nome }} {{ $faculdade_escolhida->endereco }}
                                ({{ $faculdade_escolhida->modalidade }})</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2022:
                                {{ $faculdade_escolhida->getsisu_anterior() }} *</h6>

                            <div class="quadro_resultado">
                                <div class="col-12">
                                    <p class="text-muted chances">
                                        @if (!$faculdade_escolhida->getCalculoAnterior($user->id, $estado))
                                            <i class="fas fa-long-arrow-alt-down"></i>
                                            Nota final abaixo da nota de corte. <b>Sua nota:
                                                {{ $faculdade_escolhida->getCalculaNotaUserFacul($user->id, $estado) }}</b>
                                            <i class="fas fa-frown"></i>
                                        @elseif ($faculdade_escolhida->getsisu_anterior() <= 100)
                                            Nota de Corte Zerada
                                        @else
                                            <i class="fas fa-long-arrow-alt-up"></i>
                                            Nota final acima da nota de corte. <b>Sua nota:
                                                {{ $faculdade_escolhida->getCalculaNotaUserFacul($user->id, $estado) }}</b>
                                            <i class="fas fa-laugh-squint"></i>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- card 2 --}}
                <div class="collapse" id="collapsecard2{{ $faculdade_escolhida->id }}">
                    <div
                        class="card  @if (!$faculdade_escolhida->getCalculoAtual($user->id, $estado)) reprovado @elseif($faculdade_escolhida->getsisu_atual() <= 100) zerada @else aprovado @endif">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $faculdade_escolhida->estado }} -
                                {{ $faculdade_escolhida->nome }} {{ $faculdade_escolhida->endereco }}
                                ({{ $faculdade_escolhida->modalidade }})</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2023:
                                {{ $faculdade_escolhida->getsisu_atual() }} *</h6>

                            <div class="quadro_resultado">
                                <div class="col-12">
                                    <p class="text-muted chances">
                                        @if (!$faculdade_escolhida->getCalculoAtual($user->id, $estado))
                                            <i class="fas fa-long-arrow-alt-down"></i>
                                            Nota final abaixo da nota de corte. <b>Sua nota:
                                                {{ $faculdade_escolhida->getCalculaNotaUserFacul($user->id, $estado) }}</b>
                                            <i class="fas fa-frown"></i>
                                        @elseif($faculdade_escolhida->getsisu_atual() <= 100)
                                            Nota de Corte Zerada
                                        @else
                                            <i class="fas fa-long-arrow-alt-up"></i>
                                            Nota final acima da nota de corte. <b>Sua nota:
                                                {{ $faculdade_escolhida->getCalculaNotaUserFacul($user->id, $estado) }}</b>
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
        {{-- se o sisu atual for diferente de 0  mostra o card dele primeiro --}}
            <div class=" col-10 mb-3">

                <div class="pagination">
                    <a data-bs-toggle="collapse" href="#collapsecard2{{ $faculdade_escolhida->id }}" role="button"
                        aria-expanded="false"
                        aria-controls="collapsecard2{{ $faculdade_escolhida->id }} collapsecard{{ $faculdade_escolhida->id }}">
                        <i class="fa-regular fa-circle fa-2xs"></i>
                    </a>

                    <a data-bs-toggle="collapse" href="#collapsecard{{ $faculdade_escolhida->id }}" role="button"
                        aria-expanded="false"
                        aria-controls="collapsecard{{ $faculdade_escolhida->id }} collapsecard2{{ $faculdade_escolhida->id }}">
                        <i class="fas fa-circle fa-2xs"></i>
                    </a>

                </div>

                {{-- card 1 --}}
                <div class="collapse show" id="collapsecard2{{ $faculdade_escolhida->id }}">
                    <div
                        {{-- se a nota de corte for 0 add classe zerada, se o calculo for menor que a nota de corte add classe reprovado, se for maior add classe aprovado --}}
                        class="card  @if (!$faculdade_escolhida->getCalculoAtual($user->id, $estado)) reprovado @elseif($faculdade_escolhida->getsisu_atual() <= 100) zerada @else aprovado @endif">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $faculdade_escolhida->estado }} -
                                {{ $faculdade_escolhida->nome }} {{ $faculdade_escolhida->endereco }}
                                ({{ $faculdade_escolhida->modalidade }})</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2023:
                                {{ $faculdade_escolhida->getsisu_atual() }} *</h6>

                            <div class="quadro_resultado">
                                <div class="col-12">
                                    <p class="text-muted chances">
                                        @if (!$faculdade_escolhida->getCalculoAtual($user->id, $estado))
                                            <i class="fas fa-long-arrow-alt-down"></i>
                                            Nota final abaixo da nota de corte. <b>Sua nota:
                                                {{ $faculdade_escolhida->getCalculaNotaUserFacul($user->id, $estado) }}</b>
                                            <i class="fas fa-frown"></i>
                                        @elseif($faculdade_escolhida->getsisu_atual() <= 100)
                                            Nota de Corte Zerada
                                        @else
                                            <i class="fas fa-long-arrow-alt-up"></i>
                                            Nota final acima da nota de corte. <b>Sua nota:
                                                {{ $faculdade_escolhida->getCalculaNotaUserFacul($user->id, $estado) }}</b>
                                            <i class="fas fa-laugh-squint"></i>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- card 2 --}}
                <div class="collapse" id="collapsecard{{ $faculdade_escolhida->id }}">
                    <div
                    {{-- se a nota de corte for 0 add classe zerada, se o calculo for menor que a nota de corte add classe reprovado, se for maior add classe aprovado --}}
                        class="card  @if ($faculdade_escolhida->getsisu_anterior() <= 100) zerada
                    @elseif (!$faculdade_escolhida->getCalculoAnterior($user->id, $estado)) reprovado
                    @else aprovado @endif">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $faculdade_escolhida->estado }} -
                                {{ $faculdade_escolhida->nome }} {{ $faculdade_escolhida->endereco }}
                                ({{ $faculdade_escolhida->modalidade }})</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Nota de Corte 2022:
                                {{ $faculdade_escolhida->getsisu_anterior() }} *</h6>

                            <div class="quadro_resultado">
                                <div class="col-12">
                                    <p class="text-muted chances">
                                        @if (!$faculdade_escolhida->getCalculoAnterior($user->id, $estado))
                                            <i class="fas fa-long-arrow-alt-down"></i>
                                            Nota final abaixo da nota de corte. <b>Sua nota:
                                                {{ $faculdade_escolhida->getCalculaNotaUserFacul($user->id, $estado) }}</b>
                                            <i class="fas fa-frown"></i>
                                        @elseif ($faculdade_escolhida->getsisu_anterior() <= 100)
                                            Nota de Corte Zerada
                                        @else
                                            <i class="fas fa-long-arrow-alt-up"></i>
                                            Nota final acima da nota de corte. <b>Sua nota:
                                                {{ $faculdade_escolhida->getCalculaNotaUserFacul($user->id, $estado) }}</b>
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
