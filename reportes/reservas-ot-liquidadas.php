<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reservas OT liquidadas</title>
	<?php include('../enlaces/principal.php'); ?>
	<?php include('../enlaces/datatables.php'); ?>
</style>
</head>
<body>
<div class="container-fluid">

<div class="row">
<div class="col-md-12">
<?php include('../nav.php'); ?>
</div>
</div>

<div class="row">
<div class="col-md-12">

<div class="panel panel-warning">
	<!-- Default panel contents -->
	<div class="panel-heading">Reservas Ot Liquidadas</div>
	<div class="panel-body">
	<?php 

include('../grid/reportes/reservas-ot-liquidadas.php');

 ?>
	</div>

</div>

</div>
</div>
</div>

</body>
</html>