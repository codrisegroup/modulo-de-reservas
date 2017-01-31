<?php include('../../configuracion.php'); ?>
<?php include('../../rutas.php'); ?>
<?php include('../../includes/clases/Funciones.php'); ?>
<?php 

$query  =  "SELECT DFNUMPED,DFSECUEN,DFCODIGO,DFDESCRI,DFCANTID,DFSALDO,TB.TCASILLERO,
ISNULL(SUM(RD.CANTIDAD),0)AS CANT_SOL,ISNULL(S.STSKDIS,0)-ISNULL(SUM(RD.CANT_PEND),0)AS CANT_DISP
FROM ".BDSTARSOFT.".DBO.PEDDET AS PD
 LEFT JOIN ".BD.".DBO.RESERVA_DET AS RD ON
PD.DFCODIGO=RD.CODIGO  LEFT JOIN ".BDSTARSOFT.".DBO.STKART AS S ON 
PD.DFCODIGO=S.STCODIGO AND STALMA='01'  LEFT JOIN 
".BDSTARSOFT.".DBO.TABCASILLERO AS TB
ON S.STCODIGO=TB.TCODART AND TCODALM='01' WHERE DFSALDO >=1 AND DFALMA='01'  AND DFCODIGO <>'TEXTO'
AND CAST(DFNUMPED AS INT)='".$_GET['pedido']."'
GROUP BY DFNUMPED,DFSECUEN,DFCODIGO,DFDESCRI,DFCANTID,DFSALDO,STSKDIS,TCASILLERO
HAVING ISNULL(S.STSKDIS,0)-ISNULL(SUM(RD.CANT_PEND),0)>=1
ORDER BY TCASILLERO ";
$result = mssql_query($query);
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>PEDIDO  <?php echo cerosizq($_GET['pedido'],7); ?> </title>
	<link rel="stylesheet" href="../estilos/estilos.css"
</head>
<body>
<center>
<img src="../../assets/img/logoreporte.png" alt="" width="380" height="75" >
<br>
<label for="">Pedido <?php echo cerosizq($_GET['pedido'],7); ?></label>
</center>
<div class="separacion">&nbsp;</div>
<table>
<thead>
<tr>
<th>PEDIDO</th>
<th >IT</th>
<th >CÓDIGO</th>
<th >DESCRIPCIÓN</th>
<th >CANT. PEDIDO</th>
<th >CANT. POR ATENDER</th>
<th >UBIC.</th>
<th >CANT. DISP.</th>
<th>DESPACHO</th>


</tr>
</thead>
<tbody>
<?php 
while ($fila = mssql_fetch_object($result))
 {
	?>
 
<tr>
<td ><?php echo $fila->DFNUMPED; ?></td>
<td ><?php echo $fila->DFSECUEN; ?></td>
<td ><?php echo utf8_encode($fila->DFCODIGO); ?></td>
<td ><?php echo utf8_encode($fila->DFDESCRI); ?></td>
<td ><?php echo $fila->DFCANTID; ?></td>
<td ><?php echo $fila->DFSALDO; ?></td>
<td ><?php echo $fila->TCASILLERO; ?></td>
<td><?php echo $fila->CANT_DISP; ?></td>
<td></td>


</tr>



<?php
 }


 ?>
</tbody>
</table>
</body>
</html>