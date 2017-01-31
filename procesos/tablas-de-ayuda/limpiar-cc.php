<?php  
include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Ot.php');

$link  = Conectarse();

  $ot  = new Ot('?','?',$_GET['ot'],'?','?','?','?','?');
  $ot -> Limpiar(); 



?>