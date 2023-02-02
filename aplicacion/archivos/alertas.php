<script  src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.22/dist/sweetalert2.all.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>


<?php if ($entrar=="valido") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: '¡ BIENVENIDO !', 
      text: 'al sistema <?php echo $_SESSION['nombre_u'] ?>',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='aplicacion/index.php';
     });
	}
  mensaje();
</script>
<?php } elseif ($entrar=="errorglobal") { ?>
<script>
  function mensaje(){
    Swal.fire({
        position: 'center',
      icon: 'error',
      title: 'Error al realizar esta acción', 
      text: 'Inténtelo de nuevo',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='subir_file.php';
     });
	}
  mensaje();
</script>
<?php } elseif ($entrar=="errorfile") { ?>
<script>
  function mensaje(){
    Swal.fire({
        position: 'center',
      icon: 'error',
      title: 'Error al subir el archivo', 
      text: 'La extensión del archivo no está permitido, por favor verifique (doc, docx, ppt, xls, xlsx o pdf)',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='perfil.php';
     });
	}
  mensaje();
</script>

<?php } elseif ($entrar=="subir_doc") { ?>
<script>
  function mensaje(){
    Swal.fire({
        position: 'center',
      icon: 'success',
      title: 'Se subió correctamente', 
      //text: '',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='perfil.php';
     });
	}
  mensaje();
</script>

<?php } elseif ($entrar=="subir") { ?>
<script>
  function mensaje(){
    Swal.fire({
        position: 'center',
      icon: 'success',
      title: 'Se subió correctamente', 
      //text: '',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='archivos.php?id_clases=<?php echo $id_clases; ?>';
     });
	}
  mensaje();
</script>
<?php } elseif ($entrar=="subir_examen") { ?>
<script>
  function mensaje(){
    Swal.fire({
        position: 'center',
      icon: 'succes',
      title: 'Se subió correctamente el examen', 
      text: '',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='visualizar_examen.php';
     });
	}
  mensaje();
</script>
<?php } elseif ($entrar=="agregar_usu") { ?>

<script>
    function mensaje() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se agregó exitosamente',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            location.href = '../datos_personales.php';
        })
    }
    mensaje();
</script>
<?php } elseif ($entrar=="e_usu") {?>
<script>
  function mensaje() {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Error al insertar',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            location.href = 'agregar.php';
        })
    }
    mensaje();
</script>
<?php } elseif ($entrar=="borrar_usu") { ?>
<script>
   function mensaje() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se eliminó exitosamente',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            location.href = 'datos_personales.php';
        })
    }
    mensaje();
</script>
<?php } elseif ($entrar=="error_usu") { ?>

<script>
    function mensaje() {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Inténtelo de nuevo',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            location.href = 'datos_personales.php';
        })
    }
    mensaje();
</script>
<?php  } elseif ($entrar=="actualizacion") { ?>
<script>
  Swal.fire({
  title: '¿Está seguro?',
  //text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sí'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Actualización exitosa',
      '',
      'success'
    ).then(function(){
      location.href = 'datos_personales.php';
    });
  }
})
</script>
<?php } elseif ($entrar=="error_act") { ?>
  <script>
    function mensaje(){
    Swal.fire({
        position: 'center',
      icon: 'error',
      title: 'Error al realizar esta acción', 
      text: 'Inténtelo de nuevo',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='datos_personales.php';
     });
	}
  mensaje();
  </script>
<?php } elseif ($entrar=="act_datos") { ?>

<script>
  function mensaje(){
    Swal.fire({
        position: 'center',
      icon: 'success',
      title: 'Actualización exitosa', 
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='datos_personales.php';
     });
	}
  mensaje();
</script>

<?php } elseif ($entrar=="error_perf") { ?>
  <script>
    function mensaje(){
    Swal.fire({
        position: 'center',
      icon: 'error',
      title: 'Error al realizar esta acción', 
      text: 'Inténtelo de nuevo',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='perfil.php';
     });
	}
  mensaje();
  </script>
<?php } elseif ($entrar=="act_perf") { ?>

<script>
  function mensaje(){
    Swal.fire({
        position: 'center',
      icon: 'success',
      title: 'Actualización exitosa', 
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='perfil.php';
     });
	}
  mensaje();
</script>

<?php } elseif ($entrar=="add_clase") { ?>
  <script>
   Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Agregado con éxito',
  showConfirmButton: false,
  timer: 1500
}).then(function(){
  location.href = 'crudclases.php';
})
  </script> 
<?php } elseif ($entrar=="errore") {?>
<script>
  function mensaje() {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Inténtelo de nuevo',
            showConfirmButton: false,
            timer: 1500
        }).then(function(){
  location.href = 'agregarclas.php';
})
    }
    mensaje();
</script>
<?php } elseif ($entrar=="del_clas") { ?>
<script>
   function mensaje() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se eliminó exitosamente',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            location.href = 'crudclases.php';
        })
    }
    mensaje();
</script>
<?php } elseif ($entrar=="malo_clas") { ?>

<script>
    function mensaje() {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Inténtelo de nuevo',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            location.href = 'crudclases.php';
        })
    }
    mensaje();
</script>
<?php  } elseif ($entrar=="act_clas") { ?>
<script>
  function mensaje() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Actualización exitosa',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            location.href = 'crudclases.php';
        })
    }
    mensaje();
</script>
<?php } elseif ($entrar=="addcar") { ?>
  <script>
   Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Agregado con éxito',
  showConfirmButton: false,
  timer: 1500
}).then(function(){
  location.href = 'crudcarreras.php';
})
  </script> 
<?php } elseif ($entrar=="malcar") { ?>

<script>
    function mensaje() {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Inténtelo de nuevo',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            location.href = 'crudcarreras.php';
        })
    }
    mensaje();
</script>
<?php  } elseif ($entrar=="act_car") { ?>
<script>
  function mensaje() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Actualización exitosa',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            location.href = 'crudcarreras.php';
        })
    }
    mensaje();
</script>
<?php  } elseif ($entrar=="elim_api") { ?>
<script>
  function mensaje() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se elimino el dato',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            location.href = 'clases.php';
        })
    }
    mensaje();
</script>
<?php  } elseif ($entrar=="inser_api") { ?>
<script>
  function mensaje() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Tipo de documento agregado con exito',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            location.href = 'clases.php';
        })
    }
    mensaje();
</script>
<?php  } elseif ($entrar=="error_inser_api") { ?>
<script>
  function mensaje() {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Intentelo de nuevo',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            location.href = 'clases.php';
        })
    }
    mensaje();
</script>
<?php  } elseif ($entrar=="act_api") { ?>
<script>
  function mensaje() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se actualizo con exito',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            location.href = 'clases.php';
        })
    }
    mensaje();
</script>
<?php  } elseif ($entrar=="error_act_api") { ?>
<script>
  function mensaje() {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Intentelo de nuevo',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            location.href = 'clases.php';
        })
    }
    mensaje();
</script>
<?php }?>