<?php include('../../configuracion.php'); ?>
<?php include('../../rutas.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Detalle Nota de Ingreso</title>
<?php include('../../enlaces/principal.php'); ?>
<?php include('../../enlaces/datatables.php'); ?>

<style>
th,td{ font-size: 18px }
</style>

</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jumbotron">
			<?php include('../../grid/detalle-ni.php'); ?>
			</div>
		</div>
	</div>
</div>
</body>
</html>