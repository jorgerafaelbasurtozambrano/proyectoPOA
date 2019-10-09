<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="meta" class="tipoll">NOMBRE DE LA META</label>
      <input type="meta"  style="width:200%;height:30px" class="form-control" id="meta" name="metas" placeholder="meta">
    </div>
  </div>
      <input type="hidden" id="reponsable" class="form-control" name="reponsable" value={{ Auth::user()->name }}>
      <input hidden type="text" id="recurso_up_me" name="name" value="">

  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="fecha_i" class="tipoll">FECHA INICIO</label>
      <input  style="width:146%;height:30px" type="date" id="fipe_meta" class="form-control" name="fechainicio">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-10">
      <label for="fecha_final" class="tipoll">FECHA FIN</label>
      <input type="date" id="ffpe_meta"  style="width:115%;height:30px" class="form-control" name="fechafinal">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-10">
      <label for="fecha_final" class="tipoll">RECURSO</label>
      <input type="text" id="recurso"  style="width:115%;height:30px" class="form-control" name="recurso">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-10">
      <label for="fecha_final" class="tipoll">OBSERVACIÓN</label>
      <input type="text" id="obersvacion"  style="width:115%;height:30px" class="form-control" name="observacion">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-10">
      <button id="guardar_meta" type="button" value="meta_add" class="btn btn-primary tipoll">GUARDAR</button>
    </div>
  </div>
