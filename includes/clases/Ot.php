<?php 	

class Ot{

protected $id;
protected $cc;
protected $ot;
protected $fecha;
protected $hora;
protected $usuario;
protected $ip;
protected $estado;
protected $codigo;


function __construct($id,$cc,$ot,$fecha,$hora,$usuario,$ip,$codigo){

  $this->id      = $id;
  $this->cc      = $cc;
  $this->ot      = $ot;
  $this->fecha   = $fecha;
  $this->hora    = $hora;
  $this->usuario = $usuario;
  $this->ip      = $ip;
  $this->codigo  = $codigo;

}


function Registrar()
{
  $query   =  "INSERT INTO ".BD.".DBO.CENCOSOT(CODIGOCENTROCOSTO,CODIGOOT,FECHA,HORA,USUARIO,NOMBRE_PC,CODIGO)
  VALUES('$this->cc','$this->ot','$this->fecha','$this->hora','$this->usuario','$this->ip',LTRIM('$this->codigo'))";
  $result  = mssql_query($query);
  if (!$result) {
  	echo "error";
  }
  else
  {
  	header('Location: ../../pages/cc-ot');
  }

}


function Registrar_Servicios()
{
   $link_mysql   = Conectarse_mysql();
   $query_mysql  = "INSERT INTO CENCOSOT(CODIGOCENTROCOSTO,CODIGOOT,CANT_HORAS,HORA,USUARIO,NOMBRE_PC,ESTADO)
   VALUES('$this->cc','$this->ot','300',now(),'$this->usuario','$this->ip','$this->estado')";
   $result_mysql     = mysql_query($query_mysql);
   if (!$result_mysql) {
     echo "error";
   }
   else
   {
     echo "ok";
   }
}



function Eliminar()
{
	$query   = "DELETE FROM ".BD.".DBO.CENCOSOT   WHERE 
  CODIGOOT='$this->ot'";
	$result  = mssql_query($query);
	if (!$result) 
  {
		echo "error";
	}
	else
    {
    	header('Location: ../../pages/cc-ot');
    }

}

function ActualizarProduccion($fechainicio,$fechafin,$status,$tecnico,$maquina,$detalle)
{
  $query   = "UPDATE ".BD.".DBO.CENCOSOT SET
   FECHAINICIO_REPRO='$fechainicio',FECHAFIN_REPRO='$fechafin',STATUS='$status',TECNICO='$tecnico',MAQUINA='$maquina',DETALLE=LTRIM('$detalle') WHERE CODIGOOT='$this->ot'";
  $result  = mssql_query($query);
  if (!$result)
  {
  echo "error";
  }
  else
  {
  echo "
  <script>
  alert('Registro Actualizado');
  window.location='../../editar/ccot/actualizar?ot=$this->ot'
  </script>";

  }
}


function Limpiar()
{
  $query   = "UPDATE ".BD.".DBO.CENCOSOT SET
   FECHAINICIO_REPRO=NULL,FECHAFIN_REPRO=NULL,STATUS='',TECNICO='',MAQUINA='',
   DETALLE='' WHERE CODIGOOT='$this->ot'";
  $result  = mssql_query($query);
  if (!$result)
  {
  echo "error";
  }
  else
  {
  echo "
  <script>
  alert('Registro Actualizado');
  window.location='../../editar/ccot/actualizar?ot=$this->ot'
  </script>";

  }
}







function Eliminar_Servicios()
{
  $link_mysql    = Conectarse_mysql();
  $query_mysql   = "DELETE FROM CENCOSOT  WHERE CODIGOOT='$this->ot'";
  $result_mysql  = mysql_query($query_mysql);
  if (!$result_mysql) {
    echo "error";
  }
  else
    {
      echo "ok";
    }

}








function ObtenerCC($ot)
{
$link    = Conectarse();
$query   = "
SELECT CODIGOCENTROCOSTO FROM ".BD.".DBO.CENCOSOT  WHERE  CODIGOOT='$ot'";
$result  = mssql_query($query);
$dato    = mssql_fetch_array($result);
return  $dato['CODIGOCENTROCOSTO'];

}


function Datos($variable)
{

$link    = Conectarse();
$query   = "
SELECT 
CONVERT(VARCHAR,OF_FECHINI,23)AS OF_FECHINI,
CONVERT(VARCHAR,FECHAINICIO_REPRO,23)AS FECHAINICIO_REPRO,
CONVERT(VARCHAR,FECHAFIN_REPRO,23)AS FECHAFIN_REPRO,
STATUS,TECNICO,
MAQUINA,DETALLE FROM ".BD.".DBO.CENCOSOT AS  CO INNER JOIN ".BDSTARSOFT.".DBO.ORD_FAB AS O 
ON CO.CODIGOOT=O.OF_COD WHERE OF_COD='$this->ot'";
$result  = mssql_query($query);
$dato    = mssql_fetch_array($result);
return  $dato[$variable];


}



}



 ?>














