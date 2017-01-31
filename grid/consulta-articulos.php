<?php 
 $codigo=$_GET['codigo'];

$link = Conectarse();

$query  =  "SELECT (ROW_NUMBER() OVER(ORDER BY ACODIGO))AS ITEM,ACODIGO,ADESCRI,AFAMILIA,AUNIDAD,STSKDIS,
	SUM(ISNULL(CANT_PEND,0))AS CANT_RESEV,
(ISNULL(STSKDIS,0)-SUM(ISNULL(CANT_PEND,0)))AS CANT_DISP,ACOMENTA 
FROM ".BDSTARSOFT.".DBO.MAEART AS M LEFT JOIN ".BDSTARSOFT.".DBO.STKART AS S ON
M.ACODIGO=S.STCODIGO AND STALMA='01' LEFT JOIN ".BD.".DBO.RESERVA_DET AS D ON
S.STCODIGO=D.CODIGO AND STALMA='01'
WHERE  AESTADO='V' AND AFSTOCK='S'AND  (ACODIGO+ADESCRI) LIKE '%".$codigo."%'
GROUP BY ACODIGO,ADESCRI,AFAMILIA,AUNIDAD,ACOMENTA,STSKDIS";

$result = mssql_query($query);
 ?>

<div class="table-responsive">
<table id="consulta" class="table table-bordered table-condensed">
<thead>
<tr class="info">
<th>IT</th>
<th>CÓDIGO</th>
<th>DESCRIPCIÓN</th>
<th>FAMILIA</th>
<th>UND</th>
<th>STK ALM</th>
<th>CANT R.</th>
<th>CANT D.</th>
<th>FICHA TÉCNICA</th>
<th><i class="glyphicon glyphicon-zoom-in"></i></th>
</tr>
</thead>
<tbody>
<?php 
while ($fila = mssql_fetch_object($result))
 {
	?>
 
<tr>
<td><?php echo $fila->ITEM; ?></td>
<td><?php echo utf8_encode($fila->ACODIGO); ?></td>
<td><?php echo utf8_encode($fila->ADESCRI); ?></td>
<td><?php echo $fila->AFAMILIA; ?></td>
<td><?php echo $fila->AUNIDAD; ?></td>
<td><?php echo $fila->STSKDIS; ?></td>
<td><?php echo $fila->CANT_RESEV; ?></td>
<td><?php echo $fila->CANT_DISP; ?></td>
<td><?php echo utf8_encode($fila->ACOMENTA); ?></td>
<td><a  href="detalle/consulta-articulos?codigo=<?php echo utf8_encode($fila->ACODIGO)?>" target="_blank"><i class="glyphicon glyphicon-zoom-in"></i></a></td>
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




