<form action="../procesos/transacciones/crear-reserva.php" method="POST">

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Reserva por Centro de Costo.
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reserva por Centro de Costo  # <?php  echo $reserva -> Correlativo();  ?></h4>
      </div>
      <div class="modal-body">
        <select name="cc" id="cc" required>
          <option value="">SELECCIONAR EL CENTRO DE COSTO</option>
          <?php 
          $link   = Conectarse();
          $query  = "
          
SELECT  CENCOST_CODIGO,CENCOST_DESCRIPCION FROM ".BDCONTABILIDAD.".DBO.CENTRO_COSTOS
";
          $result = mssql_query($query);
          while ($fila = mssql_fetch_object($result)) {
          echo "<option value='$fila->CENCOST_CODIGO'>$fila->CENCOST_CODIGO  -  ".utf8_encode($fila->CENCOST_DESCRIPCION)."</option>";
          }
          ?>
          </select>
          <script>
          $('#cc').selectize();
          </script>
     
      <input type="hidden" name="tipo" value="CC">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Crear</button>
      </div>
    </div>
  </div>
</div>

</form>