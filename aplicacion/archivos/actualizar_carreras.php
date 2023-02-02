<?php
$entrar="";
   include_once("sesiones.php");
   include_once('encabezado.php');
   $id_carrera=$_REQUEST['id_carrera'];

   include_once("../bd/db.php");
   $consulta="select * from carreras where id_carrera='$id_carrera'";
   $resultado=mysqli_query($conexion,$consulta);

   if ($fila=mysqli_fetch_assoc($resultado))
   {
       //regresa el registro de la consulta
   }


   if ($_SERVER["REQUEST_METHOD"]=="POST"){
       $id_carrera=$_POST['id_carrera'];
       $nombre_c=$_POST['nombre_c'];
       $modalidad=$_POST['modalidad'];
       
       $consulta="update carreras set nombre_c='$nombre_c', modalidad='$modalidad' where id_carrera='$id_carrera'";

       $resultado=mysqli_query($conexion,$consulta);

       if ($resultado){
           $entrar="act_car";
       }
       else{
            $entrar="malcar";
       }


   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="parciales.css ">
    <title>Actualizar</title>
</head>
<body>
<br><br><br>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 

   

    <center>
        <br><br>
    <h1>Actualizar Carreas</h1>
        
        <table border="3" align="center">
        <div class="tabla-planeaciones">
        
            <tr>
                <td class="columnas"><label for="nombre_clbl">Nombre:</label></td>
                <td><input type="text" name="nombre_c" id="nombre_clbl" required placeholder="nombre_c" value='<?php echo $fila['nombre_c'] ?>'></td>
            </tr>
            <tr>
                  <td><label>Modalidad </label></td>
                  <td><select name="modalidad" class="form-control" required>
	                  <option value="BIS">BIS</option> 
	                  <option value="Clasica">Clasica</option> 
	                </select> </td>
                </tr>
    
                 

                <td><input class="guardar" type="submit" name="enviar" Value="Guardar"   ></td>
            </tr>
        </table>
        </div>
        </center>

        <input type="hidden" name="id_carrera" Value='<?php echo $fila['id_carrera'] ?>' >
    </form>
    <center>
        <br><br><br>
    <a href="crudcarreras.php" class="fonsai">Regresar</a>
</center>    
</body>
</html>
       
<?php
include_once('alertas.php');
?>