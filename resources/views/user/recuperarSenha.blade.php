<!doctype html>
<html lang="pt-br">
{{-- header --}}
@include('layouts.base.base')
{{-- style --}}
<link rel="stylesheet" href="{{ asset('css/recuperarSenha.css') }}">

<body>
    {{-- include necessario para mensagens de erro e sucesso --}}
    @include('layouts.base.flash-message')

    {{-- form para enviar email para recuperar senha --}}
    <form action="{{ url('/recuperacao-senha-email/') }}" method="POST">
        @csrf
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Recuperar Senha</h5>
                <p class="card-text">Para recuperar sua senha, coloque o e-mail usado para criar a conta abaixo e nos
                    informe o código enviado no seu e-mail.</p>
                <div class="form-floating mb-3">
                    <input required type="email" class="form-control" id="email" name="email"
                        placeholder="Digite aqui seu email">
                    <label for="email">E-mail</label>
                </div>
                <button type="submit" class="btn btn-warning col-12">Enviar</button>
            </div>
        </div>
    </form>
</body>
