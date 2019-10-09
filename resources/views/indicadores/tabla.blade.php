<table class="table table-bordered">
  <thead class="thead-dark tipoll bg-primary">
    <tr>
      <th scope="col">PROYECTO</th>
      <th scope="col">AÑADIR</th>
      <th scope="col">INDICADORES</th>
      <th scope="col">MODIFICAR</th>
      <th scope="col">ELIMINAR</th>
    </tr>
  </thead>
  <tbody>
    @if($subarea==0)
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
          <td rowspan={{$array[$incrementador]}}>{{$pr->descripcion}}</td>
          <td rowspan={{$array[$incrementador]}}>
            <button id="add_" class="btn btn-info modales" value="{{$pr['id']}}" >+</button>
          </td>

          <?php $incrementador=$incrementador+1 ?>
          @foreach($jsonmetass as $ind)
            @if($ind->idProyecto==$pr->id)
                  <tr>
                    <td>
                        {{$ind->descripcion}}
                    </td>
                    <td>
                      <a href="{{action('IndicadoresController@edit', $ind['id'])}}" class="btn btn-warning">MODIFICAR</a>
                    </td>
                    <td>
                      <form action="{{url('indicador', $ind['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">ELIMINAR</button>
                      </form>
                    </td>

                  </tr>
            @endif
          @endforeach
        </tr>
        @endif
        @endforeach
    @endif


    @if($subarea==1)
        <?php $numero_indicadores=1?>
        <?php $array = array();?>
        @foreach ($proyectos as $pr)
        @if($pr->idsubarea==Auth::user()->idsubarea)
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
        @if($pr['idsubarea']==Auth::user()->idsubarea)
        <tr>
          <?php $dato="vacio" ?>
          <td rowspan={{$array[$incrementador]}}>{{$pr->descripcion}}</td>
          <td rowspan={{$array[$incrementador]}}>
            <button id="add_" class="btn btn-info modales" value="{{$pr['id']}}" >+</button>
          </td>
          
          <input type="hidden" id="id_area_" name="id_area_" value="{{ Auth::user()->idarea}}">
          <input type="hidden" id="id_subarea_" name="id_subarea_" value="{{ Auth::user()->idsubarea}}">

          <?php $incrementador=$incrementador+1 ?>
          @foreach($jsonmetass as $ind)
            @if($ind->idProyecto==$pr->id)
                  <tr>
                    <td>
                        {{$ind->descripcion}}
                    </td>
                    <td>
                      <a href="{{action('IndicadoresController@edit', $ind['id'])}}" class="btn btn-warning">MODIFICAR</a>
                    </td>
                    <td>
                      <form action="{{url('indicador', $ind['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">ELIMINAR</button>
                      </form>
                    </td>

                  </tr>
            @endif
          @endforeach
        </tr>
        @endif
        @endforeach
    @endif

  </tbody>
</table>
