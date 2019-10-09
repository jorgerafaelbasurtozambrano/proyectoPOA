<div class="modal fade" id="evaluaciones2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg-2">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">ACTUALIZAR</h4>
      </div>
      <div class="modal-body">
        <div class="x_content">
        <br />
        <form data-parsley-validate class="form-horizontal form-label-left">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">EVALUACION *</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input style="width:100%;height:30px;" type="trimestre" class="form-control" id="numero_update1" name="trimestres" placeholder="#">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> FECHA INICIO *</label>
          <div class='col-sm-6'>
            <div class="form-group">
              <div class='input-group'>
                <input style="width:100%;height:30px;" type="date" id="fecha_i_update1" class="form-control"  name="fechainicio_update" min="" max="" value="">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">FECHA FIN *</label>
          <div class='col-sm-6'>
            <div class="form-group">
              <div class='input-group'>
                <input style="width:100%;height:30px;" type="date" id="fecha_f_update1" class="form-control" name="fechafinal" min="" max="">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </form>
      </div>
      </div>
      <div class="modal-footer">
        <button id="update_evaluacion1" class="btn btn-primary tipoll" type="button">GUARDAR</button>
      </div>
    </div>
  </div>
</div>
