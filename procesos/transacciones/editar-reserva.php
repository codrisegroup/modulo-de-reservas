<?php 
include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Reservadet.php');


$reservadet =  new Reservadet($_GET['reserva'],'',$_GET['codigo'],$_GET['cantidad']);

$reservadet -> Agregar();




 ?>