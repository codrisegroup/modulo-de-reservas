<?php 
include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Reservadet.php');


$reservadet  =  new Reservadet($_POST['id'],'',$_POST['codigo'],$_POST['cantidad']);

$reservadet -> Actualizar();









 ?>