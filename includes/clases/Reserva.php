<?php 

class Reserva{


protected $nroreserva;
protected $solicitante;
protected $usuario;
protected $ot;
protected $cc;
protected $requerimiento;
protected $tipo;
protected $fecha;
protected $estado;



function __construct($nroreserva,$solicitante,$usuario,$ot,$cc,$requerimiento,$tipo,$fecha,$estado)
{

 $this->nroreserva      = $nroreserva;
 $this->solicitante     = $solicitante; 
 $this->usuario 		    = $usuario;
 $this->ot				      = $ot;
 $this->cc				      = $cc;
 $this->requerimiento	  = $requerimiento;
 $this->tipo			      = $tipo;
 $this->fecha 			    = $fecha;
 $this->estado  		    = $estado;


}

function Registrar()
{
	$link   = Conectarse();
  $query  = "
INSERT INTO ".BD.".DBO.RESERVA_CAB(SOLICITANTE,OT,ESTADO,
USUARIO,REQUERIMIENTO,IDAREA,AUD_JEFE,AUD_ALM,CENTROCOSTO,TIPO,FECHA)
VALUES('$this->solicitante','$this->ot','$this->estado',
'$this->usuario','$this->requerimiento','','','','$this->cc',
'$this->tipo','$this->fecha');";
  $result = mssql_query($query);
  if (!$result) 
  {
    echo "error";
  } 
    else
    {
      header('Location: ../../pages/reserva');
    }
  

} 




function Correlativo()
{
 $link   = Conectarse();
 $query  = "
SELECT  TOP 1 NRORESERVA FROM ".BD.".DBO.RESERVA_CAB ORDER BY NRORESERVA DESC";
 $result = mssql_query($query);
 $dato   = mssql_fetch_array($result);
 return $dato['NRORESERVA']+1;

}



function  Dato($nroreserva,$variable){

$query   =  "
SELECT NRORESERVA,OT,CENTROCOSTO,(nombres+' '+apellidos) AS FULLNAME FROM ".BD.".DBO.RESERVA_CAB AS C 
INNER JOIN  ".BD.".DBO.USUARIOS AS U  ON C.USUARIO=U.id_usuario WHERE NRORESERVA='$nroreserva'";
$result  = mssql_query($query);
$dato    = mssql_fetch_array($result);
return   $dato[$variable];

}




function Eliminar()
{

foreach ($this->nroreserva as $key => $valuereserva) {
  
  $querycab   =  "UPDATE ".BD.".DBO.RESERVA_CAB SET ESTADO='06'
  WHERE NRORESERVA='$valuereserva'";
  $querydet   =  "DELETE FROM ".BD.".DBO.RESERVA_DET WHERE 
  NRORESERVA='$valuereserva'";
  $resultcab  =  mssql_query($querycab);
  if (!$resultcab) 
  {
   echo "error";
   } 
    else
    {   
      $resultdet  =  mssql_query($querydet);
      header('Location: ../../pages/eliminar-reservas');
    }

}



}




}


 ?>