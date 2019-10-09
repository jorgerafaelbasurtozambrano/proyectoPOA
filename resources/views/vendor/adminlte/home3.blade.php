@extends('adminlte::layoutsnuevo.app')
@section('main-content1')
	@if(isset($index_periodo))
		@include('nuevasvistas.periodo.ingreso')
		@include('nuevasvistas.periodo.evaluacion')
		@include('nuevasvistas.periodo.tabla')
	@endif
	@if(isset($listadeperiodos))
		@include('nuevasvistas.periodo.listar')
		@include('nuevasvistas.periodo.modal')
		@include('nuevasvistas.periodo.modalupdateval')
	@endif
	@if(isset($report))
		@include('nuevasvistas.periodo.reporte')
	@endif
	@if(isset($mostrar_eval_metas))
		@include('nuevasvistas.periodo.evaluar')
		@include('nuevasvistas.periodo.observacion')
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
