# TODOLIST
<?php
include 'conn.php';
session_start();
try{
if($_POST&&
!empty($_POST['nom']) &&
!empty($_POST['pass'])){

  $nom=htmlspecialchars($_POST['nom']);
  $pass=htmlspecialchars($_POST['pass']);

  $sql="SELECT id_usuario FROM usuarios WHERE nombre_usuario='".$nom."' && contrasena='".$pass."'";
  $resultado=$conn->query($sql);
  if($resultado->num_rows>=1)
  {
  $_SESSION['user']['id']=$resultado->fetch_row();
  $_SESSION['user']['contrasena']=$pass;
  $_SESSION['user']['nombre_usuario']=$nom;
  header('Location:inicio.php');

}else{
  $id=0;
  echo'<p class=error>Nombre de usuario o contraseña erroneo</p>';}
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
          width: 350px;
          height: 180px;
          font-size: 17px;
          border-radius: 10px;
           }
    form p{
      padding: 6px;
    }
    form input{
      margin-left: 10px;
      height: 25px;
      width: 200px;
      border-radius: 10px;
    }

    #btn_acceder{background-color: black;
                color:white;
              width: 70px;}
     </style>
   </head>
   <body>
     <h1>Inicio de Session</h1>
     <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
       <p>Nombre: <input type="text" name="nom"></p>
       <p>Password: <input type="password" name="pass"></p>
       <input type="submit" name="enviar" value="Acceder" id="btn_acceder">
     </form>
     <a href="signup.php">Aun no tienes cuenta?</a>
   </body>
 </html>
