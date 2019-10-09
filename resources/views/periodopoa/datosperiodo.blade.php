<table class="table table-bordered" id="datos_periodos">
  <thead class="thead-dark bg-primary tipoll">
    <tr>
      <th scope="col">#</th>
      <th scope="col">PERIODO</th>
      <th scope="col">INICIO</th>
      <th scope="col">FIN</th>
      <th scope="col">EVALUACIONES</th>
      <th scope="col">INICIO</th>
      <th scope="col">FIN</th>
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
