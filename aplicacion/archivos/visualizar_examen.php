<?php
include_once("sesiones.php");
include_once("../bd/db.php");
$consulta = "select a.nom_archivos, a.size, a.ruta, a.extension,a.docente, c.docente, c.nombre_c, c.clases, c.id_carrera from archivos a, carreras c where a.docente='$rfc' and c.docente='$rfc' and tipo_documento='examenes'";


$resultado = $conexion->query($consulta);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="parciales.css ">
  <title>Document</title>
</head>

<body>
  
	</div>
	
	<header class="header">
		<div class="container">
		<div class="btn-menu">
			
			
            
			<label for="btn-menu">☰</label>
        
		</div>
			<div class="logo">
				<img src="../css/utdlogo.png" width="120px" height="100"> 
			</div>
			
			<nav class="menu">
				
				<a href="#"><?php echo $nombre_u ?></a>
			</nav>
			
		</div>
        
	</header>
	<div class="tabla con datos">
		<h1>Examenes Parciales</h1>
		<table>
			<tr>
				<td></td>
			</tr>
		</table>
    
	<div class="capa">
		
	</div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	
	<div class="cont-menu">
		<nav>
			<a href="#">Clases y Carreras</a>
			<a href="index.php">Planeaciones</a>
			<a href="examenes.php">Examenes y Proyectos</a>
			<a href="datos_personales.php">Datos Personales</a>
			<a href="#">Informes</a>
			<a href="#">Obtener Acta</a>
            <a href="salir.php"> Cerrar Sesión</a>

		
		</nav>
		<label for="btn-menu">✖️</label>
		
	</div>
</div>
</div>
<br>
<br>
  <br>
  <h3 align="center"> Registros de los Archivos en el Sistema</h3>
  <hr>
  <center>
  <table class="tabla-planeaciones"align=center border=1>
    <tr>
      <td class="categorias">Carreras</td>
      <td class="categorias">Clases</td>
      <td class="categorias">Archivo</td>
      <td class="categorias">Tamaño</td>
      <td class="categorias">Ruta</td>
      <td class="categorias">Extensión</td>
    </tr>
</center>

    <?php


    if ($resultado->num_rows > 0) {
      while ($fila = $resultado->fetch_assoc()) {



    ?>

        <tr>
          <td class="columnas"><?php echo $fila['nombre_c'] ?></td>
          <td><?php echo $fila['clases'] ?></td>
          <td><?php echo $fila['nom_archivos'] ?></td>
          <td><?php echo $fila['size'] ?></td>
          <td>
              <a class="btn" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/files' . $fila['ruta']; ?>" type="button"> Ver el archivo</a>
          </td>
          <td><?php echo $fila['extension'] ?></td>
        </tr>
    <?php
      }
    }

    ?>
  </table>
  <hr>
  <h3 align=center> La cantidad de registros encontrados es: <?php echo mysqli_num_rows($resultado); ?></h3>
  <a class="enlace" href='examenes.php'>
    <h3 align="center">Volver</h3>
  </a>

</body>

</html>