<?php
include('../../configuracion.php');
include('../../rutas.php');

$excel = $_FILES['excel'];

if ($_FILES['excel']['type']=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') 
{

//cargamos el archivo al servidor con el mismo nombre
//solo le agregue el sufijo bak_ 
$archivo = $_FILES['excel']['name'];
$tipo = $_FILES['excel']['type'];
$destino = "bak_" . $archivo;
if (copy($_FILES['excel']['tmp_name'], $destino))
{
  #echo "archivo cargado";
}
else
{
echo "Error Al Cargar el Archivo";
}

if (file_exists("bak_" . $archivo)) {
/** Clases necesarias */
include('../../librerias/PHPEXCEL/PHPExcel.php');
include('../../librerias/PHPEXCEL/PHPExcel/Reader/Excel2007.php');
// Cargando la hoja de cálculo
$objReader = new PHPExcel_Reader_Excel2007();
$objPHPExcel = $objReader->load("bak_" . $archivo);
$objFecha = new PHPExcel_Shared_Date();
// Asignar hoja de excel activa
$objPHPExcel->setActiveSheetIndex(0);
//conectamos con la base de datos 
$link = Conectarse();
// Llenamos el arreglo con los datos  del archivo xlsx
for ($i = 1; $i <=300; $i++) {
$_DATOS_EXCEL[$i]['CODIGO'] = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['CANTIDAD'] = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();

}
}
//si por algo no cargo el archivo bak_ 
else 
{
echo "Necesitas primero importar el archivo";
}
$errores = 0;

#insertamos en la bd

foreach ($_DATOS_EXCEL as $key => $value)
{
$link   = Conectarse(); 	
$query  = "INSERT INTO ".BD.".DBO.DATOS_RSV(CODIGO,CANTIDAD,USUARIO,TIPO)
VALUES('$value[CODIGO]','$value[CANTIDAD]','".$_SESSION[KEY.USUARIO]."','RESERVA')";
$result = mssql_query($query);
if(!$result)
echo "error";
else
unlink($destino);#una vez terminado el proceso borramos el archivo que esta en el servidor el bak_
header('Location: ../../mensaje/carga-excel');

}




}
else
{
	echo "
	<script>
	alert('No es un archivo Excel');
	window.location='../../pages/cargar-excel';
	</script>";
}



?>