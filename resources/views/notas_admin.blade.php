<!doctype html>
<html lang="pt-br">
@include('layouts.base.base')

<style>
@include('layouts.css.faculdades');
</style>

<body>
    @include('layouts.base.nav')

    <div class="header">
        <h2>Cadastrar Notas 2023</h2>
    </div>

    <form action="">
        <div class="container">
            <div class="row notas_admin">
                
                @foreach ($faculdades as $faculdade)
                    <div class="col-md-6 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">{{$faculdade->nome}}</span>
                            <input type="number" class="form-control" placeholder="000.0" aria-describedby="basic-addon1">
                        </div>
                    </div>
                @endforeach

                <a href="" class="btn btn-warning col-8 mb-3"> Salvar Alterações</a>
                
            </div>
        </div>
    </form>

    @include('layouts.base.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


</body>
<script>

</script>


</html>