<form method="POST" action="{{action('ProyectController@update', $id)}}">
     @csrf
     <input type="hidden" name="_method" value="PUT">
            <div class="form-group row">
                <label for="name" class="tipoll col-md-4 col-form-label text-md-right">DESCRIPCIÓN</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="descripcion" value="{{$proyec->descripcion}}">
                    </div>
            </div>
<br>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="tipoll btn btn-primary">
                                    {{ __('GUARDAR') }}
                    </button>
                </div>
            </div>
</form>
