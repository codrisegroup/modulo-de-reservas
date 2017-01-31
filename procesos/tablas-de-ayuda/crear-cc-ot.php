<?php 
include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Ot.php');

$fecha = date('Y-m-d');
$hora  = date('H:i:s');


$otcc  =  new Ot('?',$_POST['cc'],$_POST['ot'],$fecha,$hora,$_SESSION[KEY.USUARIO],$_SERVER['REMOTE_ADDR'],$_POST['codigo']);
$otcc -> Registrar();

 ?>