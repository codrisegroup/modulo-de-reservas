<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Cargar Excel</title>
<meta charset="UTF-8">
<?php include('../enlaces/principal.php'); ?>
<?php include('../enlaces/datatables.php'); ?>
<?php include('../enlaces/selectize.php'); ?>
<meta http-equiv="refresh" content="300">
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
<h3>Data importada desde Excel</h3>
<hr>

<div class="tabbable" id="tabs-919570">
<ul class="nav nav-tabs">
<li class="active">
<a href="#panel-stock" data-toggle="tab">Articulos con Stock Disponible</a>
</li>
<li>
<a href="#panel-sinstock" data-toggle="tab">Articulos sin Stock y sin Ingresos</a>
</li>
<li>
<a href="#panel-noexiste" data-toggle="tab">Articulos no Existentes</a>
</li>
</ul>
<div class="tab-content">

<div class="tab-pane active" id="panel-stock">

<form action="../procesos/tablas-de-ayuda/transferir-reserva-excel.php" method="POST">

<div class="form-group">
<?php include('../form/md-transferir-reserva-excel.php'); ?>
</div>

<?php include('../grid/carga-excel/stock.php'); ?>


</form>

</div>

<div class="tab-pane" id="panel-sinstock">

<div class="form-group">
<a href="../EXCEL/formato-carga-excel.php" class="btn btn-success btn-sm">
<i class="fa fa-file-excel-o fa-2x"></i>
Descargar Formato de Carga Excel</a> 
</div>
<?php include('../grid/carga-excel/sinstock.php'); ?>

</div>

<div class="tab-pane" id="panel-noexiste">
<?php include('../grid/carga-excel/noexiste.php'); ?>
</div>

</div>
</div>
</div>




</div>
</div>



</div>

</body>
</html>



