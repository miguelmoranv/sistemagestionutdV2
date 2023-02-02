<?php
   session_start();

   if (isset($_SESSION))
   {
       session_destroy();
   }

   $alertas = "";

   if ($_SERVER["REQUEST_METHOD"]=="POST")
   {
    $no_empleado=$_POST['no_empleado'];
    $pass=$_POST['password'];

    include_once('../aplicacion/bd/db.php');


    $query="SELECT * from usuarios WHERE no_empleado='$no_empleado' AND password=hex(AES_ENCRYPT('$pass', 'passForEncrypt'))";

    $result = $conn->query($query);

      if ($result->num_rows>0)
      {
        if ($row=$result->fetch_assoc())
          {
              $usuario=$row['nombre'];
              $rol=$row['rol'];
              $estatus=$row['estatus'];
              $id_usuarios=$row['id_usuarios'];

              session_start();
              $_SESSION['no_empleado']=$no_empleado;
              $_SESSION['password']=$pass;
              $_SESSION['nombre']=$usuario;
              $_SESSION['rol']=$rol;
              $_SESSION['estatus']=$estatus;
              $_SESSION['id_usuarios']=$id_usuarios;
    
            if($rol=="admin"){
                $alertas="admin";
            } 
            elseif($rol=="estandar"){
                $alertas="estandar";
            }
          }
      }
      else
      {
        $alertas="error_login";
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nuevo_login.css">
    <link href="https://blogfonts.com/css/aWQ9MTUyMjkzJnN1Yj0yOTMmYz1nJnR0Zj1HYWxhbm8rR3JvdGVzcXVlK0FsdCtCbGFjaytJdGFsaWMub3RmJm49Z2FsYW5vZ3JvdGVzcXVlYWx0LWJsYWNraXRhbGlj/GalanoGrotesqueAlt-BlackItalic.otf" rel="stylesheet" type="text/css"/>
    <title>Iniciar Sesion</title>
</head>
<body>
   <div class="container-newLogin">
    <div class="main-newLogin">

      <div class="img-newLogin">

        
          <h2>¡Bienvenido al sistema! <img src="../aplicacion/css/utdisnta.jpg" alt="Universidad Tecnologica de durango" loading="lazy" width="110%"><br>
          Administre Documentos, Horarios e Inventario
          </h2>
      </div>

      <div class="formulario-newLogin">
        <h1>Sistema de Gestión Integral UTD</h1>

        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

          <!-- Campo de contraseña e iconos para visualizar contraseña -->
          <div class="input-container">
            <input type="text" placeholder="Ingrese su Usuario" name="no_empleado">
          </div>

          <!-- Campo de contraseña e iconos para visualizar contraseña -->
          <div class="input-container">
            <input type="password" placeholder="Contraseña" name="password" id="password-field">
            <div class="password-toggle">
            <i class="fa-regular fa-eye"></i>
            <i class="fa-regular fa-eye-slash"></i>
            </div>
          </div>

          <!-- Botón de recuérdame -->
          <input type="checkbox" name="remember-me" id="checkbox-login" checked>
          <label for="remember-me">Recuérdame</label>
          <br>

          <!-- Enlace para la recuperación de contraseñas -->
          <a href="reset-password-form.php">¿Olvidó su contraseña?</a>
          <br>
          <input type="submit" value="ENTRAR" class="btn-login">
        </form>
        <?php
        if(isset($_GET['newpwd'])) {
          if($_GET['newpwd'] == "passwordupdated") {
            echo '<p class="signupsuccess"> Your password has been reseted!</p>';
          }
        }
        ?>
      </div>
    </div>
   </div>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/e7ff5a9d5d.js" crossorigin="anonymous"></script>

<!-- Librería de jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Validación de contraseñas JS -->
<script src="../js/password.js"></script>


</body>
</html>
<?php include('alertas.php'); ?>
