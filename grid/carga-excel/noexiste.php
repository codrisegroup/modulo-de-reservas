<?php 

$query  =  "
SELECT D.CODIGO FROM ".BD.".DBO.DATOS_RSV AS D  LEFT JOIN  ".BDSTARSOFT.".DBO.MAEART AS M ON D.CODIGO=M.ACODIGO LEFT JOIN ".BDSTARSOFT.".DBO.STKART AS S ON M.ACODIGO=S.STCODIGO
WHERE  D.USUARIO=".$_SESSION[KEY.USUARIO]." AND M.ADESCRI IS NULL


";
$result = mssql_query($query);


 ?>


<div class="table-responsive">
 <table id="consultasinstock" class="table table-striped table-hover table-condensed table-bordered">
    <thead>
        <tr class="danger">
         
            <th>CÓDIGO</th>
            <th>DESCRIPCIÓN</th>
                        
        </tr>
    </thead>
    <tbody>
        <?php 

         while ($fila = mssql_fetch_object($result)) 
         {

        echo "
            <tr>
            <td>$fila->CODIGO</td>
            <td>No existe el código</td>
            </tr>
           ";
         
         }

         ?>
    </tbody>
 </table>
</div>


