<?php
$entrar="";
   session_start();

   if (isset($_SESSION))
   {
       session_destroy();
   }

   if ($_SERVER["REQUEST_METHOD"]=="POST")
   {
      $contrasena=$_POST['contrasena'];
      $matricula=$_POST['matricula'];

      include_once('aplicacion/bd/db.php');

      $consulta="select * from usuarios where matricula='$matricula' and contrasena = '$contrasena'";

      $resultado=mysqli_query($conexion,$consulta);
      

      if (mysqli_num_rows($resultado)>0)
      {
          if ($fila=mysqli_fetch_assoc($resultado))
          {
            $rfc=$fila['rfc'];
              $rol=$fila['rol'];
              $nombre_u=$fila['nombre_u'];
              $id_usuarios=$fila['id_usuarios'];
              $matricula=$_POST['matricula'];

              session_start();
              $_SESSION['rfc']=$rfc;
              $_SESSION['contrasena']=$contrasena;
              $_SESSION['rol']=$rol;
              $_SESSION['nombre_u']=$nombre_u;
              $_SESSION['id_usuarios']=$id_usuarios;
              $_SESSION['matricula']=$matricula;
              ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
//Entre al menu de opciones 
             // echo "Usuario y contraseña correctas -Bienvenido al sistema-";
            if($resultado){ 
              $entrar="valido";
            }

          }
      }
      else //echo "Usuario y contraseña incorrectas por favor verifique ...";
      {
        ?>
        <?php
        include("index.html");
    
      ?>
      <p class="error">Verifique su RFC/Contraseña<p>
      <?php
      }

   }
   ?>
</body>
</html>

<?php
include_once('aplicacion/archivos/alertas.php');
?>