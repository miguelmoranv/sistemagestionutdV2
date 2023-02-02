<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crear carpetas en PHP</title>
<style>
	body{color:#FFF; font-family:Arial, Helvetica, sans-serif;}
</style>
</head>

<body bgcolor="#000000">
	<form method="post">
    <h1>Crear carpetas o directorios en SISTEMA</h1>
	<?php 
	include_once("../../bd/db.php");
	include_once('../sesiones.php');
	if ($_SERVER["REQUEST_METHOD"]=="POST")
	{ 
	$matricula=$_POST['matricula'];
		if(isset($_POST["crear"])){
			mkdir($_POST["matricula"], 755);
		}
	}
	?>
    <label>Nombre de la carpeta</label>
	<input type="text" name="matricula"
	<?php
    $query = $conexion -> query ("SELECT * FROM usuarios where matricula='$matricula'");

    while ($valores = mysqli_fetch_array($query)) { 

      echo '<option value="'.$valores['matricula'].'">'.$valores['nombre_u'].'</option>';

    }
  ?>
  >
    <input type="submit" name="crear" id="crear" value="Crear" />
    </form>
</body>
</html>