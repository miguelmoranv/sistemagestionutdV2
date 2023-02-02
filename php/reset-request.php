<?php

if(isset($_POST["reset-request-submit"]))
{
    //Tokens de válidacion y autenticación con hash
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    //Link que se le enviará al usuario
    $url = "https://diegoelizalde.000webhostapp.com/php/create-new-password.php?selector=" . $selector ."&validator=" . bin2hex($token);

    //Tiempo de expiración del token
    $expires = date("U") + 1800;

    require 'conexion.php';

    //Email del usuario capturado del formulario del archivo "recuperar_contraseñas.php"
    $userEmail = $_POST["email"];

    //Consulta para borrar tokens que se hayan generado anteriormente
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";

    //Prepared Statment para proveer seguridad a la consulta SQL
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Ocurrio algún error";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 's', $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Ocurrio algún error";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, 'ssss', $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    $subject = 'Recupera tu contraseña';

    $message = '<p>Hemos recivido una petición para cambiar tu contraseña. El link para cambiarla se encuentra debajo. Si no realizaste esta petición para cambiar de contraseña, por favor, ignora este mensaje</p>';
    $message .='<p>Aquí esta tu link para cambiar la contraseña: <br>';
    $message .='<a href="' . $url . '">' . $url .'</a></p>';

    $headers = "From: Universidad Tecnológica de Durango <potenciapanadera01@outlook.com>\r\n";
    $headers .= "Reply-To: potenciapanadera01@outlook.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: recuperar_contraseña.php?reset=success");

} else{
    header("Location: login.php");
}
?>