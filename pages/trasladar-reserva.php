<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<?php 
include('../includes/clases/Reserva.php');
include('../includes/clases/Reservadet.php');
      $reservadet     = new Reservadet('?','?','?','?');
      $reservainicial = $reservadet -> IdReservaTraslado($_SESSION[KEY.USUARIO]);

if (empty($reservainicial)) {
echo "<script>
alert('Esta reserva no tiene detalle para transferir.');
window.location='reserva';
</script>";
}

       $reserva        = new Reserva('?','?','?','?','?','?','?','?','?');

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reserva</title>
<?php include('../enlaces/principal.php'); ?>
<?php include('../enlaces/datatables.php'); ?>
<?php include('../enlaces/selectize.php'); ?>

</head>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php include('../nav.php'); ?>
		</div>
	</div>

   <div class="row">
   <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
   
   <div class="panel panel-primary">
     	
     	<div class="panel-heading"><i>Actualizar Reserva</i></div>
     	<div class="panel-body">
     		<ul>
     		<li>RESERVA: <?php echo $reserva         ->Dato($reservainicial,'NRORESERVA');?></li>
     		<li>USUARIO: <?php echo $reserva         ->Dato($reservainicial,'FULLNAME');?></li>
     		<li>OT: <?php echo $reserva         ->Dato($reservainicial,'OT');?></li>
     		<li>CENTRO DE COSTOS: <?php echo $reserva         ->Dato($reservainicial,'CENTROCOSTO');?></li>
     		</ul>
     	</div>
     
     	
     </div>  
   		
   </div>

<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
<div class="panel panel-warning">
	<!-- Default panel contents -->
	<div class="panel-heading">Nota</div>
	<div class="panel-body">
	<ul>
	<li>Si no necesita trasladar un articulo puede utilizar el botón <i class="fa fa-trash text-danger"></i>,esto solo quitara de la lista de traslado pero no eliminara el articulo de la reserva <?php echo $reservainicial; ?>.</li>
	<li>La cantidad a trasladar debe ser menor o igual a la cantidad del articulo.</li>
	</ul>
	</div>

	
</div>
	
</div>

   </div>


<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
            <form action="../procesos/transacciones/confirmar-traslado.php" method="POST">

            <input type="hidden" name="reservainicial" value="<?php echo $reservainicial; ?>">

			<div class="panel panel-default">
				
				<div class="panel-heading">Detalle de Reserva
                <div class="pull-right">
                <?php include('../form/md-transferir-reserva.php'); ?>
                </div>
				</div>
				<div class="panel-body">
				<?php include('../grid/traslado-reserva.php'); ?>
				</div>
			
			</div>

			</form>

		</div>
	</div>
   	

   </div>
</body>
</html>