<?php 

if (empty($_POST['reserva'])) {
	
echo "<script>
alert('No hay seleccionado ningun registro.');
window.location='../../pages/eliminar-reservas';
</script>";

}


include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Reserva.php');

$reserva = new Reserva($_POST['reserva'],'','','','','','','','');

$reserva -> Eliminar();












 ?>