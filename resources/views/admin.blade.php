<!doctype html>
<html lang="pt-br">
@include('layouts.base.base')

<style>
@include('layouts.css.admin');
</style>

<body class="dashboard_admin_corpo">
    @include('layouts.base.nav')
    @include('layouts.base.flash-message')
    @include('layouts.base.flash-message')
    <div class="header">
        <h2>Olá, {{$user->name}}</h2>
    </div>

    <div class="container">
        <div class="row dashboard_admin">
            <div class="col-6 mb-3 pag_dashboard">
                <a type="button" class="btn btn-outline-primary btn-lg" href="{{route('users')}}">
                    <i class="fas fa-user-cog fa-2xl p-4"></i>
                    <br>
                    Usuários
                </a>
            </div>

            <div class="col-6 mb-3 pag_dashboard">
                <a type="button" class="btn btn-outline-success btn-lg" href="{{route('notas')}}">
                    <i class="fas fa-edit fa-2xl p-4"></i>
                    <br>
                    Notas 2023
                </a>
            </div>

            <div class="col-6 mb-3 pag_dashboard">
                <a type="button" class="btn btn-outline-danger btn-lg" href="{{route('dashboard')}}">
                    <i class="fas fa-clipboard-list fa-2xl p-4"></i>
                    <br>
                    Simulação
                </a>
            </div>

            <div class="col-6 mb-3 pag_dashboard">
                <a type="button" class="btn btn-outline-dark btn-lg" href="{{route('faculdades')}}">
                    <i class="fas fa-graduation-cap fa-2xl p-4"></i>
                    <br>
                    Faculdades
                </a>
            </div>
        </div>
    </div>

    @include('layouts.base.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

<script>
</script>

</html>