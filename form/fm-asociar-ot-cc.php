<div class="form-group">
<a class="btn btn-info btn-sm" data-toggle="modal" href='#modal-id'>
Crear Asociación</a>
</div>


<div class="modal fade" id="modal-id">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Crear Asociación</h4>
</div>

<form action="../procesos/tablas-de-ayuda/crear-cc-ot.php" method="POST">	
<div class="modal-body">

<div class="form-group">
<label for="">Orden de Trabajo:</label>
<select name="ot" id="idot"  id="ot" required>
<option value="">SELECCIONAR...</option>
<?php
$link=Conectarse();
$Sql ="SELECT OF_COD,OF_ARTNOM,OF_ESTADO FROM ".BDSTARSOFT.".dbo.ORD_FAB
WHERE OF_ESTADO ='ACTIVO'  AND 
OF_COD NOT IN (SELECT CODIGOOT FROM ".BD.".DBO.CENCOSOT)
ORDER BY  CAST(SUBSTRING(OF_COD,2,20) AS INT)";
$result=mssql_query($Sql) or die(mssql_error());
while ($row=mssql_fetch_array($result)) {
?>
<option value="<?php echo $row['OF_COD']?>"><?php echo $row['OF_COD']?></option>
<?php }?>
</select>
<script>
$('#idot').selectize();
</script>
</div>

<div id="mostrar"></div>


</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
<button class="btn btn-info btn-sm">Crear Asociación</button>
</div>

</form>

</div>
</div>
</div>