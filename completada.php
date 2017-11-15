# TODOLIST/acciones
# Este archivo se encuentra en la carpeta acciones
<?php
include '../conn.php';
if($_GET['id']){
  $sql="UPDATE tasks SET tasks.completada=1 WHERE id_task='".$_GET['id']."'";
  $resultado=$conn->query($sql);
  header('Location:../inicio.php');
}
else{
  $sql="UPDATE tasks SET tasks.completada=0 WHERE id_task='".$_GET['id_desmarcar']."'";
  $resultado=$conn->query($sql);
  header('Location:../inicio.php');
}


 ?>
