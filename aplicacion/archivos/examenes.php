<?php
include_once('sesiones.php');
include_once("../bd/db.php");
$entrar="";
$consulta = "select * from archivos where tipo_documento='examenes'";


$resultado = $conexion->query($consulta);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_FILES['archivo']['name'] != "" && $_FILES['archivo']['size'] != 0) {
  
	  $nombre_archivo = $_FILES['archivo']['name'];
    $size_archivo = $_FILES['archivo']['size'];
    $extension_archivo = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);
    $directorio = pathinfo($_SERVER["PHP_SELF"], PATHINFO_DIRNAME);
    $ruta_archivo = $directorio . "/files/" . $nombre_archivo;

    //  echo $nombre_archivo."<br>";
    //  echo $size_archivo."<br>";
    //  echo $extension_archivo."<br>";
    //  echo $directorio."<br>";
    //  echo $ruta_archivo."<br>";

    if ($extension_archivo == "doc" || $extension_archivo == "docx" || $extension_archivo == "ppt" || $extension_archivo == "pptx" || $extension_archivo == "xls" || $extension_archivo == "xlsx" || $extension_archivo == "pdf") {
      //subir archivos 
      $archivo_upload = move_uploaded_file($_FILES['archivo']['tmp_name'], "files/" . $nombre_archivo);

      //   if($archivo_upload){
      //           echo "<script>
      //   alert('Archivo subido correctamente')
      // </script>";

      include_once("../bd/db.php");

      $consulta = "INSERT INTO archivos (id_archivos, tipo_documento, fecha_hora, size, ruta, extension, docente, nom_archivos, carrera) VALUES (null,'examenes', 'current_timestamp','$size_archivo','$ruta_archivo','$extension_archivo','$rfc','$nombre_archivo','$id_carrera')";
      $resultado = $conexion->query($consulta);

      if ($consulta) {
        $entrar="subir_examen";
      } else {
        $entrar="errorglobal";
      }
    } else {
      $entrar="errorfile";
    }
  } 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Pagina principal</title>
	<link rel="stylesheet" href="parciales.css ">
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
				<a href="#"><?php echo ("$nombre_u")?></a>
			</nav>		   	
		</div>
	</header>
	<div class="tabla con datos">
		
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
			<a href="examenes.php">Examenes parciales</a>
			<a href="datos_personales.php">Datos Personales</a>
			<a href="#">Informes</a>
			<a href="#">Obtener Acta</a>
			<a href="salir.php"> Cerrar Sesión</a>
		
		</nav>
		<label for="btn-menu">✖️</label>
		
	</div>
</div>
</div>
<br><br><br>
<?php if ($rol=="user" or $rol=="ptc") { ?>
  
<section>
	
	<div class="tabla-planeaciones">
	</br>
	</br>
	<h1>Examenes</h1>
	
	<center>
	<table border="5">
		<tr class="categorias">
		<h3 align="center"> Subir Archivos</h3>
  <hr>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

    <table align="center">
</center>
      <tr>
        <td>Archivo a descargar: </td>
        <td>
          <input name="archivo" type="file" size="70" maxlength="70">
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="enviar" value="Subir" class="btn_acciones">
          <input type="reset" name="borrar" value="Cancelar" class="eliminar">
        </td>
      </tr>
    </table>
</center>
  </form>
  <hr>
  <a class="enlace" href='visualizar_examen.php'>
    <h3 align=center>Ver los Archivos</h3>
</center>
  </a>
</section>
<?php }?>
<?php if ($rol=="admin") { ?>
  <?php
include_once("sesiones.php");
include_once("../bd/db.php");
$consulta = "select * from archivos where tipo_documento='examenes'";


$resultado = $conexion->query($consulta);
?>
  <br><br>
  <center>
  <h3 align=center> Registros de Examenes en el Sistema</h3>
  <hr>
  <table align=center border=1>
    <tr>
      <td class="categorias">No.</td>
      <td class="categorias">RFC</td>
      <td class="categorias">Archivo</td>
      <td class="categorias">Tamaño</td>
      <td class="categorias">Ruta</td>
      <td class="categorias">Extensión</td>

      <?php if ($rol == "admin") { ?>
        <td class="categorias">Acciones</td>
      <?php } ?>

    </tr>

    <?php


    if ($resultado->num_rows > 0) {
      while ($fila = $resultado->fetch_assoc()) {



    ?>

        <tr>
          <td class="columnas"><?php echo $fila['id_archivos'] ?></td>
          <td><?php echo $fila['docente'] ?></td>
          <td><?php echo $fila['nom_archivos'] ?></td>
          <td><?php echo $fila['size'] ?></td>
          <td>
              <a class="btn_acciones" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/files' . $fila['ruta']; ?>" type="button"> Ver el archivo</a>
          </td>
          <td><?php echo $fila['extension'] ?></td>
          <?php if ($rol == "admin") { ?>
            <td><input type="submit" class="eliminar" value="Eliminar" href="eliminar.php?folio=<?php echo $fila['id_archivos'] ?>" class="eliminar"></td>
          <?php } ?>
        </tr>
    <?php
      }
    }

    ?>
  </table>
  <hr>
  <h3 align=center> La cantidad de planeaciones encontradas es: <?php echo mysqli_num_rows($resultado); ?></h3>
  
<?php }?>
</body>

</html>
<?php
include_once("alertas.php");
?>
	</table>
</center>
</div>
</section>
</body>
</html>