<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a class="site_title"><i class="fa fa-list-ol"></i> <span>SISTEMA POA</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="img/chone.jpg" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>BIENVENIDO,</span>
        <h2>
          <?php
              $cadena_texto = Auth::user()->name;
              $cadena_salida = strtoupper($cadena_texto);
              echo $cadena_salida; // Imprime la salida en mayusculas.
          ?>
        </h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="administrador"><i class="fa fa-home"></i> INICIO <span class="nav child_menu"></span></a>
          </li>
          <li><a><i class="fa fa-calendar"></i> PERIODO <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="new">NUEVO</a></li>
              <li><a href="show">LISTAR</a></li>
              <li><a href="showreport">REPORTE</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-edit"></i> EVALUAR <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="evaluar_poa">METAS</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->
  </div>
</div>
