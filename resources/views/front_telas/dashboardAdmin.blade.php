<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Simulador Sisu Vemmed</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="shortcut icon" href="{{asset('imagens/logo_clara.png')}}" type="image/x-icon">
    </head>

    <style>

        body{
            background-color: #f5f5f5;
        }

        table{
            
        }

        .acoes{
            display: flex;
            justify-content: center;
        }
    </style>

    <body>
        @include('front_telas.nav')


        <table class="table container">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->telefone}}</td>
                    <td class="acoes">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu">
                            <li><a class="dropdown-item" href="#"> <i class="fas fa-download"></i> Exportar Dados</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-trash"></i> Excluir Usuário</a></li>
                        </ul>
                        {{-- <a href="{{route('deletar', $user->id)}}" class="btn btn-danger">Deletar</a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


        @include('front_telas.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    </body>

    <script>
    </script>

</html>
