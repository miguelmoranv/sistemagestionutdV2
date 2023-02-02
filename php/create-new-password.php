<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset-password.css">
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="main">
        <div class="texto">
        <h2>Recupere su contraseña</h2>
        <p>Se le enviara un correo con instrucciones de como recuperar su contraseña</p>
        </div>
        <div class="formulario-password">

        <?php


        $selector = $_GET['selector'];
        $validator = $_GET['validator'];

        if(empty($selector) || empty($validator)) {
            echo 'No podemos validar su petición!';
        } else {
            if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
        ?>

            <form action="reset-password.php" method="POST">
                <input type="hidden" name="selector" value="<?php echo $selector ?>">
                <input type="hidden" name="validator" value="<?php echo $validator ?>">

                <div class="input-container">
                    <input type="password" name="pwd" placeholder="Ingrese una nueva contraseña...">
                </div>
                <div class="input-container">
                    <input type="password" name="pwd-repeat" placeholder="Ingrese la contraseña de nuevo...">
                </div>
                <button type="submit" name="reset-password-submit">Reset Password</button>
            </form>

        <?php
         }
        }
        ?>

    </div>
</div>
    
</body>
</html>