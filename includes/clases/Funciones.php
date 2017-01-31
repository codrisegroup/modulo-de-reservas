<?php 



function cerosizq($numero, $ceros=2){
return sprintf("%0".$ceros."s", $numero ); 
}



function LiberarCargaExcel($usuario){

$query   =  "DELETE FROM ".BD.".DBO.DATOS_RSV
WHERE USUARIO='$usuario'";
$result  = mssql_query($query);
if (!$result)
 {
   #echo "error";	
   echo "";
 }
else
{
	#echo "ok";
	echo "";
}


}



function CargaExcelReserva($codigo,$cantidad,$reserva)
{

foreach ($codigo as $key => $valuecodigo) {

$valuecantidad =  $cantidad[$key];
	
$query    = "
IF EXISTS(SELECT DISTINCT * FROM ".BD.".DBO.RESERVA_DET  WHERE
CODIGO='$valuecodigo' AND NRORESERVA='$reserva')
  UPDATE ".BD.".DBO.RESERVA_DET  SET CODIGO='$valuecodigo',
  CANTIDAD=CANTIDAD+$valuecantidad,
  CANT_PEND=CANTIDAD+$valuecantidad
  WHERE NRORESERVA='$reserva' AND CODIGO='$valuecodigo' 
  ELSE
INSERT INTO ".BD.".DBO.RESERVA_DET(NRORESERVA,CODIGO,CANTIDAD,CANT_PEND)
VALUES('$reserva','$valuecodigo','$valuecantidad','$valuecantidad')";
$result   = mssql_query($query);
if (!$result)
echo "error";
else
header('Location: ../../mensaje/transferencia-excel');





}





}



function meses_down($cantidad)
{

$fecha = date('Y-m-j');
$nuevafecha = strtotime ( ''.$cantidad.' month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y/m/j' , $nuevafecha );
 
return $nuevafecha;


}



 ?>