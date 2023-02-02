<?php
include_once("sesiones.php");
include_once("../bd/db.php");
include_once("encabezado.php");
$entrar="";
$consulta = "select a.id_carrera,a.nombre_c, b.id_clases, b.carrera, b.nombre_clase, b.ciclo from carreras a, clases b where a.id_carrera=b.carrera and docente='$id_usuarios'";

$resultado = $conn->query($consulta);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases</title>
    <link rel="stylesheet" href="parciales.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    </script>
</head>
<body>
  <div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
<?php if ($rol=="estandar") { ?>
  <br>
  <div class="title-cards">
		<h2>Clases</h2>
	</div>
<div class="container-card">

<?php


if ($resultado->num_rows > 0) {
  while ($fila = $resultado->fetch_assoc()) {



?>
<div class="card">
	<div class="contenido-card">
		<h4><?php echo $fila['nombre_clase'] ?></h3>
    <h5><?php echo $fila['ciclo'] ?></h5>
    <?php
    $carrera= "select a.id_carrera,a.nombre_c, b.carrera from carreras a, clases b where a.id_carrera=b.carrera";
    ?>
    <h5><?php echo $fila['nombre_c'] ?></h5>
		<a href="archivos.php?id_clases=<?php echo $fila['id_clases'] ?>">Ver Clase</a>
	</div>
</div>
<?php
  }
} else {
  ?>
  <h2 class="text-danger"> No hay resultados</h2>
  <?php
}
}
?>
    </div>
<?php if ($rol=="admin") { ?>
  <?php
include_once("sesiones.php");
include_once("../bd/db.php");

$consulta = "select a.id_carrera,a.nombre_c, b.id_clases, b.carrera, b.nombre_clase,b.ciclo,c.id_usuarios,c.nombre from carreras a, clases b, usuarios c where a.id_carrera=b.carrera and c.id_usuarios=b.docente";
$resultado = $conn->query($consulta);
?>
 <br>
  <div class="title-cards">
		<h2>Clases</h2> 
	</div>
<div class="container-card">
<?php


if ($resultado->num_rows > 0) {
  while ($fila = $resultado->fetch_assoc()) {



?>
<div class="card">
	<div class="contenido-card">
		<h3><?php echo $fila['nombre_clase'] ?></h3>
    <h5><?php echo $fila['ciclo'] ?></h5>
    <h5><?php echo $fila['nombre_c'] ?></h5>
    <h5><?php echo $fila['nombre'] ?></h5>
		<a href="archivos.php?id_clases=<?php echo $fila['id_clases'] ?>">Ver Clase</a>
	</div>
</div>
<?php
  }
} else {
  ?>
  <h2 class="text-danger"> No hay resultados</h2>
  <?php
}
}
?>
</div>
</div>
</body>
</html>