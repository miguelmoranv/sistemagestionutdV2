<?php
include_once('encabezado.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body>
<div class="content-wrapper">
<div class="content">
      <div class="container-fluid">
        <br><br><br><br>
        <section class="content">
      <div class="row">

          
            <!-- /.card-body -->
          <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Quejas y Sugerencias</h3>
              
              <div class="card-tools">


              
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <!-- Check all button -->
                
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                <tbody>
                  <tr>
                    <th>No Empleado</th>
                    <th>Comentario</th>
                    <th>Fecha y Hora</th>
                    <th>Acciones</th>
                  </tr>
                <?php
                    $endpoint="http://localhost/sistemagestionutdV2/aplicacion/archivos/api_base/controllers/queja_sugerencia.php?op=selectall";

                    //Crear un objeto de tipo array para guardar el contenido de JSON
                    $datos=json_decode(file_get_contents($endpoint),true);

                    for($i=0;$i<count($datos);$i++)
{
?>
                  
                  <tr>

                    <td class="mailbox-name"><?php echo $datos[$i]["no_empleado_qj"]?></td>
                    <td class="mailbox-subject"><?php echo substr($datos[$i]["comentario"], 0, 20)?>...</td>
                    <td class="mailbox-attachment"><?php echo $datos[$i]["fecha_hora_qj"]?></td>
                    <td class="mailbox-date"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#ver<?php echo $datos[$i]['id_qj']; ?>">
                    <i class="fas fa-comments"></i>
                    </button> <a class="btn btn-outline-danger" href="eliminardatoapi.php?id_qj=<?php echo $datos[$i]['id_qj'] ?>"><i class="bi bi-trash3"></i></a></td>
                  </tr>


</div>
</div>
</div>
<!-- Modal para visualizar -->
<div class="modal fade" id="ver<?php echo $datos[$i]['id_qj']; ?>" tabindex="-1" aria-labelledby="" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Quejas y Sugerencias </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
      <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> <?php echo $datos[$i]["fecha_hora_qj"] ?></span>
                  <h3 class="timeline-header"><a href="#"><?php echo $datos[$i]['no_empleado_qj'] ?></a></h3>

                  <div class="timeline-body">
                  <?php echo $datos[$i]["comentario"]?>
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-danger btn-sm" href="eliminardatoapi.php?id_qj=<?php echo $datos[$i]['id_qj'] ?>">Eliminar Mensaje</a>
                  </div>
                </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <?php
}
?>
      </div>
    </div>
  </div>
</div>
</body>
</html>