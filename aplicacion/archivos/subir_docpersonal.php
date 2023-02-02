<?php
include_once("sesiones.php");
include_once("../bd/db.php");
$entrar = "";
$id_docpersonal=$_POST['id_docpersonal'];
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES['archivo']['name'] != "" && $_FILES['archivo']['size'] != 0) {


      $nom_doc = $_FILES['archivo']['name'];
      $size_archivo = $_FILES['archivo']['size'];
      $extension_archivo = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);
      $directorio = pathinfo($_SERVER["PHP_SELF"], PATHINFO_DIRNAME);
      $ruta_archivo = $directorio . "/files/$no_empleado/" . $nom_doc;

      //  echo $nombre_archivo."<br>";
      //  echo $size_archivo."<br>";
      //  echo $extension_archivo."<br>";
      //  echo $directorio."<br>";
      //  echo $ruta_archivo."<br>";

      if ($extension_archivo == "doc" || $extension_archivo == "docx" || $extension_archivo == "ppt" || $extension_archivo == "pptx" || $extension_archivo == "xls" || $extension_archivo == "xlsx" || $extension_archivo == "pdf") {
        //subir archivos 
        $archivo_upload = move_uploaded_file($_FILES['archivo']['tmp_name'], "files/$no_empleado/" . $nom_doc);

        //   if($archivo_upload){
        //           echo "<script>
        //   alert('Archivo subido correctamente')
        // </script>";

        include_once("../bd/db.php");
        include_once("sesiones.php");

        $consulta = "INSERT INTO doc_personales VALUES (null,'$id_docpersonal',CURRENT_TIMESTAMP,'$size_archivo','$ruta_archivo','$extension_archivo','$nom_doc','$id_usuarios')";
        $resultado = $conn->query($consulta);

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
<input type="hidden" name="id_docpersonal" id="docpersonal2">
<script src="foranea.js"></script>
  <?php

if ($consulta) {
  $entrar = "subir_doc";
} else {
$entrar = "errorfile";
}
}
    }

}
include_once('alertas.php');
  ?>
</body>
</html>