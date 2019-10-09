<table class="table table-bordered" id="eva_metas">
  <thead class="thead-dark tipoll bg-primary">
    <tr>
      <th scope="col">id</th>
      <th scope="col">EVALUACION</th>
      <th scope="col">INICIO</th>
      <th scope="col">FIN</th>
      <th scope="col">PORCENTAJE</th>
    </tr>
  </thead>
  <tbody>
    @foreach($evaluaciones as $eval)
      @foreach($eval->evaluacionpoas as $evaluaci)
        <tr>
          <th>{{$evaluaci['id']}}</th>
          <th>
            <?php
              echo ("Trimestre {$evaluaci['numero']}");
            ?>
          </th>
          <th>
            <?php
                 $fent=strtotime($evaluaci['fecha_inicio']);
                 $anio=date("Y", $fent);
                 $mes=date("m", $fent);
                 $dia=date("d", $fent);
                 echo "$anio-$mes-$dia";
              ?>
          </th>
          <th>
            <?php
                 $fent=strtotime($evaluaci['fecha_fin']);
                 $anio=date("Y", $fent);
                 $mes=date("m", $fent);
                 $dia=date("d", $fent);
                 echo "$anio-$mes-$dia";
              ?>
          </th>
          <th id={{$evaluaci['id']}}>

          </th>
        </tr>
      @endforeach
    @endforeach
  </tbody>
</table>
