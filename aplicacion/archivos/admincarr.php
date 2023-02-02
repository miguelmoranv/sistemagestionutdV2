<?php
include_once('sesiones.php');
include_once('encabezado.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administrar Carreras</title>
	<link rel="stylesheet" href="parciales.css ">
    <link rel="stylesheet" href="datos.css">
</head>
<body>
<br><br><br>
<section>
	
	<div class="tabla-planeaciones">
		
	<center>
	<?php if ($rol=="admin") { ?>
        <div align="center"class="tabla">
		<h1>Datos personales de Usuarios</h1>
    </div>
    
		<br>
	<table class="datos" border="5">
	<thead>
	<th class="categorias">ID</th>
                        <th class="categorias">Id de Carrera</th>
                        <th class="categorias">Nombre</th>
                        
                        <?php ?>
                    </thead>
                    <?php
                         include_once("../bd/db.php");
                        $consulta="select * from carreras";
                        $resultado=mysqli_query($conexion,$consulta);

                        if (mysqli_num_rows($resultado)>0){
                            while($fila=mysqli_fetch_assoc($resultado))
                            {
                             ?>
                                <tr>
								<td class="columnas"><?php echo $fila['id_usuarios'] ?></td>
                                    <td class=""><?php echo $fila['id_carrera'] ?></td>
                                    <td class=""><?php echo $fila['nombre_c'] ?></td>
                                                                    
                                    <td class="" colspan="2" >
                                    
                                    <a class="" href="actualizar_datos.php?id_usuarios=<?php echo $fila['id_usuarios'] ?>"> <img src="Editar.svg" alt=""> </a>
                                    <a class="" href="ver_datos.php?id_usuarios=<?php echo $fila['id_usuarios'] ?>"> <img src="Ver.svg" alt=""> </a>
                                    <a class="" href="eliminar.php?id_usuarios=<?php echo $fila['id_usuarios'] ?>"> <img src="Borrar.svg" alt=""> </a>
                                    
                                    

                                    </td>
                               
                                </tr> 
                             <?php
                            }
                        }

                    ?>
	</table>



<?php }?>

<?php if ($rol=="user") { ?>
    
    <div align="center"class="tabla">
		<h1>Datos personales de <?php echo $nombre_u?></h1>
    </div>
	


	
                        <?php ?>
                    </thead>
                    <?php
                         include_once("../bd/db.php");
                        $consulta="select * from carreras";
                        $resultado=mysqli_query($conexion,$consulta);

                        if (mysqli_num_rows($resultado)>0){
                            while($fila=mysqli_fetch_assoc($resultado))
                            {
                             ?>
                                
                             <?php
                            }
                        }

                    ?>
	</table>




<center>


</center>
</div>
</section>
<div id="container">

  <div class="underline">
  </div>
  <div class="icon_wrapper">
   
  </div>
  <form action="#" method="post" id="contact_form">
    <div class="name">
      <label for="name">Nombre:</label>
       <?php
                         include_once("../bd/db.php");
                        $consulta="select * from usuarios where rfc = '$rfc' or id_usuarios='$id_usuarios'";
                        $resultado=mysqli_query($conexion,$consulta);

                        if (mysqli_num_rows($resultado)>0){
                            while($fila=mysqli_fetch_assoc($resultado))
                            {
                             ?>
                              
                            
                    
      <input type="text" name="name" id="name_input"  placeholder=" <?php echo $fila['nombre_u'] ?>">
    </div>
    
    
    <div class="email">
      <label for="email">RFC:</label>
      <input type="email"  name="RFC" id="RFC" readonly placeholder="<?php echo $fila['rfc'] ?>">
    </div>
    <div class="name">
    <label for="name">Apellido Paterno:</label>
    <input type="text" name="name" id="name_input"  placeholder=" <?php echo $fila['ape_1'] ?>">
    </div>
    <div  class="name">
    <label for="name">Apellido Paterno:</label>
    <input type="text" name="name" id="name_input"  placeholder=" <?php echo $fila['ape_2'] ?>">
    </div>

    <div class="telephone">
      <label for="name">Telefono:</label>
      <input type="text"  name="telephone" id="telephone_input" placeholder=" <?php echo $fila['celular'] ?>">
    </div>
    <div class="subject">
      <label for="subject"></label>
    </div>
    <div class="telephone">
      <label for="name">Matricula:</label>
      <input type="text"  name="matrciula" id="telephone_input" placeholder=" <?php echo $fila['matricula'] ?>">
    </div>
    
    <div class="submit">
      <input type="submit" value="Enviar" id="form_button" />
    </div>
  </form><!-- // End form -->
</div><!-- // End #container -->
<?php
                            }
                        }
                    
?>



<?php }?>

<?php if ($rol=="ptc") { ?>
    <div align="center"class="tabla">
		<h1>Datos personales de <?php echo $nombre_u?></h1>
    </div>
	


	
                        <?php ?>
                    </thead>
                    <?php
                         include_once("../bd/db.php");
                        $consulta="select * from usuarios where rfc = '$rfc' or id_usuarios='$id_usuarios'";
                        $resultado=mysqli_query($conexion,$consulta);

                        if (mysqli_num_rows($resultado)>0){
                            while($fila=mysqli_fetch_assoc($resultado))
                            {
                             ?>
                                
                             <?php
                            }
                        }

                    ?>
	</table>




<center>


</center>
</div>
</section>
<div id="container">

  <div class="underline">
  </div>
  <div class="icon_wrapper">
   
  </div>
  <form action="#" method="post" id="contact_form">
    <div class="name">
      <label for="name">Nombre:</label>
       <?php
                         include_once("../bd/db.php");
                        $consulta="select * from usuarios where rfc = '$rfc' or id_usuarios='$id_usuarios'";
                        $resultado=mysqli_query($conexion,$consulta);

                        if (mysqli_num_rows($resultado)>0){
                            while($fila=mysqli_fetch_assoc($resultado))
                            {
                             ?>
                              
                            
                    
      <input type="text" name="name" id="name_input"  placeholder=" <?php echo $fila['nombre_u'] ?>">
    </div>
    
    
    <div class="email">
      <label for="email">RFC:</label>
      <input type="email"  name="RFC" id="RFC" readonly placeholder="<?php echo $fila['rfc'] ?>">
    </div>
    <div class="name">
    <label for="name">Apellido Paterno:</label>
    <input type="text" name="name" id="name_input"  placeholder=" <?php echo $fila['ape_1'] ?>">
    </div>
    <div  class="name">
    <label for="name">Apellido Paterno:</label>
    <input type="text" name="name" id="name_input"  placeholder=" <?php echo $fila['ape_2'] ?>">
    </div>

    <div class="telephone">
      <label for="name">Telefono:</label>
      <input type="text"  name="telephone" id="telephone_input" placeholder=" <?php echo $fila['celular'] ?>">
    </div>
    <div class="subject">
      <label for="subject"></label>
    </div>
    <div class="telephone">
      <label for="name">Matricula:</label>
      <input type="text"  name="matrciula" id="telephone_input" placeholder=" <?php echo $fila['matricula'] ?>">
    </div>
    
    <div class="submit">
      <input type="submit" value="Enviar" id="form_button" />
    </div>
  </form><!-- // End form -->
</div><!-- // End #container -->
<?php
                            }
                        }
                    }
?>
</body>
</html>