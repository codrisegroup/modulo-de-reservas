<?php include('../../configuracion.php'); ?>
<?php include('../../rutas.php'); ?>
<?php include('../../includes/clases/Ot.php'); ?>
<?php 
 $ot =  new Ot('?','?',$_GET['ot'],'?','?','?','?','?');
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar</title>
<?php include('../../enlaces/principal.php'); ?>
<?php include('../../enlaces/selectize.php'); ?>
</head>
<body>
<div class="container-fluid">

<div class="row">
<div class="col-md-12">
<?php include('../../nav.php'); ?>
</div>
</div>

<div class="row">
<div class="col-md-12">

<div class="panel panel-default">
    <div class="panel-heading">
    <strong>Actualizar Orden de Trabajo: <?php echo $_GET['ot']; ?></strong>
    </div>
	<div class="panel-body">
	<form class="form-horizontal" method="POST" action="../../procesos/tablas-de-ayuda/actualizar-ot.php">

  <input type="hidden" name="ot" value="<?php echo $_GET['ot']; ?>">
 
  <div class="form-group">
    <label  class="col-sm-3 control-label">Fecha Creación Ot:</label>
    <div class="col-sm-3">
      <input type="date"  class="form-control input-sm" required=""
      value="<?php echo $ot->Datos('OF_FECHINI'); ?>" readonly >
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-3 control-label">Fecha Inicio Reprogramada:</label>
    <div class="col-sm-3">
      <input type="date" name="fechainicio" class="form-control input-sm" required="" value="<?php echo $ot->Datos('FECHAINICIO_REPRO'); ?>">
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-3 control-label">Fecha Fin Reprogramada:</label>
    <div class="col-sm-3">
      <input type="date" name="fechafin" class="form-control input-sm" required="" value="<?php echo $ot->Datos('FECHAFIN_REPRO'); ?>">
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-3 control-label">Estatus:</label>
    <div class="col-sm-3">
	<select id="status" name="status"  class="demo-default">
	<option value="<?php echo $ot->Datos('STATUS'); ?>"><?php echo $ot->Datos('STATUS'); ?></option>
  <option value="BANCO Y AJUSTE">BANCO Y AJUSTE</option>
	<option value="CONTROL DE CALIDAD">CONTROL DE CALIDAD</option>
	<option value="ENSAMBLE">ENSAMBLE</option>
	<option value="MECANIZANDO">MECANIZANDO</option>
	<option value="REPARACION">REPARACION</option>
	<option value="REQUERIMIENTO MP">REQUERIMIENTO MP</option>
	<option value="SERVICIO TERCEROS">SERVICIO TERCEROS</option>
	</select>
	  <script>
    $('#status').selectize({
maxItems: 1
});
   </script>
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-3 control-label">Técnico:</label>
    <div class="col-sm-3">
     <select id="tecnico" name="tecnico">
     <option value="<?php echo $ot->Datos('TECNICO');  ?>"><?php echo $ot->Datos('TECNICO');  ?></option>
     <?php
      include('../../includes/bd/conexion_mysql.php');
      $link_mysql = Conectarse_mysql();
      $query  = "SELECT * FROM produccion.tecnico";
      $result = mysql_query($query);
      while ($fila = mysql_fetch_object($result))
       {
       	 
         echo "<option value='$fila->nombres $fila->apellidos'>$fila->nombres $fila->apellidos</option>";

       }

      ?>
     </select>
     <script>
    $('#tecnico').selectize();
   </script>
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-3 control-label">Máquina:</label>
    <div class="col-sm-3">
     <select id="maquina" name="maquina">
     <option value="<?php echo $ot->Datos('MAQUINA');  ?>"><?php echo $ot->Datos('MAQUINA');  ?></option>
     <?php
      $query  = "SELECT * FROM produccion.maquina_p";
      $result = mysql_query($query);
      while ($fila = mysql_fetch_object($result))
       {
       	 
         echo "<option value='$fila->descripcion'>$fila->descripcion</option>";

       }

      ?>
     </select>
      <script>
    $('#maquina').selectize();
   </script>

    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-3 control-label">Detalle:</label>
    <div class="col-sm-6">
    <textarea name="detalle" rows="3" class="form-control" required=""><?php echo $ot->Datos('DETALLE');  ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
      <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>

     <a href="../../procesos/tablas-de-ayuda/limpiar-cc?ot=<?php echo $_GET['ot']; ?>" class="btn btn-default btn-sm">Limpiar</a>
    </div>
  </div>

</form>



	</div>
</div>


</div>
</div>

</div>
</body>
</html>