<?php 

include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Reservadet.php');


 $reservatraslado   = $_POST['reservatraslado'];
 $reservainicial   = $_POST['reservainicial'];
        $codigo    = $_POST['codigo'];
      $cantidad    = $_POST['cantidad'];


$reservadet = new Reservadet($reservainicial,'?',$codigo,$cantidad);

$reservadet -> ConfirmarTraslado($reservatraslado);


 ?>