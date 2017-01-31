<?php 			

include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Reserva.php');
include('../../includes/clases/Ot.php');

$fecha = date('Y-m-d');

if (!isset($_POST['ot'])) {
	
  $cc = $_POST['cc'];
}
else
{
$ot  =  new Ot();
$cc  =  $ot -> ObtenerCC($_POST['ot']);	
}

$reserva = new Reserva(' ',$_SESSION[KEY.SOLICITANTE],$_SESSION[KEY.USUARIO],$_POST['ot'],$cc,'',$_POST['tipo'],$fecha,'00');
$reserva -> Registrar();

 ?>