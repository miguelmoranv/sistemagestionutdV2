<?php
include_once('sesiones.php');
include_once('encabezado.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Pagina principal</title>
    <link rel="stylesheet" href="datos.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function(){
  $("#buscar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#docente div").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
    </script>
</head>
<body>
<div class="content-wrapper">
      <div class="container-fluid">
<br><br><br>
<section class="content" >
	<?php if ($rol=="admin") { ?>
		<h1 align="center" >Datos personales de Usuarios</h1>
    <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="agregar_usu.php">Nuevo</a></li>
              <li class="breadcrumb-item active">Administrar</li>
            </ol>   
            <div class="text-right">
      <label for="">
        <form>
            <input id="buscar" class="form-control" data-table="docente" type="search" placeholder="Buscar">
        </form>
        </label>  
      </div>

      <table class="docente">
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
          <?php
                        $consulta="select * from usuarios where rol='estandar'";
                        $resultado=mysqli_query($conn,$consulta);

                        if (mysqli_num_rows($resultado)>0){
                            while($fila=mysqli_fetch_assoc($resultado))
                            {
                             ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column"  id="docente">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  <!-- Aqui puede mandar a imprimir en que se especializa el docente -->
                </div>
                <div class="card-body pt-0">
                  <div class="row">

                    
                    <div class="col-7">
                      <h2 class="lead"><b><?php echo $fila['nombre'] ?></b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                    <?php if($fila['foto_perfil']==null){?>
                      <img src="bufalo.png" alt="user-avatar" class="img-circle img-fluid">
                      <?php } else{?>
                        <img src="<?php echo $fila['foto_perfil'] ?>" alt="user-avatar" class="img-circle img-fluid">
                        <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="ver_datos.php?id_usuarios=<?php echo $fila['id_usuarios'] ?>" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <?php
             }
	
                            }
                        }

                    ?>
                    </table>
                    </section>
                      </div>
                    </div>
</body>
</html>