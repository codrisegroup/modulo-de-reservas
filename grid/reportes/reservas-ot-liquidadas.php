<?php 

$link = Conectarse();

$query  =  "
SELECT R.NRORESERVA,(U.nombres+' '+U.apellidos)AS FULLNAME,R.OT,
CONVERT(VARCHAR,R.FECHA,105)AS FECHA FROM ".BD.".DBO.RESERVA_CAB AS R INNER JOIN ".BD.".DBO.USUARIOS AS U ON R.USUARIO=U.id_usuario   WHERE ESTADO='00'AND  OT IN (
SELECT OF_COD FROM  ".BDSTARSOFT.".DBO.ORD_FAB  WHERE  OF_ESTADO='LIQUIDADO')";

$result = mssql_query($query);
 ?>

<div class="table-responsive">
<table id="consulta" class="table table-bordered table-condensed">
<thead>
<tr class="warning">
<th>NRORESERVA</th>
<th>SOLICITANTE</th>
<th>OT</th>
<th>FECHA</th>
</tr>
</thead>
<tbody>
<?php 
while ($fila = mssql_fetch_object($result))
 {
	?>
 
<tr>
<td><?php echo $fila->NRORESERVA; ?></td>
<td><?php echo utf8_encode($fila->FULLNAME); ?></td>
<td><?php echo $fila->OT; ?></td>
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

