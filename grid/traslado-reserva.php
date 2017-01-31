<?php 
$query   =  "SELECT * FROM ".BD.".DBO.TMP_TRASLADAR AS T INNER
JOIN ".BDSTARSOFT.".DBO.MAEART AS M ON T.CODIGO=M.ACODIGO  INNER JOIN
".BDSTARSOFT.".DBO.STKART AS S ON T.CODIGO=S.STCODIGO AND S.STALMA='01'
WHERE T.USUARIO='".$_SESSION[KEY.USUARIO]."' ";
$result  = mssql_query($query);

 ?>


 <div class="table-responsive">
 	<table id="consulta" class="table table-hover table-bordered table-condensed">
 		<thead>
 			<tr class="info">
 				<th>CÓDIGO</th>
 				<th>DESCRIPCIÓN</th>
 				<th>CANTIDAD</th>
 				<th><i class="fa fa-trash text-danger fa-2x"></i></th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php 
             while ($fila = mssql_fetch_object($result)) {
             	?>
            <tr>
 				<td><input type="text" name="codigo[]" value="<?php echo utf8_encode($fila->CODIGO); ?>" readonly class="form-control input-sm"></td>
 				<td><?php echo utf8_encode($fila->ADESCRI); ?></td>
 				<td><input type="number" name="cantidad[]" class="form-control input-sm" min="0.01" step="any" value="<?php echo $fila->CANTIDAD; ?>" max="<?php echo $fila->CANTIDAD; ?>"></td>
 				<td><a href="../procesos/transacciones/eliminar-traslado-reserva?codigo=<?php echo $fila->CODIGO; ?>"><i class="fa fa-trash text-danger fa-2x"></i></a></td>
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