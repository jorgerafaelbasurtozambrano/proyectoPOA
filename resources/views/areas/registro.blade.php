<form>
  <div class="form-group row">
     <label for="name" class="col-md-4 col-form-label text-md-right tipoll">PERIODO</label>
      <div class="col-md-6">
          <select name="periodo" id="periodo_conf" class="form-control">
          @foreach($periodo as $per)
              @if ($per['estado']=="1")
                <option value="{{$per['id']}}" >
                    {{$per['descripcion']}}
                </option>
              @endif
          @endforeach
          </select>
      </div>
  </div>


  <div class="form-group row">
     <label for="name" class="col-md-4 col-form-label text-md-right tipoll">AREA</label>
      <div class="col-md-6">
        <select class="form-control" name="area_selec" id="area_selec">
          @foreach($areas as $area)
            <option value="{{$area['iddatoarea']}}" >
                {{$area['descripcion']}}
            </option>
          @endforeach
        </select>
      </div>
  </div>

  <div class="form-group row">
     <label for="name" class="col-md-4 col-form-label text-md-right tipoll">RECURSO</label>
      <div class="col-md-6">
        <input type="text" id="recurso_conf"  style="width:15%;height:30px" class="form-control" name="recurso_conf">
      </div>
  </div>

  <div class="col-md-4 col-form-label text-md-right">
     <button id="guardar_rec_conf" type="button" value="" class="btn btn-primary tipoll">GUARDAR</button>
  </div>

</form>
