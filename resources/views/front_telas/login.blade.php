<style>
    .senha {
        position: relative;
    }

    .senha i {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>

<form method="post" action="/login">
    @csrf
    <div class="form-floating mb-3">
        <input required type="email" class="form-control" id="email" name='email' placeholder="name@example.com">
        <label for="email">E-mail</label>
    </div>

    <div class="form-floating  mb-3 senha">
        <input required type="password" class="form-control" id="passwordlogin" name="password" placeholder="Password">
        <label for="password">Senha</label>
        <i class="fas fa-eye" id="togglePasswordlogin"></i>
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Permanecer conectado</label>
    </div>
    <div class="mb-3 form-check">
        <a href="{{url ('/recuperar-senha')}}">Esqueci minha senha</a>
    </div>

    <button type="submit" class="btn btn-warning col-12">Entrar</button>
</form>



<script>
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