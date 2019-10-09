<form>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="fecha_final" class="tipoll">Evaluacion</label>
      <select id="cb_eval_meta" class="form-contro">
        @foreach($evaluaciones as $eval)
          @foreach($eval->evaluacionpoas as $evaluaci)
            <option value={{$evaluaci['id']}}><?php  echo ("Trimestre {$evaluaci['numero']}"); ?></option>
          @endforeach
        @endforeach
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-10">
      <label class="tipoll">PORCENTAJE</label>
      <input style="width:121%;height:30px;" type="text" id="porcentaje"  class="form-control" min="" max="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <button id="_add_evaluar_meta" type="button" class="btn btn-success" name="button">AGREGAR</button>
    </div>
  </div>
</form>
