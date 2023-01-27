<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SIMULADOR SISU MED</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="shortcut icon" href="{{asset('imagens/logo_clara.png')}}" type="image/x-icon">
    </head>

    <style>

        body{
            background-color: #f5f5f5;
        }

        table{
            border: 1px solid #000;
        }

        .acoes{
            display: flex;
            justify-content: center;
        }

        h2{
            text-align: center;
            margin-top: 2%;

        }

        .admin{
            background-color: #fcff57;
        }

        .header{
            display: flex;
            justify-content: center;
            text-align: center;
            margin-top: 2%;
        }

        .header a{
            position: absolute;
            right : 0;
            margin-right: 2%;
        }

        .container{
            max-width: 100%;
        }

        @media(max-width: 768px){
            table{
                font-size: 0.8rem;
            }

            .header a{
                position: fixed;
                right : 0;
                bottom: 0;
                margin-right: 2%;
                margin-bottom: 2%;
                
            }
        }

        @media(max-width: 620px){
            table{
                font-size: 0.6rem;
            }
        }

        @media(max-width: 490px){
            table{
                font-size: 0.4rem;
            }
        }

        @media(max-width: 360px){
            table{
                font-size: 0.2rem;
            }
        }

        .card-footer{
            display: flex;
            justify-content: center;
            margin-bottom: 2%;
            padding-bottom: 2px;
            width: 100%;
        }

        .card-footer nav .hidden{
            display: none !important;
        }

        .card-footer nav{
            width: 100% !important;
        }

        .card-footer nav .flex{
            width: 100% !important;
        }

        .card-footer nav .flex a{
            color: #000 !important;
        }

        .card-footer nav .flex a:hover{
            color: #878a03 !important;
        }

        .card-footer nav .flex span{
            color: rgb(94, 90, 90) !important;
        }

        .card-footer nav {
            display: flex;
            justify-content: center;
            font-size:  0.8rem;
        }

    </style>

    <body>
        @include('nav')

        <div class="header">
            <h2>Gerenciar Usuários</h2>
            <a href="#" class="btn btn-warning">
                <i class="fas fa-file-export"></i>    
                Exportar Leads
            </a>
        </div>

        {{-- criar tabela que cria paginação automaticamente com os dados do banco de dados e botões de ação para editar e excluir --}}
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                @if($user->tipo_user == 1)
                                    <tr class="admin">
                                        <td> <b>Admin: </b> {{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td class="acoes">
                                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu">
                                                <li><a class="dropdown-item" href="#"> <i class="fas fa-id-card"></i> Permissões</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="#"><i class="fas fa-trash"></i> Excluir Usuário</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td class="acoes">
                                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu">
                                                <li><a class="dropdown-item" href="#"> <i class="fas fa-download"></i> Exportar Dados</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="#"> <i class="fas fa-id-card"></i> Permissões</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="card-footer">
            {{$users->links()}}
        </div>
        
        @include('footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    </body>

    <script>
    </script>

</html>
