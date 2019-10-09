<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <!--FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <scriptsrc="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <title> Reporte</title>
  </head>
  <body>
    <div>
      <div align="center">
        <h5 >GAD CHONE</h5>
        @foreach($periodos as $pe)
          <h4> PERIODO {{$pe->descripcion}} </h4>
        @endforeach
      </div>
      <div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="thead-dark tipoll bg-primary">
              <tr>
                <th rowspan="2" scope="col">AREA</th>
                <th rowspan="2" scope="col">PROYECTO</th>
                <th rowspan="2" scope="col">INDICADORES</th>
                <th rowspan="2" scope="col">META</th>
                <th rowspan="2" scope="col">PRESUPUESTO</th>
                <th rowspan="2" scope="col">RECURSO ASIGNADO</th>
                <th rowspan="2" scope="col">ESTADO</th>
                <th colspan={{$numero}} scope="col">TRIMESTRE</th>
              </tr>
              <tr>
                @foreach($periodos as $pe)
                  @foreach($pe->evaluaciones as $pes)
                    <th>{{$pes->numero}}</th>
                  @endforeach
                @endforeach
              </tr>
            </thead>
            <tbody>
              <?php $anterior=0 ?>
                @foreach ($areas as $value)
                  <tr>
                    <td rowspan= <?php echo (($value->cantidad)+$anterior+2) ?>>{{$value->descripcion}}</td>
                        @foreach ($pro_indi as $proy)
                          @if($proy->idAreaPoa==$value->iddatoarea)
                          <tr>
                              <td rowspan= <?php echo (($proy->cantidad)+1) ?>>{{$proy->descripcion}}</td>
                              @foreach($indicadores as $indi)
                                @if($indi->idProyecto==$proy->id)
                                <tr>
                                  <td>{{$indi->descripcion}}</td>
                                  <?php $encontrado=0 ?>
                                  @foreach($metas as $me)
                                    @if($encontrado==0)
                                        @if($me->id_indicador==$indi->id)

                                          <td> {{$me->descripcion}}</td>
                                          <td> {{$me->recurso}}</td>
                                          <td> 0</td>
                                          @if($me->estado==0)
                                            <td bgcolor="#eb3636">NO APROBADO</td>
                                          @elseif ($me->estado==1)
                                            <td bgcolor="#57ed7c">APROBADO</td>
                                          @endif
                                          @if($me->estado==2)
                                            <td>SIN REVISAR</td>
                                          @endif
                                          @foreach($periodos as $pe)
                                            @foreach($pe->evaluaciones as $pes)
                                              @foreach($meta_evalu as $eval)
                                                @if($eval->id_meta==$me->idmetas && $pes->id==$eval->id_evaluacion)

                                                    <td>{{$eval->porcentaje}} %</td>

                                                @endif
                                              @endforeach
                                            @endforeach
                                          @endforeach
                                          <?php $encontrado=1 ?>
                                        @endif
                                    @endif
                                  @endforeach
                                </tr>
                                @endif
                              @endforeach
                          </tr>
                          @endif
                        @endforeach
                        <?php $anterior=$value->cantidad+1 ?>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
