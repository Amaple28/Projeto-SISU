<!doctype html>
<html lang="pt-br">
@include('layouts.base.base')

<style>
    @include('layouts.css.faculdades');
</style>

<body>
    @include('layouts.base.nav')
    @include('layouts.base.flash-message')

    <div class="header">
        <h2>Gerenciar Faculdades</h2>
        <a class="btn btn-warning grande" data-bs-toggle="modal" data-bs-target="#adicionarFaculdadeModal" id="" onclick="yourAddFaculdade()">
            <i class="fas fa-plus"></i>
            Adicionar Faculdade
        </a>
        <a class="btn btn-warning pequeno" data-bs-toggle="modal" data-bs-target="#adicionarFaculdadeModal" id="" onclick="yourAddFaculdade()">
            <i class="fas fa-plus fa-2xs"></i>
        </a>
    </div>

    {{-- criar tabela que cria paginação automaticamente com os dados do banco de dados e botões de ação para editar e excluir --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col" style="width:60%;">Nome</th>
                            <th scope="col">Estado</th>
                            <th scope="col">2022</th>
                            <th scope="col">2023</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($faculdades as $faculdade)
                        <tr>
                            <td>{{ $faculdade->nome }} - {{ $faculdade->endereco }}</td>
                            <td>{{ $faculdade->estado }}</td>
                            <td>{{ $faculdade->getsisu_anterior() }}</td>
                            <td>{{ $faculdade->getsisu_atual() }}</td>

                            <td class="acoes">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu">
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editFaculdadeModalDetalhes{{$faculdade->id}}" id="" onclick="yourEditFaculdadeDetalhes(this)"> <i class="fas fa-edit"></i>
                                            Editar Faculdade
                                        </button>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#excluirFaculdade{{$faculdade->id}}" onclick="deleteFaculdade(this)" id="">
                                            <i class="fas fa-trash"></i> Excluir Faculdade</a>
                                        </button>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <div class="modal fade" id="editFaculdadeModalDetalhes{{$faculdade->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Editar Faculdade</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="get" action="{{route('salvar-pesos')}}">
                                        <div class="modal-body">
                                            @csrf

                                            @include('edit_faculdade')
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning">Salvar Alterações</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="excluirFaculdade{{$faculdade->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Excluir Faculdade</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="get" action="{{route('deletar-faculdade')}}">
                                        <div class="modal-body">
                                            @csrf
                                            <h6>
                                                Tem certeza que deseja excluir esta faculdade?
                                            </h6>
                                            <input type="hidden" name="id" value="{{$faculdade->id}}">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach





                    </tbody>
                </table>

                <div class="modal fade" id="adicionarFaculdadeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Adicionar Faculdade</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="get" action="{{route('adicionar-faculdade')}}">
                                <div class="modal-body">
                                    @csrf

                                    @include('add_faculdade')
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning">Adicionar Faculdade</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="card-footer">
            {{ $faculdades->links() }}
        </div>



        @include('layouts.base.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
        <script>
            function deleteFaculdade(element) {
                const id = element.id;
                const url = "{{route('deletar-faculdade')}}";
                const deleteModal = document.getElementById('excluirFaculdade');
                const userId = deleteModal.querySelector('input[name="id"]');

                userId.value = id;

            }

            function yourEditFaculdadeDetalhes(element) {

                const id = element.id;
                const url = "{{route('editar-pesos')}}"

                const editModal = document.getElementById('editFaculdadeModalDetalhes');

                const faculdadeId = editModal.querySelector('input[name="id"]');

                console.log(id);
                console.log(userId)

                userId.value = id;

            }

            const yourAddFaculdade = async (element) => {

                const url = "{{route('adicionar-faculdade')}}"
                const data = await getData(url);
                const editModal = document.getElementById('adicionarFaculdadeModal');

            }
            // 



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

</body>



</html>