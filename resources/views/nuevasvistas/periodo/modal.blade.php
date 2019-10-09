<div class="modal fade" id="evaluaciones1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">EVALUACIONES</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label">AÑADIR</label>
          <button id="ocultar1" class="btn btn-info" >+</button>
        </div>
        <br>
        <div class="x_panel">
          <div class="x_title">
            <h2>EVALUACIONES</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="table-responsive" style="text-align: center;">
              <table class="table table-striped jambo_table table-bordered table-hover" id="table_add">
                <thead>
                  <tr>
                    <th class="text-center">TRIMESTRE</th>
                    <th class="text-center">INICIO</th>
                    <th class="text-center">FIN</th>
                    <th class="text-center" colspan=2>ACCIONES</th>
                  </tr>
                </thead>
                <tbody id="evaluaciones_show">
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div id="add1">
          <div class="x_panel">
            <div class="x_title">
              <h2>EVALUACION</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              @include('nuevasvistas.periodo.evaluacion')
              <div class="form-group">
                <button id="close" class="btn btn-info" >CERRAR</button>
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
