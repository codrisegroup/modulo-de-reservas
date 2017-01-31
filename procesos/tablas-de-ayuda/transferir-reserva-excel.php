<?php 
include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Funciones.php');

$codigo    =  $_POST['codigo'];
$cantidad  =  $_POST['cantidad'];
$reserva   =  $_POST['reserva'];

CargaExcelReserva($codigo,$cantidad,$reserva);



 ?>