<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>EVALUACION</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <br />
    <form data-parsley-va6lidate class="form-horizontal form-label-left">
    <!-- <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> # EVALUACION<span class="required">*</span></label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="number" id="numero1" class="form-control col-md-7 col-xs-12 validar">
      </div>
    </div> -->
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NUMERO DE TRIMESTRES <span class="required">*</span></label>
      <div class='col-sm-6'>
        <div class="form-group">
          <div>
            <select style="width:100%;height:30px;" id="sele1" class="tipoll">
              @for ($i=1; $i <=12 ; $i++)
                <option value={{$i}}>{{$i}}</option>
              @endfor
            </select>
          </div>
        </div>
      </div>
    </div>
    <?php
      $time=time();
      $date_inicio=date("Y-01-01",$time);
      $date_final=date("Y-12-31",$time);
    ?>

    <!-- <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> FECHA INICIO <span class="required">*</span></label>
      <div class='col-sm-6'>
        <div class="form-group">
          <div class='input-group date'>
            <input  style="width:100%;height:30px;" type="date" id="fecha_i1" class="form-control" name="fechainicio" min={{$date_inicio}} max="" value="">
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
          <div class='input-group date'>
            <input  style="width:100%;height:30px;" type="date" id="fecha_f1" class="form-control" name="fechafinal" min="" max="">
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </div>
      </div>
    </div> -->
    <!-- <div style="top:87%;right:50%;position: absolute;">
      <button id="añadir1" type="button" value="new" class="btn btn-primary tipoll">AÑADIR</button>
    </div> -->
  </form>
  </div>
  </div>
</div>
</div>
