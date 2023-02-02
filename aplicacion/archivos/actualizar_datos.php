<?php
   include_once("sesiones.php");
   include_once('encabezado.php');
   $id_usuarios=$_REQUEST['id_usuarios'];

   include_once("../bd/db.php");
   $consulta="select * from usuarios where id_usuarios='$id_usuarios'";
   $resultado=mysqli_query($conexion,$consulta);
   $entrar="";

   if ($fila=mysqli_fetch_assoc($resultado))
   {
       //regresa el registro de la consulta
   }


   if ($_SERVER["REQUEST_METHOD"]=="POST"){
       $id_usuarios=$_POST['id_usuarios'];
       $nombre_u=$_POST['nombre_u'];
       $celular=$_POST['celular'];
       $ape_1=$_POST['ape_1'];
       $ape_2=$_POST['ape_2'];
       $rol=$_POST['rol'];
    $estatus=$_POST['estatus'];
    $correo=$_POST['correo'];

       $consulta="update usuarios set nombre_u='$nombre_u',ape_1='$ape_1',ape_2='$ape_2',rol='$rol', estatus='$estatus',celular='$celular', correo='$correo' where id_usuarios='$id_usuarios'";

       $resultado=mysqli_query($conexion,$consulta);

       if ($resultado){
        $entrar="act_datos";
       }
       else{
        $entrar="error_act";
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
    <h1>Actualizar Datos Personales</h1>
        
        <table border="3" align="center">
        <div class="tabla-planeaciones">
        <?php if ($rol=="admin") { ?>
        <tr class="categorias">
            </tr>
           <?php }?>
            <tr>
                <td class="columnas"><label for="nombrelbl">Nombre:</label></td>
                <td><input type="text" name="nombre_u" id="nombrelbl" required placeholder="nombre_u" value='<?php echo $fila['nombre_u'] ?>'></td>
            </tr>
            <tr>
               <td class="columnas"><label for="apelbl">Apellido Paterno</label></td>
                <td><input type="text" name="ape_1" id="apelbl" required placeholder="ape_1" value='<?php echo $fila['ape_1'] ?>' ></td>
            </tr>

            <tr>
               <td class="columnas"><label for="apelbl">Apellido Materno</label></td>
                <td><input type="text" name="ape_2" id="apelbl" required placeholder="ape_2" value='<?php echo $fila['ape_2'] ?>' ></td>
            </tr>

            <tr>
               <td class="columnas"><label for="celularlbl">Celular</label></td>
                <td class="columnas"><input type="text" name="celular" id="celularlbl" required placeholder="celular" value='<?php echo $fila['celular'] ?>' ></td>
            </tr>
            <tr>
                  <td><label>Rol </label></td>
                  <td><select name="rol" class="form-control" required>
	                  <option value="admin">admin</option> 
	                  <option value="user">user</option> 
                    
	                </select> </td>
                </tr>
                <tr>
                  <td><label>Estatus </label></td>
                  <td><select name="estatus" class="form-control" required>
	                  <option value="activo">Activo</option> 
	                  <option value="inactivo">Inactivo</option> 
                   
	                </select> </td>
                </tr>
                <tr>
               <td class="columnas"><label for="celularlbl">Correo</label></td>
                <td class="columnas"><input type="text" name="correo" id="celularlbl" required placeholder="correo" value='<?php echo $fila['correo'] ?>' ></td>
            </tr>


            <tr>

                <td><input class="guardar" type="submit" name="enviar" Value="Guardar"   ></td>

            </tr>
        </table>
        </div>
        </center>

        <input type="hidden" name="id_usuarios" Value='<?php echo $fila['id_usuarios'] ?>' >
    </form>
    <center>
        <br><br><br>
    <a href="datos_personales.php" class="fonsai">Regresar</a>
</center>    
</body>
</html>

<?php
    include_once("./alertas.php");
?>