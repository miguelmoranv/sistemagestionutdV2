<?php
include_once('archivos/sesiones.php');           
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de la UTD</title>
    <link rel="stylesheet" href="css/estilo_home.css">
    <link rel="icon" href="css/utdnew.png">
</head>
<body>
<header>

        <h1>Sistema de administracion de la UTD</h1>

</header>
    <div class="svg-container">
        <svg viewbox="0 0 800 400" class="svg">
            <path id="curve" fill="#efb801" d="M 800 300 Q 400 350 0 300 L 0 0 L 800 0 L 800 300 Z">
            </path>
        </svg>
    </div>

<div class="contenedor">
    <a href="#" type="button" class="button" onclick="ir()">
        <figure>
            <img src="css/celendario.svg">
            <div class="capa">
                <h3>Sistema de horarios</h3>
                <p>Administrador y gestor de horarios de personal escolar.</p>
            </div>
        </figure>
    </a>
    <a href="archivos/clases.php" type="button" class="button1" onclick="ir2()">
        <figure>
            <img src="css/documentos.svg">
            <div class="capa">
                <h3>Sistema de administracion de documentos</h3>
                <p>Administrador y gestor dedocumentos y archivos de personal escolar.</p>
            </div>
        </figure>
    </a>
    <a href="#" type="button" class="button2" onclick="ir3()">
        <figure>
            <img src="css/inventario.svg">
            <div class="capa">
                <h3>Sistema de inventario</h3>
                <p>Administrador y gestor de inventario.</p>
            </div>
        </figure>
    </a>
</div>

<!--#efb801
 #02a282-->
</html>
 