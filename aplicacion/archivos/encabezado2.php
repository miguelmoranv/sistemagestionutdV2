<?php
include_once('sesiones.php');
include_once("../bd/db.php");
$entrar="";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="parciales.css ">
	<link rel="stylesheet" href="js/estilos.css">
    <link rel="icon" href="../css/utdnew.png">
</head>
<body>
<header class="header">
  
    
  <div class="btn-menu">            
			<label for="btn-menu"><img src="../css/menux.png" class="utd" width="120px" height="100"> </label>       
      
		</div>

		<div class="container">
      
		
			<div class="logo">
      <h1>Sistema Gestor de Documentos </h1>	  
	  <br><br><br><br>
	  <div align="right">

			</div>
     
      </div>    	
       
	  <div align="right"><h2>Usuario: <?php echo $nombre_u ?></h2></div>
		   	
		</div>
	</header>
	<div class="tabla con datos">
		
		<table>
			<tr>
				<td></td>
			</tr>
		</table>    
	<div class="capa">		
	</div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	
	<div class="cont-menu">
		<nav>
      <hr>
    <img src="../css/utdnew.png" width="120px" height="75"> 
    <hr>
            <div class="usuer">
			
            </div>
            <li class="list_item list_item--click">
                <a href="clases.php">Clases</a>
            </li>
			<?php if ($rol == "ptc" or $rol=="user") { ?>
			<a href="datos_personales.php">Datos Personales</a>
			<?php } ?>
			<a href="subirinforme.php">Informes</a>
			<?php if ($rol=="admin") { ?>
			<li class="list_item list_item--click">
                <div class="list_button list_button--click">
                    <a href="#" class="nav_link">Administrar Docentes</a>
                    <img src="assets/arrow.svg" class="list_arrow" alt="">
                </div>
                <ul class="list_show"> 
                    <li class="list_inside">
                        <a href="files/agregar.php" class="nav_link nav_link--inside">Nuevo</a>
                    </li>

                    <li class="list_inside">
                        <a href="datos_personales.php" class="nav_link nav_link--inside">Administrar</a>
                    </li>
                </ul>

            </li>
			<li class="list_item list_item--click">
                <div class="list_button list_button--click">
                    <a href="#" class="nav_link">Administrar Clases</a>
                    <img src="assets/arrow.svg" class="list_arrow" alt="">
                </div>
                <ul class="list_show"> 
                    <li class="list_inside">
                        <a href="agregarclas.php" class="nav_link nav_link--inside">Nuevo</a>
                    </li>

                    <li class="list_inside">
                        <a href="crudclases.php" class="nav_link nav_link--inside">Administrar</a>
                    </li>
                </ul>

            </li>
			<li class="list_item list_item--click">
                <div class="list_button list_button--click">
                    <a href="#" class="nav_link">Administrar Carreras</a>
                    <img src="assets/arrow.svg" class="list_arrow" alt="">
                </div>
                <ul class="list_show"> 

                    <li class="list_inside">
                        <a href="crudcarreras.php" class="nav_link nav_link--inside">Administrar</a>
                    </li>
                </ul>

            </li>
			<?php } ?>
			<a href="salir.php"> Cerrar Sesión de: <?php echo $nombre_u ?> </a>
		
		</nav>
		<label for="btn-menu">✖️</label>
		
	</div>
</div>
</div>

<br><br><br>
</html>
<script src="js/main.js"></script>

	