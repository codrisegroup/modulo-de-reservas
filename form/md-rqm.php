<form action="../procesos/transacciones/crear-rqm.php" method="POST">

<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#myModal">
  Crear Requerimiento de Materiales
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
          Crear Requerimiento de Materiales # 
          <?php echo cerosizq($rqm -> Correlativo(),10);  ?>
        </h4>
      </div>
      <div class="modal-body">
      <input type="hidden" name="reserva" value="<?php echo $_GET['id']; ?>">

      <input type="text" name="comentario" id="" class="form-control" 
      placeholder="Ingrese un comentario o detalle" required="">

      <input type="hidden" name="rqm" value="<?php echo cerosizq($rqm -> Correlativo(),10);  ?>">
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Crear Requerimiento de Materiales</button>
      </div>
    </div>
  </div>
</div>

</form>