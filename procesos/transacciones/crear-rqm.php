<?php 

include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Rqm.php');


$reserva         = $_POST['reserva'];
$reqmaterial     = $_POST['rqm'];
$comentario      = $_POST['comentario'];
$fecha           = date('Y-m-d 00:00:00');


$rqm  =  new Rqm($reqmaterial,$comentario,$fecha,$reserva);
$rqm -> Registrar();


 ?>