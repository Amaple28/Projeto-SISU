<!doctype html>
<html lang="pt-br">
@include('layouts.base.base')

<style>
@include('layouts.css.admin');
</style>

<body>
    @include('layouts.base.nav')
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
                        @foreach ($users as $key => $user)
                                <tr @if($user->tipo_user == 1)class="admin" @endif>
                                    {{-- @dump($user->name, $user->id) --}}
                                    <td> @if($user->tipo_user == 1)<b>Admin: </b> @endif {{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td class="acoes">
                                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu">
                                        <li>
                                                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                id="{{$user->id}}" onclick="yourJsFunction(this)">  <i class="fas fa-id-card"></i>
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
                                
                                
                            

                           
                               

                        @endforeach
                        <div class="modal fade" id="excluirUser" tabindex="-1" aria-labelledby="excluirUserLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Excluir Usuário</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="get" action="{{route('delete-user')}}">
                                    <div class="modal-body">
                                        @csrf
                                        <h6>
                                            Tem certeza que deseja excluir este usuário?
                                        </h6>
                                        <input type="hidden" name="id" value="">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Permissão de Usuário</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="get" action="{{route('editar-permissoes')}}">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="tipo_user">Permissão:</label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="tipo_user">
                                                <option selected value="">Selecione a permissão</option>
                                                <option value="1">Admin</option>
                                                <option value="0">Usuário</option>
                                            </select>
                                        </div>
                                        
                                        <input type="hidden" name="id" value="">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning">Alterar Permissão</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
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
    const url = "{{route('editar-permissoes')}}" 

    const editModal = document.getElementById('exampleModal');

    const userId = editModal.querySelector('input[name="id"]');

    userId.value = id;

}

const deleteJsFunction = async (element) => {
    const id = element.id;
    
    const deleteModal = document.getElementById('excluirUser');
    const userId = deleteModal.querySelector('input[name="id"]');

    userId.value = id;

}

const getData = async (url, data = {}) => {
    try {
        const response = await fetch(url, {
            method: 'GET',
            body: JSON.stringify(data)
        });
        const data = await response.json();

        return data;
    } catch (error) {
        console.error(error);
    }
}
</script>

</html>