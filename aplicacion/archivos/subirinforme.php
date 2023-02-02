<?php
include_once("sesiones.php");
include_once("../bd/db.php");
include_once("encabezado.php");
$entrar = "";
$consulta="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.clase,a.docente,a.size,a.ruta,a.extension,a.tipo_documento,a.fecha_hora,b.id_carrera,b.nombre_c from clases c, archivos a, carreras b where c.id_clases=1 and a.docente='$id_usuarios' and c.carrera=b.id_carrera and a.tipo_documento='informe'";
$resultado = $conn->query($consulta);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_FILES['archivo']['name'] != "" && $_FILES['archivo']['size'] != 0) {


    
    $clases = $_FILES['archivo']['name'];
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
      include_once("sesiones.php");
      
      $consulta = "INSERT INTO archivos (id_archivos, tipo_documento, fecha_hora, size, ruta, extension, nom_archivos, clase, periodo, docente) VALUES
       (null,'informe', CURRENT_TIMESTAMP,'$size_archivo','$ruta_archivo','$extension_archivo','$nombre_archivo', 1, '1','$id_usuarios')";
      $resultado = $conn->query($consulta);

      if ($consulta) {
        $entrar="subir";
      } else {
        $entrar="errorglobal";
      }
    } else {
      $entrar="errorfile";
    }
  } 
}
include_once('alertas.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informes</title>
    <link rel="stylesheet" href="parciales.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <!-- CSS only -->
</head>
<body align="center">
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
  <br><br><br><br>

  <table class="table">
    <tr>
      <td class="col">Carrera</td>
      <td class="col">Clases</td>
      <td class="col">Archivo</td>
      <td class="col">Fecha y Hora</td>
      <td class="col">Ruta</td>
      <td class="col">Extensión</td>
    </tr>
</center><?php if($rol=="admin"){ 
  $consulta="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.clase,a.docente,a.size,a.ruta,a.extension,a.tipo_documento,a.fecha_hora,b.id_carrera,b.nombre_c from clases c, archivos a, carreras b where c.id_clases=1 and c.carrera=b.id_carrera and a.tipo_documento='informe'";
  $resultado = $conn->query($consulta);

if ($resultado->num_rows > 0) {
  while ($fila = $resultado->fetch_assoc()) {



?>

        <tr>
          <th class="row">
          <th class="row"><?php echo $fila['nombre_c']?></td>
          <td><?php echo $fila['nombre_clase']?></td>
          <td><?php echo $fila['nom_archivos']?></td>
        <td class="col-2"><?php echo $fila['fecha_hora']?></td>
        <td class="col-1">
              <a class="btn" target="_blank" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '' . $fila['ruta']; ?>" type="button"> <p class="btn btn-primary"> Ver el Archivo</p></a>
          </td>
          <td><?php echo $fila['extension'] ?></td>
        
        </tr>
        </th>
    <?php
  }
      }
    }

    ?>

<?php


if ($resultado->num_rows > 0) {
  while ($fila = $resultado->fetch_assoc()) {



?>

        <tr>
          <th class="row">
          <th class="row"><?php echo $fila['nombre_c']?></td>
        <td><?php echo $fila['nombre_clase']?></td>
          <td><?php echo $fila['nom_archivos']?></td>
          <td><?php echo $fila['size'] ?></td>
          <td>
              <a class="btn" target="_blank" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '' . $fila['ruta']; ?>" type="button"> Ver el archivo</a>
          </td>
          <td><?php echo $fila['extension']?></td>
        </tr>
        </th>
    <?php
      }
    }

    ?>
  <form action="" method="POST" enctype="multipart/form-data">
    <table align="center">
      <tr>
        <td>
        <?php if($rol=="estandar"){?>
          <input name="archivo" id="archivo" type="file" size="70" maxlength="70" >
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="enviar" value="subir" class="btn_acciones">
          <input type="reset" name="borrar" value="Cancelar" class="eliminar">
        </td>
        <?php } ?>
      </tr>
    </table>
    <input type="hidden" name="archivo" value="<?php echo $fila['id_clases'] ?> " >
  </form>
      </div>
    </div>
  </div>
</div>
<div align="center">
<a class="btn btn-secondary"href="clases.php">Volver</a>
  </div>