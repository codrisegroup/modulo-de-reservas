<?php 

$query  =  "SELECT IDRESERVA_DET,NRORESERVA,CODIGO,CANTIDAD,CANT_PEND,ADESCRI,AUNIDAD,NUMERO_DOC,REQUERIMIENTO FROM ".BD.".DBO.RESERVA_DET AS D INNER  JOIN ".BDSTARSOFT.".DBO.MAEART AS M 
ON D.CODIGO=M.ACODIGO WHERE NRORESERVA='$_GET[id]'";
$result = mssql_query($query);

 ?>
<div class="table-responsive">
<table id="consulta" class="table table-striped table-hover table-bordered table-condensed">
	<thead>
		<tr class="info">
			<th>CODIGO</th>
			<th>DESCRIPCIÓN</th>
			<th>CANTIDAD</th>
			<th>CANTIDAD</th>
			<th>UND</th>
			<th><i class="glyphicon glyphicon-trash text-danger"></i></th>
		</tr>
	</thead>
	<tbody>
		<?php 
        while ($fila = mssql_fetch_object($result)) {
        	?>

		<tr>
		<input type="hidden" name="idreserva[]"  value="<?php echo $fila->IDRESERVA_DET; ?>">
		<input type="hidden" name="codigo[]"  value="<?php echo $fila->CODIGO; ?>">
		<td><?php echo utf8_encode($fila->CODIGO); ?></td>
		<td><?php echo utf8_encode($fila->ADESCRI); ?></td>
		<td><?php echo utf8_encode($fila->CANTIDAD); ?></td>
		<td><input type="number" step="any" min="0.01" max="<?php echo $fila->CANTIDAD; ?>" name="cantidad[]" value="<?php echo $fila->CANTIDAD; ?>" class="form-control input-sm"></td>
		
		<td><?php echo $fila->AUNIDAD; ?></td>
		
		<td><a href="../procesos/transacciones/eliminar-reserva?id=<?php echo $fila->IDRESERVA_DET;?>&codigo=<?php echo $fila->CODIGO; ?>&reserva=<?php echo $_GET['id'] ?>"><i class="glyphicon glyphicon-trash text-danger"></i></a></td>
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


