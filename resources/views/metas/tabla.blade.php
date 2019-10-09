<table class="table table-bordered" id="metas">
  <thead class="thead-dark tipoll bg-primary">
    <tr>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">INICIO</th>
      <th scope="col">FIN</th>
      <th scope="col">RECURSO</th>
      @foreach ($periodos as $per)
        @foreach ($per->evaluacionpoas as $eva)
          <th scope="col">periodo {{$eva['numero']}}</th>
        @endforeach
      @endforeach
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
