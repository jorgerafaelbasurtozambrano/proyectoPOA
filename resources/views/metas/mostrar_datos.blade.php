<table class="table table-bordered">
  <thead class="thead-dark tipoll bg-primary">
    <tr>
      <th scope="col">PROYECTO</th>
      <th scope="col">INDICADORES</th>
      <th scope="col">META</th>
      <th scope="col">MODIFICAR</th>
      <th scope="col">ELIMINAR</th>
      <th scope="col">ESTADO</th>
      <th scope="col">ESTADO RECURSO</th>
      <th scope="col">RECURSO DISPONIBLE</th>
    </tr>
  </thead>
  <tbody>
    <input type="hidden" id="id_area_" name="id_area_" value="{{ Auth::user()->idarea}}">
    <input type="hidden" id="id_subarea_" name="id_subarea_" value="{{ Auth::user()->idsubarea}}">
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
          <?php $incrementador=$incrementador+1 ?>
          @foreach($jsonmetass as $ind)
            @if($ind->idProyecto==$pr->id)
                  <tr>
                    <td>
                        {{$ind->descripcion}}
                    </td>
                    <td>
                      @if($ind->obtner_metas==null)
                            <button value="{{$ind->id}}" class="btn btn-success modal_meta" type="button" name="button">+</button>
                      @else
                            {{$ind->obtner_metas['descripcion']}}
                      @endif
                    </td>


                    <td>
                      @if($ind->idProyecto==$pr->id)
                        @if($ind->obtner_metas==null)

                        @else
                              <button value="{{$ind->obtner_metas['idmetas']}}" id="$id_meta_"  class="btn btn-info update_modal"  type="button" name="button">MODIFICAR</button>
                        @endif
                      @endif
                    </td>
                    <td>
                      @if($ind->idProyecto==$pr->id)
                        @if($ind->obtner_metas==null)

                        @else
                              <button value="{{$ind->obtner_metas['idmetas']}}" id="eliminar_meta" class="btn btn-danger delete_meta" type="button" name="button">ELIMINAR</button>
                        @endif
                      @endif
                    </td>

                      @if($ind->idProyecto==$pr->id)
                        @if($ind->obtner_metas==null)
                        <td></td>
                        @else
                          @if($ind->obtner_metas['estado']==0)
                          <td  bgcolor="#eb3636" >
                            <?php echo "NO APROBADO"; ?>
                          </td>
                          @endif

                          @if($ind->obtner_metas['estado']==1)
                          <td bgcolor="#57ed7c">
                            <?php echo "APROBADO"; ?>
                          </td>
                          @endif

                          @if($ind->obtner_metas['estado']==2)
                          <td>
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
                          <td bgcolor="#eb3636">
                            <?php echo "NO APROBADO"; ?>
                          </td>
                          @endif
                          @if($ind->obtner_metas['recurso_aprobado']==1)
                          <td bgcolor="#57ed7c">
                            <?php echo "APROBADO"; ?>
                          </td>
                          @endif
                          @if($ind->obtner_metas['recurso_aprobado']==2)
                          <td>
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
          <?php $incrementador=$incrementador+1 ?>
          @foreach($jsonmetass as $ind)
            @if($ind->idProyecto==$pr->id)
                  <tr>
                    <td>
                        {{$ind->descripcion}}
                    </td>
                    <td>
                      @if($ind->obtner_metas==null)
                            <button value="{{$ind->id}}" class="btn btn-success modal_meta" type="button" name="button">+</button>
                      @else
                            {{$ind->obtner_metas['descripcion']}}
                      @endif
                    </td>


                    <td>
                      @if($ind->idProyecto==$pr->id)
                        @if($ind->obtner_metas==null)

                        @else
                              <button value="{{$ind->obtner_metas['idmetas']}}" id="$id_meta_"  class="btn btn-info update_modal"  type="button" name="button">MODIFICAR</button>
                        @endif
                      @endif
                    </td>
                    <td>
                      @if($ind->idProyecto==$pr->id)
                        @if($ind->obtner_metas==null)

                        @else
                              <button value="{{$ind->obtner_metas['idmetas']}}" id="eliminar_meta" class="btn btn-danger delete_meta" type="button" name="button">ELIMINAR</button>
                        @endif
                      @endif
                    </td>

                      @if($ind->idProyecto==$pr->id)
                        @if($ind->obtner_metas==null)
                        <td></td>
                        @else
                          @if($ind->obtner_metas['estado']==0)
                          <td  bgcolor="#eb3636" >
                            <?php echo "NO APROBADO"; ?>
                          </td>
                          @endif

                          @if($ind->obtner_metas['estado']==1)
                          <td bgcolor="#57ed7c">
                            <?php echo "APROBADO"; ?>
                          </td>
                          @endif

                          @if($ind->obtner_metas['estado']==2)
                          <td>
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
                          <td bgcolor="#eb3636">
                            <?php echo "NO APROBADO"; ?>
                          </td>
                          @endif
                          @if($ind->obtner_metas['recurso_aprobado']==1)
                          <td bgcolor="#57ed7c">
                            <?php echo "APROBADO"; ?>
                          </td>
                          @endif
                          @if($ind->obtner_metas['recurso_aprobado']==2)
                          <td>
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

                  </tr>
            @endif
          @endforeach
          </tr>
          @endif
        @endforeach
    @endif

  </tbody>
</table>
