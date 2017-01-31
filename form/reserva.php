<form action="<?php echo $php_self; ?>" class="form-inline" method="GET">

<input type="text" name="id" value="<?php echo $reserva -> Dato($_GET['id'],'NRORESERVA'); ?>" class="form-control" readonly>

<input type="text" name="" value="<?php echo $reserva -> Dato($_GET['id'],'FULLNAME'); ?>" class="form-control" readonly>

<input type="text" name="" value="<?php echo $reserva -> Dato($_GET['id'],'OT'); ?>" class="form-control" >

<input type="text" name="" value="<?php echo $reserva -> Dato($_GET['id'],'CENTROCOSTO'); ?>" class="form-control">


<button class="btn btn-primary">Actualizar Cabecera</button>

</form>