<div class="modal fade" id="insert_meta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg-2">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">META</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>META</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <br />
            <form data-parsley-validate class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">DESCRIPCION<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea style="width:100%;height:100px;resize:none;" id="name_meta" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> FECHA INICIO <span class="required">*</span></label>
              <div class='col-sm-6'>
                <div class="form-group">
                  <div class='input-group date'>
                    <input  style="width:100%;height:30px;" type="date" id="fecha_i_meta" class="form-control" name="fechainicio" min="" max="" value="">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">FECHA FIN <span class="required">*</span></label>
              <div class='col-sm-6'>
                <div class="form-group">
                  <div class='input-group date'>
                    <input  style="width:100%;height:30px;" type="date" id="fecha_f_meta" class="form-control" name="fechafinal" min="" max="">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">VALOR<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="name_valor" class="form-control col-md-7 col-xs-12 validar">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">OBSERVACION <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea style="resize:none;"  id="name_observacion" class="form-control" rows="3" placeholder="OBSERVACION"></textarea>
              </div>
            </div>

            <input type="hidden" id="name_reponsable" class="form-control" name="reponsable" value={{ Auth::user()->name }}>
            <input type="hidden" id="periodo" class="form-control" name="reponsable" value={{ Auth::user()->name }}>

          </form>
          </div>
          </div>
        </div>
        </div>

      </div>
      <div class="modal-footer">
        <button value="new" id="add_meta" class="btn btn-primary tipoll" type="button">GUARDAR</button>
      </div>
    </div>
  </div>
</div>
