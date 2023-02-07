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
        <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#adicionarFaculdadeModal"
        id="" onclick="yourAddFaculdade(this)">
            <i class="fas fa-plus"></i>
            Adicionar Faculdade
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
                            <td>{{ $faculdade->nome }}</td>
                            <td>{{ $faculdade->estado }}</td>
                            <td>{{ $faculdade->getsisu_anterior() }}</td>
                            <td>{{ $faculdade->getsisu_atual() }}</td>
                            {{-- <td> 
                                <a class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    onclick="yourJsFunction(this)" id="{{$faculdade->id}}">
                                    <i class="fas fa-edit"></i>
                                    Editar
                                </a> 

                                <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editFaculModal"
                                    id="" onclick="yourEditFaculd(this)">  
                                    <i class="fas fa-edit"></i>
                                    Editar
                                </button>
                            </td> --}}

                            <td class="acoes">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu">
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editFaculModal"
                                        id="" onclick="yourEditFaculd(this)">  <i class="fas fa-edit"></i>
                                            Editar Faculdade
                                        </button>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#excluirFacul"
                                        onclick="deleteJsFunction(this)" id="{{$faculdade->id}}"> 
                                            <i class="fas fa-trash"></i> Excluir Faculdade</a>
                                        </button>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach

                        <div class="modal fade" id="editFaculModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                        <div class="modal fade" id="excluirFacul" tabindex="-1" aria-labelledby="excluirFaculLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Excluir Faculdade</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="get" action="{{route('delete-faculdade')}}">
                                    <div class="modal-body">
                                        @csrf
                                        <h6>
                                            Tem certeza que deseja excluir esta faculdade?
                                        </h6>
                                        <input type="hidden" name="id" value="">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </tbody>
                </table>
            </div>
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

    <div class="card-footer">
        {{ $faculdades->links() }}
    </div>



    @include('layouts.base.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


</body>
<script>
const yourEditFaculd = async (element) => {
    const id = element.id;
    const url = "{{route('editar-pesos')}}"
    const data = await getData(url);
    const editModal = document.getElementById('editModalFacul');

    const faculdadeId = editModal.querySelector('input[name="id"]');

    faculdadeId.value = id;
    console.log(id);
}

const yourAddFaculdade = async (element) => {
    
    const url = "{{route('adicionar-faculdade')}}"
    const data = await getData(url);
    const editModal = document.getElementById('adicionarFaculdadeModal');

}
// const yourJsFunction = async (element) => {
//     const id = element.id;
//     const url = "{{route('editar-pesos')}}" + '/' + id;
//     console.log(url);
//     console.log(id);
//     const data = await getData(url);
//     console.log(data);

// }

const deleteJsFunction = async (element) => {
    const id = element.id;
    
    const deleteModal = document.getElementById('excluirFacul');
    const userId = deleteModal.querySelector('input[name="id"]');

    userId.value = id;

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