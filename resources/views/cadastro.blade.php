<link rel="stylesheet" href="{{ asset('css/cadastro.css') }}">

<form method="POST" action="/criar-usuario">
    @csrf
    <div class="form-floating mb-3">
        <input required type="text" class="form-control" id="nome" name="name" placeholder="name">
        <label for="nome">Nome</label>
    </div>

    <div class="form-floating mb-3">
        <input required type="email" class="form-control" id="email" name="email"
            placeholder="name@example.com">
        <label for="email">E-mail</label>
    </div>

    <div class="form-floating  mb-3 senha">
        <input required type="password" class="form-control" id="passwordCadastro" name='password' placeholder="Senha">
        <label for="password">Senha</label>
        <i class="fas fa-eye" id="togglePasswordCadastro"></i>
    </div>

    <div class="form-floating  mb-3">
  <input required type="text" class="form-control" id="tel" name="tel" placeholder="(xx) xxxx-xxxx"
    oninput="this.value = this.value.replace(/\D/g, '').replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');">
  <label for="tel">(DDD)WhatsApp</label>
</div>

    {{-- <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> --}}

          
    <input type="number" hidden class="form-control resultadoMatematica" id="matematicaR" name="matematicaR" min="0" max="1000" step="0.1" placeholder="000.0">    
    <input type="number" hidden class="form-control resultadoHumanas" id="humanasR" name="humanasR" min="0" max="1000" step=".1"  placeholder="000.0">
    <input type="number" hidden class="form-control resultadoNatureza" id="naturezaR" name="naturezaR" min="0" max="1000" step=".1"  placeholder="000.0">    
    <input type="number" hidden class="form-control resultadoLinguagens" id="linguagensR" name="linguagensR" min="0" max="1000" step=".1"  placeholder="000.0">
    <input type="number" hidden class="form-control resultadoRedacao"  id="redacaoR" name="redacaoR" min="0" max="1000" step=".1"  placeholder="000.0">
    
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
        <label class="form-check-label privacidade" for="flexCheckDefault">
          Li e aceito a <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Política de Privacidade</a>
        </label>
    </div>

    <button type="submit" class="btn btn-warning col-12">Cadastrar</button>
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Política de Privacidadde</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('politica_privacidade')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<script>
    const togglePasswordCadastro = document.querySelector('#togglePasswordCadastro');
    const passwordCadastro = document.querySelector('#passwordCadastro');

    togglePasswordCadastro.addEventListener('click', function(e) {
        const typelogin = passwordCadastro.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordCadastro.setAttribute('type', typelogin);

        if (this.classList.contains('fa-eye')) {
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });
</script>

<script>

    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')
    var buttons = document.querySelectorAll('.myModal')
    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>