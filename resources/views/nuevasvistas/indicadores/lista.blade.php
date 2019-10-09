<div class="row">
	<div class="col-md-12 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>INDICADORES</h2>
        <ul class="nav navbar-right panel_toolbox">
	        <li>
							<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		      </li>
        </ul>
        	<div class="clearfix"></div>
        </div>
        <div class="x_content">
					<div class="table-responsive" style="text-align: center;">
            <table class="table jambo_table table-bordered" id="lista_indicadores">
              <thead>
                <tr>
                  <th>PROYECTO</th>
	              	<th>AÑADIR</th>
	                <th>INDICADORES</th>
                	<th colspan=2>ACCIONES</th>
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
                <tr>
                  <?php $dato="vacio" ?>
                  <td style="vertical-align : middle;text-align:center;" rowspan={{$array[$incrementador]}}>{{$pr->descripcion}}</td>
                  <td rowspan={{$array[$incrementador]}} >
                    <button  class="btn btn-success add-indicador" value="{{$pr['id']}}">
                      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                      <span class="glyphicon-class"></span>
                    </button>
                  </td>

                  <?php $incrementador=$incrementador+1 ?>
                  @foreach($jsonmetass as $ind)
                    @if($ind->idProyecto==$pr->id)
                          <tr id="{{$ind['id']}}">
														<?php
														$sele=$ind['id'].'indicador';
														?>
                            <td align='justify' id=<?php echo $sele ?>>
                                {{$ind->descripcion}}
                            </td>
                            <td>
															<button value="{{$ind['id']}}" class="btn btn-warning glyphicon glyphicon-pencil update-indicador" type="button" name="button"></button>
                            </td>
                            <td>
                              <button value="{{$ind['id']}}" class="btn btn-danger glyphicon glyphicon-trash delete-indicador" type="button"></button>
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
