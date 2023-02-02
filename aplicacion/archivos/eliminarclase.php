<?php

   include_once('sesiones.php');
   include_once('encabezado.php');
   include_once('../bd/db.php');
   $id_clases = $_REQUEST['id_clases'];
   $consulta = "delete from clases where id_clases='$id_clases'";
$resultado = mysqli_query($conexion, $consulta);
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
      $entrar="del_clas";
   }
   else{ $entrar="malo_clas";
   }
   ?>
</body>
</html>

<?php
include_once('alertas.php');
?>
