<?php
include_once("sesiones.php");
include_once("../bd/db.php");
include_once("encabezado.php");
$entrar = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES['archivo']['name'] != "" && $_FILES['archivo']['size'] != 0) {


      $foto_perfil = $_FILES['archivo']['name'];
      $size_archivo = $_FILES['archivo']['size'];
      $extension_archivo = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);
      $directorio = pathinfo($_SERVER["PHP_SELF"], PATHINFO_DIRNAME);
      $ruta_archivo = $directorio . "/files/$no_empleado/" . $nombre_archivo;

      //  echo $nombre_archivo."<br>";
      //  echo $size_archivo."<br>";
      //  echo $extension_archivo."<br>";
      //  echo $directorio."<br>";
      //  echo $ruta_archivo."<br>";

      if ($extension_archivo == "png" || $extension_archivo == "jpg" || $extension_archivo == "jpeg" || $extension_archivo == "gif" || $extension_archivo == "bmp" || $extension_archivo == "tif" || $extension_archivo == "pdf") {
        //subir archivos 
        $archivo_upload = move_uploaded_file($_FILES['archivo']['tmp_name'], "files/$no_empleado/" . $foto_perfil);

        //   if($archivo_upload){
        //           echo "<script>
        //   alert('Archivo subido correctamente')
        // </script>";

        include_once("../bd/db.php");
        include_once("sesiones.php");

        $consulta = "UPDATE usuarios set foto_perfil='$ruta_archivo$foto_perfil' where id_usuarios='$id_usuarios' ";
        $resultado = $conn->query($consulta);

        if ($consulta) {
          $entrar = "subir";
        } else {
          $entrar = "errorglobal";
        }
      } else {
        $entrar = "errorfile";
      }
    }
  
  }
  include_once('alertas.php');

?>