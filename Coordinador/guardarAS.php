<?php
    include 'conexionC.php';
    //recuperar las variables
    $nombre=$_POST['nombre'];
    $fecha=$_POST['fecha'];
    $impartidor=$_POST['impartidor'];
    $asesoria=$_POST['asesoria'];
    $descripcion=$_POST['descripcion'];

$sql="INSERT INTO asesorias VALUES (DEFAULT,'$nombre','$impartidor','$fecha','$asesoria','$descripcion')";
$ejecutar=mysqli_query($conexion, $sql);
$error=mysqli_error($conexion);

if(!$ejecutar){
    echo"Hubo algun error <br> <br> <a href='gestionarAsesorias.php'>volver a Registrar</a>";
    echo"Error: $error";
}else{
    echo"datos guardado correctamente <br> <br> <a href='gestionarAsesorias.php'>volver a agregar otra asesoria</a>";
}
  
?>﻿