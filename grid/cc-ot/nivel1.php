<?php 

$link = Conectarse();

$query  =  "
SELECT  CODIGOOT,CODIGOCENTROCOSTO,CC.CODIGO AS CODIGOARTICULO,M.ADESCRI,M.AUNIDAD AS UND,O.OF_ARTCANT,
ISNULL(NI.CANT,0.00)AS CANTIDADNI,ISNULL(S.STSKDIS,0.00)AS STOCK,
CONVERT(VARCHAR,O.OF_FECHINI,103)AS FECHAINICIO,
CONVERT(VARCHAR,O.OF_FECHFIN,103)AS FECHAFIN,CC.PRIORIDAD,O.OF_ARTNOM,O.OF_CLINOM, 
     CONVERT(VARCHAR,CC.FECHAFIN_REPRO,103)AS FECHAFIN_REPRO,
     CONVERT(VARCHAR,CC.FECHAINICIO_REPRO,103) AS FECHAINICIO_REPRO,

     CC.STATUS,CC.TECNICO,CC.MAQUINA,CC.DETALLE,
     CONVERT(VARCHAR,FN.FN_FECHA_ENTREGA,103) AS FECHA_NECESIDAD,
     CONVERT(VARCHAR,FN.FN_FECHA_ENTREGA,23) as FECHA_NECESIDAD2,
     ISNULL(DATEPART(WEEK,CC.FECHAINICIO_REPRO),0) AS SEMANA
FROM ".BD.".DBO.CENCOSOT AS CC INNER JOIN ".BDSTARSOFT.".DBO.ORD_FAB AS O ON CC.CODIGOOT=O.OF_COD
LEFT JOIN(
SELECT OT AS FN_OT,MIN(FECHA_ENTREGA) AS FN_FECHA_ENTREGA FROM ".BDAPLICACION.".DBO.PEDDET 
GROUP BY OT
)AS FN ON CC.CODIGOOT=FN.FN_OT
LEFT JOIN ".BDSTARSOFT.".DBO.MAEART AS M ON CC.CODIGO=M.ACODIGO
LEFT JOIN ".BDSTARSOFT.".DBO.STKART AS S ON CC.CODIGO=S.STCODIGO AND STALMA='01'
    LEFT JOIN (SELECT c.CARFNDOC,CANT=SUM(D.DECANTID) 
    FROM ".BDSTARSOFT.".dbo.MOVALMCAB AS C INNER JOIN ".BDSTARSOFT.".dbo.MOVALMDET AS D ON C.CANUMDOC=D.DENUMDOC 
    WHERE C.CAALMA=D.DEALMA AND C.CAALMA='01' AND C.CACODMOV IN ('IP','IE') AND C.CATD=D.DETD and c.CARFTDOC IN ('OF','OT')
    group by C.CARFNDOC) AS NI ON CC.CODIGOOT=NI.CARFNDOC
WHERE CODIGOOT IN (SELECT OF_COD FROM ".BDSTARSOFT.".dbo.ORD_FAB WHERE OF_ESTADO ='ACTIVO') /*AND CARFNDOC='F9620'*/
ORDER BY CAST(SUBSTRING(O.OF_COD,2,20) AS INT)
";

$result = mssql_query($query);
 ?>

<div class="table-responsive">
<table id="consulta" class="table table-bordered table-condensed">
<thead>
<tr class="success">
<th width="50">OT</th>
<th width="50">CC</th>
<th width="150">CODIGO</th>
<th width="250">DESC. ARTICULO</th>
<th width="300">DESCRIPCIÓN OT</th>
<th width="50">C. OT</th>
<th width="50">C. NI</th>
<th width="50">C. P</th>
<th width="8">E</th>
<th width="400">F. NECESIDAD</th>
<th width="400">FECHA DE INICIO    </th>
<th width="400">FECHA DE  FIN OT   </th>
<th width="400">FECHA INICIO REPRO.</th>
<th width="400">FECHA DE  FIN REPRO.</th>
<th>SEM</th>
<th width="300">ESTATUS</th>
<th width="220">TECNICO</th>
<th width="250">MÁQUINA</th>
<th width="230">DETALLE</th>


<th><i class="glyphicon glyphicon-edit text-info"></i></th>
<th><i class="glyphicon glyphicon-trash text-danger"></i></th>
</tr>
</thead>
<tbody>
<?php 
while ($fila = mssql_fetch_object($result))
 {

?>
 
<tr>
<td><?php echo $fila->CODIGOOT; ?></td>
<td><?php echo $fila->CODIGOCENTROCOSTO; ?></td>
<td><?php echo $fila->CODIGOARTICULO; ?></td>
<td><?php echo utf8_encode($fila->ADESCRI);?></td>
<td><?php echo utf8_encode($fila->OF_ARTNOM);?></td>
<td><?php echo $fila->OF_ARTCANT; ?></td>
<td><?php echo $fila->CANTIDADNI; ?></td>
<td><?php echo $fila->OF_ARTCANT-$fila->CANTIDADNI; ?></td>
<td >
<?php 
if ($fila->CANTIDADNI >= $fila->OF_ARTCANT) 
{
echo "<label style='font-size: 9px;'class='btn btn-warning btn-xs' title='Liquidar'>L</label>";
}
else
{
echo "<label style='font-size: 9px;'class='btn btn-success btn-xs' title='Pendiente'>P</label>";
}


?>
</td>
<td ><?php echo $fila->FECHA_NECESIDAD;?></td>
<td style="font-size: 11px;"><?php echo $fila->FECHAINICIO; ?></td>
<td style="font-size: 11px;"><?php echo $fila->FECHAFIN; ?></td>
<td style="font-size: 11px;"><?php echo $fila->FECHAINICIO_REPRO; ?></td>
<td style="font-size: 11px;"><?php echo $fila->FECHAFIN_REPRO; ?></td>
<td ><?php echo $fila->SEMANA; ?></td>
<td ><?php echo $fila->STATUS; ?></td>
<td ><?php echo $fila->TECNICO; ?></td>
<td style="font-size: 10px;"><?php echo $fila->MAQUINA; ?></td>
<td><?php echo $fila->DETALLE; ?></td>
<td><a href="../editar/ccot/actualizar?ot=<?php echo $fila->CODIGOOT; ?>"><i class="glyphicon glyphicon-edit text-info"></i></a></td>
<td><a href="../editar/ccot/eliminar?ot=<?php echo $fila->CODIGOOT; ?>"><i class="glyphicon glyphicon-trash text-danger"></i></a></td>

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


