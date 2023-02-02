<?php
session_start();
include('conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="../css/reset-password.css">
</head>
<body>
<div class="container">
    <div class="main">
        <div class="texto">
        <h2>Recupere su contraseña</h2>
        <p>Se le enviara un correo con instrucciones de como recuperar su contraseña</p>
        </div>
        <div class="formulario-password">

        <form action="reset-request.php" method="POST">
        <div class="input-container">
        <input type="text" placeholder="Ingrese su correo" name="email">
        </div>
        <button type="submit" name="reset-request-submit" class="btn-recoverpass">SIGUIENTE</button>
        <br>
        <a href="login.php">Regresar</a>
        </form>
        <?php
            if(isset($_GET["reset"]))
            {
                if($_GET["reset"] == "success")
                {
                    echo '<p class="signupsuccess">Verifica tu email!</p>';
                }
            }
        ?>

    </div>
</div>
    
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/e7ff5a9d5d.js" crossorigin="anonymous"></script>

<!-- Librería de jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
</body>
</html>