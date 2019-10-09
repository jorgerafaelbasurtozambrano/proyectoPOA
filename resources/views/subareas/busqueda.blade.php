<div class="panel-heading tipolll">
  <select id="peri">
    <option selected="true" disabled="disabled">Seleccione Periodo</option>
    @foreach($periodo as $p)
      <option value={{$p->id}}> {{$p->descripcion}}</option>
    @endforeach
  </select>
  <input hidden type="text" name="name" value="{{ Auth::user()->idarea }}">
  <select id="anid_area">
    <option selected="true" disabled="disabled">Seleccione area</option>
    @foreach($area as $ar)
    <?php if ($ar->iddatoarea==Auth::user()->idarea): ?>
        <option value={{$ar->iddatoarea}}> {{$ar->descripcion}}</option>
    <?php endif; ?>
    @endforeach
  </select>

  <select id="anid_sub">
    <option selected="true" disabled="disabled">Seleccione subarea</option>
  </select>

</div>

<div class="table-responsive">
  <table class="table table-bordered" id="busq_sub">
    <thead class="thead-dark tipol bg-primary">
      <tr>
        <th scope="col">PROYECTO</th>
        <th scope="col">INDICADORES</th>
        <th scope="col">META</th>
        <th scope="col">PRESUPUESTO</th>
        <th colspan=2 scope="col">MODIFICAR RECURSO</th>
        <th scope="col">PRESUPUESTO ASIGNADO</th>
        <th scope="col">ESTADO META</th>
        <th scope="col">ESTADO RECURSO</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>

</div>
