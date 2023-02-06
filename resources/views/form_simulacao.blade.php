
<div class="col-12 col-md-12 mb-3" id="simular">
  <h4>Preencha o formulário e faça a sua simulação</h4>
</div>

<form action="{{route('simulacao')}}" method="get">
  @csrf
  <div class="container-fluid text-center">
    <div class="row">
    
      <div class="form-floating col-12 col-md-3 mb-3 lado_direito">
        <select class="form-select" id="floatingSelect" name="estado" aria-label="Floating label select example">
          <option selected>Selecione...</option>
          @foreach ($estados as $estado)
            <option value="{{$estado}}">{{$estado}}</option>
          @endforeach
        </select>
        <label for="floatingSelect">Estado onde cursou  E.M.:</label>
      </div>

      <div class="form-floating col-12 col-md-2 mb-3 lado_direito">
        <select class="form-select" id="floatingSelect" name="modalidade" aria-label="Floating label select example">
          <option selected>Selecione...</option>
          <option value="1">Ampla</option>
          <option value="2">Cota</option>
        </select>
        <label for="floatingSelect">Modalidade:</label>
      </div>

      <div class="col-12 col-md-7 mb-3 faculdades container">
        <h6>Selecione 3 faculdades:</h6>
        <div class="container-fluid text-center">
          <div class="row">
            @foreach ($faculdades as $faculdade)
              <div class="col-6 col-sm-4">
                <div class="input-group mb-2">
                  <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" name="faculdades[]" value="{{$faculdade->id}}">
                  </div>
                  <input type="text" class="form-control" value="{{$faculdade->nome}}" disabled>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="col-8 mb-3">
          <button type="submit" class="btn btn-outline-warning btn-lg" style="width: 100%">Simular</button>
      </div>
    
    </div>
  </div>
</form>