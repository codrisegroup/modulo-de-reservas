<?php 
include('../configuracion.php');
include('../rutas.php');
$link = Conectarse();

$ot = $_POST['elegido'];


$query   = "SELECT OF_ARTNOM FROM ".BDSTARSOFT.".DBO.ORD_FAB  
            WHERE OF_COD='$ot'";
$result  = mssql_query($query);
$dato    = mssql_fetch_array($result);

 ?>

<div class="form-group">
<label>Código:</label>
 <textarea name="codigo" class="form-control" rows="3"><?php echo $dato['OF_ARTNOM']; ?></textarea>
</div>



<div class="form-group">
<label>Centro de Costo:</label>
<select name="cc" id="cc" required>
<option value="">[SELECCIONAR]</option>
<?php
$link=Conectarse();
$Sql ="SELECT  CENCOST_CODIGO,CENCOST_DESCRIPCION,
(CENCOST_CODIGO+' - '+CENCOST_DESCRIPCION)as fullname
from [010BDCONTABILIDAD].DBO.CENTRO_COSTOS 
ORDER BY CENCOST_CODIGO";
$result=mssql_query($Sql) or die(mssql_error());
while ($row=mssql_fetch_array($result)) {
?>
<option class="text-primary"value="<?php echo $row['CENCOST_CODIGO']?>">
<?php echo utf8_encode($row['fullname']);?></option>
<?php }?>
</select>
<script>
$('#cc').selectize();
</script>
</div>


<div class="form-group">
<label >PRIORIDAD</label>
<select name="prioridad" id="prioridad"  required="">
<option value="">[SELECCIONAR]</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select>
<script>
$('#prioridad').selectize();
</script>
</div>