<?php
include_once("sesiones.php");
include_once("../bd/db.php");
include_once("encabezado.php");
$id_clases=$_REQUEST['id_clases'];

$entrar="";

$endpoint="http://localhost/sistemagestionutdV2/aplicacion/archivos/api_base/controllers/tipo_doc.php?op=selectall";

//Crear un objeto de tipo array para guardar el contenido de JSON
$datos=json_decode(file_get_contents($endpoint),true);
//$consulta="select * from tipo_doc";
//$resultado = $conn->query($consulta);
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
  <br><br>
  <div class="title-cards">
    <?php
    $consultacla="select nombre_clase, modalidad from clases where id_clases='$id_clases'";
    $resultadocla = $conn->query($consultacla);
    while($filacla = mysqli_fetch_array($resultadocla)){
    ?>
		<h2>Archivos de <?php echo $filacla['nombre_clase']?> <?php echo $filacla['modalidad'] ?></h2>
    <?php } ?>
    
	</div>
  <?php if($rol=="admin"){ ?>
      <div>
      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-default">
      <i class="bi bi-plus-circle"></i><span class="">&nbsp;&nbsp;Nuevo tipo de Archivo</span>
                </button>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editar">
      <i class="fas fa-pencil-alt"></i>
         Editar tipos de archivos
      </button>
    </div>
    <?php } ?>
  <div class="container-card">

<?php
for($i=0;$i<count($datos);$i++)
{


?>
<div class="card">
	<div class="contenido-card">
		<h5><?php echo $datos[$i]['nombre_tipo_doc'] ?></h5>
    <?php if($rol=="estandar") {?>
    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#archivos<?php echo $datos[$i]['id_doc']; ?>">
  Subir
</button>
<?php }elseif($rol=="admin") {?>
<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#archivos<?php echo $datos[$i]['id_doc']; ?>">
  Abrir
</button>
<?php } ?>
	</div>
</div>


<!--Modal de Archivos -->
<div class="modal fade" id="archivos<?php echo $datos[$i]['id_doc']; ?>" tabindex="-1" aria-labelledby="" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subir <?php echo $datos[$i]['nombre_tipo_doc'] ?></h5>
      </div>
      <div class="modal-body">
        <?php $tipo_doc = $datos[$i]['id_doc']; ?>
        <div class="table-responsive table-hover">

        
      <table class="table table-bordered">
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
      <th>Fecha/Hora</th>
    </tr>
    </thead>
</center><?php if($rol=="admin"){ 
  $consultaadminproyecto="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.tipo_documento,a.clase,a.docente,a.fecha_hora,a.size,a.ruta,a.extension,u.id_usuarios,u.nombre,u.apellidos,u.foto_perfil ,b.id_carrera,b.nombre_c,t.id_doc
   from clases c, archivos a, usuarios u, carreras b, tipo_doc t where a.tipo_documento=t.id_doc and a.tipo_documento='$tipo_doc' and a.docente=u.id_usuarios and c.carrera=b.id_carrera and a.clase='$id_clases' and c.id_clases='$id_clases'";
  $resultadoadminproyecto = $conn->query($consultaadminproyecto);

if ($resultadoadminproyecto->num_rows > 0) {
  while ($filaadminproyecto = $resultadoadminproyecto->fetch_assoc()) {



?>
<tbody>
        <tr>
          <td><?php echo $filaadminproyecto['nombre_c']?></td>
          <td><?php echo $filaadminproyecto['nombre_clase']?></td>
          <?php if($rol=="admin"){?>
            <td><?php echo $filaadminproyecto['nombre']?></td>
            <td><?php echo $filaadminproyecto['apellidos']?></td>
        <?php } ?>
          <td><?php echo $filaadminproyecto['nom_archivos']?></td>
          <td>
              <a class="btn btn-block btn-outline-success" target="_blank" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '' . $filaadminproyecto['ruta']; ?>"> Ver el archivo</a>
          </td>
          <td><?php $timestamp = $filaadminproyecto['fecha_hora'];

          echo date('d M, Y, H:i:s', strtotime($timestamp));
          ?></td>
        </tr>
        </th>
        </tbody>
    <?php
  }
      }
    }
    

    ?>

<?php
$consulta5="select c.id_clases,c.nombre_clase,c.docente,c.carrera,a.id_archivos,a.nom_archivos,a.fecha_hora,a.clase,a.docente,a.size,a.ruta,a.extension,a.tipo_documento,b.id_carrera,b.nombre_c
 from clases c, archivos a, carreras b where c.id_clases='$id_clases' and a.docente='$id_usuarios' and c.carrera=b.id_carrera and a.tipo_documento='$tipo_doc' and a.clase='$id_clases' and c.id_clases='$id_clases'";
$resultado5 = $conn->query($consulta5);

if ($resultado5->num_rows > 0) {
  while ($fila5 = $resultado5->fetch_assoc()) {



?>

        <tr>
          <td><?php echo $fila5['nombre_c']?></td>
        <td><?php echo $fila5['nombre_clase']?></td>
          <td><?php echo $fila5['nom_archivos']?></td>
          <td>
              <a class="btn btn-block btn-outline-success" target="_blank" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '' . $fila5['ruta']; ?>" type="button"> Ver el archivo</a>
          </td>
          <td><?php $timestamp = $fila5['fecha_hora'];
          echo date('d M, Y, H:i:s', strtotime($timestamp));
          ?></td>
        </tr>
        </th>
    <?php
      }
    }

    ?>
  <form action="subirarchivo.php" method="POST" enctype="multipart/form-data">
    <table align="center">
      <tr>
        <td>
        <?php if($rol=="estandar"){?>
          <input class="form-control" name="archivo" id="archivo" type="file" size="70" maxlength="70">
        </td>
        <td>
        <input type="hidden" name="id_doc" id="doc1"
        <?php
    $querydoc = $conn -> query ("SELECT * FROM tipo_doc where id_doc='$tipo_doc'");

    while ($valoresdoc = mysqli_fetch_array($querydoc)) { 

      echo '<option value="'.$valoresdoc['id_doc'].'"></option>';

    }
  ?>>
        
        <input type="hidden" name="id_clases" id="clase1"
    <?php
    $query = $conn -> query ("SELECT * FROM clases where id_clases='$id_clases'");

    while ($valores = mysqli_fetch_array($query)) { 

      echo '<option value="'.$valores['id_clases'].'"></option>';

    }
  ?>>
  </td>
        
        <td>
          <input class="btn btn-primary" type="submit" name="enviar">
  </td>
          <td>
          <input type="reset" name="borrar" value="Cancelar" class="btn btn-danger">
          </td>
        <?php } ?>
      </tr>
    </table>
    </div>
  </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar Ventana</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para nuevo archivo -->
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar nuevo tipo de archivo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Aqui puedes agregar un nuevo tipo de archivo en cada clase</p>

              <form action="insertapi.php" method="post">
                <table>
                  <tbody>
                  <tr>
                  <td>Nuevo Tipo de Archivo: </td>
                  <td> <input class="form-control" name="nombre_tipo_doc" type="text" required></td>
                </tr>
                  </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <input class="btn btn-primary" type="submit" value="Guardar">
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


      <!-- Modal editar tipos de archivos -->
      <?php 
      $endpointedit="http://localhost/sistemagestionutdV2/aplicacion/archivos/api_base/controllers/tipo_doc.php?op=selectall";

//Crear un objeto de tipo array para guardar el contenido de JSON
$datosedit=json_decode(file_get_contents($endpointedit),true); 
?>
<div class="modal fade" id="editar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar tipos de archivo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Recuerda que se comparte el mismo tipo de archivo para todas las clases</p>
                <div class="table-responsive">
                <table class="table">
                  <thead>
                    <th>Tipo de Documento</th>
                    <th>Acciones</th>
                  </thead>
                  <?php 
              for($iedit=0;$iedit<count($datosedit);$iedit++)
              {
              ?>
                  <tbody>
                  <tr>
                    <td>
                      <form action="updateapi.php" method="post">
                    <input type="hidden" name="id_doc" value="<?php echo $datosedit[$iedit]["id_doc"]; ?>">  
                    <input type="text" name="nombre_tipo_doc" class="form-control" value="<?php echo $datosedit[$iedit]["nombre_tipo_doc"]; ?>"></td>
                  <td><input class="btn btn-sm btn-info" type="submit" value="Actualizar">
                  </form>
                   <a class="btn btn-sm btn-danger" href="eliminardatoapi.php?id_doc=<?php echo $datosedit[$iedit]['id_doc'] ?>"> <i class="far fa-trash-alt"></i> Eliminar</a></td>
                </tr>
                  </tbody>
                  <?php } ?>
                </table>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</body>
</html>
<?php

include_once('alertas.php');
}
?>
<script src="foranea.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>