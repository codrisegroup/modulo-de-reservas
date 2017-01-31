<?php 
include('configuracion.php');
session_start();
if (!isset($_SESSION[KEY.USUARIO]))
 {
	include('acceso.php');
 }
 else
 {
   header('Location: home');
 }


 ?>