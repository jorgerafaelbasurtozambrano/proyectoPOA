<form>
  <div class="form-row" styles="font-size=5">
    <div class="form-group col-md-12">
      <label for="periodo" class="tipoll">PERIODO</label>
      <input style="width:100%;height:30px;" type="periodo" class="form-control" id="periodos" name="periodos" placeholder="periodo">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="fecha_i" class="tipoll">FECHA INICIO</label>
      <input class="form-control tipoll" style="width:100%;height:30px;" type="date" id="fipe" name="fechainicio" min="" max="">
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="fecha_final" class="tipoll">FECHA FIN</label>
      <input style="width:100%;height:30px;" type="date" id="ffpe"  class="form-control tipoll" name="fechafinal" min="" max="">
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="fecha_final" class="tipoll">ESTADO</label>
      <select id="estados" class="form-control tipoll">
        <option value="1">HABILITADO</option>
        <option value="0">DESHABILITADO</option>
      </select>
    </div>
  </div>
</form>
