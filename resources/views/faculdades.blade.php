<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SIMULADOR SISU MED</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="shortcut icon" href="{{asset('imagens/logo_clara.png')}}" type="image/x-icon">
    </head>

    <style>

        body{
            background-color: #f5f5f5;
        }

        table{
            border: 1px solid #000;
        }

        .acoes{
            display: flex;
            justify-content: center;
        }

        h2{
            text-align: center;
            margin-top: 2%;

        }

        .admin{
            background-color: #fcff57;
        }

        .header{
            display: flex;
            justify-content: center;
            text-align: center;
            margin-top: 2%;
        }

        .header a{
            position: absolute;
            right : 0;
            margin-right: 2%;
        }

        .container{
            max-width: 100%;
        }

        @media(max-width: 768px){
            table{
                font-size: 0.8rem;
            }

            .header a{
                position: fixed;
                right : 0;
                bottom: 0;
                margin-right: 2%;
                margin-bottom: 2%;
                
            }
        }

        @media(max-width: 620px){
            table{
                font-size: 0.6rem;
            }
        }

        @media(max-width: 490px){
            table{
                font-size: 0.4rem;
            }
        }

        @media(max-width: 360px){
            table{
                font-size: 0.2rem;
            }
        }

        .card-footer{
            display: flex;
            justify-content: center;
            margin-bottom: 2%;
            padding-bottom: 2px;
            width: 100%;
        }

        .card-footer nav .hidden{
            display: none !important;
        }

        .card-footer nav{
            width: 100% !important;
        }

        .card-footer nav .flex{
            width: 100% !important;
        }

        .card-footer nav .flex a{
            color: #000 !important;
        }

        .card-footer nav .flex a:hover{
            color: #878a03 !important;
        }

        .card-footer nav .flex span{
            color: rgb(94, 90, 90) !important;
        }

        .card-footer nav {
            display: flex;
            justify-content: center;
            font-size:  0.8rem;
        }

        /* tamanho dos botoes de editar e excluir da tabela */
        @media(max-width: 1064px){
            td a{
                font-size: 0.8rem !important;
            }
        }

        @media(max-width: 940px){
            td a{
                font-size: 0.5rem !important;
            }
        }

        @media(max-width: 760px){
            td a{
                font-size: 0.3rem !important;
            }
        }

    </style>

    <body>
        @include('nav')

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
                                    <td>{{$faculdade->nome}}</td>
                                    <td>{{$faculdade->estado}}</td>
                                    <td>{{$faculdade->getsisu_anterior()}}</td>
                                    <td>{{$faculdade->getsisu_atual()}}</td>
                                    <td>
                                        <button type="button"class="btn btn-outline-warning"data-bs-toggle="modal" data-bs-target="#exampleModal">
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
            {{$faculdades->links()}}
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

        @include('footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    </body>

    

    <script>
        var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')
var buttons = document.querySelectorAll('.myModal')
myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})
    </script>

</html>
