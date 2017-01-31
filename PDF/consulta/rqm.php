<?php 
include('../../configuracion.php');
include('../../rutas.php');

$querycab="SELECT REQ_NUMERO,
CONVERT(VARCHAR,REQ_FECHA_EMISION,105)AS FECHA,REQ_PERSONAL_SOLIC,TDESCRI,REQ_GLOSA FROM ".BDSTARSOFT.".DBO.INV_REQMATERIAL_CAB AS C 
INNER JOIN ".BDSTARSOFT.".DBO.TABAYU AS T ON C.REQ_PERSONAL_SOLIC=T.TCLAVE WHERE  REQ_NUMERO='$_GET[id]' AND T.TCOD=12";

$querydet  = "SELECT INVD.REQ_ITEM,INVD.ACODIGO,M.ADESCRI,M.AUNIDAD,INVD.REQ_CANTIDAD_REQUERIDA AS CANT,
(INVD.REQ_CANTIDAD_REQUERIDA-INVD.REQ_CANTIDAD_DESPACHADA) as SALDO ,
TC.TCASILLERO,
(INVD.REQ_CANTIDAD_REQUERIDA-(INVD.REQ_CANTIDAD_REQUERIDA-INVD.REQ_CANTIDAD_DESPACHADA) )AS DESPACHO,
INVD.CENCOST_CODIGO,INVD.REQ_DEORDFAB
FROM ".BDSTARSOFT.".DBO.INV_REQMATERIAL_CAB  AS INVC 
INNER JOIN ".BDSTARSOFT.".DBO.INV_REQMATERIAL_DET  AS INVD 
ON INVC.REQ_NUMERO=INVD.REQ_NUMERO 
INNER JOIN ".BDSTARSOFT.".DBO.MAEART AS M ON INVD.ACODIGO=M.ACODIGO  
LEFT JOIN ".BDSTARSOFT.".DBO.TABCASILLERO AS TC ON 
M.ACODIGO=TC.TCODART  AND TCODALM='01'
INNER JOIN ".BDSTARSOFT.".DBO.TABAYU AS T ON
INVC.REQ_PERSONAL_SOLIC=T.TCLAVE   WHERE 
  T.TCOD=12   AND INVC.REQ_NUMERO='$_GET[id]'
  ORDER BY ".$_GET['orden']." ";
$resultdet = mssql_query($querydet);
$resultcab = mssql_query($querycab);
$filacab   = mssql_fetch_array($resultcab);

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Requerimiento de Materiales - <?php echo $_GET['id'] ?></title>
	<link rel="stylesheet" href="../estilos/estilos.css">
</head>
<body>
<center>
<img src="../../assets/img/logoreporte.png" >
<br>
<label>Requerimiento de Materiales <?php echo $_GET['id']; ?></label>
</center>
<div class="separacion">&nbsp;</div>
<table >
<tr>
<td class="left cab" height="35">FECHA DE EMISIÓN:</td>
<td class="left cab"><?php echo $filacab['FECHA']; ?></td>
<td class="left cab">SOLICITANTE:</td>
<td class="left cab"><?php echo utf8_encode($filacab['TDESCRI']); ?></td>
</tr>
<tr>
<td class="left cab" height="35">COMENTARIO:</td>
<td class="left cab"><?php echo $filacab['REQ_GLOSA']; ?></td>
<td class="left cab">JEFE DE ÁREA SOLICITANTE:</td>
<td class="left cab"></td>
</tr>
<tr>
<td class="left cab" height="35">NOTA DE SALIDA:</td>
<td class="left cab"></td>
<td class="left cab">ENCARGADO DE ALMACEN:</td>
<td class="left cab"></td>
</tr>
</table>

<div class="separacion">&nbsp;</div>

<table >
<thead>
<tr>
<th class="center">IT</th>
<th class="left">CÓDIGO</th>
<th class="left">DESCRIPCIÓN</th>
<th class="center">CANT</th>
<th class="center">SALDO</th>
<th class="center">DESP.</th>
<th class="center">UND</th>
<th class="center">CC</th>
<th class="center">OT</th>
<th class="center">UBC</th>
</tr>
</thead>
<tbody>

<?php 
while ($fila=mssql_fetch_object($resultdet))
 {
 ?>
<tr>
<td class="center"><?php echo $fila->REQ_ITEM; ?></td>
<td class="left"><?php echo $fila->ACODIGO; ?></td>
<td class="left"><?php echo utf8_encode($fila->ADESCRI); ?></td>
<td class="center"><?php echo utf8_encode($fila->CANT); ?></td>
<td class="center"><?php echo $fila->SALDO; ?></td>
<td class="center"><?php echo $fila->DESPACHADO ?></td>
<td class="center"><?php echo $fila->AUNIDAD; ?> </td>
<td class="center"><?php echo $fila->CENCOST_CODIGO; ?></td>
<td class="center"><?php echo $fila->REQ_DEORDFAB; ?></td>
<td class="center"><?php echo $fila->TCASILLERO; ?></td>
</tr>
<?php
}
 ?>

</tbody>
</table>


</body>
</html>