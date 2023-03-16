<!doctype html>
<html lang="pt-br">
{{-- header --}}
@include('layouts.base.base')
{{-- style --}}
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<body>
    {{-- navbar --}}
    @include('layouts.base.nav')
    {{-- include necessario para mensagens de erro e sucesso --}}
    @include('layouts.base.flash-message')

    <div class="header">
        <h2>Gerenciar Usuários</h2>
        {{-- opção que exporta arquivo csv com todos os leads --}}
        <a href="{{ route('baixar-leads') }}" class="btn btn-warning grande">
            <i class="fas fa-file-export"></i>
            Exportar Leads
        </a>
        <a href="{{ route('baixar-leads') }}" class="btn btn-warning pequeno">
            <i class="fas fa-file-export fa-2xs"></i>
        </a>
    </div>

    {{-- tabela que cria paginação automaticamente com os user e botões de ação para editar e excluir --}}
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
                            {{-- se o tipo do user for 1 add classe admin --}}
                            <tr @if ($user->tipo_user == 1) class="admin" @endif>
                                <td>
                                    @if ($user->tipo_user == 1)
                                        <b>Admin: </b>
                                    @endif {{ $user->name }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td class="acoes">
                                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu">
                                        <li>
                                            {{-- alterar permissão de user para admin ou vice-versa --}}
                                            <button class="dropdown-item" onclick="editUserPermission(this)"
                                                data-bs-toggle="modal" data-bs-target="#editUserPermissionModal"
                                                id="{{ $user->id }}"> <i class="fas fa-id-card"></i>
                                                Permissões
                                            </button>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            {{-- excluir user --}}
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#excluirUser" onclick="deleteJsFunction(this)"
                                                id="{{ $user->id }}">
                                                <i class="fas fa-trash"></i> Excluir Usuário</a>
                                            </button>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach

                        {{-- modal para excluir user --}}
                        <div class="modal fade" id="excluirUser" tabindex="-1" aria-labelledby="excluirUserLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Excluir Usuário</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="get" action="{{ route('delete-user') }}">
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
            </div>

            {{-- modal para editar permissão de user --}}
            <div class="modal fade" id="editUserPermissionModal" tabindex="-1"
                aria-labelledby="editUserPermissionModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Permissão de Usuário</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="get" action="{{ route('editar-permissoes') }}">
                            <div class="modal-body">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="tipo_user">Permissão:</label>
                                    <select class="form-select" aria-label="Default select example" name="tipo_user">
                                        <option selected value="">Selecione a permissão</option>
                                        <option value="1">Admin</option>
                                        <option value="0">Usuário</option>
                                    </select>
                                </div>

                                <input type="hidden" name="id" id="editUserPermissionId" value="">

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

    {{-- paginação --}}
    <div class="card-footer">
        {{ $users->links() }}
    </div>

    {{-- footer --}}
    @include('layouts.base.footer')

    {{-- scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        // ALTERAR PERMISSÃO USER
        function editUserPermission(element) {

            const id = element.id;
            const url = "{{ route('editar-permissoes') }}"

            const editModal = document.getElementById('editUserPermissionModal');

            const userId = editModal.querySelector('input[name="id"]');

            console.log(id);
            console.log(userId)

            userId.value = id;

        }

        // DELETAR USER
        const deleteJsFunction = async (element) => {
            const id = element.id;

            const deleteModal = document.getElementById('excluirUser');
            const userId = deleteModal.querySelector('input[name="id"]');

            userId.value = id;

        }
    </script>
</body>


</html>
