<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Simulador Sisu Vemmed</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="shortcut icon" href="{{asset('imagens/logo_clara.png')}}" type="image/x-icon">
    </head>

    <style>
        .row{
            margin-top: 20px;
            justify-content: center;
            align-items: center;
        }

        .nota_corte{
            font-weight: bold;
            padding: 20px;
        }
    </style>

    <body>
        @include('front_telas.nav')
        @include('flash-message')

        
        <div class="container-fluid text-center">
            <div class="row">
              
                @include('front_telas.form_simulacao')

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
              
                @include('front_telas.cards_simulacao')

                <div class="col-12 mb-3">
                    <h3>Demais Faculdades</h3>
                </div>
               
            </div>
        </div>


        @include('front_telas.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script>
        </script>
    </body>
</html>
