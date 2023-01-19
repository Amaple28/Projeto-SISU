<div class="container-fluid text-center">
                <div class="row notas">
                  <!--formulario para preencher as notas do enem-->
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
</div>

<script>
const notas = document.querySelectorAll(".resultado"); 
        console.log(notas);

        notas.forEach(notas => {
        notas.addEventListener('change', (event) => {
        console.log(event.target);
        if(event.target.value > 1000)
        {
          event.target.value = 1000;
        }
          event.target.value= parseFloat(event.target.value).toFixed(1);
        });
        });
</script>