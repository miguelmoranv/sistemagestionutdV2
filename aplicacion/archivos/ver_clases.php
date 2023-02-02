<?php
include_once('sesiones.php');
include_once('encabezado.php');
include_once('../bd/db.php');

$id_clases = $_GET['id_clases'];


$consulta = "select * from clases where id_clases='$id_clases'";
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
    <title>Clases</title>
    <link rel="stylesheet" href="estilardos.css">
</head>

<body>
<center>
    <br> <br> <br>
    <h1> Datos De La Clase </h1>

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
                <td style="text-align: center;"> <?php echo $fila['id_clases']  ?> </td>
            </tr>

            <tr>
                <td> Nombre: </td>
                <td style="text-align: center;"> <?php echo $fila['nombre_clase']  ?> </td>
            </tr>
            <tr>
                <td> Ciclo Escolar: </td>
                <td style="text-align: center;"> <?php echo $fila['ciclo']  ?> </td>
            </tr>
            <tr>
                <td> Carrera: </td>
                <td style="text-align: center;"> <?php
                echo $fila['carrera']  ?> </td>
            </tr>
            <tr>
                <td> Docente: </td>
                <td style="text-align: center;"> <?php echo $fila['docente']  ?> </td>
            </tr>
            <!-- <tr>
                <td> Modalidad: </td>
                <td style="text-align: center;"> <?php echo $fila['modalidad']  ?> </td>
            </tr> -->
        

           </table>
            <br>
            <br>
            <a class="button1" href="crudclases.php"> <input type="button"  value="Regresar"> </a>
        </div>
    </div>
    <input type="hidden" name="id_clases" Value="<?php echo $fila['id_clases'] ?> ">
    </center>
</body>

</html>
</head>
<body>
    
</body>
</html>