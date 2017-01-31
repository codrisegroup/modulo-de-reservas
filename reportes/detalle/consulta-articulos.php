<?php include('../../configuracion.php'); ?>
<?php include('../../rutas.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Detalle de Articulo <?php echo $_GET['codigo']; ?></title>
<?php include('../../enlaces/principal.php'); ?>
<?php include('../../enlaces/datatables.php'); ?>
<style>
th,td{font-size: 13px;}
</style>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">Detalle de Articulo <?php echo $_GET['codigo'] ?></div>
				<div class="panel-body">
				  <?php include('../../grid/detalle-consulta-articulos.php'); ?>
				</div>
			
			</div>
		</div>
	</div>
</div>
</body>
</html>