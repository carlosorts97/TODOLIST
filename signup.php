# TODOLIST
<?php
include 'conn.php';
session_Start();
if($_POST &&
!empty($_POST['nom']) &&
!empty($_POST['email']) &&
!empty($_POST['pass']) &&
!empty($_POST['pass2']))
{
$nom=htmlspecialchars($_POST['nom']);
$email=htmlspecialchars($_POST['email']);
$pass=htmlspecialchars($_POST['pass']);
$pass2=htmlspecialchars($_POST['pass2']);

$sql="SELECT * FROM usuarios WHERE nombre_usuario='".$nom."'";
$resultado=$conn->query($sql);
if($resultado->num_rows>=1)
{
echo'<p class=error>este nombre ya esta en uso<p>';

}
else{
  $sql="INSERT INTO usuarios VALUE('','".$nom."','".$pass."','".$email."')";
  $resultado=$conn->query($sql);
  $sql="SELECT id_usuario FROM usuarios WHERE nombre_usuario='".$nom."'";
  $resultado=$conn->query($sql);
  $_SESSION['user']['id']=$resultado->fetch_row();
  $_SESSION['user']['nombre_usuario']=$nom;
  header('Location:inicio.php');
}
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
         width: 470px;
         height: 320px;
         font-size: 17px;
         border-radius: 10px;
         margin-top: 40px;
          }
   p{
     padding: 6px;
     width: 100%;
     margin-top: -25px;
   }

   h5{display: inline-flex; width: 100px;
        height: 6px;
      margin-left: 20px;}

   form input{
     margin-left: 6px;
     height: 25px;
     border-radius: 10px;


   }

   #btn_acceder{background-color: black;
               color:white;
                margin-top: 20px;
                margin-left: 20px;}

    </style>
  </head>
  <body>
    <h1>Crear una cuenta</h1>
    <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
      <p><h5>Nombre:</h5><input type="text" name="nom"></p>
      <p><h5>email:</h5><input type="email" name="email"></p>
      <p><h5>Password:</h5><input type="password" name="pass"></p>
      <p><h5>Repite el Password:</h5> <input type="password" name="pass2"></p>
      <input type="submit" name="enviar" value="enviar" id="btn_acceder">
    </form>
  </body>
</html>
