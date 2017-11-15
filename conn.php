# TODOLIST/acciones
#Este archivo se encuentra en la carpeta acciones
<?php
//connection to DB
//first thing to do: defining domain name???

$ip_domain=$_SERVER['SERVER_ADDR'];
if($ip_domain=='127.0.0.0'){
  $conf='config/config.ini';
}
else{
  $conf='config/config.ini';
}
//If IP = localhost then take devel config else take production conf
$config=parse_ini_file($conf);

try{
  $conn = new mysqli($config['dbhost'],$config['dbuser'],$config['dbpass'],$config['dbname']);
}catch(Excepcion$e){
  echo 'connection failed:'. $e->getMessage();
}
 ?>
