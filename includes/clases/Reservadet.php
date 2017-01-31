<?php 

class Reservadet{

protected  $reserva;
protected  $idreserva;
protected  $codigo;
protected  $cantidad;


function  __construct($reserva,$idreserva,$codigo,$cantidad)
{   
	$this->reserva     =  $reserva;
  $this->idreserva   =  $idreserva;
	$this->codigo      =  $codigo;
	$this->cantidad    =  $cantidad;

}



function Agregar()
{


$query   = "SELECT * 
FROM ".BDSTARSOFT.".DBO.STKART WHERE STALMA='01'
AND STCODIGO='$this->codigo'";
$result  = mssql_query($query);
$numfila = mssql_num_rows($result);

if ($numfila>0)
 {
   $query   = "
SELECT DISTINCT D.CODIGO,STSKDIS,(S.STSKDIS-SUM(ISNULL(D.CANT_PEND,0))) AS CANT_DISP,(SUM(ISNULL(D.CANT_PEND,0)))AS CANT_RESV
 FROM ".BD.".DBO.RESERVA_DET  AS  D RIGHT JOIN ".BDSTARSOFT.".DBO.STKART AS S ON S.STCODIGO=D.CODIGO AND S.STALMA='01'  
 WHERE  S.STCODIGO='$this->codigo' AND  S.STALMA='01' 
GROUP BY D.CODIGO,S.STSKDIS
";
$result  = mssql_query($query);
$dato    = mssql_fetch_array($result);

if ($dato['CANT_DISP']>=$_GET['cantidad'])
 {
    $query  = "IF EXISTS(SELECT DISTINCT * FROM ".BD.".DBO.RESERVA_DET  WHERE
CODIGO='$this->codigo' AND NRORESERVA='$this->reserva')
  UPDATE ".BD.".DBO.RESERVA_DET  SET CODIGO='$this->codigo',
  CANTIDAD=CANTIDAD+'$this->cantidad',
  CANT_PEND=CANTIDAD+'$this->cantidad'
  WHERE NRORESERVA='$this->reserva' AND CODIGO='$this->codigo' 
  ELSE
INSERT INTO ".BD.".DBO.RESERVA_DET(NRORESERVA,CODIGO,CANTIDAD,CANT_PEND)
VALUES('$this->reserva','$this->codigo','$this->cantidad','$this->cantidad')";
    $result = mssql_query($query);
    if (!$result)
     {
       echo "error";
     }
     else
     { 
     header('Location: ../../pages/editar-reserva?id='.$_GET['reserva']);
     }
 }
 else
 {
  header('Location: ../../pages/editar-reserva?id='.$_GET['reserva'].'&m='.'ns'.'&cantidad='.$dato['CANT_DISP']);
 }

 }
else
{
   header('Location: ../../pages/editar-reserva?id='.$_GET['reserva'].'&m='.'ne');
}
 

}




function  Eliminar()
{
 $query    =  "DELETE FROM ".BD.".DBO.RESERVA_DET 
 WHERE IDRESERVA_DET='$this->idreserva' ";
 $result   =  mssql_query($query);
 if (!$result)
  {
   echo "error";
 }
 else
 {
    header('Location: ../../pages/editar-reserva?id='.$this->reserva);
 } 

} 


function Actualizar()
{

foreach ($this->codigo as $key => $valuecodigo) {
  
    $valuecantidad = $this->cantidad[$key];

  $query  =  "UPDATE ".BD.".DBO.RESERVA_DET SET 
   CANTIDAD='$valuecantidad',
  CANT_PEND='$valuecantidad' WHERE NRORESERVA='$this->reserva'
   AND CODIGO='$valuecodigo' ";
  $result = mssql_query($query);
  if (!$result) {
    echo "error";
  }
  else
  {
    header('Location: ../../pages/editar-reserva?id='.$this->reserva);
  }


}


}


function ExisteDetalle()
{
   $query    ="SELECT * FROM ".BD.".DBO.RESERVA_DET
   WHERE  NRORESERVA='$this->reserva'";
   $result   = mssql_query($query);
   $numfilas = mssql_num_rows($result);
   return $numfilas;
}


function TrasladarDetalle($usuario)
{

$query   = "
INSERT INTO ".BD.".DBO.TMP_TRASLADAR(CODIGO,CANTIDAD,RESERVA_INICIAL,RESERVA_TRASLADO,USUARIO)
SELECT CODIGO,CANTIDAD,NRORESERVA,'','$usuario' FROM ".BD.".DBO.RESERVA_DET  WHERE NRORESERVA='$this->reserva'";
$result  = mssql_query($query); 
if (!$result)
echo "error";
else
header('Location: ../../pages/trasladar-reserva');

}



function LiberarTraslado($usuario)
{
$query   =  "DELETE FROM ".BD.".DBO.TMP_TRASLADAR WHERE USUARIO='$usuario'";
$result  = mssql_query($query);
if (!$result) 
#echo "error";
echo "";
else
#echo "ok";
echo "";
}

function LiberarTrasladoItem($usuario,$codigo)
{
$query   =  "DELETE FROM ".BD.".DBO.TMP_TRASLADAR WHERE 
         USUARIO='$usuario' AND CODIGO='$codigo'";
$result  = mssql_query($query);
if (!$result) 
echo "error";
else
header('Location: ../../pages/trasladar-reserva');
}


function IdReservaTraslado($usuario)
{
  $query  = "SELECT TOP 1 RESERVA_INICIAL FROM ".BD.".DBO.TMP_TRASLADAR WHERE 
  USUARIO='$usuario' GROUP BY RESERVA_INICIAL";
  $result = mssql_query($query);
  $dato   = mssql_fetch_array($result);
  return $dato['RESERVA_INICIAL'];
}

function ConfirmarTraslado($reservatraslado)
{
  foreach ($this->codigo as $key => $valuecodigo) 
{
  
$valuecantidad = $this->cantidad[$key];

$querytraslado  = "IF EXISTS(SELECT DISTINCT * FROM ".BD.".DBO.RESERVA_DET  WHERE
CODIGO='$valuecodigo' AND NRORESERVA='$reservatraslado')
  UPDATE ".BD.".DBO.RESERVA_DET  SET CODIGO='$valuecodigo',
  CANTIDAD=CANTIDAD+'$valuecantidad',
  CANT_PEND=CANTIDAD+'$valuecantidad'
  WHERE NRORESERVA='$reservatraslado' AND CODIGO='$valuecodigo' 
  ELSE
INSERT INTO ".BD.".DBO.RESERVA_DET(NRORESERVA,CODIGO,CANTIDAD,CANT_PEND)
VALUES('$reservatraslado','$valuecodigo','$valuecantidad','$valuecantidad')";

$queryinicial   = "UPDATE ".BD.".DBO.RESERVA_DET 
SET CANTIDAD=CANTIDAD-'$valuecantidad',
    CANT_PEND=CANTIDAD-'$valuecantidad' 
    WHERE NRORESERVA='$this->reserva' AND CODIGO='$valuecodigo'";

$queryeliminar  = "DELETE FROM ".BD.".DBO.RESERVA_DET
  WHERE NRORESERVA='$this->reserva' AND CODIGO='$valuecodigo' AND CANTIDAD=0";

 $result = mssql_query($querytraslado);

if (!$result) 
echo "error";
else
$resultinicial = mssql_query($queryinicial);
$resulteliminar = mssql_query($queryeliminar);
header('Location: /'.PATH.'/mensaje/traslado-ok');


}
}


}


 ?>