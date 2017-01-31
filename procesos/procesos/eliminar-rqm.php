<?php 

if (empty($_POST['rqm'])) {
	
echo "<script>
alert('No hay seleccionado ningun registro.');
window.location='../../pages/eliminar-rqm';
</script>";

}


include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Rqm.php');


$requerimiento   =  $_POST['rqm'];

$rqm = new Rqm($requerimiento,'?','?','?');
$rqm -> Eliminar();















 ?>