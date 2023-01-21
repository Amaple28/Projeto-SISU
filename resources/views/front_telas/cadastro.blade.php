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
        <input required type="password" class="form-control" id="password" name='password' placeholder="Password">
        <label for="password">Senha</label>
        <i class="fas fa-eye" id="togglePassword"></i>
    </div>

    <div class="form-floating  mb-3">
        <input required type="text" class="form-control" id="tel" name="tel" placeholder="xx xxxx-xxxx"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
        <label for="tel">Telefone</label>
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
    
  </div>

    <button type="submit" class="btn btn-warning col-12">Cadastrar</button>
</form>


<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        if (this.classList.contains('fa-eye')) {
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });
</script>