<?php 


class Acceso{


protected $usuario;
protected $contrasena;


function __construct($usuario,$contrasena)
{

$this->usuario    = addslashes($usuario);
$this->contrasena = addslashes($contrasena);

}


function Login(){

$link = Conectarse();
$query= "SELECT * FROM ".BD.".DBO.USUARIOS
WHERE usuario='$this->usuario' AND contrasena='$this->contrasena'
AND idtipousuario IN (1,2)"; 
$result= mssql_query($query);
$numfila =mssql_num_rows($result);
$fila=mssql_fetch_array($result);


if ($numfila>0) 
{
session_start();
$_SESSION[KEY.USUARIO]     = $fila['id_usuario'];
$_SESSION[KEY.NOMBRES]     = $fila['nombres'];
$_SESSION[KEY.APELLIDOS]   = $fila['apellidos'];
$_SESSION[KEY.SOLICITANTE] = $fila['starsoft'];
$_SESSION[KEY.AREA]        = $fila['idarea'];



header("Location: /".PATH."/");
}
else 
{
 
header("Location: /".PATH."/");
}


}


function Logout()
{
	session_start();
	
	if (!isset($_SESSION[KEY.USUARIO]))
	{	
	header('Location: /'.PATH.'/');
	}
	else
	{
	unset($_SESSION[KEY.USUARIO]);
	unset($_SESSION[KEY.NOMBRES]);
	unset($_SESSION[KEY.APELLIDOS]);
	unset($_SESSION[KEY.SOLICITANTE]);
	
	
	header('Location: /'.PATH.'/');
    }

}



}

















 ?>