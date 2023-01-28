<!doctype html>
<html lang="pt-br">
    @include('layouts.base.base')

    <style>
        @include('layouts.css.simulacao');
    </style>

    <body>
        @include('layouts.base.nav')
        @include('layouts.base.flash-message')

        
        <div class="container-fluid text-center">
            <div class="row">
              
                @include('form_simulacao')

               <div class="col-12 bg-warning mb-3 nota_corte">
                    <h1>Sua Nota de Corte: {{$simulacao->nota_corte}}</h1>
               </div>

            </div>
        </div>

        <div class="container-fluid text-center">
            <div class="row">

                <div class="col-12 mb-3">
                    <h3>Resultado - Faculdades da sua Preferência</h3>
                </div>
              
                @include('cards_simulacao')

                <div class="col-12 mb-3">
                    <h3>Demais Faculdades</h3>
                </div>
               
            </div>
        </div>


        @include('layouts.base.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script>
        </script>
    </body>
</html>
