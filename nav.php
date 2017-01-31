<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/<?php echo PATH; ?>/">Inicio</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transacciones <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/<?php echo PATH; ?>/pages/reserva">Reserva</a></li>
            <li class="divider"></li>
            
            <li><a href="/<?php echo PATH; ?>/pages/rqm">Requerimiento de Materiales</a></li>
          </ul>
        </li>
      </ul>
        <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Procesos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/<?php echo PATH; ?>/pages/cargar-excel">Cargar Excel</a></li>
            <li class="divider"></li>
            <li><a href="/<?php echo PATH; ?>/pages/verificar-pedido">Verificar Pedido</a></li>
            <li class="divider"></li>
            <li><a href="/<?php echo PATH; ?>/reportes/reservas-vacias">Reservas Vacias</a></li>
            <li class="divider"></li>
            <li><a href="/<?php echo PATH; ?>/pages/eliminar-reservas">Eliminar Reservas</a></li>
            <li class="divider"></li>
            <li><a href="/<?php echo PATH; ?>/pages/eliminar-rqm">Eliminar Requerimiento de Materiales</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tablas de Ayuda <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/<?php echo PATH; ?>/pages/cc-ot">Asociar OT y CC</a></li>
            <li class="divider"></li>
            <li><a href="/<?php echo PATH; ?>/pages/usuarios">Lista de Usuarios</a></li>
          </ul>
        </li>
      </ul>
        <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/<?php echo PATH; ?>/reportes/articulo-saldos-negativos">Articulos Saldos Negativos</a></li>
            <li class="divider"></li>
            <li><a href="/<?php echo PATH; ?>/reportes/reservas-ot-liquidadas">Reservas Ot liquidada</a></li>
            <li class="divider"></li>
            <li><a href="/<?php echo PATH; ?>/reportes/rqm-ot-liquidadas">RQM Ot liquidadas</a></li>
            <li class="divider"></li>
            <li><a href="/<?php echo PATH; ?>/reportes/rqm-saldos-pendientes">RQM Saldos Pendientes</a></li>
            <li class="divider"></li>
            <li><a href="/<?php echo PATH; ?>/reportes/articulos" target="_blank">Lista de Articulos</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" autocomplete="Off"  role="search"
 method="GET"  action="/<?php echo PATH; ?>/reportes/consulta-articulos" >
  <div class="form-group">
    <input type="text" class="form-control"  name="codigo"
    placeholder="Código o Descripción" required="">
  </div>
  <button type="submit" class="btn btn-primary">Buscar</button>
</form>
      <ul class="nav navbar-nav navbar-right">
        <li>
<a href="#"><i class="glyphicon glyphicon-user text-success"></i>
<?php  echo utf8_encode($_SESSION[KEY.NOMBRES]).' '.utf8_encode($_SESSION[KEY.APELLIDOS]); ?></a>
</li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/<?php echo PATH; ?>/procesos/logout">Salir</a></li>
           
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>