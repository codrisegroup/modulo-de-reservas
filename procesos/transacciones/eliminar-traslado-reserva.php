<?php 


include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Reservadet.php');

$reservadet  =  new Reservadet('?','?','?','?');
$reservadet  -> LiberarTrasladoItem($_SESSION[KEY.USUARIO],$_GET['codigo']);


 ?>