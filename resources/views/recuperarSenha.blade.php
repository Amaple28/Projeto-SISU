<!doctype html>
<html lang="pt-br">
  @include('layouts.base.base')

  <body>
        <form action="{{url ('/recuperacao-senha')}}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input required type="email" class="form-control" id="email" name="email" placeholder="Digite aqui seu email">
                <label for="email">E-mail</label>
            </div>
            <button type="submit" class="btn btn-warning col-12">Enviar</button>
        </form>
  </body>
