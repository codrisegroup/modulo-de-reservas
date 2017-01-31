<?php 

$query  =  "SELECT R.NROREQUI,C.OC_CNUMORD,M.CANUMDOC,R.CODSOLIC,R.GLOSA,M.CAORDFAB,C.OC_ORDFAB,C.OC_SOLICITA,T.TDESCRI  FROM ".BDSTARSOFT.".DBO.REQUISC AS R INNER  JOIN ".BDSTARSOFT.".DBO.COMOVC  AS C
ON R.NROREQUI=C.OC_CNRODOCREF   INNER  JOIN ".BDSTARSOFT.".DBO.MOVALMCAB  AS M  ON 
 C.OC_CNUMORD=M.CANUMORD INNER  JOIN ".BDSTARSOFT.".DBO.TABAYU  AS T  ON 
 R.CODSOLIC=T.TCLAVE AND T.TCOD=12 WHERE R.TIPOREQUI='RQ' AND M.CANUMDOC='".$_GET['ni']."' AND 
 M.CATD='NI' AND M.CAALMA='01' AND M.CATIPMOV='I' AND M.CACODMOV='CL'

";
$result = mssql_query($query);
 ?>



 <div class="table-responsive">
 <table class="table table-striped table-hover table-bordered">
 	<thead>
 		<tr class="success">
 			<th>REQUERIMIENTO</th>
 			<th>ORDEN DE COMPRA</th>
 			<th>NOTA DE INGRESO</th>
 			<th>SOLICITANTE RQ</th>
            <th>SOLICITANTE O/C</th>
 			<th>SOLICITANTE</th>
 			<th>GLOSA</th>
 			<th>OT ORDEN DE COMPRA</th>
 			<th>OT NOTA DE INGRESO</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php 
         while ($fila = mssql_fetch_object($result)) {
         ?>
        
        <tr>
 			<td><?php echo $fila->NROREQUI; ?></td>
 			<td><?php echo $fila->OC_CNUMORD; ?></td>
 			<td><?php echo $fila->CANUMDOC; ?></td>
 			<td><?php echo $fila->CODSOLIC; ?></td>
 			<td><?php echo $fila->OC_SOLICITA; ?></td>
 			<td><?php echo $fila->TDESCRI; ?></td>
 			<td><?php echo $fila->GLOSA; ?></td>
 			<td><?php echo $fila->OC_ORDFAB; ?></td>
 			<td><?php echo $fila->CAORDFAB; ?></td>
 		</tr>

        <?php
         }




 		 ?>
 	</tbody>
 </table>
 </div>