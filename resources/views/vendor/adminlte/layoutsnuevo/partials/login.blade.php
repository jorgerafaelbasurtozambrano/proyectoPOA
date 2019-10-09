<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="img/chone.jpg" alt="">
            <?php
                $cadena_texto = Auth::user()->name;
                $cadena_salida = strtoupper($cadena_texto);
                echo $cadena_salida; // Imprime la salida en mayusculas.
            ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">            
            <li>
              <a href="{{ url('/logout') }}" class="fa fa-sign-out pull-right"
                 onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  CERRAR SESION
              </a>
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                  <input type="submit" value="logout" style="display: none;">
              </form>
            </li>
          </ul>
        </li>
        <li role="presentation" class="dropdown">
          <?php
            $numero_notificaciones=0;
            foreach ($notificaciones as $noti) {
              if ($noti->id_usuario==Auth::user()->id) {
                $numero_notificaciones=$numero_notificaciones+1;
              }
            }
          ?>
          <a id="notifaciones_add" href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span id="num_notifi" class="badge bg-green">{{$numero_notificaciones}}</span>
          </a>
          <ul id="menu11" class="dropdown-menu list-unstyled msg_list" role="menu">
            @foreach($notificaciones as $noti)
              @if($noti->id_usuario==Auth::user()->id)
                <?php
                  $sele=$noti->id.'li';
                ?>
                <li id=<?php echo $sele ?>>
                  <a>
                    <span class="image"><img src="img/intro01.png" alt="Profile Image" /></span>
                    <span>
                      <span>Administrador</span>
                      <span class="time">{{$noti->tiempo}}</span>
                    </span>
                    <span>
                      <span class="message">
                        {{$noti->descripcion}}
                        <button value="{{$noti['id']}}" type="button" class="btn btn-link notifi">MARCAR COMO LEIDO</button>
                      </span>
                    </span>
                  </a>
                </li>
              @endif
            @endforeach
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->
