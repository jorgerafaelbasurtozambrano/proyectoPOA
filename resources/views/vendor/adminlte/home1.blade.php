@extends('adminlte::layouts.apparea')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1" style="background-color:vec3(0.75, 0.89, 0.87); ">
				@if(isset($crear_proyecto))
					<div class="panel panel-default col-md-19">
							<div class="panel-heading tipolll">CREAR PROYECTO</div>
							<div class="panel-body">
									@include('proyectos.registro')
							</div>
					</div>
  			@endif
  			@if(isset($mostrar_per))
    			<div class="panel panel-default col-md-19">
    				<div class="panel-heading tipolll">LISTA DE PROYECTOS</div>
    					<div class="panel-body">
                @include('proyectos.tabla')
    					</div>
    			</div>
      	@endif
        @if(isset($edit_per))
    			<div class="panel panel-default col-md-12">
    				<div class="panel-heading tipolll">MODIFICAR PROYECTO</div>
    					<div class="panel-body">
                @include('proyectos.modificar')
    					</div>
    			</div>
      	@endif


        @if(isset($crear_indicador))
          <div class="panel panel-default col-md-12">
            <div class="panel-heading tipolll">INDICADORES</div>
              <div class="panel-body">
                @include('indicadores.registro')
              </div>
          </div>
        @endif
        @if(isset($mostrar_indicador))
          <div class="panel panel-default col-md-13">
            <div class="panel-heading tipolll">LISTA DE INDICADORES</div>
              <div class="panel-body">
                @include('indicadores.tabla')
                @include('indicadores.modal')
                @include('metas.model')

              </div>
          </div>
        @endif
        @if(isset($edit_indicador))
          <div class="panel panel-default col-md-12">
            <div class="panel-heading">MODIFICAR INDICADOR</div>
              <div class="panel-body">
                @include('indicadores.modificar')
              </div>
          </div>
        @endif

				@if(isset($mostrar_metas))
          <div class="panel panel-default col-md-19">
            <div class="panel-heading tipolll">LISTA DE METAS</div>
              <div class="panel-body">
								@include('metas.mostrar_datos')
								@include('metas.model')
              </div>
          </div>
        @endif

				@if(isset($mostrar_metas_evaluacion))
          <div class="panel panel-default col-md-19">
            <div class="panel-heading tipolll">LISTA DE METAS</div>
              <div class="panel-body">
								@include('metaeval.evaluaciones_meta')
								@include('metaeval.model')
              </div>
          </div>
        @endif

				@if(isset($mostrar_ingreso))
					<div class="panel panel-default col-md-12">
						<div class="panel-heading tipolll">EVALUACION DE METAS</div>
							<div class="panel-body">
								@include('metaeval.ingreso')

							</div>
					</div>
				@endif

				@if(isset($dato_subarea))
				<div class="panel panel-default col-md-19">
					<div class="panel-heading tipolll">SUBAREA</div>
					<form class="form-inline">
						<div class="panel-body">
							@include('subareas.busqueda')
						</div>
					</form>
				</div>
	    	@endif
		</div>
	</div>
@endsection
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/alertify.js')}}"></script>
<script src="{{asset('js/alertify.min.js')}}"></script>
<script src="{{asset('js/logica1.js')}}"></script>
<script src="{{asset('js/logica.js')}}"></script>
<script src="{{asset('js/logica2.js')}}"></script>
<script src="{{asset('js/logica3.js')}}"></script>
<script src="{{asset('js/logica4.js')}}"></script>
