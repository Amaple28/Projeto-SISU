<style>
@include('layouts.css.nav');
</style>

<nav class="navbar navbar-light bg-warning">
    <div class="container-fluid">

        <div>
            <a class="navbar-brand" href="#">
                <h5>SISU VEMMED</h5>
            </a>
        </div>

        @if(Auth::check())
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
            aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if(!empty($user))
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h6 class="offcanvas-title" id="offcanvasDarkNavbarLabel">{{$user->name}}</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>

            <div class="offcanvas-body body-nav">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @if($user->tipo_user == 1)

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin')}}">
                            <i class="fas fa-home"></i>
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('users')}}">
                            <i class="fas fa-user-cog"></i>
                            Usuários
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">
                            <i class="fas fa-clipboard-list"></i>
                            Simulação
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('faculdades')}}">
                            <i class="fas fa-graduation-cap"></i>
                            Faculdades
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('notas')}}">
                            <i class="fas fa-edit"></i>
                            Notas Sisu 2023
                        </a>
                    </li>

                    @else
                    <li class="nav-item">
                        <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            id="{{$user->id}}" href="#" onclick="yourEditNavuser(this)">
                            <i class="fas fa-edit"></i>
                            Editar Dados
                        </button>
                    </li>

                    <li class="nav-item">
                    <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#deletarUser"
                            id="{{$user->id}}" href="#" onclick="yourDeleteUser(this)">
                            Excluir Conta
                        </a>
                    </li>
                    @endif


                    <li class="nav-item">
                        <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleSenha"
                            id="{{$user->id}}" href="#" onclick="yourEditSenhauser(this)">
                            <i class="fas fa-lock"></i>
                            Trocar Senha
                        </button>
                    </li>

                    <li>
                        <hr class="divider">
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">
                            <i class="fas fa-sign-out-alt"></i>
                            Sair
                        </a>
                    </li>
                </ul>

            </div>
        </div>

        @else
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h6 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Olá, Visitante</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
        </div>
        @endif
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="get" action="{{route('editar-usuario')}}">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="{{$user->name}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="telefone">Telefone:</label>
                                <input type="text" class="form-control" name="telefone" id="telefone"
                                    placeholder="{{$user->telefone}}"
                                    oninput="this.value = this.value.replace(/\D/g, '').replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');">
                            </div>
                            <input type="hidden" name="id" value="{{$user->id}}">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Salvar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleSenha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="get" action="{{route('editar-senha-usuario')}}">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="password_atual">Digite sua senha atual:</label>
                                <input type="password" class="form-control" name="password_atual" id="password_atual"
                                    placeholder="">
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Digite sua nova senha:</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="">
                            </div>

                            <div class="form-group mb-3">
                                <label for="password_confirmation">Digite sua nova senha:</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" placeholder="">
                            </div>

                            <input type="hidden" name="id" value="{{$user->id}}">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Salvar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deletarUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="get" action="{{route('deletar-usuario')}}">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="password_atual">Tem certeza que gostaria de excluir sua conta?(Digite sua senha para confirmar)</label>
                                
                                <input type="password" class="form-control" name="password_atual" id="password_atual"
                                    placeholder="">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Salvar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</nav>

<script>
const yourEditNavuser = async (element) => {

    const id = element.id;
    const url = "{{route('editar-usuario')}}"

    const editModal = document.getElementById('deletarUser');

    const userId = editModal.querySelector('input[name="id"]');

    userId.value = id;

}

const yourDeleteUser = async (element) => {

    const id = element.id;
    const url = "{{route('deletar-usuario')}}"

    const editModal = document.getElementById('exampleSenha');

    const userId = editModal.querySelector('input[name="id"]');

    userId.value = id;

}

const yourEditSenhauser = async (element) => {

const id = element.id;
const url = "{{route('editar-senha-usuario')}}"

const editModal = document.getElementById('exampleSenha');

const userId = editModal.querySelector('input[name="id"]');

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