<?php

$entrar="";

	include_once('sesiones.php');
    include_once('../bd/db.php');
    include_once('encabezado.php');
	

	if ($_SERVER["REQUEST_METHOD"]=="POST")
	 {
		$nombre_clase=$_POST['nombre_clase'];
		$ciclo=$_POST['ciclo'];
		$carrera=$_POST['carrera'];
		$docente=$_POST['docente'];
    $modalidad=$_POST['modalidad'];
  
		$consulta="insert into clases values (null,'$nombre_clase','$ciclo','2022', '$carrera','$docente','$modalidad')";

  
		$resultado=mysqli_query($conn,$consulta);
		

		if ($resultado){
      $entrar="add_clase"; 
    }
		else 
		{
		  $entrar="errore_clase"; } 
  
	 }
?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<title>Clase</title>
  <link rel="stylesheet" href="estilardos.css">
</head>
<body>
<div class="content-wrapper">
<div class="content">
      <div class="container-fluid">
    <center>	
    <br>
    <br>
    <br>
    <br>
	
	<div >
	     <form method="post" action="">
		 <h2 align="center">Agregar nueva "Clase"</h2>
     <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="crudclases.php">Administrar</a></li>
              <li class="breadcrumb-item active">Nuevo</li>
            </ol>
		 
            <table align="center">
              <tr>
                <td><label>Nombre</label></td>
                <td><input type="text" class="form-control" placeholder="Nombre" name="nombre_clase" required></td>
              </tr>
            <tr>
            <td><label>Ciclo</label></td>
                  <td>
                    <select name="ciclo">
                    <option value="0">Selecciona</option>
                    <option value="ENE_ABR">ENERO-ABRIL</option>
                    <option value="MAYO_AGO">MAYO-AGOSTO</option>
                    <option value="SEP_DIC">SEPTIEMBRE-DICIEMBRE</option>
                    </select>
                  </td>
                </tr>
              </div>
              <div class="form-group">
                <tr>
                  <td><label>Carrera </label></td>
                  <td>
                  <select name="carrera">
  
  <option value="0">Selecciona</option>

  <?php

    $query = $conn -> query ("SELECT * FROM carreras");

    while ($valores = mysqli_fetch_array($query)) { 

      echo '<option value="'.$valores['id_carrera'].'">'.$valores['nombre_c'].'</option>';

    }

  ?>

</select>
                  </td>
                </tr>
                <tr>
                  <td><label>Docente</label></td>
                  <td>
                  <select name="docente">
  
  <option value="0">Selecciona</option>

  <?php

    $query = $conn -> query ("SELECT * FROM usuarios where rol='estandar'");

    while ($valores = mysqli_fetch_array($query)) { 

      echo '<option value="'.$valores['id_usuarios'].'">'.$valores['nombre'].'</option>';

    }

  ?>

</select>
                  </td>
                </tr>
                <tr>
                  <td><label>Modalidad </label></td>
                  <td><select name="modalidad" class="form-control" required>
	                  <option value="bis">BIS</option> 
	                  <option value="clasica">Clasica</option> 
	                </select> </td>
                </tr>
                <br>
                <tr>
                  <td><label>Año</label></td>
                <td>
                  <input class="form-control" type="text" name="tab" value="<?php
            $ano = date("Y");
            echo $ano; ?>" disabled>
                  </td>
                </tr>
                <tr>
                <td><a class="btn btn-secondary"href="clases.php">Volver</a></td>
                </tr>
            </table>
            <input type="submit" class="btn-primary" value="Enviar">
          </form>
		</div>

    </center>
    </div>
  </div>
  </div>
</body>
</html>

<?php
include_once('alertas.php');
?>