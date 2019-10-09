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
    <input type="hidden" id="id_area" class="form-control" name="reponsable" value={{ Auth::user()->idarea }}>
    <div class="well" style="overflow: auto">
      <div class="col-md-4">
        <label>PERIODO <span class="required">*</span></label>
        <div>
          <div>
            <div>
              <select id="busqueda_periodo" class="form-control tipoll">
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
        <label>CONSULTAR<span class="required">*</span></label>
        <div>
          <button type="button" class="btn btn-round btn-success glyphicon glyphicon-search" id="buscar_poa"></button>
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
          <h2>POA</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive" style="text-align: center;">
            <table class="table table-bordered table-striped jambo_table bulk_action" id="table_busqueda">
              <thead>
                <tr class="headings ">
                  <th style="vertical-align : middle;text-align:center;" rowspan="2" class="column-title text-center">PROYECTO</th>
                  <th style="vertical-align : middle;text-align:center;" rowspan="2" class="column-title text-center">INDICADORES</th>
                  <th style="vertical-align : middle;text-align:center;" rowspan="2" class="column-title text-center">META</th>
                  <th style="vertical-align : middle;text-align:center;" colspan=2 class="column-title text-center">PRESUPUESTO</th>
                  <th style="vertical-align : middle;text-align:center;" colspan=2 class="column-title text-center">ESTADO </th>
                </tr>
                <tr>
                  <th class="text-center">ASIGNADO</th>
                  <th class="text-center">MODIFICADOR</th>
                  <th class="text-center">PRESUPUESTO</th>
                  <th class="text-center">META</th>
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
