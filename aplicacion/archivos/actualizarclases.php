<?php
$entrar="";
	include_once('sesiones.php');
    //include_once('../bd/db.php');
    include_once('encabezado.php');
    $id_clases=$_REQUEST['id_clases'];
    include_once('../bd/db.php');
    $consulta="select * from clases where id_clases='$id_clases'";
    $resultado=mysqli_query($conn,$consulta);

    if ($fila=mysqli_fetch_assoc($resultado))
   {
    
   }
    
	

	if ($_SERVER["REQUEST_METHOD"]=="POST")
	 {
    $id_clases=$_REQUEST['id_clases'];
		$nombre_clase=$_POST['nombre_clase'];
		$ciclo=$_POST['ciclo'];
		$carrera=$_POST['carrera'];
		$docente=$_POST['docente'];
    $modalidad=$_POST['modalidad'];
		

		include_once("../bd/db.php");
  
        $consulta="update clases set nombre_clase='$nombre_clase', ciclo='$ciclo', carrera='$carrera', docente='$docente', modalidad='$modalidad' where id_clases='$id_clases'";


  
		    $resultado=mysqli_query($conn,$consulta);
		
  
		if ($resultado) {
		  
		 $entrar="act_clas";
		 
		}
		else 
		{
		  $entrar="malo_clas";
		}
  
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
    <center>	
    <br>
    <br>
	<br>
    <br>
	<div >
	     <form method="post" action="">
		 <h2 align="center">Actualizar "Clase"</h2>
    
		 
            <table align="center">
              <tr>
                <td><label>Nombre</label></td>
                <td><input type="text" class="form-control" placeholder="" name="nombre_clase"  required value='<?php echo $fila['nombre_clase'] ?>'></td>
              </tr>
            <tr>
            <td><label>Ciclo</label></td>
                  <td>
                    <select name="ciclo" required>
                    <!-- <option value="0">Selecciona</option> -->
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
  
  <!-- <option value="0">Selecciona</option> -->

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
  
  <!-- <option value="0">Selecciona</option> -->

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
                  <td><select name="modalidad" class="form-control">
                    <option value="<?php echo $fila['modalidad'] ?>"><?php echo $fila['modalidad'] ?></option>
	                  <option value="activo">BIS</option> 
	                  <option value="inactivo">Clasica</option> 
	                </select> </td>
                </tr>

                <tr>
                    <td><input type="submit" class="btn-primary" value="Enviar"></td>
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