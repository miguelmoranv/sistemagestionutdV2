<?php
$entrar="";	
	include_once('sesiones.php');
    include_once('../bd/db.php');
    include_once('encabezado.php');
	

	if ($_SERVER["REQUEST_METHOD"]=="POST")
	 {
		
		$nombre_c=$_POST['nombre_c'];
		$modalidad=$_POST['modalidad'];
		
		

		

		include_once("../bd/db.php");
  
		$consulta="insert into carreras values (null,'$nombre_c', '$modalidad')";

  
		$resultado=mysqli_query($conexion,$consulta);
		
  
		if ($resultado) {
		  
		 $entrar="addcar";
		 
		}
		else 
		{
		 $entrar="malcar";
		}
  
	 }
?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<title>Agregar Carrera</title>
  <link rel="stylesheet" href="estilardos.css">
</head>
<body>
    <center>	
    <br>
    <br>
	
	<div >
	     <form method="post" action="">
		 <h2 align="center">Agregar nueva "Carrera"</h2>
		 
            <table align="center">
              <tr>
                <td><label>Nombre</label></td>
                <td><input type="text" class="form-control" placeholder="Nombre" name="nombre_c" required></td>
              </tr>
			  <tr>
                  <td><label>Modalidad </label></td>
                  <td><select name="modalidad" class="form-control" required>
	                  <option value="BIS">BIS</option> 
	                  <option value="Clasica">Clasica</option> 
	                </select> </td>
                </tr>
            
                <tr>
                    <td><input type="submit" class="btn-primary" value="Enviar"></td>
                    <td><input type="reset" class="eliminar"  value="Borrar"></td>
                </tr>
            </table>
            <input type="hidden" name="tab" value="a">
          </form>
		</div>
		<a class="btn btn-secondary"href="clases.php">Volver</a>

    </center>
</body>

</html>

<?php
include_once('alertas.php');
?>