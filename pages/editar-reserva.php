<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<?php 
     include('../includes/clases/Reserva.php');
     include('../includes/clases/Reservadet.php');
     include('../includes/clases/Rqm.php');
     include('../includes/clases/Funciones.php');
     $reserva    =  new Reserva();
     $reservadet =  new Reservadet($_GET['id'],'?','?','?');
     $rqm        =  new Rqm();
     $num_detalle = $reservadet ->ExisteDetalle();
     

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Reserva</title>
<?php include('../enlaces/principal.php'); ?>
<?php include('../enlaces/datatables.php'); ?>
</head>
<body>
<div class="container-fluid">

<div class="row">
<div class="col-md-12">
<?php include('../nav.php'); ?>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="panel panel-primary">
<div class="panel-heading"><i>Editar Reserva</i></div>
<div class="panel-body">
<ul>
<li>RESERVA: <?php echo $reserva->Dato($_GET['id'],'NRORESERVA'); ?></li>
<li>USUARIO: <?php echo $reserva->Dato($_GET['id'],'FULLNAME'); ?></li>
<li>OT: <?php echo $reserva->Dato($_GET['id'],'OT'); ?></li>
<li>CC: <?php echo $reserva->Dato($_GET['id'],'CENTROCOSTO'); ?></li>
</ul>

<?php 

if ($num_detalle>0) {
  include('../form/md-rqm.php');
}



 ?>


</div>
</div>
</div>
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading">Agregar Articulo:Ingrese el código y cantidad.</div>
<div class="panel-body">

<?php include('../form/fm-agregar-articulo.php'); ?>

</div>
</div>
</div>
</div>


<div class="row">
<div class="col-md-12">

<form action="../procesos/transacciones/actualizar-reserva.php" method="POST">
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading">Detalle de Reserva
    <div class="pull-right">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <button class="btn btn-primary btn-xs">Actualizar Detalle de Reserva</button>
    </div>

	</div>
	<div class="panel-body">
		<?php include('../grid/editar-reserva.php'); ?>
	</div>

	
</div>

</form>


</div>
</div>


</div>
</body>
</html>