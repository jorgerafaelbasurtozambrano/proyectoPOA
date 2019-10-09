<div class="row">
	<div class="col-md-12 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>EVALUACIONES</h2>
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
                	<th>EVALUAR</th>
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
                  <?php $incrementador=$incrementador+1 ?>
                  @foreach($jsonmetass as $ind)
                    @if($ind->idProyecto==$pr->id)
                          <tr>
                            <td align='justify'>
                                {{$ind->descripcion}}
                            </td>
                            <td align='justify'>
                              @if($ind->obtner_metas==null)
                              @else
                                    {{$ind->obtner_metas['descripcion']}}
                              @endif
                            </td>
                            <td>
                              @if($ind->obtner_metas==null)
                              @else
                                    <button id="evaluar_meta" class="btn btn-success glyphicon glyphicon-list-alt eval_meta" value="{{$ind->obtner_metas['idmetas']}}" ></button>
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
