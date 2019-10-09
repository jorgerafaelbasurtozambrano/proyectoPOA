<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>FILTRO</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <br />
    <div class="well" style="overflow: auto">
      <div class="col-md-4">
        <label>PERIODO <span class="required">*</span></label>
        <div>
          <div>
            <div>
              <select id="periodo_re1" class="form-control tipoll">
                <option selected="true" disabled="disabled">Seleccione Periodo</option>
                @foreach($pe as $p)
                  <option value={{$p->id}}> {{$p->descripcion}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <label>AREA <span class="required">*</span></label>
        <div>
          <div>
            <div>
              <select id="poa_mostrar1" class="form-control tipoll">
                <option selected="true" disabled="disabled">Seleccione Area</option>
                @foreach($areass as $ar)
                  <option value={{$ar->iddatoarea}}> {{$ar->descripcion}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <label>CONSULTAR<span class="required">*</span></label>
        <div>
          <button type="button" class="btn btn-round btn-success glyphicon glyphicon-search" id="buscar_evaluacion"></button>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
</div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>EVALUAR</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <br />
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Table design</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive" style="text-align: center;">
            <table class="table table-bordered table-striped jambo_table bulk_action" id="table_principal1">
              <thead>
                <tr class="headings ">
                  <th style="vertical-align : middle;" class="text-center" rowspan="2" class="column-title">PROYECTO</th>
                  <th style="vertical-align : middle;" class="text-center" rowspan="2" class="column-title">INDICADORES</th>
                  <th style="vertical-align : middle;" class="text-center" rowspan="2" class="column-title">META</th>
                  <th style="vertical-align : middle;" class="text-center" colspan=3 class="column-title">PRESUPUESTO</th>
                  <th style="vertical-align : middle;" class="text-center" colspan=2 class="column-title">RECURSO ASIGNADO</th>
                  <th style="vertical-align : middle;" class="text-center" colspan=2 class="column-title">ESTADO</th>
                  <th style="vertical-align : middle;" class="text-center" colspan=2 class="column-title">OBSERVACION</th>
                </tr>
                <tr>
                  <th class="text-center">VALOR</th>
                  <th class="text-center">ACEPTAR</th>
                  <th class="text-center">DENEGAR</th>
                  <th class="text-center">VALOR</th>
                  <th class="text-center">VALIDAR</th>
                  <th class="text-center">ACEPTAR</th>
                  <th class="text-center">DENEGAR</th>
                  <th class="text-center">AREA</th>
                  <th class="text-center">ADMINISTRADOR</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
</div>
