<?php
    include 'conexionC.php';
        //recuperar las variables
        $id=$_POST['id'];
        $name=$_POST['nombre'];   
        $sigles=$_POST['siglas'];   


    $sql = "UPDATE carreras SET	nombre_carrera='$name',siglas='$sigles' WHERE carreras.id_carreras  = $id;";
    $ejecutar=mysqli_query($conexion, $sql);
    $error=mysqli_error($conexion);

    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='ActualizarCarrera.php'>Regresar</a>";
        echo"Error: $error ";
    }else{
        echo"Datos guardado correctamente <br> <br> <a href='ActualizarCarrera.php'>Volver hacer otro cambio</a>";
    }
  
?>﻿