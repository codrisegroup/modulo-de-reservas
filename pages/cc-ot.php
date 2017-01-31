<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<?php include('../includes/clases/Reserva.php'); 
      $reserva = new Reserva();    
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reserva</title>
<?php include('../enlaces/principal.php'); ?>
<?php include('../enlaces/datatables.php'); ?>
<?php include('../enlaces/selectize.php'); ?>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#idot").change(function () {
$("#idot option:selected").each(function () {
elegido=$(this).val();
$.post("descripcion-ot.php", { elegido: elegido }, function(data){
$("#mostrar").html(data);
});     
});
});    
});
</script>

<style type="text/css">
table{font-size: 10px;}
</style>
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
			<?php 

			if($_SESSION[KEY.AREA]==7 ||
			$_SESSION[KEY.AREA]==8 ||
			$_SESSION[KEY.AREA]==17 )
			include('../form/fm-asociar-ot-cc.php');
			else  if($_SESSION[KEY.AREA]==3 ||
			$_SESSION[KEY.AREA]==7 ||
			$_SESSION[KEY.AREA]==8 ||
			$_SESSION[KEY.AREA]==17 )
			echo "";
			else
			echo "";

			?>


			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">Lista de Ot y Centros de Costos.

               <div class="pull-right">
               <a href="../DOCS/Detalle Ot e Ingresos.xlsx" class="btn btn-success btn-xs">Descargar Odbc</a>
               </div>
             
				</div>
				<div class="panel-body">

				<?php 
                 
                 if($_SESSION[KEY.AREA]==7 ||
                 	$_SESSION[KEY.AREA]==8 ||
                 	$_SESSION[KEY.AREA]==17 )
                 include('../grid/cc-ot/nivel1.php');
                 else  if($_SESSION[KEY.AREA]==3 ||
                 	      $_SESSION[KEY.AREA]==7 ||
		             	  $_SESSION[KEY.AREA]==8 ||
		             	  $_SESSION[KEY.AREA]==17 )
                 include('../grid/cc-ot/nivel2.php');
                 else
                 include('../grid/cc-ot/nivel3.php');
				 ?>

				</div>
			
			
			</div>
		</div>
	</div>
</div>

</body>
</html>