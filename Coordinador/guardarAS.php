<?php
    include 'conexionC.php';
    //recuperar las variables
    $nombre=$_POST['nombre'];
    $fecha=$_POST['fecha'];
    $asesoria=$_POST['asesoria'];
    $descripcion=$_POST['descripcion'];

$sql="INSERT INTO asesorias VALUES (DEFAULT,'$nombre','$fecha','$asesoria','$descripcion')";
$ejecutar=mysqli_query($conexion, $sql);

if(!$ejecutar){
    echo"huvo algun error <br> <br> <a href='gestionarAsesorias.php'>volver a Registrar</a>";
}else{
    echo"datos guardado correctamente <br> <br> <a href='gestionarAsesorias.php'>volver a agregar otra asesoria</a>";
}
  
?>﻿