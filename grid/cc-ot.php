<?php 

$link = Conectarse();

$query  =  "
SELECT (ROW_NUMBER() OVER(ORDER BY IDCENCOSOT))AS ITEM,
IDCENCOSOT,CODIGOCENTROCOSTO,CENCOST_DESCRIPCION,
CODIGOOT,CONVERT(VARCHAR,FECHA,103) as FECHAS,HORA,(U.nombres+' '+U.apellidos )AS FULLNAME
FROM ".BD.".DBO.CENCOSOT AS CC INNER JOIN 
".BDCONTABILIDAD.".DBO.CENTRO_COSTOS AS CCC ON 
CC.CODIGOCENTROCOSTO=CCC.CENCOST_CODIGO INNER JOIN ".BD.".DBO.USUARIOS AS U
ON CC.USUARIO=U.id_usuario 
WHERE  CODIGOOT IN (SELECT OF_COD FROM ".BDSTARSOFT.".dbo.ORD_FAB
WHERE OF_ESTADO ='ACTIVO')  ORDER BY  IDCENCOSOT DESC";

$result = mssql_query($query);
 ?>

<div class="table-responsive">
<table id="consulta" class="table table-bordered table-condensed">
<thead>
<tr class="success">
<th>IT</th>
<th>CENTRO DE COSTO</th>
<th>DESCRIPCIÓN CENTRO DE COSTO</th>
<th>OT</th>
<th>FECHA</th>
<th>CREADOR</th>
<th><i class="fa fa-trash fa-2x text-danger"></i></th>



</tr>
</thead>
<tbody>
<?php 
while ($fila = mssql_fetch_object($result))
 {
	?>
 
<tr>
<td><?php echo $fila->ITEM; ?></td>
<td><?php echo $fila->CODIGOCENTROCOSTO; ?></td>
<td><?php echo utf8_encode($fila->CENCOST_DESCRIPCION); ?></td>
<td><?php echo $fila->CODIGOOT; ?></td>
<td><?php echo $fila->FECHAS; ?></td>
<td><?php echo $fila->FULLNAME; ?></td>
<td><a href="../procesos/tablas-de-ayuda/eliminar-cc-ot.php?id=<?php echo $fila->IDCENCOSOT; ?>&ot=<?php echo $fila->CODIGOOT; ?>"><i class="fa fa-trash-o fa-2x text-danger"></i></a></td>


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


