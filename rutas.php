<?php 
session_start();
if (!isset($_SESSION[KEY.USUARIO]))
 {
   header('Location: /'.PATH.'/');	
 }

include('includes/bd/conexion.php');
$link = Conectarse();
 ?>