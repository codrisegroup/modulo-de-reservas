<?php 

$link = Conectarse();

   $query  =  "SELECT CRV.NRORESERVA,CRV.OT,T.TDESCRI,
	CRV.USUARIO,T.TCLAVE,CRV.IDAREA,CONVERT(VARCHAR,CRV.FECHA,101)AS FECHA,
	CONVERT(VARCHAR,CRV.FECHA,108) AS HORA,
CRV.CENTROCOSTO ,CRV.TIPO FROM
 ".BD.".DBO.RESERVA_CAB AS CRV INNER JOIN ".BDSTARSOFT.".DBO.TABAYU AS T ON CRV.SOLICITANTE=T.TCLAVE WHERE TCOD='12' AND 
CRV.ESTADO='00'  AND SOLICITANTE='".$_SESSION[KEY.SOLICITANTE]."'
ORDER BY CRV.NRORESERVA DESC";

$result = mssql_query($query);
 ?>

<div class="table-responsive">
<table id="consulta" class="table table-bordered table-condensed">
<thead>
<tr class="info">
<td><input type="checkbox"></td>
<th>NRORESERVA</th>
<th>SOLICITANTE</th>
<th>OT</th>
<th>CENTRO COSTO</th>
<th>FECHA</th>
<th><i class="fa fa-search fa-2x"></i></th>


</tr>
</thead>
<tbody>
<?php 
while ($fila = mssql_fetch_object($result))
 {
	?>
 
<tr>
<td><input type="checkbox" name="reserva[]" value="<?php echo $fila->NRORESERVA; ?>"></td>
<td><?php echo $fila->NRORESERVA; ?></td>
<td><?php echo $fila->TDESCRI; ?></td>
<td><?php echo $fila->OT; ?></td>
<td><?php echo $fila->CENTROCOSTO; ?></td>
<td><?php echo $fila->FECHA; ?></td>
<td><a href="#"><i class="fa fa-search fa-2x"></i></a></td>


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

