<div class="container">
    <div class="row">

        <h6 class="text-center">Dados da Faculdade</h6>

        <div class="form-group col-md-12 mb-3">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome"
                value="{{$faculdade->nome}}" name="nome">
        </div>

        <div class="form-group col-md-3 mb-3">
            <label for="sigla">Sigla</label>
            <input type="text" class="form-control" id="sigla"
                value="{{$faculdade->sigla}}" name="sigla">
        </div>

        <div class="form-group col-md-3 mb-3">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado"
                value="{{$faculdade->estado}}" name="estado">
        </div>

        <div class="form-group col-md-6 mb-3">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco"
                value="{{$faculdade->endereco}}" name="endereco">
        </div>


        <hr class="col-12">
        <h6 class="text-center">Pesos</h6>

        <div class="form-group col-md-4">
            <label for="matematica">Matematica</label>
            <input type="number" class="form-control" id="matematica"
                value="{{$peso->matematica}}" name="matematica">
        </div>
        
        <div class="form-group col-md-4">
            <label for="humanas">Humanas</label>
            <input type="number" class="form-control" id="humanas"
                value="{{$peso->humanas}}" name="humanas">
        </div>
        
        <div class="form-group col-md-4">
            <label for="linguagens">Linguagens</label>
            <input type="number" class="form-control" id="linguagens"
                value="{{$peso->linguagens}}" name="linguagens">
        </div>
        
        <div class="form-group col-md-4">
            <label for="natureza">Natureza</label>
            <input type="number" class="form-control" id="natureza"
                value="{{$peso->natureza}}" name="natureza">
        </div>
        
        <div class="form-group col-md-4">
            <label for="redacao">Redação</label>
            <input type="number" class="form-control" id="redacao"
                value="{{$peso->redacao}}" name="redacao">
        </div>                                        
        
        
        <input type="hidden" name="id" value="{{$faculdade->id}}">
        
    </div>
</div>