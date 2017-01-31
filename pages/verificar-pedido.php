<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Verificar Pedido</title>
	<?php include('../enlaces/principal.php'); ?>
	<?php include('../enlaces/datatables.php'); ?>
</head>
<body>
<div class="container-fluid">

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<?php include('../nav.php'); ?>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Consultar Pedido
            <form action="<?php echo $PHP_SELF; ?>" class="form-inline" method="POST">
             <input type="number" name="pedido" id="" class="form-control input-sm" placeholder="Ingrese el Pedido" required=""
             value="<?php echo $_POST['pedido'] ?>" autofocus>
             <button class="btn btn-info btn-sm">Consultar</button>
              
              <?php 
               if (isset($_POST['pedido'])) {
               	?>
                <a href="../PDF/reporte/verificar-pedido?pedido=<?php echo $_POST['pedido']?>" class="btn btn-warning btn-sm" target="_blank">
              <i class="fa fa-print"></i>
              Imprimir</a>
               <?php 
               }

               ?>


            </form>


             

			</div>
			<div class="panel-body">
				<?php include('../grid/verificar-pedido.php'); ?>
			</div>
		
			
		</div>
	</div>
</div>

	
</div>	
</body>
</html>