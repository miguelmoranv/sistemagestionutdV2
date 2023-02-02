<script  src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.22/dist/sweetalert2.all.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>

<?php if ($alertas=="admin") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: '¡ BIENVENIDO !', 
      text: 'al sistema <?php echo $_SESSION['nombre'] ?>',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='../aplicacion/index.php';
     });
	}
  mensaje();
</script>
<?php } elseif ($alertas=="estandar") { ?>
<script>
  function mensaje(){
    Swal.fire({
        position: 'center',
      icon: 'success',
      title: '¡Bienvenido!', 
      text: 'al sistema <?php echo $_SESSION['nombre'] ?>',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='../aplicacion/index.php';
     });
	}
  mensaje();
</script>
<?php } elseif ($alertas=="error_login") { ?>
<script>
  function mensaje(){
    Swal.fire({
        position: 'center',
      icon: 'error',
      title: 'Usuario/Contraseña incorrectas', 
      text: 'Inténtelo de nuevo',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='login.php';
     });
	}
  mensaje();
</script>
<?php } ?>