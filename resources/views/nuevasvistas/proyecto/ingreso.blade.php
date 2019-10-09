<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>PROYECTO</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <br />
    <formdata-parsley-validate class="form-horizontal form-label-left">
    <input type="hidden" id="id_area_1" name="id_area_" value="{{ Auth::user()->idarea}}">
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PERIODO *<span class="required">*</span></label>
      <div class='col-sm-6'>
        <div class="form-group">
          <div>
            <select name="periodo" id="periodo_1" class="form-control tipoll">
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
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PROYECTO *</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea style="resize:none;" id="descripcion1" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="descripcion" value="{{ old('name') }}" required autofocus></textarea>
      </div>
    </div>

    <div class="form-group">

      <div class="col-md-6 col-sm-6 col-xs-12">
        <button id="btn_proyect" type="button" class="tipoll btn btn-primary">
                        {{ __('GUARDAR') }}
        </button>
      </div>
    </div>

  </form>
  </div>
  </div>
</div>
</div>
