<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<?php 
      include('../includes/clases/Reservadet.php');
      $reservadet =  new Reservadet('?','?','?','?');
      $reservadet -> LiberarTraslado($_SESSION[KEY.USUARIO]);
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Traslado Exitoso</title>
	<?php include('../enlaces/principal.php'); ?>
</head>
<body>
	
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jumbotron">
			<h1 class="text-center"><i class="fa fa-thumbs-up fa-3x"></i></h1>
			<h1 class="text-center">El Traslado se realizo con éxito.</h1>
			<h1 class="text-center">
			<a  href="/<?php echo PATH; ?>/pages/reserva" class="btn btn-success btn-lg">Ir a mis reservas</a>
			</h1>
			</div>
		</div>
	</div>
</div>

</body>
</html>