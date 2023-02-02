<?php
include_once("sesiones.php");
include_once("../bd/db.php");
include_once("encabezado.php");
$id_clases=$_REQUEST['id_clases'];




$entrar="";


$consulta="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.clase,a.docente,a.size,a.ruta,a.extension,a.tipo_documento,b.id_carrera,b.nombre_c from clases c, archivos a, carreras b where c.id_clases='$id_clases' and a.docente='$id_usuarios' and c.carrera=b.id_carrera and a.tipo_documento='planeaciones'";
$resultado = $conexion->query($consulta);

$consulta2="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.clase,a.docente,a.size,a.ruta,a.extension,a.tipo_documento,b.id_carrera,b.nombre_c from clases c, archivos a, carreras b where c.id_clases='$id_clases' and a.docente='$id_usuarios' and c.carrera=b.id_carrera and a.tipo_documento='examenes' and a.periodo='parcial1' and a.clase='$id_clases' and c.id_clases='$id_clases'";
$resultado2 = $conexion->query($consulta2);

$consulta3="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.clase,a.docente,a.size,a.ruta,a.extension,a.tipo_documento,b.id_carrera,b.nombre_c from clases c, archivos a, carreras b where c.id_clases='$id_clases' and a.docente='$id_usuarios' and c.carrera=b.id_carrera and a.tipo_documento='examenes' and a.periodo='parcial2'";
$resultado3 = $conexion->query($consulta3);

$consulta4="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.clase,a.docente,a.size,a.ruta,a.extension,a.tipo_documento,b.id_carrera,b.nombre_c from clases c, archivos a, carreras b where c.id_clases='$id_clases' and a.docente='$id_usuarios' and c.carrera=b.id_carrera and a.tipo_documento='examenes' and a.periodo='parcial3'";
$resultado4 = $conexion->query($consulta4);

$consulta5="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.clase,a.docente,a.size,a.ruta,a.extension,a.tipo_documento,b.id_carrera,b.nombre_c from clases c, archivos a, carreras b where c.id_clases='$id_clases' and a.docente='$id_usuarios' and c.carrera=b.id_carrera and a.tipo_documento='proyectos' and a.clase='$id_clases' and c.id_clases='$id_clases'";
$resultado5 = $conexion->query($consulta5);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivos</title>
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
  <div class="title-cards">
		<h2>Archivos</h2>

	</div>
  <div align="right">
<div class="container-card">
<div class="card">
	<div class="contenido-card">
		<h3>Planeaciones</h3>
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#planeaciones">
  Subir Planeacion
</button>
	</div>
</div>
<div class="card">
	<div class="contenido-card">
		<h3>Examenes</h3>
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#examen">
  Ver Examenes
</button>
	</div>
</div>
<div class="card">
	<div class="contenido-card">
		<h3>Proyectos</h3>
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#proyectos">
  Subir Proyecto
</button>
	</div>
</div>
</div>
    </div>

<!-- Planeacion -->
<div class="modal fade" id="planeaciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subir Planeacion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table">
    <tr>
      <td class="col">Carrera</td>
      <td class="col">Clases</td>
      <td class="col">Archivo</td>
      <td class="col">Tamaño</td>
      <td class="col">Ruta</td>
      <td class="col">Extensión</td>
    </tr>
</center><?php if($rol=="admin"){ 
  
  $consulta="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.clase,a.docente,a.size,a.ruta,a.extension,u.id_usuarios,u.nombre_u,b.id_carrera,b.nombre_c
  from clases c, archivos a, usuarios u, carreras b where tipo_documento='planeaciones' and a.docente=u.id_usuarios and c.carrera=b.id_carrera and a.clase=c.id_clases";
  $resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
  while ($fila = $resultado->fetch_assoc()) {



?>

        <tr>
          <th class="row">
          <th class="row"><?php echo $fila['nombre_c']?></td>
          <td><?php echo $fila['nombre_clase']?></td>
          <td><?php echo $fila['nombre_u']?></td>
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
  <form action="subirplaneacion.php" method="POST" enctype="multipart/form-data">
    <table align="center">
      <tr>
        <td>
        <?php if($rol=="user"){?>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<div align="center">
<a class="btn btn-secondary"href="clases.php">Volver</a>
  </div>


<!--Examenes -->
<div class="modal fade" id="examen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subir Examen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="card-body">
        <h6>1erParcial</h6>
      <table class="table table-bordered table-hover">
        <thead>
    <tr>
      <th>Carrera</th>
      <th>Clases</th>
      <?php if($rol=="admin"){?>
      <th>Docente</th>
      <th>Apellidos</th>
        <?php } ?>
      <th>Archivo</th>
      <th>Ruta</th>
    </tr>
    </thead>
</center><?php if($rol=="admin"){ 
  $consultaadmin="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.clase,a.docente,a.size,a.ruta,a.extension,u.id_usuarios,u.nombre_u,u.ape_1,u.ape_2,b.id_carrera,b.nombre_c
  from clases c, archivos a, usuarios u, carreras b where tipo_documento='examenes' and a.docente=u.id_usuarios and c.carrera=b.id_carrera and a.clase='$id_clases' and c.id_clases='$id_clases'";
  $resultadoadmin = $conexion->query($consultaadmin);

if ($resultadoadmin->num_rows > 0) {
  while ($filaadmin = $resultadoadmin->fetch_assoc()) {



?>
<tbody>
        <tr>
          <td><?php echo $filaadmin['nombre_c']?></td>
          <td><?php echo $filaadmin['nombre_clase']?></td>
          <?php if($rol=="admin"){?>
            <td><?php echo $filaadmin['nombre_u']?></td>
            <td><?php echo $filaadmin['ape_1']?></td>
        <?php } ?>
          <td><?php echo $filaadmin['nom_archivos']?></td>
          <td>
              <a class="btn btn-block btn-outline-success" target="_blank" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '' . $filaadmin['ruta']; ?>"> Ver el archivo</a>
          </td>
        </tr>
        </th>
        </tbody>
    <?php
  }
      }
    }

    ?>

<?php


if ($resultado2->num_rows > 0) {
  while ($fila = $resultado2->fetch_assoc()) {



?>

        <tr>
          <td><?php echo $fila['nombre_c']?></td>
        <td><?php echo $fila['nombre_clase']?></td>
          <td><?php echo $fila['nom_archivos']?></td>
          <td>
              <a class="btn btn-block btn-outline-success" target="_blank" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '' . $fila['ruta']; ?>" type="button"> Ver el archivo</a>
          </td>
        </tr>
        </th>
    <?php
      }
    }

    ?>
  <form action="subirexamenparcial1.php" method="POST" enctype="multipart/form-data">
    <table align="center">
      <tr>
        <td>
        <?php if($rol=="user" or $rol=="ptc"){?>
          <input name="archivo" id="archivo" type="file" size="70" maxlength="70">
        </td>
      </tr>
      <tr>
        <td>
        <input type="hidden" name="id_clases" id="clase1"
    <?php
    $query = $conexion -> query ("SELECT * FROM clases where id_clases='$id_clases'");

    while ($valores = mysqli_fetch_array($query)) { 

      echo '<option value="'.$valores['id_clases'].'"></option>';

    }
  ?>>
        </td>
        <td>
          <button class="btn btn-primary start">
                          <i class="fas fa-upload"></i>
                          <input type="submit" name="enviar">
                          <span></span>
                        </button>
          <input type="reset" name="borrar" value="Cancelar" class="eliminar">
        </td>
        <?php } ?>
      </tr>
    </table>
    
  </form>
  
        <br>
        <hr>
        <br>
        <h6>2do Parcial</h6>
        <table class="table">
    <tr>
      <td class="col">Carrera</td>
      <td class="col">Clases</td>
      <td class="col">Archivo</td>
      <td class="col">Tamaño</td>
      <td class="col">Ruta</td>
      <td class="col">Extensión</td>
    </tr>
</center><?php if($rol=="admin"){ 
  $consulta3="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.clase,a.docente,a.size,a.ruta,a.extension,u.id_usuarios,u.nombre_u,b.id_carrera,b.nombre_c
  from clases c, archivos a, usuarios u, carreras b where tipo_documento='examenes' and a.docente=u.id_usuarios and c.carrera=b.id_carrera";
  $resultado3 = $conexion->query($consulta3);

if ($resultado3->num_rows > 0) {
  while ($fila = $resultado3->fetch_assoc()) {



?>

        <tr>
          <th class="row">
          <th class="row"><?php echo $fila['nombre_c']?></td>
          <td><?php echo $fila['nombre_clase']?></td>
          <td><?php echo $fila['nombre_u']?></td>
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
    }

    ?>

<?php


if ($resultado3->num_rows > 0) {
  while ($fila = $resultado3->fetch_assoc()) {



?>

        <tr>
          <th class="row">
          <th class="row"><?php echo $fila['nombre_c']?></td>
          <td><?php echo $fila['nombre_c']?></td>
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
  <form action="subirexamenparcial2.php" method="POST" enctype="multipart/form-data">
    <table align="center">
      <tr>
        <td>
        <?php if($rol=="user" or $rol=="ptc"){?>
          <input name="archivo" id="archivo" type="file" size="70" maxlength="70" >
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" name="enviar" value="subir" class="btn_acciones">
          <input type="reset" name="borrar" value="Cancelar" class="eliminar">
        </td>
        <?php } ?>
      </tr>
    </table>
    <input type="hidden" name="archivo" value="<?php echo $fila['id_clases'] ?> " >
  </form>
 
        <br><br>
        <h6>3er Parcial</h6>
        <table class="table">
    <tr>
      <td class="col">Carrera</td>
      <td class="col">Clases</td>
      <td class="col">Docente</td>
      <td class="col">Tamaño</td>
      <td class="col">Ruta</td>
      <td class="col">Extensión</td>
    </tr>
</center><?php if($rol=="admin"){ 
  
  $consulta4="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.clase,a.docente,a.size,a.ruta,a.extension,u.id_usuarios,u.nombre_u,b.id_carrera,b.nombre_c
  from clases c, archivos a, usuarios u, carreras b where tipo_documento='examenes' and a.docente=u.id_usuarios and c.carrera=b.id_carrera and a.clase=c.id_clases";
  $resultado4 = $conexion->query($consulta4);

if ($resultado4->num_rows > 0) {
  while ($fila = $resultado4->fetch_assoc()) {



?>

        <tr>
          <th class="row">
          <th class="row"><?php echo $fila['nombre_c']?></td>
          <td><?php echo $fila['nombre_clase']?></td>
          <td><?php echo $fila['nombre_u']?></td>
        <td><?php echo $fila['size']?></td>
        <td>
              <a class="btn" target="_blank" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '' . $fila['ruta']; ?>" type="button"> Ver el archivo</a>
          </td>
          
          <td><?php echo $fila['extension']?></td>
        </tr>
        </th>
    <?php
  }
      }
    }

    ?>

<?php


if ($resultado4->num_rows > 0) {
  while ($fila = $resultado4->fetch_assoc()) {



?>

        <tr>
          <th class="row">
          <th class="row"><?php echo $fila['nombre_c']?></td>
          <td><?php echo $fila['nombre_c']?></td>
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
  <form action="subirexamenparcial3.php" method="POST" enctype="multipart/form-data">
    <table align="center">
      <tr>
        <td>
        <?php if($rol=="user" or $rol=="ptc"){?>
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
  
        <br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!--Proyectos -->
<div class="modal fade" id="proyectos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subir Proyecto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered table-hover">
        <thead>
    <tr>
      <th>Carrera</th>
      <th>Clases</th>
      <?php if($rol=="admin"){?>
      <th>Docente</th>
      <th>Apellidos</th>
        <?php } ?>
      <th>Archivo</th>
      <th>Ruta</th>
    </tr>
    </thead>
</center><?php if($rol=="admin"){ 
  $consultaadminproyecto="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.clase,a.docente,a.size,a.ruta,a.extension,u.id_usuarios,u.nombre_u,u.ape_1,u.ape_2,b.id_carrera,b.nombre_c
  from clases c, archivos a, usuarios u, carreras b where tipo_documento='proyectos' and a.docente=u.id_usuarios and c.carrera=b.id_carrera and a.clase='$id_clases' and c.id_clases='$id_clases'";
  $resultadoadminproyecto = $conexion->query($consultaadminproyecto);

if ($resultadoadminproyecto->num_rows > 0) {
  while ($filaadminproyecto = $resultadoadminproyecto->fetch_assoc()) {



?>
<tbody>
        <tr>
          <td><?php echo $filaadminproyecto['nombre_c']?></td>
          <td><?php echo $filaadminproyecto['nombre_clase']?></td>
          <?php if($rol=="admin"){?>
            <td><?php echo $filaadminproyecto['nombre_u']?></td>
            <td><?php echo $filaadminproyecto['ape_1']?></td>
        <?php } ?>
          <td><?php echo $filaadminproyecto['nom_archivos']?></td>
          <td>
              <a class="btn btn-block btn-outline-success" target="_blank" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '' . $filaadminproyecto['ruta']; ?>"> Ver el archivo</a>
          </td>
        </tr>
        </th>
        </tbody>
    <?php
  }
      }
    }

    ?>

<?php


if ($resultado5->num_rows > 0) {
  while ($fila = $resultado5->fetch_assoc()) {



?>

        <tr>
          <td><?php echo $fila['nombre_c']?></td>
        <td><?php echo $fila['nombre_clase']?></td>
          <td><?php echo $fila['nom_archivos']?></td>
          <td>
              <a class="btn btn-block btn-outline-success" target="_blank" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '' . $fila['ruta']; ?>" type="button"> Ver el archivo</a>
          </td>
        </tr>
        </th>
    <?php
      }
    }

    ?>
  <form action="subirproyecto.php" method="POST" enctype="multipart/form-data">
    <table align="center">
      <tr>
        <td>
        <?php if($rol=="user" or $rol=="ptc"){?>
          <input name="archivo" id="archivo" type="file" size="70" maxlength="70">
        </td>
      </tr>
      <tr>
        <td>
        <input type="hidden" name="id_clases" id="clase1"
    <?php
    $query = $conexion -> query ("SELECT * FROM clases where id_clases='$id_clases'");

    while ($valores = mysqli_fetch_array($query)) { 

      echo '<option value="'.$valores['id_clases'].'"></option>';

    }
  ?>>
        </td>
        <td>
          <button class="btn btn-primary start">
                          <i class="fas fa-upload"></i>
                          <input type="submit" name="enviar">
                          <span></span>
                        </button>
          <input type="reset" name="borrar" value="Cancelar" class="eliminar">
        </td>
        <?php } ?>
      </tr>
    </table>
    
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



</body>
</html>
<?php
include_once('alertas.php');
?>
<script src="foranea.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>