<?php 

$query    =  "SELECT * FROM ".BD.".DBO.BOLETIN_CAB";
$result   = mssql_query($query);
 ?>


<div class="table-responsive">
<table id="consulta" class="table table-striped table-hover table-bordered table-condensed">
	<thead>
		<tr>
			<th>Detalle</th>
			<th>Fecha</th>
		</tr>
	</thead>
	<tbody>
		<?php 
        while ($fila = mssql_fetch_object($result)) {
        	?>
        <tr>
			<td><a href="#" style="text-decoration:none;"><?php echo $fila->TITULO; ?></a></td>
			<td><?php echo $fila->FECHA; ?></td>
		</tr> 
       <?php
        }
		?>
	</tbody>
</table>
</div>

<script>
$(document).ready(function(){
    $('#consulta').DataTable();
});
</script>

