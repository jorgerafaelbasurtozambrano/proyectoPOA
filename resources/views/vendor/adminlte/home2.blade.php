@extends('adminlte::layouts.app2')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1" style="background-color:vec3(0.75, 0.89, 0.87); ">
				@if(isset($crear_proyecto2))
					<div class="panel panel-default col-md-19">
							<div class="panel-heading tipolll">CREAR PROYECTO</div>
							<div class="panel-body">
									@include('proyectos.registro')
							</div>
					</div>
  			@endif

				@if(isset($mostrar_per2))
    			<div class="panel panel-default col-md-19">
    				<div class="panel-heading tipolll">LISTA DE PROYECTOS</div>
    					<div class="panel-body">
                @include('proyectos.tabla')
    					</div>
    			</div>
      	@endif

				@if(isset($mostrar_indicador2))
          <div class="panel panel-default col-md-13">
            <div class="panel-heading tipolll">LISTA DE INDICADORES</div>
              <div class="panel-body">
                @include('indicadores.tabla')
                @include('indicadores.modal')
                @include('metas.model')
              </div>
          </div>
        @endif

				@if(isset($mostrar_metas2))
          <div class="panel panel-default col-md-19">
            <div class="panel-heading tipolll">LISTA DE METAS</div>
              <div class="panel-body">
								@include('metas.mostrar_datos')
								@include('metas.model')
              </div>
          </div>
        @endif

				@if(isset($mostrar_metas_evaluacion2))
					<div class="panel panel-default col-md-19">
						<div class="panel-heading tipolll">LISTA DE METAS</div>
							<div class="panel-body">
								@include('metaeval.evaluaciones_meta')
								@include('metaeval.model')
							</div>
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
