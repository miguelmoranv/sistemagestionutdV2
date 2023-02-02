<?php

//$entrar="";
   include_once('sesiones.php');
   include_once('encabezado.php');
   include_once('../bd/db.php');

   $id_usuarios = $_REQUEST['id_usuarios'];

   $consulta="delete from usuarios where id_usuarios='$id_usuarios'";
   $resultado=mysqli_query($conexion, $consulta);

$entrar="";   
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

   if ($resultado){
      $entrar='borrar_usu'; 
   }else {('error_usu');
   }
   ?>
</body>
</html>

<?php
   include('alertas.php');
?>