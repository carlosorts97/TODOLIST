# TODOLIST/acciones
# Este archivo se encuentra en la carpeta acciones.

<?php
session_start();
if($_SESSION['flag_completada']==NULL)
{
    $_SESSION['flag_completada']=1;
}
elseif($_SESSION['flag_completada']==1)
{
  $_SESSION['flag_completada']=0;
}else{
  $_SESSION['flag_completada']=1;
}
header('Location:../inicio.php');

 ?>
