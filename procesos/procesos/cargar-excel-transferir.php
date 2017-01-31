<?php 

include('../../configuracion.php');
include('../../rutas.php');

$cantidad = $_POST['cantidad'];
$codigo   = $_POST['codigo'];

foreach ($cantidad as $key => $value) {
	
	$valuecodigo  =  $codigo[$key];
	echo $value.' - '.$valuecodigo."</br>";
}


 ?>