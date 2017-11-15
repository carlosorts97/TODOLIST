# TODOLIST/acciones
# Este archivo se encuentra en la carpeta acciones
<?php
//Eliminamos los registros de tareas mediante el id que recibimos con el metodo GET
include '../conn.php';
echo $_GET['id'];
$sql="DELETE FROM tasks WHERE id_task='".$_GET['id']."'";
$resultado=$conn->query($sql);
header('Location:../inicio.php');
 ?>

