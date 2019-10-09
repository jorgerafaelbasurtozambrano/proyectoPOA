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
        @foreach($periodo as $perid)
        <h4>
          <label> <?php echo "REPORTE PERIODO " ?></label>
          <label>{{$perid->descripcion}}</label>
        </h4>
        @endforeach
      </div>
      <div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="thead-dark tipoll bg-primary">
              <tr>
                <th scope="col">AREA</th>
                <th scope="col">PROYECTO</th>
                <th scope="col">INDICADORES</th>
                <th scope="col">META</th>
                <th scope="col">PRESUPUESTO</th>
                <th scope="col">RECURSO ASIGNADO</th>
                <th scope="col">ESTADO</th>
              </tr>
            </thead>
            <tbody>
              <?php $numero_indicadores=1?>
              <?php $array = array();?>
              @foreach ($proyectos as $pr)
                @foreach($jsonmetass as $ind)
                  @if($ind->idProyecto==$pr->id)
                      <?php $numero_indicadores=$numero_indicadores+1; ?>
                  @else
                  @endif
                @endforeach
                <?php array_push($array, $numero_indicadores); ?>
                <?php $numero_indicadores=1; ?>
              @endforeach

              @foreach($departamentos as $depar)
                <?php echo ($depar->descripcion) ?>
              @endforeach

              <?php $incrementador=0 ?>
              @foreach ($proyectos as $pr)
              <tr>
                <?php $dato="vacio" ?>
                <td rowspan={{$array[$incrementador]}} bgcolor="#57ed7c">
                @foreach($departamentos as $depar)
                  @if($depar->iddatoarea==$pr->idAreaPoa)
                    {{$depar->descripcion}}
                  @endif
                @endforeach
                </td>
                <td bgcolor="#57ed7c" rowspan={{$array[$incrementador]}}>{{$pr->descripcion}}</td>
                <?php $incrementador=$incrementador+1 ?>
                @foreach($jsonmetass as $ind)
                  @if($ind->idProyecto==$pr->id)
                      <tr>
                          <td>
                              {{$ind->descripcion}}
                          </td>

                          <td>
                            @if($ind->obtner_metas==null)
                            @else
                                  {{$ind->obtner_metas['descripcion']}}
                            @endif
                          </td>


                          <td>
                            @if($ind->idProyecto==$pr->id)
                              @if($ind->obtner_metas==null)
                              @else
                              <label>
                                <?php echo "$" ?>
                              </label>
                              <label class="lb_recurso"  id="{{$ind->obtner_metas['idmetas']}}">
                                    <?php echo $ind->obtner_metas['recurso'] ?>
                              </label>
                              @endif
                            @endif
                          </td>

                          <td>
                          @if($ind->idProyecto==$pr->id)
                            @if($ind->obtner_metas==null)
                            @else
                              @if($ind->obtner_metas['recurso_modificado']!="")
                                <label>
                                  <?php echo "$" ?>
                                </label>
                                <label>
                                  <?php echo $ind->obtner_metas['recurso_modificado'] ?>
                                </label>
                              @endif
                            @endif
                          @endif
                          </td>


                          @if($ind->idProyecto==$pr->id)
                            @if($ind->obtner_metas==null)
                            <th></th>
                            @else
                              @if($ind->obtner_metas['estado']==0)
                              <th  bgcolor="#eb3636" >
                                <?php echo "NO APROBADO"; ?>
                              </th>
                              @endif

                              @if($ind->obtner_metas['estado']==1)
                              <th bgcolor="#57ed7c">
                                <?php echo "APROBADO"; ?>
                              </th>
                              @endif

                              @if($ind->obtner_metas['estado']==2)
                              <th>
                                <?php echo "SIN REVISAR"; ?>
                              </th>
                              @endif
                            @endif
                          @endif
                        </tr>
                  @endif
                  <?php $primero=0 ?>
                @endforeach
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </body>
</html>
