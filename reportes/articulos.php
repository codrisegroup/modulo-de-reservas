<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Articulos</title>
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
<div class="col-md-12">

<div class="panel panel-default">
	
	<div class="panel-heading">Lista de Articulos
    

	</div>
	<div class="panel-body">
	<?php 

include('../grid/reportes/articulos.php');

 ?>
	</div>

</div>

</div>
</div>
</div>

</body>
</html>