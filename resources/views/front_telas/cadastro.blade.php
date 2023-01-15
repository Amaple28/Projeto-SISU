<form method="POST" action="/criar-usuario">
    @csrf

    <div class="form-floating mb-3">
        <input required type="text" class="form-control" id="nome" name="name" placeholder="name">
        <label for="nome">Nome</label>
    </div>

    <div class="form-floating mb-3">
        <input required type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        <label for="email">E-mail</label>
    </div>
    
    <div class="form-floating  mb-3">
        <input required type="password" class="form-control" id="password" name="password" placeholder="Password">
        <label for="password">Senha</label>
    </div>

    <div class="form-floating  mb-3">
        <input required type="tel" class="form-control" id="tel" name="tel" placeholder="xx xxxx-xxxx">
        <label for="tel">Telefone</label>
    </div>

    {{-- <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> --}}
    <button type="submit" class="btn btn-warning col-12">Cadastrar</button>
  </form>
