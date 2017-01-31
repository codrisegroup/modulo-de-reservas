<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Eliminar Reservas</title>
	<?php include('../enlaces/principal.php'); ?>
	<?php include('../enlaces/datatables.php'); ?>
</head>
<body>

<div class="container-fluid">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<?php include('../nav.php'); ?>
	</div>
</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       <form action="../procesos/procesos/eliminar-reserva.php" method="POST">
        <div class="panel panel-default">
        	

        	<div class="panel-heading">Seleccione la reservas que desea eliminar.
            <div class="pull-right">
            <?php include('../form/md-eliminar-reserva.php'); ?>
            </div>
        	</div>
        	<div class="panel-body">
        		<?php include('../grid/procesos/eliminar-reserva.php'); ?>
        	</div>
   
        
        </div>
		</form>

		</div>
	</div>
</div>

</body>
</html>