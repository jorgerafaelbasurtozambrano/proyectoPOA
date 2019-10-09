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
    <form method="POST" action="{{action('ProyectController@update', $id)}}" data-parsley-validate class="form-horizontal form-label-left">
      @csrf
      <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PROYECTO *</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea style="resize:none;"  id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="descripcion" value="{{$proyec->descripcion}}" required autofocus></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <button type="submit" class="tipoll btn btn-primary">
                        {{ __('GUARDAR') }}
        </button>
      </div>
    </div>

  </form>
  </div>
  </div>
</div>
</div>
