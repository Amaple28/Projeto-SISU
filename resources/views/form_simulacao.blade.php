<style>
    .faculdades{
        display: flex;
        height: 5rem;
        overflow: auto;
        flex-direction: column;
        /* deixar div bonita  */
        border: 1px solid #ced4da;
        border-radius: .25rem;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;    
    }

    .lado_direito a{
        margin-top: 5%;  
    }
    
</style>

<div class="col-12 col-md-12 mb-3" id="simular">
    <h4>Preencha o formulário e faça a sua simulação</h4>
</div>
{{-- 
<div class="form-floating col-12 col-md-2 mb-3">
    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
      <option selected>Selecione...</option>
      <option value="1">Ampla Concorrência</option>
      <option value="2">Cotas</option>
    </select>
    <label for="floatingSelect">Modalidade</label>
</div> --}}

<div class="col-12 col-md-4 mb-3 faculdades">
<label class="form-label">Selecione 3 faculdades</label>

  @foreach ($faculdades as $faculdade)
    <div class="input-group mb-2">
      <div class="input-group-text">
        <input class="form-check-input mt-0" type="checkbox" value="{{$faculdade->id}}">
      </div>
      <input type="text" class="form-control" value="{{$faculdade->nome}}" disabled>
    </div>
  @endforeach
</div>


<div class="form-floating col-12 col-md-4 mb-3 lado_direito">
  <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
    <option selected>Selecione...</option>
    
    @foreach ($estados as $estado)
      <option value="{{$estado}}">{{$estado}}</option>
    @endforeach

  </select>
  <label for="floatingSelect">Estado</label>
</div>

<div class="col-8 mb-3">
    <a href="" class="btn btn-outline-warning btn-lg" style="width: 100%">Simular</a>
</div>