<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<?php include('../includes/clases/Funciones.php'); ?>
<?php include('../includes/clases/Reserva.php'); 
      $reserva = new Reserva();    
 ?>
 <?php include('../includes/clases/Reservadet.php'); 
       $reservadet = new Reservadet('?','?','?','?');
       $reservadet -> LiberarTraslado($_SESSION[KEY.USUARIO]);

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reserva</title>
	
<?php include('../enlaces/principal.php'); ?>
<?php include('../enlaces/datatables.php'); ?>
<?php include('../enlaces/jquery-ui.php'); ?>
<?php include('../enlaces/selectize.php'); ?>
 
   <script>
  $(function() {
    $( "#fechainicio" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#fechafin" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
  </script>
</head>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php include('../nav.php'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-2">
		<?php include('../form/md-reserva-ot.php'); ?>			
		</div>
		<div class="col-md-2">
			<?php include('../form/md-reserva-cc.php'); ?>
		</div>
	</div>

 <p></p>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">Lista de Reservas.

            
             <form action="<?php echo $php_self; ?>" class="form-inline" method="GET">
             <input type="text" name="fechainicio" id="fechainicio" class="form-control input-sm" required="" placeholder="Fecha de Inicio" value="<?php echo $_POST[fechainicio]; ?>">

              <input type="text" name="fechafin" id="fechafin" class="form-control input-sm" required="" placeholder="Fecha de Fin" value="<?php echo $_POST[fechafin]; ?>">
              <button class="btn btn-primary btn-sm">Consultar</button>
             </form>
             
				</div>
				<div class="panel-body">
					<?php include('../grid/reserva.php'); ?>
				</div>
			
			
			</div>
		</div>
	</div>
</div>

</body>
</html>