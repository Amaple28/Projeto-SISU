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
                                <td>
                                    <button type="button"class="btn btn-outline-warning"data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card-footer">
        {{ $faculdades->links() }}
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.base.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>



<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')
    var buttons = document.querySelectorAll('.myModal')
    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>

</html>
