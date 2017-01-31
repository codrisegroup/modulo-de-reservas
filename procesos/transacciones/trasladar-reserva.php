<?php 
include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Reservadet.php');




$reservadet  =  new Reservadet($_GET['id'],'?','?','?');
$reservadet  -> TrasladarDetalle($_SESSION[KEY.USUARIO]);
 ?>