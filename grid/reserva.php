<?php 

$fechainicio = meses_down('-2');
$fechafin    = date('Y/m/d');

$link = Conectarse();

if (!isset($_REQUEST['fechainicio'])) 
{
	$query  =  "SELECT  CRV.NRORESERVA,CRV.OT,T.TDESCRI,
	CRV.USUARIO,T.TCLAVE,CRV.IDAREA,CONVERT(VARCHAR,CRV.FECHA,105)AS FECHA,
	CONVERT(VARCHAR,CRV.FECHA,108) AS HORA,
CRV.CENTROCOSTO ,CRV.TIPO,CRV.SOLICITANTE FROM
 ".BD.".DBO.RESERVA_CAB AS CRV
INNER JOIN ".BDSTARSOFT.".DBO.TABAYU AS T ON CRV.SOLICITANTE=T.TCLAVE WHERE  CRV.SOLICITANTE='".$_SESSION[KEY.SOLICITANTE]."' AND TCOD='12' AND 
CRV.ESTADO='00'
 AND CRV.FECHA BETWEEN 
 '$fechainicio' AND '$fechafin'  
ORDER BY CRV.NRORESERVA DESC";
}
else
{
   $query  =  "SELECT CRV.NRORESERVA,CRV.OT,T.TDESCRI,
	CRV.USUARIO,T.TCLAVE,CRV.IDAREA,CONVERT(VARCHAR,CRV.FECHA,105)AS FECHA,
	CONVERT(VARCHAR,CRV.FECHA,105) AS HORA,
CRV.CENTROCOSTO ,CRV.TIPO,CRV.SOLICITANTE FROM
".BD.".DBO.RESERVA_CAB AS CRV
INNER JOIN ".BDSTARSOFT.".DBO.TABAYU AS T ON CRV.SOLICITANTE=T.TCLAVE WHERE CRV.SOLICITANTE='".$_SESSION[KEY.SOLICITANTE]."' AND TCOD='12' AND 
CRV.ESTADO='00'
 AND CRV.FECHA BETWEEN 
 '$_REQUEST[fechainicio]' AND '$_REQUEST[fechafin]' 
 
ORDER BY CRV.NRORESERVA DESC";

	
}


$result = mssql_query($query);
 ?>

<div class="table-responsive">
<table id="consulta" class="table table-bordered table-condensed">
<thead>
<tr class="success">
<th>NRORESERVA</th>
<th>SOLICITANTE</th>
<th>OT</th>
<th>CENTRO COSTO</th>
<th>FECHA</th>
<th><i class="fa fa-pencil-square-o fa-2x"></i></th>
<th><i class="fa fa-shopping-cart fa-2x text-info"></i></th>

</tr>
</thead>
<tbody>
<?php 
while ($fila = mssql_fetch_object($result))
 {
	?>
 
<tr>
<td><?php echo $fila->NRORESERVA; ?></td>
<td><?php echo utf8_encode($fila->TDESCRI); ?></td>
<td><?php echo $fila->OT; ?></td>
<td><?php echo $fila->CENTROCOSTO; ?></td>
<td><?php echo $fila->FECHA; ?></td>
<td><a href="editar-reserva?id=<?php echo $fila->NRORESERVA;?>" data-toggle="tooltip" data-placement="bottom" title="Editar Reserva"><i class="fa fa-pencil-square-o fa-2x"></i></a></td>
<td><a href="../procesos/transacciones/trasladar-reserva?id=<?php echo $fila->NRORESERVA;?>" data-toggle="tooltip" data-placement="bottom" title="Trasladar Reserva"><i class="fa fa-shopping-cart fa-2x text-info"></i></a></td>

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


