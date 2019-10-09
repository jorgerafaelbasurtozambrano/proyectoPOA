<div class="row">
	<div class="col-md-12 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>PERIODOS</h2>
        <ul class="nav navbar-right panel_toolbox">
	        <li>
							<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		      </li>
        </ul>
        	<div class="clearfix"></div>
      </div>
		<div class="col-md-5 col-sm2 col-xs-1 form-group top_search">
			<div class="input-group">
				<input  id="filtrar" type="text" class="form-control" placeholder="Buscar Periodo ejem. 2018-2019...">
				<span class="input-group-btn">
					<button class="btn btn-default" type="text">IR!</button>
				</span>
			</div>
		</div>
        <div class="x_content">
					<div class="table-responsive" style="text-align: center;">
            <table class="table jambo_table table-striped table-bordered" id="lista_periodos">
              <thead>
                <tr>
                  <th class="text-center">#</th>
	              	<th class="text-center">PERIODO</th>
	                <th class="text-center">INICIO</th>
	                <th class="text-center">FIN</th>
	                <th class="text-center">ESTADO</th>
                  <th class="text-center">ESTADO</th>
                  <th class="text-center">VISTAS</th>
                	<th class="text-center" colspan=2>ACCIONES</th>
                </tr>
              </thead>
              <tbody>
                 <?php $contador=1; ?>
                @foreach($datosperiodos as $per)
											<tr id="{{$per['id']}}">
	                    <th class="text-center" hidden scope="row" style="text-align: center;">{{$per['id']}}</th>
	                    <td class="text-center"><?php echo $contador ?></td>
	                    <td class="text-center" valign="middle">{{$per['descripcion']}}</td>
	                    <td class="text-center">
	                    <?php
	                         $fent=strtotime($per['fecha_inicio']);
	                         $anio=date("Y", $fent);
	                         $mes=date("m", $fent);
	                         $dia=date("d", $fent);
	                         echo "$anio-$mes-$dia";
	                      ?>
	                    </td>
	                    <td class="text-center">
	                    <?php
	                         $fent=strtotime($per['fecha_fin']);
	                         $anio=date("Y", $fent);
	                         $mes=date("m", $fent);
	                         $dia=date("d", $fent);
	                         echo "$anio-$mes-$dia";
	                      ?>
	                    </td>
											<?php
											$sele=$per['id'].'periodo';
											?>
	                    @if ($per['estado']=="1")
	                      <td class="text-center" id=<?php echo $sele ?>>ACTIVADO</td>
	                      <td class="text-center">
	                        <input id="{{$per['id']}}" value="{{$per['id']}}" type="checkbox" class="js-switch activar-periodo1" checked />
	                      </td>
	                    @else
	                      <td class="text-center" id=<?php echo $sele ?>>DESACTIVADO</td>
	                      <td>
	                        <input id="{{$per['id']}}" value="{{$per['id']}}" type="checkbox" class="js-switch desactivar-periodo1" />
	                      </td>
	                    @endif
	                    <td class="text-center">

												<button id="mostrar_evaluaciones" type="button" class="btn btn-primary open-modal1" value="{{$per['id']}}" data-toggle="modal" data-target=".bs-example-modal-lg">EVALUACIONES</button>
	                    </td>

	                    <td class="text-center">
	                      <button id="eliminar" class="btn btn-danger delete-periodo1 tipol glyphicon glyphicon-trash" value="{{$per['id']}}" ></button>
	                    </td>

											<td class="text-center">
												<a target="_blank" href="reporte/{{$per['id']}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
											</td>
	                  </tr>
	                  <?php $contador++; ?>
                @endforeach
              </tbody>
            </table>
					</div>
        </div>
      </div>
    </div>
</div>
