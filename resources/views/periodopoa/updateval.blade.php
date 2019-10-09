<div class="modal fade" id="updateval" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EVALUACION</h5>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="trimestres" class="tipoll">NÚMERO DE EVALUACIÓN</label>
              <input  style="width:207%;height:30px;" type="trimestre" class="form-control" id="numero_update" name="trimestres" placeholder="#">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-11">
              <label for="fecha_i" class="tipoll">FECHA DE INICIO</label>
              <input  style="width:109%;height:30px;" type="date" id="fecha_i_update" class="form-control"  name="fechainicio_update" min="" max="" value="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="fecha_final" class="tipoll">FECHA FIN</label>
              <input  style="width:100%;height:30px;" type="date" id="fecha_f_update" class="form-control" name="fechafinal" min="" max="">
              <div class="form-row form-group col-md-10">
                <div style="top:12px;right:2%;position: relative;">
                  <button id="update_evaluacion" type="button" class="btn btn-primary tipoll">GUARDAR</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
