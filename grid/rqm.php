<?php

//$fechainicio = meses_down('-2');
$fechainicio    = date('Y/m/d');
$fechafin       = date('Y/m/d');

if (!isset($_POST['fechainicio'])) {
	$query="SELECT REQ_NUMERO,TDESCRI,REQ_DEORDFAB,CENCOST_CODIGO,
CONVERT(VARCHAR,REQ_FECHA_EMISION,105)AS REQ_FECHA_EMISION ,
CONVERT(VARCHAR,REQ_FECHA_AUTORI,105)AS REQ_FECHA_AUTORI,
CASE REQ_ESTADO
WHEN '00'  THEN 'EMITIDO'
WHEN '01'  THEN 'ATENDIDO'
WHEN '03'  THEN 'REC-PARCIAL'
WHEN '04'  THEN 'REC-TOTAL'
WHEN '05'  THEN 'LIQUIDADA'
WHEN '06'  THEN 'ANULADA'
END AS ESTADO
FROM ".BDSTARSOFT.".DBO.INV_REQMATERIAL_CAB  AS C INNER JOIN 
".BDSTARSOFT.".DBO.TABAYU AS T ON C.REQ_PERSONAL_SOLIC = T.TCLAVE AND TCOD=12 WHERE REQ_FECHA_EMISION BETWEEN 
'$fechainicio' AND '$fechafin' ";

}
else
{
	$query="SELECT REQ_NUMERO,TDESCRI,REQ_DEORDFAB,CENCOST_CODIGO,
CONVERT(VARCHAR,REQ_FECHA_EMISION,105)AS REQ_FECHA_EMISION ,
CONVERT(VARCHAR,REQ_FECHA_AUTORI,105)AS REQ_FECHA_AUTORI,
CASE REQ_ESTADO
WHEN '00'  THEN 'EMITIDO'
WHEN '01'  THEN 'ATENDIDO'
WHEN '03'  THEN 'REC-PARCIAL'
WHEN '04'  THEN 'REC-TOTAL'
WHEN '05'  THEN 'LIQUIDADA'
WHEN '06'  THEN 'ANULADA'
END AS ESTADO
FROM ".BDSTARSOFT.".DBO.INV_REQMATERIAL_CAB  AS C INNER JOIN 
".BDSTARSOFT.".DBO.TABAYU AS T ON C.REQ_PERSONAL_SOLIC = T.TCLAVE AND TCOD=12 WHERE REQ_FECHA_EMISION BETWEEN 
'$_REQUEST[fechainicio]' AND '$_REQUEST[fechafin]' ";
}


$result=mssql_query($query);
?>
<div class="table-responsive">
<table id="consulta" class="table table-striped table-bordered table-condensed" >
<thead>
<tr class="info">
<th>NÚMERO</th>
<th>SOLICITANTE</th>
<th>OT</th>
<th>CC</th>
<th>FECHA DE EMISIÓN</th>
<th>FECHA DE AUTORIZACIÓN</th>
<th>ESTADO</th>
<th><i class="fa fa-file-pdf-o fa-2x text-warning"></i></th>
</tr>
</thead>

<tbody>

<?php 
while ($fila=mssql_fetch_object($result))
{
?>
<tr>
<td><?php echo $fila->REQ_NUMERO; ?>   </td>
<td><?php echo utf8_encode($fila->TDESCRI); ?>  </td>
<td><?php echo $fila->REQ_DEORDFAB; ?> </td>
<td><?php echo $fila->CENCOST_CODIGO; ?></td>
<td><?php echo $fila->REQ_FECHA_EMISION; ?></td>
<td><?php echo $fila->REQ_FECHA_AUTORI; ?></td>
<td><?php echo $fila->ESTADO; ?></td>
<td>

<div class="btn-group">
<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
Orden
<span class="caret"></span>
</button>
<ul class="dropdown-menu pull-right" role="menu">
<li><a href="../PDF/reporte/rqm?id=<?php echo $fila->REQ_NUMERO; ?>&
orden=TCASILLERO"
 target="_blank">Casillero</a>
</li>
<li><a href="../PDF/reporte/rqm?id=<?php echo $fila->REQ_NUMERO; ?>&
orden=ACODIGO"
 target="_blank">Código</a>
</li>
<li><a href="../PDF/reporte/rqm?id=<?php echo $fila->REQ_NUMERO; ?>&
orden=CONVERT(INT,REQ_ITEM)"
 target="_blank">Item</a>
</li>

</ul>
</div>

</td>
</tr>
<?php
}

?>	

</tbody>

</table> 
</div>

<script>
$(document).ready(function() {
$('#consulta').DataTable();
} );
</script>