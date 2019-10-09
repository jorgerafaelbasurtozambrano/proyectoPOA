<div class="panel-heading tipolll">
  <select id="periodo_re">
    <option selected="true" disabled="disabled">Seleccione Periodo</option>
    @foreach($pe as $p)
      <option value={{$p->id}}> {{$p->descripcion}}</option>
    @endforeach
  </select>

  <select id="poa_mostrar">
    <option selected="true" disabled="disabled">Seleccione area</option>
    @foreach($areass as $ar)
      <option value={{$ar->iddatoarea}}> {{$ar->descripcion}}</option>
    @endforeach
  </select>

</div>

<div class="table-responsive">
  <table class="table table-bordered" id="table_principal">
    <thead class="thead-dark tipol bg-primary">
      <tr>
        <th scope="col">PROYECTO</th>
        <th scope="col">INDICADORES</th>
        <th scope="col">META</th>
        <th colspan=3 scope="col">PRESUPUESTO</th>
        <th colspan=2 scope="col">RECURSO ASINGADO</th>
        <th colspan=2 scope="col">ESTADO</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>

</div>
