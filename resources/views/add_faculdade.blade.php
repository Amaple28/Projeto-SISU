<div class="container">
    <div class="row">

        <h6 class="text-center">Dados da Faculdade</h6>

        <div class="form-group col-md-12 mb-3">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" value="" name="nome">
        </div>

        <div class="form-group col-md-3 mb-3">
            <label for="sigla">Sigla</label>
            <input type="text" class="form-control" id="sigla" value="" name="sigla">
        </div>

        <div class="form-group col-md-3 mb-3">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado" value="" name="estado">
        </div>

        <div class="form-group col-md-6 mb-3">
            <label for="endereco">Cidade</label>
            <input type="text" class="form-control" id="endereco" value="" name="endereco">
        </div>


        <hr class="col-12">
        <h6 class="text-center">Pesos</h6>

        <div class="form-group col-md-4">
            <label for="matematica">Matematica</label>
            <input type="number" class="form-control" id="matematica" value="" name="matematica">
        </div>

        <div class="form-group col-md-4">
            <label for="humanas">Humanas</label>
            <input type="number" class="form-control" id="humanas" value="" name="humanas">
        </div>

        <div class="form-group col-md-4">
            <label for="linguagens">Linguagens</label>
            <input type="number" class="form-control" id="linguagens" value="{{$faculdade->getPesoLinguagens()}}"
                name="linguagens">
        </div>

        <div class="form-group col-md-4">
            <label for="natureza">Natureza</label>
            <input type="number" class="form-control" id="natureza" value="" name="natureza">
        </div>

        <div class="form-group col-md-4">
            <label for="redacao">Redação</label>
            <input type="number" class="form-control" id="redacao" value="" name="redacao">
        </div>
        </hr>
        <div class="form-group col-md-4">
            <label for="nota_corte2023">Nota de Corte:</label>
            <input type="number" class="form-control" id="nota_corte" value="" name="nota_corte2023">
        </div>
        <div class="form-group col-md-4">
            <label for="nota_corte2022">Nota de Corte 2022:</label>
            <input type="number" class="form-control" id="nota_corte2022" value="" name="nota_corte2022">
        </div>


    </div>
</div>