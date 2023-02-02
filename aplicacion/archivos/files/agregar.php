<?php
	$entrar="";
	include_once('../sesiones.php');
    include_once('../../bd/db.php');
    //include_once('alertas.php');
	

	if ($_SERVER["REQUEST_METHOD"]=="POST")
	 {
    if(isset($_POST["Enviar"])){
			mkdir($_POST["no_empleado"], 755);
    }

    $nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$contrasena=$_POST['contrasena'];
		$no_empleado=$_POST['no_empleado'];
    $rol=$_POST['rol'];
    $estatus=$_POST['estatus'];
		$celular=$_POST['telefono'];
    $correo=$_POST['correo'];

		

		include_once("../../bd/db.php");

  
		$consulta="insert into usuarios values (null,'$nombre','$apellidos','$no_empleado','0','0','$correo','', hex(AES_ENCRYPT('$contrasena', 'passForEncrypt')) ,'$celular','$rol','$estatus')";

  
		$resultado=mysqli_query($conn,$consulta);
		
?>



<script src="../js/regex.js"></script>
<script src="../foranea.js"></script>
</script>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
	if ($resultado) {
		$entrar="agregar_usu";
		
	   }
	   else 
	   {
	 $entrar="e_usu";
	   }
 
	}
	?>
</body>
</html>
<?php
include_once('../alertas.php');
?>