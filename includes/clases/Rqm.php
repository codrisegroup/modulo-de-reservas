<?php 

class Rqm{

protected $numero;
protected $comentario;
protected $fecha;
protected $reserva;



function __construct($numero,$comentario,$fecha,$reserva){

	$this->numero      = $numero;
	$this->comentario  = $comentario;
	$this->fecha       = $fecha;
	$this->reserva     = $reserva;
}


function Registrar()
{
  
$query_cab="
INSERT INTO ".BDSTARSOFT.".DBO.INV_REQMATERIAL_CAB(REQ_NUMERO,REQ_FECHA_EMISION,REQ_FECHA_ENTREGA,REQ_ESTADO,REQ_PERSONAL_SOLIC,REQ_GLOSA,REQ_FECHA_CREACION,
CENCOST_CODIGO,REQ_DEORDFAB,REQ_USUARIO)
SELECT LTRIM('$this->numero'),'$this->fecha','$this->fecha','00',SOLICITANTE,'$this->comentario','$this->fecha',LTRIM(CENTROCOSTO),LTRIM(OT),'userweb'
 FROM ".BD.".DBO.RESERVA_CAB WHERE NRORESERVA='$this->reserva';
 ";

$query_det ="
INSERT INTO ".BDSTARSOFT.".dbo.INV_REQMATERIAL_DET(REQ_NUMERO,REQ_ITEM,ACODIGO,REQ_CANTIDAD_REQUERIDA,REQ_CANTIDAD_AUTORIZADA,CENCOST_CODIGO,
REQ_COMENTARIO1,REQ_DEORDFAB,REQ_CANTIDAD_DESPACHADA)
SELECT LTRIM('$this->numero'),(ROW_NUMBER() OVER(ORDER BY  CODIGO))AS ITEM,
LTRIM(CODIGO),CANTIDAD,0,LTRIM(C.CENTROCOSTO),LTRIM(C.OT),LTRIM(C.OT),0
FROM ".BD.".dbo.RESERVA_CAB AS C INNER JOIN 
".BD.".DBO.RESERVA_DET AS D ON 
C.NRORESERVA=D.NRORESERVA  WHERE C.NRORESERVA='$this->reserva'";

$query_reserva_cab="UPDATE ".BD.".DBO.RESERVA_CAB SET ESTADO='01',
                REQUERIMIENTO='$this->numero' WHERE 
                 NRORESERVA='$this->reserva'";

$query_reserva_det="UPDATE ".BD.".DBO.RESERVA_DET SET 
                REQUERIMIENTO='$this->numero' WHERE 
                 NRORESERVA='$this->reserva'";

$query_numdoc="UPDATE ".BDSTARSOFT.".dbo.NUM_DOCCOMPRAS SET CTNNUMERO=CTNNUMERO+1 WHERE CTNCODIGO='RM'";



$result_cab=mssql_query($query_cab);

if (!$result_cab)
 {
	echo "error";
 }
 else
 {  
 	$result_det         = mssql_query($query_det);
 	$result_reserva_cab = mssql_query($query_reserva_cab);
 	$result_reserva_det = mssql_query($query_reserva_det);
 	$result_numdoc      = mssql_query($query_numdoc);
 	

 	header('Location: ../../pages/rqm');
 }



}



function Correlativo()
{
  
  $query  =   "SELECT CTNNUMERO FROM ".BDSTARSOFT.".DBO.NUM_DOCCOMPRAS  WHERE  CTNCODIGO='RM'";
  $result = mssql_query($query);
  $dato   = mssql_fetch_array($result);
  return $dato['CTNNUMERO']+1;
  

}



function Eliminar()
{
  foreach ($this->numero as $key => $valuerequerimiento) {
  

$queryinvcab   = "UPDATE ".BDSTARSOFT.".DBO.INV_REQMATERIAL_CAB
SET REQ_ESTADO='06' WHERE REQ_NUMERO='$valuerequerimiento'";

$queryresvcab  = "UPDATE ".BD.".DBO.RESERVA_CAB SET ESTADO='00',REQUERIMIENTO='' WHERE 
    REQUERIMIENTO='$valuerequerimiento'";

$queryresvdet  = "UPDATE ".BD.".DBO.RESERVA_DET SET REQUERIMIENTO='' WHERE 
    REQUERIMIENTO='$valuerequerimiento'";

$resultinvcab   = mssql_query($queryinvcab);


if (!$resultinvcab) 
{
  echo "error";
}
else
{ 

$resultresvcab  = mssql_query($queryresvcab);
$resultresvdet  = mssql_query($queryresvdet);

header('Location: ../../pages/eliminar-rqm');

}

}


}


}

 ?>