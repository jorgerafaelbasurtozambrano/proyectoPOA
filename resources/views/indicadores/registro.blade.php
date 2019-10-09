<form method="POST" action="{{url('indicador')}}">
     @csrf
            <div class="form-group row">
                <label for="name" class="tipoll col-md-4 col-form-label text-md-right">DESCRIPCIÓN</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="descripcion" value="{{ old('name') }}" required autofocus>
                    </div>
            </div>
<input name="id_proyectos" type="hidden"  value="">
<br>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="tipoll btn btn-primary">
                                    {{ __('GUARDAR') }}
                    </button>
                </div>
            </div>
</form>
