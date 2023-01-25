<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recuperar Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{asset('imagens/logo_clara.png')}}" type="image/x-icon">
  </head>

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
