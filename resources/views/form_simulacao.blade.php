<div class="col-12 col-md-12 mb-3" id="simular">
    <h4>Preencha o formulário e faça a sua simulação</h4>
</div>

<div class="form-floating col-12 col-md-2 mb-3">
    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
      <option selected>Selecione...</option>
      <option value="1">Ampla Concorrência</option>
      <option value="2">Cotas</option>
    </select>
    <label for="floatingSelect">Modalidade</label>
</div>

<div class="form-floating col-12 col-md-2 mb-3">
    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
      <option selected>Selecione...</option>
      
      @foreach ($estados as $estado)
        <option value="{{$estado}}">{{$estado}}</option>
      @endforeach

    </select>
    <label for="floatingSelect">Estado</label>
</div>

<div class="form-floating col-12 col-md-4 mb-3">
    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
      <option selected>Selecione até 3</option>
      
      @foreach ($faculdades as $faculdade)
        <option value="{{$faculdade->id}}">
            {{$faculdade->nome}}
        </option>
      @endforeach

    </select>
    <label for="floatingSelect">Faculdades</label>
</div>

<div class="col-6 mb-3">
    <a href="" class="btn btn-warning btn-lg" style="width: 100%">Simular</a>
</div>

{{-- <div class="form-floating col-12 col-md-4 mb-3">
    <select class="form-select" aria-label="Default select example" multiple>
        <option selected>Selecione</option>
        @foreach ($faculdades as $faculdade)
            <option value="{{$faculdade->id}}">
                {{$faculdade->nome}}
            </option>
        @endforeach
  </select>
</div> --}}