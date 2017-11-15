# TODOLIST

<?php

$ip_domain=$_SERVER['SERVER_ADDR'];
if($ip_domain=='127.0.0.0'){
  $conf='config/config.ini';
}
else{
  $conf='config/config.ini';
}

$config=parse_ini_file($conf);

try{
  $conn = new mysqli($config['dbhost'],$config['dbuser'],$config['dbpass'],$config['dbname']);
}catch(Excepcion$e){
  echo 'connection failed:'. $e->getMessage();
}
 ?>
