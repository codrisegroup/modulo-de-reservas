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
	<title>Eliminar</title>
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
<div class="col-md-2">
</div>
<div class="col-md-8">

<div class="panel panel-default">
    <div class="panel-heading">
    <strong>Eliminar Orden de Trabajo: <?php echo $_GET['ot']; ?></strong>
    </div>
	<div class="panel-body">
<form class="form-horizontal" method="POST" action="../../procesos/tablas-de-ayuda/eliminar-cc-ot.php">

<input type="hidden" name="ot" value="<?php echo $_GET['ot']; ?>">


<h2>¿Esta seguro de eliminar la orden de trabajo <strong><?php echo $_GET['ot']; ?></strong>?</h2>

<button type="submit" class="btn btn-danger btn-sm">Eliminar Orden de Trabajo</button>

</form>



	</div>
</div>


</div>
</div>

</div>
</body>
</html>