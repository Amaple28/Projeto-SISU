
<style>
 .nota{
      background-color: #000;
      border-radius: 10%;
      color: #fff;
      margin: 1%;
      padding-left: 0;
      padding-right: 0;
    }

    .nota p{
      font-size: 1rem !important;
    }

    .nota input{
      font-size: 1rem !important;
      text-align: center;
      width: 100%;
    }

    .notas{
      justify-content: space-around;
    }

    span{
      font-size: 0.8rem;
    }
</style>


  <h2>SIMULADOR SISU MED</h2>
  <br>
  <p>Com o SIMULADOR SISU MED você usa o resultado do Enem e confere suas chances de aprovação na faculdade dos seus sonhos!</p>
  <hr>
  <h4>Preencha as suas notas abaixo:</h4>
    
  <!--formulario para preencher as notas do enem-->
  <div class="row notas">
    <div class="col-6 col-sm-4 nota" style="background-color: #FF5757;">
      <p>Matemática</p>
      <input type="number" class="form-control resultado" id="matematica" name="matematica" min="0" max="1000" step="0.1" placeholder="000.0">
    </div>

    <div class="col-6 col-sm-4 nota"  style="background-color: #FFBD59;">
      <p>C. Humanas</p>
      <input type="number" class="form-control resultado" id="humanas" name="humanas" min="0" max="1000" step=".1"  placeholder="000.0">
    </div>

    <div class="col-6 col-sm-4 nota"  style="background-color: #7ED957;">
      <p>C. Natureza</p>
      <input type="number" class="form-control resultado" id="natureza" name="natureza" min="0" max="1000" step=".1"  placeholder="000.0">
    </div>

    <div class="col-6 col-sm-4 nota"  style="background-color: #FF66C4;">
      <p>Linguagens</p>
        <input type="number" class="form-control resultado" id="linguagens" name="linguagens" min="0" max="1000" step=".1"  placeholder="000.0">
    </div>

    <div class="col-6 col-sm-4 nota"  style="background-color: #8C52FF;">
      <p>Redação</p>
        <input type="number" class="form-control resultado"  id="redacao" name="redacao" min="0" max="1000" step=".1"  placeholder="000.0">
    </div>
  </div>

  <span>Se já tiver uma conta, não é necessário preencher as notas. Após preencher as notas, realize o seu cadastro e faça sua simulação.</span>

<script>
const notas = document.querySelectorAll(".resultado"); 
console.log(notas);

notas.forEach(notas => {
  notas.addEventListener('change', (event) => {
    
    if(event.target.value > 1000)
    {
      event.target.value = 1000;
    }
    event.target.value= parseFloat(event.target.value).toFixed(1);
    console.log(event.target.id);

    if(event.target.id == "matematica")
    {
      document.getElementById("matematicaR").value = event.target.value;
      console.log(document.getElementById("matematicaR").value);
    }
    if(event.target.id == "humanas")
    {
      document.getElementById("humanasR").value = event.target.value;
      console.log(document.getElementById("humanasR").value);
    }
    if(event.target.id == "natureza")
    {
      document.getElementById("naturezaR").value = event.target.value;
    }
    if(event.target.id == "linguagens")
    {
      document.getElementById("linguagensR").value = event.target.value;
    }
    if(event.target.id == "redacao")
    {
      document.getElementById("redacaoR").value = event.target.value;
    }
  });
});
</script>