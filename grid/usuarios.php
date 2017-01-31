<?php 

$link = Conectarse();

$query  =  "
SELECT id_usuario,nombres,apellidos,dni,starsoft FROM USUARIOS 
order by nombres";

$result = mssql_query($query);
 ?>

<div class="table-responsive">
<table id="consulta" class="table table-bordered table-condensed">
<thead>
<tr class="success">
<th>CODIGO</th>
<th>NOMBRES</th>
<th>APELLIDOS</th>
<th>DNI</th>
<th>CODIGO SOLICITANTE</th>


</tr>
</thead>
<tbody>
<?php 
while ($fila = mssql_fetch_object($result))
 {
	?>
 
<tr>
<td><?php echo $fila->id_usuario; ?></td>
<td><?php echo utf8_encode($fila->nombres); ?></td>
<td><?php echo utf8_encode($fila->apellidos); ?></td>
<td><?php echo $fila->dni; ?></td>
<td><?php echo $fila->starsoft; ?></td>


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


