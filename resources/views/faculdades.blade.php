<!doctype html>
<html lang="pt-br">
@include('layouts.base.base')

<style>
@include('layouts.css.faculdades');
</style>

<body>
    @include('layouts.base.nav')

    <div class="header">
        <h2>Gerenciar Faculdades</h2>
        {{-- <a href="#" class="btn btn-warning">
                <i class="fas fa-file-export"></i>    
                Exportar Leads
            </a> --}}
    </div>

    {{-- criar tabela que cria paginação automaticamente com os dados do banco de dados e botões de ação para editar e excluir --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Estado</th>
                            <th scope="col">2022</th>
                            <th scope="col">2023</th>
                            <th scope="col" style="width:13% !important"></th>
                            <th scope="col" style="width:13% !important"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($faculdades as $faculdade)
                        <tr>
                            <td>{{ $faculdade->nome }}</td>
                            <td>{{ $faculdade->estado }}</td>
                            <td>{{ $faculdade->getsisu_anterior() }}</td>
                            <td>{{ $faculdade->getsisu_atual() }}</td>
                            <td> <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    onclick="yourJsFunction(this)" id="{{$faculdade->id}}">
                                    <i class="fas fa-edit"></i>
                                    Editar
                                </button>
                            </td>
                            <td>
                                <a href="#" class="btn btn-outline-danger">
                                    <i class="fas fa-trash-alt"></i>
                                    Excluir
                                </a>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Notas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="get" action="{{route('salvar-notas', $faculdade->id)}}">
                    <div class="modal-body">
                    @csrf
                    
                        <div class="form-group">
                            <label for="nota_sisu_atual">Nota Sisu Atual:</label>
                            <input type="text" class="form-control" id="nota_sisu_atual"
                                value="{{$faculdade->getsisu_atual()}}" name="nota_sisu_atual">
                        </div>
                        <div class="form-group">
                            <label for="nota_sisu_anterior">Nota Sisu Anterior:</label>
                            <input type="text" class="form-control" id="nota_sisu_anterior"
                                value="{{$faculdade->getsisu_anterior()}}" name="nota_sisu_anterior">
                        </div>
                        <input type="hidden" name="id" value="{{$faculdade->id}}">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
                        @endforeach
                    </tbody>
                </table>
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
const yourJsFunction = async (element) => {
    const id = element.id;
    const url = "{{route('editar-notas')}}" + '/' + id;
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