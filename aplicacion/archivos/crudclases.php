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
<br><br><br>
<section>
	
	<div class="tabla-planeaciones">
		
	<center>
	<?php if ($rol=="admin") { ?>
        <div align="center"class="tabla">
		<h1>Clases</h1>
        <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="agregarclas.php">Nuevo</a></li>
              <li class="breadcrumb-item active">Administrar</li>
            </ol>
    </div>

    <div class="container-buscador">
        <form class="d-flex">
            <input id="buscar" class="buscador" data-table="tablita" type="text" placeholder="Buscar">
        </form>
            
    </div>
    
		<br>
	<table class="datos tablita" border="5">
	<thead>
   
                        <th class="categorias">Clases</th>
                        <th class="categorias">Ciclo</th>
                        <th class="categorias">Carrera</th>
						<th class="categorias">Docente</th>
						
                        <th class="categorias">Acciones</th>
                       
                        <?php ?>
                    </thead>
                    <?php
                         include_once("../bd/db.php");
                        $consulta="select c.id_clases,c.nombre_clase,c.ciclo,c.carrera,c.docente,u.id_usuarios,u.nombre,a.id_carrera,a.nombre_c from clases c, usuarios u, carreras a where c.docente=u.id_usuarios and c.carrera=a.id_carrera";
                        $resultado=mysqli_query($conn,$consulta);

                        if (mysqli_num_rows($resultado)>0){
                            while($fila=mysqli_fetch_assoc($resultado))
                            {
                             ?>
                                <tr>
                                    <tbody id="tabla">
                                
                                    <td class=""><?php echo $fila['nombre_clase'] ?></td>
                                    <td class=""><?php echo $fila['ciclo'] ?></td>

                                    <td class=""><?php echo $fila['nombre_c'] ?></td>
									                  <td class=""><?php echo $fila['nombre'] ?></td>
									                                   
                                    <td class="" colspan="2" >
                                    
                                    <a class="" href="actualizarclases.php?id_clases=<?php echo $fila['id_clases'] ?>"> <img src="Editar.svg" alt=""> </a>
                                    <a class="" href="ver_clases.php?id_clases=<?php echo $fila['id_clases'] ?>"> <img src="Ver.svg" alt=""> </a>
                                    <a class="" href="eliminarclase.php?id_clases=<?php echo $fila['id_clases'] ?>"> <img src="Borrar.svg" alt=""> </a>
                                    
                                    

                                    </td>
                               
                                </tr> 
                             <?php
                            }
                        }

                    ?>
                    </tbody>
	</table>



<?php }?>
<a class="btn btn-secondary"href="clases.php">Volver</a>

<script src="buscador.js"></script>



</body>
</html>