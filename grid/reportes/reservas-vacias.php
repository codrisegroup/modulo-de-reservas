<?php 

$query  =  "
SELECT  C.NRORESERVA,C.SOLICITANTE,C.OT,C.CENTROCOSTO,T.TDESCRI,
CONVERT(VARCHAR,C.FECHA,105)AS FECHA,O.OF_ESTADO
FROM ".BD.".DBO.RESERVA_CAB AS C INNER JOIN ".BDSTARSOFT.".DBO.TABAYU AS T 
ON C.SOLICITANTE=T.TCLAVE AND TCOD=12 LEFT JOIN ".BDSTARSOFT.".DBO.ORD_FAB AS O ON C.OT=O.OF_COD  WHERE  ESTADO='00'
AND NRORESERVA  NOT IN  (SELECT NRORESERVA FROM ".BD.".DBO.RESERVA_DET)
ORDER BY C.FECHA
";

$result = mssql_query($query);

 ?>


<div class="table-responsive">
	<table id="consulta" class="table table-hover table-bordered table-condensed">
		<thead>
			<tr class="success">
				<th>RESERVA</th>
				<th>SOLICITANTE</th>
				<th>FECHA</th>
				<th>OT</th>
				<th>OT ESTADO</th>
				<th>CENTRO DE COSTO</th>
			</tr>
		</thead>
		<tbody>
			<?php 
             while ($fila = mssql_fetch_object($result)) {
             ?>
             <tr>
				<td><?php echo $fila->NRORESERVA; ?></td>
				<td><?php echo $fila->TDESCRI; ?></td>
				<td><?php echo $fila->FECHA; ?></td>
				<td><?php echo $fila->OT; ?></td>
				<td><?php echo $fila->OF_ESTADO; ?></td>
				<td><?php echo $fila->CENTROCOSTO; ?></td>
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
})
</script>