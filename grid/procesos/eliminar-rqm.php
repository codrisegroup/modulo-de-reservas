<?php 

$link = Conectarse();

   $query  =  "
SELECT REQ_NUMERO,NRORESERVA,REQ_PERSONAL_SOLIC,T.TDESCRI,CENCOST_CODIGO,REQ_GLOSA,REQ_DEORDFAB,
CONVERT(VARCHAR,REQ_FECHA_EMISION,105) AS FECHA
 FROM ".BDSTARSOFT.".DBO.INV_REQMATERIAL_CAB AS RM INNER JOIN ".BD.".DBO.RESERVA_CAB AS RV
ON RM.REQ_NUMERO=RV.REQUERIMIENTO INNER JOIN ".BDSTARSOFT.".DBO.TABAYU AS T ON 
RM.REQ_PERSONAL_SOLIC=T.TCLAVE AND T.TCOD=12 WHERE RM.REQ_ESTADO IN ('00','01')  AND RM.REQ_PERSONAL_SOLIC='".$_SESSION[KEY.SOLICITANTE]."'";

$result = mssql_query($query);
 ?>

<div class="table-responsive">
<table id="consulta" class="table table-bordered table-condensed">
<thead>
<tr class="info">
<td><input type="checkbox"></td>
<th>REQUERIMIENTO</th>
<th>RESERVA</th>
<th>SOLICITANTE</th>
<th>CENTRO COSTO</th>
<th>OT</th>
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
<td><input type="checkbox" name="rqm[]" value="<?php echo $fila->REQ_NUMERO; ?>"></td>

<td><?php echo $fila->REQ_NUMERO; ?></td>
<td><?php echo $fila->NRORESERVA; ?></td>
<td><?php echo $fila->TDESCRI; ?></td>
<td><?php echo $fila->CENCOST_CODIGO; ?></td>
<td><?php echo $fila->REQ_DEORDFAB; ?></td>
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

