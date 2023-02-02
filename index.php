<?php 
	header('Location: php/login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aplicacion/css/estilo.css">
    <link rel="stylesheet" href="aplicacion/css/normalize.css">
    <link rel="icon" href="aplicacion/css/utdnew.png">
    <title>Login</title>
</head>
<body class="principal">
    <form action="validar.php" method="post" class="login">
    <img class="box" src="aplicacion/css/bufalo.png" height="400" width="200">
   <p><input type="text" placeholder="Ingrese su matrícula" name="matricula"></p>
   <p><input type="password" placeholder="Contraseña" name="contrasena"></p>
   <input type="submit" src="index.php" value="Entrar" class="btn-login">
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.8/sweetalert2.all.js" 
integrity="sha512-VJHujIWWYQxg6rdA2wgQcJuk7My96LNDILkXY/L/iFGta/odtk13sTaUU9WAaZAl3Xurcn4A+rJsfPrcG/5K/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    Swal.fire({
title: 'Bienvenido al Sistema',
imageUrl: 'https://www.seekpng.com/png/detail/263-2635426_deportes-utd-universidad-tecnologica-de-durango-logo.png',
imageWidth: 400,
imageHeight: 200,
imageAlt: 'UTD',
timer: 1200,
showConfirmButton: false,
background: '#F6F6F6',
})
</script>