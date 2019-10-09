<form method="POST" action="{{url('proyecto')}}">
     @csrf
            <div class="form-group row">
               <label for="name" class="col-md-4 col-form-label text-md-right tipoll">PERIODO</label>
                <div class="col-md-6">
                    <select name="periodo" id="periodo" class="form-control tipoll">
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
                <label for="name" class="col-md-4 col-form-label text-md-right tipoll">DESCRIPCIÓN</label>
                    <div class="col-md-6">
                        <input id="descripcion" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="descripcion" value="{{ old('name') }}" required autofocus>
                    </div>
            </div>

            <input type="hidden" id="id_area_" name="id_area_" value="{{ Auth::user()->idarea}}">
            <input type="hidden" id="id_subarea_" name="id_subarea_" value="{{ Auth::user()->idsubarea}}">

<br>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-10">
                    <button type="submit" class="tipoll btn btn-primary">
                                    {{ __('GUARDAR') }}
                    </button>
                </div>
            </div>


</form>
