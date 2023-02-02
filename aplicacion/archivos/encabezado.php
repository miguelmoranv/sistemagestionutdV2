<?php
include_once("sesiones.php");
include_once("../bd/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema Gestor Documentos</title>
  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="icon" href="../css/utdnew.png">

  <!-- para sidebar -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="bufalo.png" alt="AdminLTELogo" height="130" width="150">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li> -->
    <!-- <li class="nav-item">
      <em class="nav-link">Enable Dark Mode!</em>
    </li> -->
  </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <div class="theme-switch-wrapper nav-link">
        <label class="theme-switch" for="checkbox">
          <input type="checkbox" id="checkbox" class="">
          <span>Modo Oscuro</span>
        </label>
      </div>
    </li>
      <!-- Navbar Search -->
      <li class="nav-item">
        <div class="navbar-search-block">
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->
      
      <?php if($rol=="estandar"){ ?>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-comments"></i>
        </a>
      </li>
      <?php } ?>
      
      
    </ul>
  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="chartsjs.php" class="brand-link">
      <img src="../css/utdnew.png" height="20px" class="brand-image">
      <span class="brand-text font-weight-light">SGD</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <!-- Sidebar user panel (optional) -->
      <?php
        
include_once("../bd/db.php");
        $consulta="select * from usuarios where id_usuarios='$id_usuarios'";
        $resultado=mysqli_query($conn,$consulta);

            while($fila=mysqli_fetch_array($resultado)){
              $foto_perfil=['foto_perfil'];
        ?>
        <div class="image">
          <?php if($fila['foto_perfil']==null){?>
            <img src="bufalo.png" class="img-circle elevation-2" alt="Agregar Foto">

          <?php } else{?>
          <img src="<?php echo $fila['foto_perfil'] ?>" class="img-circle elevation-2" alt="Agregar Foto">
          <?php } ?>
        </div>
        <div class="info">
          <a href="perfil.php" class="d-block"><?php echo $usuarios ?></a>
        </div>
      </div>
<?php 
}
        
?>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="clases.php" class="nav-link"><i class="bi bi-book-half"></i>
              <p>
                Clases
        
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
          <?php if ($rol=="admin") { ?>
          </li>
          <?php } ?>

        <?php
          include_once("../bd/db.php");
          $entrar="";
          $consulta = "select a.id_carrera,a.nombre_c, b.id_clases, b.carrera, b.nombre_clase, b.ciclo from carreras a, clases b where a.id_carrera=b.carrera and docente='$id_usuarios'";

          $resultado = $conn->query($consulta);
          ?>
          <ul class="nav nav-treeview">
          <?php
          if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
          ?>
            <li class="list_inside">
              <a href="archivos.php?id_clases=<?php echo $fila['id_clases'] ?>" class="nav-link">
                  <i class="bi bi-journal"></i>
                  <?php echo $fila['nombre_clase'] ?>  
              </a>
            </li>
            </ul>
        </li>
        <?php
            }
          }
        ?>
      </ul>

        

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeviewclass" role="menu" data-accordion="false">
          <li class="nav-item"><!-- ILUMINA LA SECCION ENTERA EN BLANCO -->
            <a href="subirinforme.php" class="nav-link"><i class="bi bi-archive"></i>
              <p>
                Informe
              </p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeviewclass" role="menu" data-accordion="false">
          <li class="nav-item"><!-- ILUMINA LA SECCION ENTERA EN BLANCO -->
            <a href="api_ecommerce/" class="nav-link"><i class="fas fa-dollar-sign"></i>
              <p>
                Donaciones
              </p>
            </a>
          </li>
        </ul>

        <?php if ($rol=="admin") { ?>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeviewclass" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="bi bi-person-badge"></i>
                <p> Docentes
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
                  
              <ul class="nav nav-treeview">
                <li class="list_inside">
                  <a href="agregar_usu.php" class="nav-link" ><i class="bi bi-plus-circle"></i><span class="brand-text font-weight-light">&nbsp;&nbsp;Nuevo</span></a> <!--EL LABEL SPAN PERMITE LA DESAPARICION DE TEXTO AL ESCONDER EL SIDEBAR -->
                          <!-- PONER ICONO ANTES DE SPAN PARA QUE NO SE ESCONDA -->
                </li>
                <li class="list_inside">
                  <a href="datos_personales.php" class="nav-link"><i class="bi bi-people"></i>
                    <span class="brand-text font-weight-light">&nbsp;&nbsp;Administrar</span></a>
                </li>
              </ul>
          </ul>
        </li>


        

              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeviewclass" role="menu" data-accordion="false">
        <li class="nav-item">
                      <a href="#" class="nav-link"><i class="bi bi-book"></i>
                      <p> Clases
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                      
                  <ul class="nav nav-treeview">
                      <li class="list_inside">
                          <a href="agregarclas.php" class="nav-link"><i class="bi bi-plus-circle"></i><span class="brand-text font-weight-light">&nbsp;&nbsp;Nuevo</span></a>
                      </li>

                      <li class="list_inside">
                          <a href="crudclases.php" class="nav-link"><i class="bi bi-bookshelf"></i><span class="brand-text font-weight-light">&nbsp;&nbsp;Administrar</span></a>
                      </li>
                  </ul>
        </ul>


        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeviewclass" role="menu" data-accordion="false">
        <li class="nav-item">
                      <a href="#" class="nav-link"><i class="bi bi-building"></i>
                      <p> Carreras
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                      
                  <ul class="nav nav-treeview">
                      <li class="list_inside">
                          <a href="crudcarreras.php" class="nav-link"><i class="bi bi-gear"></i><span class="brand-text font-weight-light">&nbsp;&nbsp;Administrar</span></a>
                      </li>
                  </ul>
        </ul>
       
      <?php 
      }
      ?>
          <ul class="nav nav-pills nav-sidebar flex-column">
            <li>
            <a href="salir.php" class="nav-link"><i class="bi bi-person-circle"></i>
                  <p>
                    Cerrar Sesión de: <?php echo $usuarios ?>
                  </p>
                </a>
            </li>
          </ul>




		
		</nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
 
    <!-- /.content-header -->

    <!-- Main content -->
   
           
              
              <!-- /.footer -->
            
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- QUEJAS Y SUGERENCIAS -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    
    <br>
    <center> <h5>Quejas y Sugerencias</h5></center>
            <div class="card-body">
              <div class="form-group">
              
                <form action="https://formspree.io/f/mqkjgjad" method="POST" id="form1">
                  <form action="insertapi.php" method="POST" id="form2">
  <label>
    <input type="hidden" name="email" value="<?php echo $no_empleado ?>@gmail.com">
  </label>

              </div>
              <div class="form-group">
                <label for="inputDescription">Comentario</label>
                <!-- <textarea id="message" name="comentario" class="form-control" 
   maxlength="200" placeholder="Escriba aqui si tiene alguna queja o sugerencia respecto al sistema" rows="8">
</textarea> -->

<textarea name="message" class="form-control" id="coment1" maxlength="200" placeholder="Escriba aqui si tiene alguna queja o sugerencia respecto al sistema" rows="8"></textarea>

<script src="foranea.js"></script>

<span class="help-block">
  <p id="mensaje_ayuda" class="help-block">Cuerpo del mensaje de alerta</p>
</span>

      </div>
                <div class="form-group">
          <input type="submit" onclick="submitForms()" value="Enviar" class="btn btn-success float-right">
        </div>
      </div>
              </div>
              </div>
              </form>
        </form>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
<script>
  var toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
  var currentTheme = localStorage.getItem('theme');
  var mainHeader = document.querySelector('.main-header');

  if (currentTheme) {
    if (currentTheme === 'dark') {
      if (!document.body.classList.contains('dark-mode')) {
        document.body.classList.add("dark-mode");
      }
      if (mainHeader.classList.contains('navbar-light')) {
        mainHeader.classList.add('navbar-dark');
        mainHeader.classList.remove('navbar-light');
      }
      toggleSwitch.checked = true;
    }
  }

  function switchTheme(e) {
    if (e.target.checked) {
      if (!document.body.classList.contains('dark-mode')) {
        document.body.classList.add("dark-mode");
      }
      if (mainHeader.classList.contains('navbar-light')) {
        mainHeader.classList.add('navbar-dark');
        mainHeader.classList.remove('navbar-light');
      }
      localStorage.setItem('theme', 'dark');
    } else {
      if (document.body.classList.contains('dark-mode')) {
        document.body.classList.remove("dark-mode");
      }
      if (mainHeader.classList.contains('navbar-dark')) {
        mainHeader.classList.add('navbar-light');
        mainHeader.classList.remove('navbar-dark');
      }
      localStorage.setItem('theme', 'light');
    }
  }

  toggleSwitch.addEventListener('change', switchTheme, false);
</script>

<script>
$('#mensaje_ayuda').text('200 carácteres restantes');
  $('#message').keydown(function () {
      var max = 200;
      var len = $(this).val().length;
      if (len >= max) {
          $('#mensaje_ayuda').text('Has llegado al límite');// Aquí enviamos el mensaje a mostrar          
          $('#mensaje_ayuda').addClass('text-danger');
          $('#message').addClass('is-invalid');
          $('#inputsubmit').addClass('disabled');    
          document.getElementById('inputsubmit').disabled = true;                    
      } 
      else {
          var ch = max - len;
          $('#mensaje_ayuda').text(ch + ' carácteres restantes');
          $('#mensaje_ayuda').removeClass('text-danger');            
          $('#message').removeClass('is-invalid');            
          $('#inputsubmit').removeClass('disabled');
          document.getElementById('inputsubmit').disabled = false;            
      }
  }); 
  </script>