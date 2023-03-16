<!doctype html>
<html lang="pt-br">
{{-- header --}}
@include('layouts.base.base')
{{-- style --}}
<link rel="stylesheet" href="{{ asset('css/recuperarSenha.css') }}">

<body>
    {{-- include necessario para mensagens de erro e sucesso --}}
    @include('layouts.base.flash-message')

    {{-- form para verificar código enviado por email e alterar senha --}}
    <form action="{{ url('/nova-senha', $user->id) }}" method="POST">
        @csrf
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h6 class="card-title">Insira o código enviado no seu e-mail:</h6>
                <div class="form-floating mb-3">
                    <input required type="number" class="form-control" id="cod" name="cod">
                    <label for="codigo">Código</label>
                </div>

                <div class="form-floating  mb-3 senha">
                    <input required type="password" class="form-control" id="passwordlogin" name="senha">
                    <label for="senha">Nova Senha</label>
                    <i class="fas fa-eye" id="togglePasswordlogin"></i>
                </div>


                <input type="hidden" name="email" value="{{ $user->email }}">
                <input type="hidden" name="user" value="{{ $user->id }}">

                <button type="submit" class="btn btn-warning col-12 mb-3">Alterar senha</button>
            </div>
        </div>
    </form>
</body>

{{-- scripts --}}
<script>
    //esconder ou mostrar senha
    const togglePasswordlogin = document.querySelector('#togglePasswordlogin');
    const passwordlogin = document.querySelector('#passwordlogin');

    togglePasswordlogin.addEventListener('click', function(e) {
        const typelogin = passwordlogin.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordlogin.setAttribute('type', typelogin);

        if (this.classList.contains('fa-eye')) {
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });
</script>
