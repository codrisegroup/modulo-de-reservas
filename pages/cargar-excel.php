<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<?php include('../includes/clases/Funciones.php'); ?>
<?php 
 LiberarCargaExcel($_SESSION[KEY.USUARIO]);

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Cargar Excel</title>
<meta charset="UTF-8">
<?php include('../enlaces/principal.php'); ?>
</head>
<body>
<div class="container-fluid">

<div class="row">
<div class="col-md-12">	
<?php include('../nav.php'); ?>
</div>
</div>


<div class="row">
<div class="col-md-12">	

<h2><strong>Importación de articulos desde Excel</strong></h2>
<hr>

<form name="importa" method="post" action="../procesos/procesos/cargar-excel.php"
 enctype="multipart/form-data"  onsubmit="return validar(this)">

<div class="form-group">
<input type="file" name="excel" class="form-control" required autofocus="" />
</div>
<input type='submit' name='enviar' class="btn btn-info"  value="Importar"  />
<input type="hidden" value="upload" name="action" />

</form>



</div>
</div>

</div>

</body>
</html>



