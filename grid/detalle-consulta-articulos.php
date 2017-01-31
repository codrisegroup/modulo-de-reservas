<?php 
 $codigo=$_GET['codigo'];

$link = Conectarse();

$query  =  "
SELECT (ROW_NUMBER() OVER(ORDER BY D.CODIGO))AS ITEM,
C.OT,C.CENTROCOSTO,D.NUMERO_DOC,(U.nombres+' '+U.apellidos)AS FULLNAME,CONVERT(VARCHAR,C.FECHA,105)AS FECHA,
D.NRORESERVA,D.REQUERIMIENTO,D.CODIGO,M.ADESCRI,M.AUNIDAD,D.CANTIDAD,D.CANT_PEND,D.OT AS OTDETALLE FROM ".BD.".DBO.RESERVA_CAB  AS C 
INNER  JOIN ".BD.".DBO.RESERVA_DET AS D ON C.NRORESERVA=D.NRORESERVA
INNER  JOIN ".BD.".DBO.USUARIOS AS U ON C.USUARIO=U.id_usuario
INNER  JOIN ".BDSTARSOFT.".DBO.MAEART AS M ON D.CODIGO=M.ACODIGO WHERE  D.CODIGO='".$codigo."'";

$result = mssql_query($query);
 ?>

<div class="table-responsive">
<table id="consulta" class="table table-bordered table-condensed">
<thead>
<tr class="info">
<th>NRORESERVA</th>
<th>RQM</th>
<th>USUARIO</th>
<th>NOTA DE INGRESO</th>
<th>CÓDIGO</th>
<th>DESCRIPCIÓN</th>
<th>UND</th>
<th>ORDEN DE TRABAJO</th>
<th>CENTRO DE COSTO</th>
<th>CANTIDAD SOLICITADA</th>
<th>CANTIDAD PENDIENTE</th>
<th>FECHA</th>
</tr>
</thead>
<tbody>
<?php 
while ($fila = mssql_fetch_object($result))
 {
	?>
 
<?php 
if ($fila->NRORESERVA==423) 
echo "<tr class='warning'>";
else
echo "<tr>"
?>
<td><?php echo $fila->NRORESERVA; ?></td>
<td><?php echo $fila->REQUERIMIENTO; ?></td>
<td><?php echo $fila->FULLNAME; ?></td>
<td><a href="detalle-ni?ni=<?php echo $fila->NUMERO_DOC; ?>" target="_blank"><?php echo $fila->NUMERO_DOC; ?></a></td>
<td><?php echo utf8_encode($fila->CODIGO); ?></td>
<td><?php echo utf8_encode($fila->ADESCRI); ?></td>
<td><?php echo $fila->AUNIDAD; ?></td>
<td>
<?php 
if (empty($fila->OTDETALLE)) 
echo $fila->OT;
else
echo $fila->OTDETALLE;


?>	

</td>
<td><?php echo $fila->CENTROCOSTO; ?></td>
<td><?php echo $fila->CANTIDAD; ?></td>
<td><?php echo $fila->CANT_PEND; ?></td>
<td><?php echo $fila->FECHA; ?></td>
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



