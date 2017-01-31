<?php 
include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Ot.php');

$otcc  =  new Ot('?','?',$_POST['ot'],'?','?','?','?','?','?','?');
$otcc -> Eliminar();

 ?>