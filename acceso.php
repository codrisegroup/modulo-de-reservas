<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Iniciar Sesion</title>
	<link rel="stylesheet" href="librerias/bootstrap/css/bootstrap.min.css">
         
<link rel="stylesheet" href="assets/google-fonts/montserrat.css">

	<script src="librerias/bootstrap/js/jquery.min.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.min.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
<style>
body{font-family: 'Montserrat', sans-serif;}
</style>


</head>
<body>
	
<div class="container">
<div class="row">
<div class="col-md-12">
	
	<form action="procesos/login.php" method="POST" autocomplete="Off">

  <div class="modal-dialog" role="document">

    <center>
    <img src="assets/img/logo192.png" class="img-responsive">
    </center>
    <hr>
    <div class="modal-content">
      <div class="modal-header">
       
        <h2 class="modal-title text-center">Modulo de Reservas
         </h2>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <input type="text" name="usuario" class="form-control"
        placeholder="Usuario: # de DNI" required autofocus>
        </div>
        <input type="password" name="contrasena" class="form-control"
        placeholder="Contraseña: # de DNI" required>
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
      </div>
    </div>
  </div>

</form>

</div>
</div>
</div>


</body>
</html>
