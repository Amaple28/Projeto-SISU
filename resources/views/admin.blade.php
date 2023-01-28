<!doctype html>
<html lang="pt-br">
    @include('layouts.base.base')

    <style>
        @include('layouts.css.admin');
    </style>

    <body>
        @include('layouts.base.nav')

        <div class="header">
            <h2>Gerenciar Usuários</h2>
            <a href="{{route('baixar-leads')}}" class="btn btn-warning">
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
                                                <li><a class="dropdown-item" href="{{route('baixar-lead',$user->id)}}"> <i class="fas fa-download"></i> Exportar Dados</a></li>
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
        
        @include('layouts.base.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    </body>

    <script>
    </script>

</html>
