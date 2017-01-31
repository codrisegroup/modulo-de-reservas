<?php 

$link = Conectarse();

$query  =  "

SELECT D.REQ_NUMERO,D.ACODIGO,D.REQ_CANTIDAD_REQUERIDA,D.REQ_CANTIDAD_AUTORIZADA,D.REQ_CANTIDAD_DESPACHADA,
CASE C.REQ_ESTADO  WHEN '04'  THEN 'ATENDIDO'END AS ESTADO,
CONVERT(VARCHAR,C.REQ_FECHA_CREACION,103)AS REQ_FECHA_CREACION
 FROM ".BDSTARSOFT.".DBO.INV_REQMATERIAL_CAB  AS C INNER JOIN ".BDSTARSOFT.".DBO.INV_REQMATERIAL_DET AS D 
ON C.REQ_NUMERO=D.REQ_NUMERO  WHERE C.REQ_ESTADO IN ('04') AND REQ_CANTIDAD_REQUERIDA<>REQ_CANTIDAD_DESPACHADA
";

$result = mssql_query($query);
 ?>

<div class="table-responsive">
<table id="consulta" class="table table-bordered table-condensed">
<thead>
<tr class="danger">
<th>REQUERIMIENTO</th>
<th>CÓDIGO</th>
<th>CANTIDAD REQUERIDA</th>
<th>CANTIDAD AUTORIZADA</th>
<th>CANTIDAD DESPACHADA</th>
<th>ESTADO</th>
<th>FECHA</th>
</tr>
</thead>
<tbody>
<?php 
while ($fila = mssql_fetch_object($result))
 {
	?>
 
<tr>
<td><?php echo $fila->REQ_NUMERO; ?></td>
<td><?php echo $fila->ACODIGO; ?></td>
<td><?php echo $fila->REQ_CANTIDAD_REQUERIDA; ?></td>
<td><?php echo $fila->REQ_CANTIDAD_AUTORIZADA; ?></td>
<td><?php echo $fila->REQ_CANTIDAD_DESPACHADA; ?></td>
<td><?php echo $fila->ESTADO; ?></td>
<td><?php echo $fila->REQ_FECHA_CREACION; ?></td>
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

