<?php
include_once('encabezado.php');
include_once("../bd/db.php");
include_once('sesiones.php');

$consulta="select * from usuarios where id_usuarios='$id_usuarios'";
$resultado=mysqli_query($conn,$consulta);


if (mysqli_num_rows($resultado)>0){
    while($fila=mysqli_fetch_assoc($resultado))
    {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
</head>
<body>
<div class="content-wrapper">
<section class="content-header">
    </section>

    <!--  -->
    <div class="content">
      <div class="container-fluid">
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <br><br>
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                  src="<?php echo $fila['foto_perfil'] ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $usuarios ?> </h3>
                <h3 class="profile-username text-center" ><?php echo $fila['apellidos'] ?> </h3>

                <p class="text-muted text-center"><?php echo $fila['correo'] ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>No Empleado</b> <a class="float-right"><?php echo $no_empleado ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Telefono</b> <a class="float-right"><?php echo $fila['telefono'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Estatus</b> <a class="float-right"><?php echo $fila['estatus'] ?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        
</div>
<div class="col-md-9">
<section class="content-header">
    </section>
    <br>
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Documentos</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Configuracion</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- /.tab-pane -->
                  <div class="tab-pane active" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>

                        <div class="timeline-item">
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">Tipo de Documento</th>
      <th scope="col">Nombre</th>
      <th scope="col">Fecha y Hora</th>
      <th scope="col">Estatus</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
    $consultadocs_personales="select tipo_doc_personal.id_docpersonal,tipo_doc_personal.nombre_docpersonal, doc_personales.id_doc, doc_personales.docente, doc_personales.nom_doc, doc_personales.tipo_doc, doc_personales.fecha_hora_doc,doc_personales.ruta_doc
    from tipo_doc_personal left join doc_personales on tipo_doc_personal.id_docpersonal=doc_personales.tipo_doc and doc_personales.docente='$id_usuarios'";
    $resultadodocs_personales=mysqli_query($conn,$consultadocs_personales);
    

if (mysqli_num_rows($resultadodocs_personales)>0){
  while($fdocs_personales=mysqli_fetch_assoc($resultadodocs_personales))
  {

    ?>
    <tr>
      <th scope="row"><?php echo $fdocs_personales['nombre_docpersonal'] ?></th>
      
      
      <?php
     if ($fdocs_personales['id_doc']==null) { 
        ?>
         <td>
        <form action="subir_docpersonal.php" method="POST" enctype="multipart/form-data">
        <input class="form-control" name="archivo" id="archivo" type="file" size="70" maxlength="70">
          <input class="btn btn-info" type="submit" name="enviar" value="subir">
          <input type="reset" name="borrar" value="Cancelar" class="btn btn-danger">
          <input type="hidden" name="id_docpersonal" value="<?php echo $fdocs_personales['id_docpersonal'] ?>" id="docpersonal1">
          </form>
        <?php
  } else {
    ?>
<td><?php echo $fdocs_personales['nom_doc'] ?></td>
      <td><?php $timestamp = $fdocs_personales['fecha_hora_doc'];

echo date('d M, Y, H:i:s', strtotime($timestamp));
?></td>
      <td><a class="btn btn-block btn-outline-success" target="_blank" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '' . $fdocs_personales['ruta_doc']; ?>"> Ver el archivo</a></td>
    <?php
   }
      }
    }
      
      
    
        ?>
  </td>
    </tr>
  </tbody>
</table>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <!-- END timeline item -->
                      <div>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" value='<?php echo $fila['correo'] ?>' disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="inputEmail" value='<?php echo $fila['telefono'] ?>'disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#perfil">
                  Editar datos
                </button>
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#foto_perfil">
                  Cambiar Foto de perfil
                </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
</div>
<?php
   include_once("sesiones.php");

   include_once("../bd/db.php");
   $consulta1="select * from usuarios where id_usuarios='$id_usuarios'";
   $resultado1=mysqli_query($conn,$consulta1);
   $entrar="";

   if ($fila1=mysqli_fetch_assoc($resultado1))
   {
       //regresa el registro de la consulta
   }


   if ($_SERVER["REQUEST_METHOD"]=="POST"){
       $telefono=$_POST['telefono'];
    $correo=$_POST['correo'];

       $consulta1="update usuarios set telefono='$telefono', correo='$correo' where id_usuarios='$id_usuarios'";

       $resultado1=mysqli_query($conn,$consulta1);

       if ($resultado1){
        $entrar="act_perf";
       }
       else{
        $entrar="error_perf";
       }


   }

?>
<div class="modal fade" id="perfil">
        <div class="modal-dialog modal-df">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Perfil</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
              <table>
              <tr>
               <th><label for="correolbl">Correo</label></td>
                <th><input class="form-control" type="email" name="correo" id="correolbl"  placeholder="correo" required pattern=".+@gmail\.com" value='<?php echo $fila['correo'] ?>' ></td>
            </tr>
            <tr>
               <th><label for="celularlbl">Celular</label></td>
                <th><input class="form-control" type="text" name="telefono" id="telefonolbl" pattern="[0-9]{10}" required placeholder="telefono" value='<?php echo $fila['telefono'] ?>' ></td>
            </tr>
            <tr>

                <th><input class="btn btn-info" type="submit" name="enviar" Value="Guardar"   ></td>

            </tr>
              </table>
  </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <div class="modal fade" id="foto_perfil">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Actualizar foto de perfil</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="subirfoto.php" method="post" enctype="multipart/form-data"> 
              <table>
              <tr>
               <th><label for="foto_perfillbl"></label></td>
                <th><input name="archivo" id="archivo" type="file" size="70" maxlength="70">
                <input type="reset" name="borrar" value="Cancelar" class="btn btn-danger"></th>
            </tr>
            <tr>

                <th><input class="btn btn-info" type="submit" name="enviar" Value="Guardar"></th>

            </tr>
              </table>
  </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<?php }

    }
    include_once("alertas.php");
?>
</body>
</html>
<script src="foranea.js"></script>