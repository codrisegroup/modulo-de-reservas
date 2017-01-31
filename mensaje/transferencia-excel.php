<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<?php include('../includes/clases/Funciones.php'); ?>
<?php 
 LiberarCargaExcel($_SESSION[KEY.USUARIO]);

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Transferencia Excel</title>
	<?php include('../enlaces/principal.php'); ?>
</head>
<body>
	
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jumbotron">
			<h1 class="text-center"><i class="fa fa-thumbs-up fa-3x"></i></h1>
			<h1 class="text-center">La Transferencia se realizo con exito.</h1>
			<h1 class="text-center">
			<a  href="/<?php echo PATH; ?>/pages/reserva" class="btn btn-success btn-lg">Consultar Reservas</a>
			</h1>
			</div>
		</div>
	</div>
</div>

</body>
</html>