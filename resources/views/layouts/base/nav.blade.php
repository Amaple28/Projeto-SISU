<link rel="stylesheet" href="{{ asset('css/nav.css') }}">

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


                    <li class="nav-item mb-2">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            id="{{$user->id}}" href="#" onclick="yourEditNavuser(this)">
                            <i class="fas fa-edit"></i>
                            Dados Pessoais
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#deletarUser"
                            id="{{$user->id}}" href="#" onclick="yourDeleteUser(this)">
                            <i class="fas fa-trash"></i>
                            Excluir Conta
                        </a>
                    </li>

                    <li>
                        <hr class="divider">
                    </li>

                    <li class="nav-item mb-2">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal"
                            href="#" onclick="yourEditNavuser(this)">
                            <i class="fas fa-exclamation-circle"></i>
                            Fique Atento
                        </a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleSenha"
                            id="{{$user->id}}" href="#" onclick="yourEditSenhauser(this)">
                            <i class="fas fa-lock"></i>
                            Alterar Senha
                        </a>
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
                        <h5 class="modal-title">Dados Pessoais</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="get" action="{{route('editar-usuario')}}">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{$user->name}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Email:</label>
                                <input type="text" class="form-control" name="email" id="email" disabled
                                    value="{{$user->email}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="telefone">(DDD) WhatsApp:</label>
                                <input type="text" class="form-control" name="telefone" id="telefone"
                                    value="{{$user->telefone}}"
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
                        <h5 class="modal-title">Alterar Senha</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="get" action="{{route('editar-senha-usuario')}}">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group mb-3 senha">
                                <label for="password_atual">Digite sua senha atual:</label>
                                <input type="password" class="form-control" name="password_atual" id="password_atual"
                                    placeholder="">
                                <i class="fas fa-eye" id="togglePasswordAtual"></i>
                            </div>

                            <div class="form-group mb-3 senha">
                                <label for="password">Digite sua nova senha:</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="">
                                    <i class="fas fa-eye" id="togglePassword"></i>
                            </div>

                            <div class="form-group mb-3 senha">
                                <label for="password_confirmation">Digite sua nova senha novamente:</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" placeholder="">
                                    <i class="fas fa-eye" id="togglePasswordConfirmation"></i>
                            </div>

                            <input type="hidden" name="id" value="{{$user->id}}">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Alterar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deletarUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Excluir Conta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{route('deletar-usuario')}}">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group mb-3 senha">
                                <h6 for="password_excluir">Tem certeza que gostaria de excluir sua conta? <br>(Se sim, digite sua senha para confirmar)</h6>

                                <input type="password" class="form-control" name="password_excluir" id="password_excluir"
                                placeholder="">
                                <input type="hidden" class="form-control" value="{{$user->id}}" name="user">
                                <i class="fas fa-eye" id="togglePasswordExcluir"></i>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Informações Importantes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3 atento">
                            <h6>1. Sobre as Notas</h6>
                            <p>As notas de corte utilizadas no simulador foram obtidas através do portal <a href="https://sisu.mec.gov.br/#/relatorio#onepage" target="_blank">SISU MEC RELÁTORIOS</a> , para obter todas as informações sobre as notas utilizadas, acesse ao link e faça download dos relatórios correspondentes.</p>
                            <p>O Simulador SISUMED não garante aprovação do usuário ao processo do SISU, os seus valores tem como objetivo ser uma referência para que o usuário possa analisar as possibilidades, quem garantirá o processo de ingresso a uma universidade será a ultima nota de corte calculada pelo processo seletivo do SISU, sendo esta nota de inteira responsábilidade do Sistema de Seleção Unificada - SISU 2023.</p>
                            <h6>2. Sobre a Modalidade</h6>
                            <p>As notas de cortes apresentadas para a modalidade de cota foi obtida utilizando o critério de selecionar a maior nota de corte entre as modalidades que possuem uma maior oferta de vagas, caso deseje saber todas as notas para cada tipo de modalidade, acesso ao <a href="https://sisu.mec.gov.br/#/relatorio#onepage" target="_blank">link</a> e baixe o relatório correspondente.</p>
                            <h6>3. Sobre o Estado</h6>
                            <p>Esta informação será utilizada para cálculo do bônus regional oferecido por algumas universidades do país.</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close">Ok</button>
                    </div>
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

    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
        const typelogin = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', typelogin);

        if (this.classList.contains('fa-eye')) {
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });

    const togglePasswordConfirmation = document.querySelector('#togglePasswordConfirmation');
    const password_confirmation = document.querySelector('#password_confirmation');

    togglePasswordConfirmation.addEventListener('click', function(e) {
        const typelogin = password_confirmation.getAttribute('type') === 'password' ? 'text' : 'password';
        password_confirmation.setAttribute('type', typelogin);

        if (this.classList.contains('fa-eye')) {
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });

    const togglePasswordAtual = document.querySelector('#togglePasswordAtual');
    const password_atual = document.querySelector('#password_atual');

    togglePasswordAtual.addEventListener('click', function(e) {
        const typelogin = password_atual.getAttribute('type') === 'password' ? 'text' : 'password';
        password_atual.setAttribute('type', typelogin);

        if (this.classList.contains('fa-eye')) {
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });

    const togglePasswordExcluir = document.querySelector('#togglePasswordExcluir');
    const password_excluir = document.querySelector('#password_excluir');

    togglePasswordExcluir.addEventListener('click', function(e) {
        const typelogin = password_excluir.getAttribute('type') === 'password' ? 'text' : 'password';
        password_excluir.setAttribute('type', typelogin);

        if (this.classList.contains('fa-eye')) {
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });
</script>
