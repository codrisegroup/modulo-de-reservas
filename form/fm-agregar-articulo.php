<?php 
#ne  no existe
#ns  no hay stock

if ($_GET['m']=='ne')
 {
  echo "<div class='alert alert-danger'>
       El código consultado no  existe o no pertenece
       al almacen 01.
    </div>"	;
 }
else if ($_GET['m']=='ns')
{ 
	if ($_GET[cantidad]==0)
	 {
	  echo "<div class='alert alert-warning'>
La cantidad es 0,ya no hay stock.</div>"	;	
	}
else
{
echo "<div class='alert alert-warning'>
La cantidad debe ser menor a :".$_GET['cantidad']."
</div>"	;
}

}

 ?>




<form action="../procesos/transacciones/editar-reserva.php" method="GET" class="form-inline" autocomplete="Off">
	
<input type="text" name="codigo" class="form-control" id="" required=""
  placeholder="Ingrese el codigo" >

<input type="number" name="cantidad" step="any" class="form-control" id="" required="" min="0.01"  placeholder="Ingrese la cantidad">

<input type="hidden" name="reserva" value="<?php echo $_GET['id']; ?>" >


<button class="btn btn-info">Agregar</button>

</form>