<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>PERIODO</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <br />
    <form data-parsley-validate class="form-horizontal form-label-left">

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PLAN *</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control tipoll">
            <?php
                for ($i=0; $i < count($dato_pdyot); $i++) {
                  echo "<option value=".$dato_pdyot[$i]->idplan.">".$dato_pdyot[$i]->PLAN."</option>\n";
                }
             ?>
          </select>
        </div>
      </div>
      <?php
        $time=time();
        $date_inicio=date("Y-01-01",$time);
        $date_final=date("Y-12-31",$time);
      ?>
      <!-- <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PERIODO *</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select id="estados1" class="form-control tipoll">

          </select>
        </div>
      </div> -->

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PERIODO *</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input disabled value=<?php echo  date("Y",$time);?> style="width:100%;height:30px;" type="periodo" class="form-control" id="periodos1" name="periodos1" placeholder="periodo">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> FECHA INICIO *</label>
      <div class='col-sm-6'>
        <div class="form-group">
          <div class='input-group'>
            <input class="form-control tipoll" style="width:100%;height:30px;" type="date" id="fipe1" disabled value={{$date_inicio}} name="fechainicio" min="" max="">
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">FECHA FIN <span class="required">*</span></label>
      <div class='col-sm-6'>
        <div class="form-group">
          <div class='input-group'>
            <input style="width:100%;height:30px;" type="date" id="ffpe1"  class="form-control tipoll" disabled name="fechafinal" min="" max="" value={{$date_final}}>
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ESTADO <span class="required">*</span></label>
      <div class='col-sm-6'>
        <div class="form-group">
          <div>
            <select disabled id="estados1" class="form-control tipoll">
              <option value="0">DESHABILITADO</option>
              <option value="1">HABILITADO</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </form>
  </div>
  </div>
</div>
</div>
