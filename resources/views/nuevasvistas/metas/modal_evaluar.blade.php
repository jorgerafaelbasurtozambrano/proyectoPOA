<div class="modal fade" id="insert_evaluacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg-2">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">EVALUAR</h4>
      </div>
      <div class="modal-body">
        <div class="x_content">
        <br />

        <div class="well" style="overflow: auto">
          <div class="col-md-4">
            <label>EVALUACION<span class="required">*</span></label>
            <div>
              <div>
                <div>
                  <select id="cb_eval_meta" class="form-control tipoll">
                    <option selected="true" disabled="disabled">SELECCIONE</option>
                    @foreach($evaluaciones as $evaluaci)
                        <option value={{$evaluaci['id']}}><?php  echo ("TRIMESTRE {$evaluaci['numero']}"); ?></option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <label>PORCENTAJE <span class="required">*</span></label>
            <div>
              <div>
                <div>
                  <input style="width:100%;height:30px;" type="text" class="form-control validar" id="porcentaje" name="trimestres" placeholder="PORCENTAJE">
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <label><span class="required">*</span></label>
            <div>
              <div>
                <div>
                  <button id="_add_evaluar_meta" type="button" class="btn btn-primary tipoll glyphicon glyphicon-ok"></button>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="well" style="overflow: auto">
        <div class="table-responsive" style="text-align: center;">
          <table class="table jambo_table table-bordered" id="eva_metas">
            <thead>
              <tr>
                <th>id</th>
                <th>EVALUACION</th>
                <th>INICIO</th>
                <th>FIN</th>
                <th>PORCENTAJE</th>
              </tr>
            </thead>
            <tbody>
              @foreach($evaluaciones as $evaluaci)
                  <tr>
                    <th>{{$evaluaci['id']}}</th>
                    <th>
                      <?php
                        echo ("TRIMESTRE {$evaluaci['numero']}");
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
            </tbody>
          </table>
        </div>

      </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
