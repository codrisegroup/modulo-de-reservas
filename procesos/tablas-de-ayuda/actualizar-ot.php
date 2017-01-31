<?php  
include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Ot.php');

$link  = Conectarse();

  $ot  = new Ot('?','?',$_POST['ot'],'?','?','?','?','?');
  $ot -> ActualizarProduccion($_POST['fechainicio'],$_POST['fechafin'],
  	$_POST['status'],$_POST['tecnico'],$_POST['maquina'],$_POST['detalle']); 



?>