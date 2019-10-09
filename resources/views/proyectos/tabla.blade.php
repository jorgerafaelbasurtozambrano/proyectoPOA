<table class="table table-bordered">
  <thead class="thead-dark tipoll bg-primary">
    <tr>
      <th scope="col">#</th>
      <th scope="col">DESCRIPCIÓN</th>
      <th scope="col">MODIFICAR</th>
      <th scope="col">ELIMINAR</th>
    </tr>
  </thead>
  <tbody>
    @if($subarea==0)
        @foreach($proyectos as $proyecto)
          @if($proyecto['idAreaPoa']==Auth::user()->idarea)
              <tr>
               <th scope="row"> {{$proyecto['id']}} </th>
               <td>{{$proyecto['descripcion']}}</td>
               <td>
                <a href="{{action('ProyectController@edit', $proyecto['id'])}}"
                class="btn btn-warning">MODIFICAR</a>
               </td>
               <td>
               <form action="{{url('proyecto', $proyecto['id'])}}" method="post">
                     @csrf
                      <input name="_method" type="hidden" value="DELETE">
                     <button class="btn btn-danger" type="submit">ELIMINAR</button>
                </form>
               </td>
              </tr>
            @endif
          @endforeach
    @endif
    @if($subarea==1)
      @foreach($proyectos as $proyecto)
        @if($proyecto['idsubarea']==Auth::user()->idsubarea)
            <tr>
             <th scope="row"> {{$proyecto['id']}} </th>
             <td>{{$proyecto['descripcion']}}</td>
             <td>
              <a href="{{action('ProyectController@edit', $proyecto['id'])}}"
              class="btn btn-warning">MODIFICAR</a>
             </td>
             <td>
             <form action="{{url('proyecto', $proyecto['id'])}}" method="post">
                   @csrf
                    <input name="_method" type="hidden" value="DELETE">
                   <button class="btn btn-danger" type="submit">ELIMINAR</button>
              </form>
             </td>
            </tr>
          @endif
        @endforeach
    @endif
  </tbody>
</table>
