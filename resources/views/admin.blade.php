<!doctype html>
<html lang="pt-br">
@include('layouts.base.base')

<style>
@include('layouts.css.admin');
</style>

<body>
    @include('layouts.base.nav')
    @include('layouts.base.flash-message')
    @include('layouts.base.flash-message')
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
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            @if($user->tipo_user == 1)
                                <tr class="admin">
                                    <td> <b>Admin: </b> {{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td class="acoes">
                                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu">
                                            <li>
                                                {{-- <a class="dropdown-item" href="#"> <i class="fas fa-id-card"></i> Permissões</a> --}}
                                                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModalUser"
                                                onclick="yourJsFunction(this)" id="{{$user->id}}"> <i class="fas fa-id-card"></i>
                                                    Permissões
                                                </button>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#excluirUserAdmin"
                                                onclick="deleteJsFunction(this)" id="{{$user->id}}"> 
                                                    <i class="fas fa-trash"></i> Excluir Usuário</a>
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModalUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Permissão de Usuário</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="get" action="{{route('salvar-permissoes', $user->id)}}">
                                                <div class="modal-body">
                                                    @csrf

                                                    <div class="form-group">
                                                        <label for="tipo_user">Permissão:</label>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="tipo_user">
                                                            <option selected>Selecione a permissão</option>
                                                            <option value="1">Admin</option>
                                                            <option value="0">Usuário</option>
                                                    </div>
                                                    
                                                    <input type="hidden" name="id" value="{{$user->id}}">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning">Alterar Permissão</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="excluirUserAdmin" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Excluir Usuário</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="get" action="{{route('delete-user', $user->id)}}">
                                                <div class="modal-body">
                                                    @csrf

                                                    <h6>
                                                        Tem certeza que deseja excluir o usuário {{$user->name}}?
                                                    </h6>
                                                    
                                                    <input type="hidden" name="id" value="{{$user->id}}">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td class="acoes">
                                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{route('baixar-lead',$user->id)}}"> <i
                                                    class="fas fa-download"></i> 
                                                    Exportar Dados
                                                </a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                onclick="yourJsFunction(this)" id="{{$user->id}}"> <i class="fas fa-id-card"></i>
                                                    Permissões
                                                </button>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#excluirUser"
                                                onclick="deleteJsFunction(this)" id="{{$user->id}}"> 
                                                    <i class="fas fa-trash"></i> Excluir Usuário</a>
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Permissão de Usuário</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="get" action="{{route('salvar-permissoes', $user->id)}}">
                                                <div class="modal-body">
                                                    @csrf

                                                    <div class="form-group mb-3">
                                                        <label for="tipo_user">Permissão:</label>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="tipo_user">
                                                            <option selected>Selecione a permissão</option>
                                                            <option value="1">Admin</option>
                                                            <option value="0">Usuário</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <input type="hidden" name="id" value="{{$user->id}}">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning">Alterar Permissão</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="excluirUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Excluir Usuário</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="get" action="{{route('delete-user', $user->id)}}">
                                                <div class="modal-body">
                                                    @csrf

                                                    <h6>
                                                        Tem certeza que deseja excluir o usuário {{$user->name}}?
                                                    </h6>
                                                    
                                                    <input type="hidden" name="id" value="{{$user->id}}">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

<script>
const yourJsFunction = async (element) => {
    const id = element.id;
    const url = "{{route('editar-permissoes')}}" + '/' + id;
    console.log(url);
    console.log(id);
    const data = await getData(url);
    console.log(data);

}

const deleteJsFunction = async (element) => {
    const id = element.id;
    const url = "{{route('delete-user')}}" + '/' + id;
    console.log(url);
    console.log(id);
    const data = await getData(url);
    console.log(data);

}

const getData = async (url, options = {}) => {
    try {
        const response = await fetch(url, {
            method: 'GET'
        });
        const data = await response.json();

        return data;
    } catch (error) {
        console.error(error);
    }
}
</script>

</html>