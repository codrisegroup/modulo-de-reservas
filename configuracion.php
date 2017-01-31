<?php 
date_default_timezone_set('America/Lima');


$key = "CODRISE2016???ti_RESERVA_USUARIO"; #Key Sesion

define('PATH', 'codrise/reserva-usuario'); #Path

define('SERVERBD', '192.168.1.4');#SERVER BD SQL

define('USERBD', 'APLICACIONES'); #USER BD SQL

define('PASSBD', 'APLICACIONES'); #PASS SQL

define('BD','[022BDCOMUN]');      #BD SQL

define('BDAPLICACION','[010BDAPLICACION]');      #BD SQL

define('BDSTARSOFT','[010BDCOMUN]'); #BD STARSOFT

define('BDCONTABILIDAD','[010BDCONTABILIDAD]'); #BD CONTABILIDAD

define('KEY',$key); #KEY  


#VARIABLES SESION
define('USUARIO','idusuario');        #USUARIO
define('NOMBRES','nombres');          #NOMBRES
define('APELLIDOS','apellidos');      #APELLIDOS
define('SOLICITANTE','solicitante');  #SOLICITANTE
define('AREA','area');                #AREA


#MYSQL
define('SERVERBDMYSQL', '192.168.1.8');#SERVER BD MYSQL

define('USERBDMYSQL', 'root'); #USER BD MYSQL

define('PASSBDMYSQL', 'sistemas'); #PASS MYSQL

define('BDMYSQL','control_de_servicios2');      #BD MYSQL
 ?>
