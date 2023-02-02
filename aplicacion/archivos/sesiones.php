<?php
session_start();

if (!isset($_SESSION['no_empleado'])){
    header("location:../../index.php");
}
else{
    $no_empleado=$_SESSION['no_empleado'];
    $rol=$_SESSION['rol'];
    $usuarios=$_SESSION['nombre'];
    $id_usuarios=$_SESSION['id_usuarios'];
    $estatus=$_SESSION['estatus'];
}
?>