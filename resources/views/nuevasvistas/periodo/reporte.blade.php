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
        <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="text-center" scope="col">#</th>
                  <th class="text-center" scope="col">PERIODO</th>
                  <th class="text-center" scope="col">INICIO</th>
                  <th class="text-center" scope="col">FIN</th>
                  <th class="text-center" scope="col">EVALUACIONES</th>
                  <th class="text-center" scope="col">INICIO</th>
                  <th class="text-center" scope="col">FIN</th>
                </tr>
              </thead>
              <tbody>
                <?php $contador=1; ?>
                @foreach($datosper as $periodo)
                  <tr>
                   <th scope="row">{{$contador}} </th>
                   <td> <a target="_blank" href="reporte/{{$periodo['id']}}">{{$periodo['descripcion']}}</a></td>
                   <td>
                        <?php
                           $fent=strtotime($periodo['fecha_inicio']);
                           $anio=date("Y", $fent);
                           $mes=date("m", $fent);
                           $dia=date("d", $fent);
                           echo "$anio-$mes-$dia";
                        ?>
                    </td>
                   <td>
                        <?php
                           $fent=strtotime($periodo['fecha_fin']);
                           $anio=date("Y", $fent);
                           $mes=date("m", $fent);
                           $dia=date("d", $fent);
                           echo "$anio-$mes-$dia";
                        ?>
                   </td>
                   <td>
                      @foreach($periodo->evaluaciones as $eva)
                        <ul>
                          {{$eva['numero']}} trimestre
                        </ul>
                      @endforeach
                    </td>
                    <td>
                       @foreach($periodo->evaluaciones as $eva)
                         <ul>
                           <?php
                           $fent=strtotime($eva['fecha_inicio']);
                           $anio=date("Y", $fent);
                           $mes=date("m", $fent);
                           $dia=date("d", $fent);
                           echo "$anio-$mes-$dia";
                           ?>
                         </ul>
                       @endforeach
                     </td>
                     <td>
                        @foreach($periodo->evaluaciones as $eva)
                          <ul>
                          <?php
                           $fent=strtotime($eva['fecha_fin']);
                           $anio=date("Y", $fent);
                           $mes=date("m", $fent);
                           $dia=date("d", $fent);
                           echo "$anio-$mes-$dia";
                           ?>
                          </ul>
                        @endforeach
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
