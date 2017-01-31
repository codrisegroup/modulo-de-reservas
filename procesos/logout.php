	<?php 
	include('../configuracion.php');
	include('../includes/clases/Acceso.php');

	$acceso  =  new Acceso('?','?');
	$acceso  -> Logout();
	
	?>