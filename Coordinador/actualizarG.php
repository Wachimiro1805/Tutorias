<?php
    include 'conexionC.php';
        //recuperar las variables
        $id=$_POST['id'];
        $name=$_POST['nombre'];   


    $sql = "UPDATE grupos SET 	nombre_grupo='$name' WHERE grupos.id_grupo = $id;";
    $ejecutar=mysqli_query($conexion, $sql);
    $error=mysqli_error($conexion);

    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='ActualizarGrupo.php'>Regresar</a>";
        echo"Error: $error ";
    }else{
        echo"Datos guardado correctamente <br> <br> <a href='ActualizarGrupo.php'>Volver hacer otro cambio</a>";
    }
  
?>﻿