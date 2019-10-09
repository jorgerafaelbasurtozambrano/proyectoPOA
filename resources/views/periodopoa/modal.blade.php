<div class="modal fade" id="evaluaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EVALUACIONES</h5>
      </div>
      <div class="modal-body">
        <button id="ocultar" class="btn btn-info" >+</button>
        <table class="table table-bordered table-responsive" id="tabla">
          <thead class="table-dark bg-primary tipoll">
            <tr>
              <th scope="col">TRIMESTRE</th>
              <th scope="col">INICIO</th>
              <th scope="col">FIN</th>
              <th scope="col">ELIMINAR</th>
              <th scope="col">EDITAR</th>
            </tr>
          </thead>
          <tbody id="tabla">

          </tbody>
        </table>
        <div id="add" class="table-responsive">
          @include('periodopoa.evaluacion')
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
