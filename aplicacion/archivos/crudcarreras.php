<?php
include_once('sesiones.php');
include_once('encabezado.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Pagina principal</title>
	<link rel="stylesheet" href="parciales.css ">
    <link rel="stylesheet" href="datos.css">
    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function(){
  $("#buscar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabla tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
    </script>
</head>
<body>
<div class="content-wrapper">
<div class="content">
      <div class="container-fluid">
<br><br><br>
<section>
	
	<div class="tabla-planeaciones">
		
	<center>
	<?php if ($rol=="admin") { ?>
        <div align="center"class="tabla">
		<h1>Carreras</h1>
    </div>
    
    <div class="container-buscador">
        <form class="d-flex">
            <input id="buscar" class="buscador" data-table="tablita" type="text" placeholder="Buscar">
        </form>
            
    </div>

		<br>
	<table class="datos" border="5">
	<thead>
                        
                        <th class="categorias">Nombre</th>
                        <th class="categorias">Modalidad</th>
                        
						
                        <th class="categorias">Acciones</th>
                       
                        <?php ?>
                    </thead>
                    <?php
                         include_once("../bd/db.php");
                        $consulta="select * from carreras";
                        $resultado=mysqli_query($conn,$consulta);

                        if (mysqli_num_rows($resultado)>0){
                            while($fila=mysqli_fetch_assoc($resultado))
                            {
                             ?>
                                <tr>
                                    <tbody id="tabla">
                                    <td class=""><?php echo $fila['nombre_c'] ?></td>
                                    <td class=""><?php echo $fila['modalidad'] ?></td>

                                    
									                                   
                                    <td class="" colspan="2" >
                                    
                                    <a class="" href="actualizar_carreras.php?id_carrera=<?php echo $fila['id_carrera'] ?>"> <img src="Editar.svg" alt=""> </a>
                                    <a class="" href="ver_carreras.php?id_carrera=<?php echo $fila['id_carrera'] ?>"> <img src="Ver.svg" alt=""> </a>
                                    
                                    
                                    

                                    </td>
                               
                                </tr> 
                             <?php
                            }
                        }

                    ?>
                    </tbody>
	</table>
    <a class="btn btn-secondary"href="clases.php">Volver</a>




<?php }?>

</div>
  </div>
  </div>
</body>
</html>