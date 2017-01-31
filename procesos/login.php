<?php 
include('../configuracion.php');
include('../includes/bd/conexion.php');
include('../includes/clases/Acceso.php');

$acceso  =  new Acceso($_POST['usuario'],$_POST['contrasena']);
$acceso  -> Login();

?>