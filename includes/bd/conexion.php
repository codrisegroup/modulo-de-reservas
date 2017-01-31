<?php

  
function Conectarse()

{

if(!($link=mssql_connect(SERVERBD,USERBD,PASSBD)))
{

echo"Error Conectando el servidor";

	exit();
}
  if (!mssql_select_db(BD,$link)) 
  {

  	echo"Error seleccionando la base de datos";

  	exit();
}

return $link;

}


  ?>