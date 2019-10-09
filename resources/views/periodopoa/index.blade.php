
<div class="table-responsive">
  <table class="table table-bordered" id="periodos">
    <thead class="thead-dark bg-primary tipol">
      <tr>
        <th hidden scope="col">ID</th>
        <th scope="col">#</th>
        <th scope="col">PERIODO</th>
        <th scope="col">INICIO</th>
        <th scope="col">FIN</th>
        <th scope="col">ESTADO</th>
        <th scope="col">ESTADO</th>
        <th scope="col">VISTAS</th>
        <th scope="col">ELIMINAR</th>
        <th scope="col">VER POA</th>

      </tr>
    </thead>
    <tbody>
       <?php $contador=1; ?>
      @foreach($datosperiodos as $per)
        <tr id="{{$per['id']}}">
          <th hidden scope="row" style="text-align: center;">{{$per['id']}}</th>
          <td><?php echo $contador ?></td>
          <td valign="middle">{{$per['descripcion']}}</td>
          <td>
          <?php
               $fent=strtotime($per['fecha_inicio']);
               $anio=date("Y", $fent);
               $mes=date("m", $fent);
               $dia=date("d", $fent);
               echo "$anio-$mes-$dia";
            ?>
          </td>
          <td>
          <?php
               $fent=strtotime($per['fecha_fin']);
               $anio=date("Y", $fent);
               $mes=date("m", $fent);
               $dia=date("d", $fent);
               echo "$anio-$mes-$dia";
            ?>
          </td>
          @if ($per['estado']=="1")
            <td>ACTIVADO</td>
            <td>
              <button id="activar" type="button" class="btn btn-warning activar-periodo" value="{{$per['id']}}" >X</button>
            </td>
          @else
            <td>DESACTIVADO</td>
            <td>
              <button id="desactivar" type="button" class="btn btn-primary desactivar-periodo" value="{{$per['id']}}" >✔</button>
            </td>
          @endif
          <td>
            <button id="mostrar_evaluaciones" class="btn btn-info open-modal tipol" value="{{$per['id']}}" >EVALUACIONES</button>
          </td>

          <td>
            <button id="eliminar" class="btn btn-danger delete-periodo tipol" value="{{$per['id']}}" >ELIMINAR</button>
          </td>

          <td>
            <button id="poall" class="btn btn-info open-all tipol" value="{{$per['id']}}" >VER</button>
          </td>
        </tr>
        <?php $contador++; ?>
      @endforeach
    </tbody>
  </table>
</div>
