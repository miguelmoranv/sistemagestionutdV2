<?php
include_once("sesiones.php");
include_once("../bd/db.php");
include_once("encabezado.php");
    //  echo $id_clases;

$consulta2="select c.id_clases,c.nombre_clase,c.docente,a.id_archivos,a.nom_archivos,a.clase,a.docente,a.size,a.ruta,a.extension from clases c, archivos a where c.id_clases='$id_clases' and a.docente='$id_usuarios'";
$resultado2 = $conexion->query($consulta2);
$entrar="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_FILES['archivo_examen']['name'] != "" && $_FILES['archivo']['size'] != 0) {

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
      
      $consulta2 = "INSERT INTO archivos (id_archivos, tipo_documento, fecha_hora, size, ruta, extension, nom_archivos, clase, periodo, docente) VALUES
       (null,'examenes', CURRENT_TIMESTAMP,'$size_archivo','$ruta_archivo','$extension_archivo','$nombre_archivo', '$id_clases', '1erparcial','$id_usuarios')";
      $resultado2 = $conexion->query($consulta2);

      if ($consulta2) {
        $entrar="subir_examen";
      } else {
        $entrar="errorglobal";
      }
    } else {
      $entrar="errorfile";
    }
  } 
}


  include_once("alertas.php");

?>