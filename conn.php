# TODOLIST

<?php
$ip_domain=$_SERVER['SERVER_NAME'];
if($ip_domain=='corts.cesnuria.com'){
  $conf='config/config.ini.dev';
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
