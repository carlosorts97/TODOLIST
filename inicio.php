# TODOLIST

<?php
include 'conn.php';
session_start();
//Guardamos en una consulta sql todas las tareas del usuario que ha iniciado sesion y que no estan completadas
$sql="SELECT id_task,descripcion, fecha FROM tasks WHERE usuario='".$_SESSION['user']['id'][0]."' && completada='0'";
$resultado=$conn->query($sql);
//Guardamos en una consulta sql todas las tareas del usuario que ha iniciado sesion y que estan completadas
$sql2="SELECT id_task,descripcion, fecha FROM tasks WHERE usuario='".$_SESSION['user']['id'][0]."' && completada='1'";
$resultado2=$conn->query($sql2);
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  <style>
  html{
    position: relative;
    font-family: monospace;
  }
  
  header{
  background-color:black;
  height: 80px;
  color: white;
  font-size: 17px;
  font-family: monospace;
  display: inline-flex;
  width: 100%;
  margin:0px;
  }
  header h5:nth-child(1){margin-left: 10px;}
  header h5:nth-child(2){
    margin-left:85%;
  }
  a{
    text-decoration: none;
    color: white;
  }

  div{
    font-size:19px;
      font-family: monospace;
      margin-top: 40px;
      background-color: Gainsboro;
      padding: 10px;
      width: 55%;
      border-radius: 10px;
    }
div h1{font-size: 29px;
        padding: 0px;
        position: absolute;
        top: 120px;
      }

div h3{font-size: 19px;
              padding: 0px;
              position: absolute;
              top: 230px;
              margin-bottom: 20px;
            }

div div{background-color: white;
        width: 70%;
        display:inline-flex;
}
#nuevaTarea{
            width: 300px;
          }
#nuevaTarea a{
            color: Grey;
            font-size: 17px;
}
.completada{ text-decoration: line-through;
              color:green;
              background-color:darkseagreen;
              display: inline-flex;}

.btn_borrar{
            background-color:white;
            color: red;
            border-radius: 50px;
            padding: 10px;}
.btn_borrar:hover{
            background-color:lightgrey;
          }

.btn_marcar{
            background-color:white;
            color: black;
            padding: 10px;
            width: 200px;
            border-radius: 10px;
            }
.btn_marcar:hover{
  background-color:lightgrey;
}
footer{
  position:fixed;
left:0px;
bottom:0px;
height:100px;
width:100%;
background-color: lightslategray;
color:white;

}
footer p{
  position: absolute;
  bottom: 0px;
  right: 0px;

}
  </style>

    <title></title>
  </head>
  <body>
    <!--Mediante las variables de sesion printamos el nombre del usuario que ha iniciado sesion-->
    <header><h5><?php printf("Hola %s",$_SESSION['user']['nombre_usuario']) ?></h5> <h5><a href="acciones/cerrar_sesion.php">Cerrar Session</a></h5></header>

    <?php
    echo'<div>';
    echo'<br><h1>Tus Tareas</h1>';
    //Indicamos que si el resultado de la consulta SQL tiene un resultado o más los muestra por pantalla.
    if($resultado->num_rows>=1)
    {
    $cont=0;
    while ($tasks[$cont] = $resultado->fetch_row()) {
    printf("<div id=".$cont.">%s |  %s </div> <a class=btn_borrar href=acciones/delete.php?id=".$tasks[$cont][0].">X</a> <a class=btn_marcar href=acciones/completada.php?id=".$tasks[$cont][0].">Completada</a>",$tasks[$cont][1],$tasks[$cont][2]);
    $cont++;
    }
    }else
    {
    echo'<div>No tienes tareas pendientes</div>';
    }
    //Creamos una variable FLAG para poder mostrar y esconder cada vez que hagamos clic en el boton.
    //Cada vez que hacaemos clic en el enlace cambia de 0 a 1 y viciversa.
    if($_SESSION['flag_completada']==1)
    {
    //Mostramos la tareas que estan completadas en el caso de que haya alguna
    if($resultado2->num_rows>=1)
    {
    echo'<br><h3>Tareas Finalizadas</h3>';
    $cont2=0;
    while ($tasks2[$cont2] = $resultado2->fetch_row()) {
    printf("<div class=completada id=".$cont2.">%s |  %s </div> <a class=btn_borrar href=acciones/delete.php?id=".$tasks2[$cont2][0].">X</a> <a class=btn_marcar href=acciones/completada.php?id_desmarcar=".$tasks2[$cont2][0].">Pendiente</a>",$tasks2[$cont2][1],$tasks2[$cont2][2]);
    $cont2++;
    }
  }
}
    echo'</div>';
     ?>
     <div id="nuevaTarea"><a href="acciones/new_task.php">Crear Nueva Tarea</a></div>
     <div id="nuevaTarea"><a href="acciones/mostrar.php">Mostrar tareas completadas</a></div>
     <footer><p>Copyright by es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño.<p></footer>
  </body>
</html>
