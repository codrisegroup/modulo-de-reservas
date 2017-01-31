<form action="../procesos/transacciones/crear-reserva.php" method="POST">


 <a id="modal-520107" href="#modal-container-520107" role="button" class="btn btn-success" data-toggle="modal">Reservar por OT</a>
      
      <div class="modal fade" id="modal-container-520107" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                ×
              </button>
              <h4 class="modal-title" id="myModalLabel">
                Reserva por OT # <?php  echo $reserva -> Correlativo();  ?>
              </h4>
            </div>
            <div class="modal-body">
        
          <select name="ot" id="ot" required>
          <option value="">SELECCIONAR LA OT</option>
          <?php 
          $link   = Conectarse();
          $query  = "
          SELECT CODIGOOT FROM ".BD.".DBO.CENCOSOT  WHERE CODIGOOT
          IN (SELECT OF_COD FROM ".BDSTARSOFT.".DBO.ORD_FAB WHERE OF_ESTADO='ACTIVO')";
          $result = mssql_query($query);
          while ($fila = mssql_fetch_object($result)) {
          echo "<option value='$fila->CODIGOOT'>$fila->CODIGOOT</option>";
          }
          ?>
          </select>
          <script>
          $('#ot').selectize();
          </script>

           <input type="hidden" name="tipo" value="OT">

            </div>
            <div class="modal-footer">
               
              <button type="button" class="btn btn-default" data-dismiss="modal">
                Cerrar
              </button> 
              <button type="submit" class="btn btn-success">
                Crear
              </button>
            </div>
          </div>
          
        </div>
        
      </div>

</form>
