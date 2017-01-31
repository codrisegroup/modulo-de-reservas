<?php
include('../configuracion.php');
include('../rutas.php');
session_start();
$link=Conectarse();
$query="
SELECT (ROW_NUMBER() OVER(ORDER BY ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0)) ASC))AS
 ITEM,
DRV.CODIGO,M.ADESCRI,DRV.CANTIDAD,DRV.TIPO,M.AUNIDAD,SUM(ISNULL(D.CANT_PEND,0)) AS CANT_RESERV,
ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0)) AS CANT_DISP,
S.STALMA
FROM  [022BDCOMUN].DBO.DATOS_RSV AS DRV LEFT JOIN 
[022BDCOMUN].DBO.RESERVA_DET AS D ON 
DRV.CODIGO=D.CODIGO  LEFT JOIN [010BDCOMUN].DBO.MAEART AS M ON 
DRV.CODIGO=M.ACODIGO LEFT JOIN (SELECT STCODIGO,STSKDIS,STALMA FROM [010BDCOMUN].DBO.STKART WHERE STALMA='01') AS S ON ACODIGO=S.STCODIGO 
WHERE DRV.USUARIO=".$_SESSION[KEY.USUARIO]."
GROUP BY DRV.CODIGO,M.ADESCRI,DRV.CANTIDAD,DRV.TIPO,M.AUNIDAD,S.STSKDIS,S.STALMA
HAVING DRV.CANTIDAD >ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0))
";  
$result=mssql_query($query) or die (mssql_error());  
if (mssql_num_rows($result) == 0)  
{  
echo "<script>
alert('No hay información Disponible');
window.location='../pages/consulta-carga-excel';
</script>";  
}
else
{

if (PHP_SAPI == 'cli')
die('Este archivo solo se puede ver desde un navegador web');

/** Se agrega la libreria PHPExcel */
require_once '../librerias/PHPEXCEL/PHPExcel.php';
// Se crea el objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Se asignan las propiedades del libro
$objPHPExcel->getProperties()->setCreator("usuario Overprime") //Autor
->setLastModifiedBy("usuario Overprime") //Ultimo usuario que lo modificó
->setTitle("Formato Cargar Excel")
->setSubject("Carga Excel")
->setDescription("Carga Masiva Requerimiento de Compra")
->setKeywords("Excel")
->setCategory("Reporte excel");

$titulosColumnas= array('CODIGO', 'DESCRIPCION', 'CANTIDAD');

// Se agregan los titulos del reporte
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1',  $titulosColumnas[0])
->setCellValue('B1',  $titulosColumnas[1])
->setCellValue('C1',  $titulosColumnas[2]);

//Se agregan los datos de los alumnos
$i = 2;
while ($fila=mssql_fetch_array($result)) {
$objPHPExcel->setActiveSheetIndex(0)
->setCellValueExplicit('A'.$i,   utf8_decode($fila['CODIGO']) ,PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValueExplicit('B'.$i,   utf8_encode($fila['ADESCRI']),PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValueExplicit('C'.$i,   $fila['CANTIDAD']-$fila['CANT_DISP'],PHPExcel_Cell_DataType::TYPE_NUMERIC)


;
$i++;

}

	

for($i = 'A'; $i <= 'C'; $i++){
$objPHPExcel->setActiveSheetIndex(0)			
->getColumnDimension($i)->setAutoSize(TRUE);
}

// Se asigna el nombre a la hoja
$objPHPExcel->getActiveSheet()->setTitle('Formato Carga Excel');

// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
$objPHPExcel->setActiveSheetIndex(0);


  // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="formato-carga-excel'.' '.date('d-m-Y H:i:s').'.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');



}


 ?>