<div class="row">
	<div class="col-md-12 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>LISTA DE PROYECTOS</h2>
        <ul class="nav navbar-right panel_toolbox">
	        <li>
							<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		      </li>
        </ul>
        	<div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table class="table jambo_table table-bordered" id="lista_proyectos1">
              <thead>
                <tr>
                  <th class="text-center">#</th>
	              	<th class="text-center">DESCRIPCION</th>
	                <th class="text-center">MODIFICAR</th>
	                <th class="text-center">ELIMINAR</th>
                </tr>
              </thead>
              <tbody>
                @foreach($proyectos as $proyecto)
                  @if($proyecto['idAreaPoa']==Auth::user()->idarea)
                  <tr id="{{$proyecto['id']}}">
                    <th scope="row" class="text-center"> {{$proyecto['id']}} </th>
										<?php
										$sele=$proyecto['id'].'proyecto';
										?>

                    <td align='justify' class="text-center" id=<?php echo $sele ?>>{{$proyecto['descripcion']}}</td>
                    <td class="text-center">
											<button value="{{$proyecto['id']}}" class="btn btn-warning glyphicon glyphicon-pencil update-proyectos" type="button" name="button"></button>
                    </td>
                    <td class="text-center">
                      <form>
                      <button value="{{$proyecto['id']}}" class="btn btn-danger glyphicon glyphicon-trash delete-proyectos" type="button"></button>
                      </form>
                    </td>
                  </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
</div>
