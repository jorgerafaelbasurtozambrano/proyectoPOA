<table class="table table-bordered table-responsive" id="area_tabla">
  <thead class="thead-dark bg-primary tipol">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">PERIODO</th>
      <th scope="col">DEPARTAMENTO</th>
      <th scope="col">RECURSO</th>
      <th scope="col">ELIMINAR</th>
      <th scope="col">MODIFICAR</th>
    </tr>
  </thead>
  <tbody>
    @for ($i = 0; $i < count($consulta) ; $i++)
      <tr>
        <th scope="row">{{$consulta[$i]->iddepartamento}}</th>
        <th scope="row">{{$consulta[$i]->periodo}}</th>
        <th scope="row">{{$consulta[$i]->departamento}}</th>
        <th scope="row">{{$consulta[$i]->valor_asignado}}</th>
        <td>
          <button id="eliminar_area" class="btn btn-danger delete-area tipoll" value="{{$consulta[$i]->idarea}}" >ELIMINAR</button>
        </td>
        <td>
          <button id="modificar_area" class="btn btn-success modal_area tipoll" value="{{$consulta[$i]->idarea}}" >MODIFICAR</button>
        </td>
      </tr>
    @endfor
  </tbody>
</table>
