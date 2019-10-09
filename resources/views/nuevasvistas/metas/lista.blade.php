<div class="row">
	<div class="col-md-12 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>METAS</h2>
        <ul class="nav navbar-right panel_toolbox">
	        <li>
							<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		      </li>
        </ul>
        	<div class="clearfix"></div>
        </div>
        <div class="x_content">
					<div class="table-responsive" style="text-align: center;">
            <table class="table jambo_table table-bordered" id="lista_metas">
              <thead>
                <tr>
                  <th>PROYECTO</th>
	              	<th>INDICADOR</th>
	                <th>META</th>
                	<th colspan=2>ACCIONES</th>
                  <th>ESTADO</th>
                  <th>ESTADO RECURSO</th>
                  <th>RECURSO DISPONIBLE</th>
									<th style="vertical-align : middle;" class="text-center" colspan=2 class="column-title">OBSERVACION</th>
                </tr>

              </thead>
              <tbody>
                <?php $numero_indicadores=1?>
                <?php $array = array();?>
                @foreach ($proyectos as $pr)
                @if($pr->idAreaPoa==Auth::user()->idarea)
                  @foreach($jsonmetass as $ind)
                    @if($ind->idProyecto==$pr->id)
                        <?php $numero_indicadores=$numero_indicadores+1; ?>
                    @else
                    @endif
                  @endforeach
                  <?php array_push($array, $numero_indicadores); ?>
                  <?php $numero_indicadores=1; ?>
                @endif
                @endforeach
                <?php $incrementador=0 ?>
                @foreach ($proyectos as $pr)
                  @if($pr['idAreaPoa']==Auth::user()->idarea)
									<input type="hidden" id="name_dato" value="{{$pr['idperiodo']}}">
                  <tr>
                  <?php $dato="vacio" ?>
                  <td style="vertical-align : middle;text-align:center;" rowspan={{$array[$incrementador]}}>{{$pr->descripcion}}</td>
                  <?php $incrementador=$incrementador+1 ?>
                  @foreach($jsonmetass as $ind)
                    @if($ind->idProyecto==$pr->id)
                          <tr>
                            <td align='justify'>
                                {{$ind->descripcion}}
                            </td>
														<?php
															$sele=$ind->obtner_metas['idmetas'].'metas';
														?>
                            <td align='justify' id=<?php echo $sele ?>>
                              @if($ind->obtner_metas==null)
                                <button  class="btn btn-success add-meta" value="{{$ind->id}}">
                                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                  <span class="glyphicon-class"></span>
                                </button>
                              @else
                                    {{$ind->obtner_metas['descripcion']}}
                              @endif
                            </td>
                            <td>
                              @if($ind->idProyecto==$pr->id)
                                @if($ind->obtner_metas==null)
                                @else
                                  <button value="{{$ind->obtner_metas['idmetas']}}" class="btn btn-warning glyphicon glyphicon-pencil update_meta" type="button" name="button"></button>
                                @endif
                              @endif
                            </td>
                            <td>
                              @if($ind->idProyecto==$pr->id)
                                @if($ind->obtner_metas==null)

                                @else
                                  <button id="eliminar_meta" value="{{$ind->obtner_metas['idmetas']}}" class="btn btn-danger glyphicon glyphicon-trash delete-meta" type="button"></button>
                                @endif
                              @endif
                            </td>
                              @if($ind->idProyecto==$pr->id)
                                @if($ind->obtner_metas==null)
                                <td></td>
                                @else
                                  @if($ind->obtner_metas['estado']==0)
                                  <td style="vertical-align : middle;text-align:center;"  bgcolor="#f2a8a8" >
                                    <?php echo "NO APROBADO"; ?>
                                  </td>
                                  @endif

                                  @if($ind->obtner_metas['estado']==1)
                                  <td style="vertical-align : middle;text-align:center;" bgcolor="#9fe4b0">
                                    <?php echo "APROBADO"; ?>
                                  </td>
                                  @endif

                                  @if($ind->obtner_metas['estado']==2)
                                  <td style="vertical-align : middle;text-align:center;">
                                    <?php echo "SIN REVISAR"; ?>
                                  </td>
                                  @endif
                                @endif
                              @endif
                              @if($ind->idProyecto==$pr->id)
                                @if($ind->obtner_metas==null)
                                <td></td>
                                @else
                                  @if($ind->obtner_metas['recurso_aprobado']==0)
                                  <td style="vertical-align : middle;text-align:center;" bgcolor="#f2a8a8">
                                    <?php echo "NO APROBADO"; ?>
                                  </td>
                                  @endif
                                  @if($ind->obtner_metas['recurso_aprobado']==1)
                                  <td style="vertical-align : middle;text-align:center;" bgcolor="#9fe4b0">
                                    <?php echo "APROBADO"; ?>
                                  </td>
                                  @endif
                                  @if($ind->obtner_metas['recurso_aprobado']==2)
                                  <td style="vertical-align : middle;text-align:center;">
                                    <?php echo "SIN REVISAR"; ?>
                                  </td>
                                  @endif
                                @endif
                              @endif
                            <td>
                              @if($ind->idProyecto==$pr->id)
                                @if($ind->obtner_metas==null)
                                @else
                                  <?php
                                    $valor_db=$ind->obtner_metas['recurso_modificado'];
                                    if (empty($ind->obtner_metas['recurso_modificado'])==false) {
                                      echo $valor_db;
                                    }
                                  ?>
                                @endif
                              @endif
                            </td>
														<td>
                              @if($ind->idProyecto==$pr->id)
                                @if($ind->obtner_metas==null)
                                @else
                                  <?php
                                    $valor_db=$ind->obtner_metas['observacionadminsitrador'];
                                    if (empty($ind->obtner_metas['observacionadminsitrador'])==false) {
                                      echo $valor_db;
                                    }
                                  ?>
                                @endif
                              @endif
                            </td>
                          </tr>
                    @endif
                  @endforeach
                  </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
					</div>
        </div>
      </div>
    </div>
</div>
