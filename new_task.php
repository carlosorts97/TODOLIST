# TODOLIST/acciones
# Este archivo se encuentra en la carpeta acciones
<?php
include '../conn.php';
session_start();
try{
if($_POST&&
!empty($_POST['task']) &&
!empty($_POST['date'])){
  $task=htmlspecialchars($_POST['task']);
  $date=htmlspecialchars($_POST['date']);
  $sql="INSERT INTO tasks VALUE('','".$task."','".$date."','','".$_SESSION['user']['id'][0]."')";
  $resultado=$conn->query($sql);
  header('Location:../inicio.php');
}
}catch(Exception $e){
  echo'Error'.$e->getMessage();
}
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/estilo.css">
     <title></title>
     <style>
     body{font-family: monospace;}
     .error{color: red;}
       h1{font-size: 30px;}
       form{background-color: Gainsboro;
             width: 300px;
             padding: 5px;
             height: 200px;
             font-size: 17px;
             border-radius: 10px;
              }
       form p{
         padding: 6px;
       }
       form input{
         margin-left: 6px;
         width: 150px;
         height: 25px;
         border-radius: 10px;
       }
       #btn_acceder{background-color: black;
                   color:white;
                 width: 50px;}
     </style>
   </head>
   <body>
     <h1>Añade tu nueva tarea</h1>
     <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
       <p>Tarea: <input type="text" name="task"></p>
       <p>Fecha: <input type="date" name="date"></p>
       <input type="submit" name="enviar" value="Crear" id="btn_acceder">
     </form>
   </body>
 </html>
