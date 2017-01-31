<?php

  
function Conectarse_mysql()

{

if(!($link_mysql=mysql_connect(SERVERBDMYSQL,USERBDMYSQL,PASSBDMYSQL)))
{

echo"Error Conectando el servidor  28";

	exit();
}
  if (!mysql_select_db(BDMYSQL,$link_mysql)) 
  {

  	echo"Error seleccionando la base de datos";

  	exit();
}

return $link_mysql;

}


  ?>