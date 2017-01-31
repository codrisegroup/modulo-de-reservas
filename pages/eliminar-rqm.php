<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Eliminar Requerimiento de Materiales</title>
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
       <form action="../procesos/procesos/eliminar-rqm.php" method="POST">
        <div class="panel panel-default">
        	

        	<div class="panel-heading">Requerimiento de Materiales Pendientes: Seleccione los requerimientos de materiales que desea eliminar.
            <div class="pull-right">
            <?php include('../form/md-eliminar-rqm.php'); ?>
            </div>
        	</div>
        	<div class="panel-body">
        		<?php include('../grid/procesos/eliminar-rqm.php'); ?>
        	</div>
   
        
        </div>
		</form>

		</div>
	</div>
</div>

</body>
</html>