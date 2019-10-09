@extends('adminlte::layoutsnuevo.app1')
@section('main-content1')
    @if($activado==1)
        @if(isset($crear_proyecto))
          <input type="hidden" id="id_usuario_" name="name" value="{{Auth::user()->id}}">
          @include('nuevasvistas.proyecto.ingreso')
        @endif
        @if(isset($mostrar_per))
        <input type="hidden" id="id_usuario_" name="name" value="{{Auth::user()->id}}">
          @include('nuevasvistas.proyecto.lista_project')
          @include('nuevasvistas.proyecto.modal')
        @endif
        @if(isset($edit_per))
        <input type="hidden" id="id_usuario_" name="name" value="{{Auth::user()->id}}">
          @include('nuevasvistas.proyecto.editar')
        @endif
        @if(isset($mostrar_indicador))
        <input type="hidden" id="id_usuario_" name="name" value="{{Auth::user()->id}}">
          @include('nuevasvistas.indicadores.lista')
          @include('nuevasvistas.indicadores.ingreso')
        @endif
        @if(isset($mostrar_metas))
        <input type="hidden" id="id_usuario_" name="name" value="{{Auth::user()->id}}">
          @include('nuevasvistas.metas.lista')
          @include('nuevasvistas.metas.ingreso')
        @endif
        @if(isset($mostrar_metas_evaluacion))
        <input type="hidden" id="id_usuario_" name="name" value="{{Auth::user()->id}}">
          @include('nuevasvistas.metas.evaluar')
          @include('nuevasvistas.metas.modal_evaluar')
        @endif
    @endif
    @if($activado==0)
    <input type="hidden" id="id_usuario_" name="name" value="{{Auth::user()->id}}">
      <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-22">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-close"></i>
          </div>
          <div class="count">NOTIFICACION</div>
          <h3>GAD CHONE POA</h3>
          <p>NO SE ENCUENTRA NINGUN PERIODO ACTIVADO</p>
        </div>
      </div>
    @endif
      @if(isset($mostrar_eval_metas))
        @include('nuevasvistas.metas.busqueda')
      @endif

      @if(isset($ventana))
        <div class="row">
      	  <div class="col-md-12 col-sm-12 col-xs-12">
      	  <div class="x_panel">
      	    	<div class="x_content">
      					<img style="display: block;margin: 0 auto; max-width: 100%;width: 1050px;" src="img/gad.jpg" height="550px" width="1050px" />
      	  		</div>
      	  	</div>
      		</div>
      	</div>
    	@endif

@endsection
