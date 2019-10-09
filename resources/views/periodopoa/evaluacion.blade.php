<form>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="trimestres" class="tipoll">NÚMERO DE EVALUACIÓN</label>
      <input  style="width:100%;height:30px;" type="trimestre" class="form-control" id="numero" name="trimestres" placeholder="#">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="fecha_final"class="tipoll">EVALUACIÓN</label>
      <select id="sele" class="tipoll">
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="fecha_i" class="tipoll">FECHA DE INICIO</label>
      <input  style="width:100%;height:30px;" type="date" id="fecha_i" class="form-control" name="fechainicio" min="" max="" value="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="fecha_final" class="tipoll">FECHA FIN</label>
      <input  style="width:100%;height:30px;" type="date" id="fecha_f" class="form-control" name="fechafinal" min="" max="">
      <div class="form-row form-group col-md-10">
        <div style="top:12px;right:2%;position: relative;">
          <button id="añadir" type="button" value="new" class="btn btn-primary tipoll">AÑADIR</button>
        </div>
      </div>
    </div>
  </div>
</form>
