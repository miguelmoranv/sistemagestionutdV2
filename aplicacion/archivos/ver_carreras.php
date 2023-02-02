<?php
include_once('sesiones.php');
include_once('encabezado.php');
include_once('../bd/db.php');

$id_carrera = $_GET['id_carrera'];


$consulta = "select * from carreras where id_carrera='$id_carrera'";
$resultado = mysqli_query($conexion, $consulta);

if ($fila = mysqli_fetch_assoc($resultado)) {
   
}
?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrera</title>
    <link rel="stylesheet" href="estilardos.css">
</head>

<body>
<center>
    <br> <br> <br>
    <h1> Datos De La Carrera </h1>

    <div id="" class="">
        <div class="">
           <table class="">
            <br>
            <br>
            <br>
            <br>
            <br>
            <tr>
                <td> ID: </td>
                <td style="text-align: center;"> <?php echo $fila['id_carrera']  ?> </td>
            </tr>

            <tr>
                <td> Nombre: </td>
                <td style="text-align: center;"> <?php echo $fila['nombre_c']  ?> </td>
            </tr>

        

           </table>
            <br>
            <br>
            <a class="button1" href="crudcarreras.php"> <input type="button"  value="Regresar"> </a>
        </div>
    </div>
    <input type="hidden" name="id_carrera" Value="<?php echo $fila['id_carrera'] ?> ">
    </center>
</body>

</html>
</head>
<body>
    
</body>
</html>