<form method="post" action="/login">
@csrf
    <div class="form-floating mb-3">
        <input required type="email" class="form-control" id="email" name='email' placeholder="name@example.com">
        <label for="email">E-mail</label>
    </div>
    
    <div class="form-floating  mb-3">
        <input required type="password" class="form-control" id="password" name='password' placeholder="Password">
        <label for="password">Senha</label>
    </div>

    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Permanecer conectado</label>
    </div>

    <button type="submit" class="btn btn-warning col-12">Entrar</button>
</form>