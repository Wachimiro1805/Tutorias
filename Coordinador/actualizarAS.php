<?php
    include 'conexionC.php';
        //recuperar las variables
        $id=$_POST['id'];
        $name=$_POST['nombre'];
        $fecha=$_POST['fecha'];
        $impartidor=$_POST['impartidor'];
        $asesoria=$_POST['asesoria'];
        $descripcion=$_POST['descripcion'];


    $sql = "UPDATE asesorias SET 	nombre='$name',nombre_impartidor='$impartidor',fecha='$fecha',tipo_de_asesoria='$asesoria',descripcion='$descripcion' WHERE asesorias.id_asesorias = $id;";
    $ejecutar=mysqli_query($conexion, $sql);
    $error=mysqli_error($conexion);

    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='ActualizarAsesoria.php'>Regresar</a>";
        echo"Error: $error ";
    }else{
        echo"Datos guardado correctamente <br> <br> <a href='ActualizarAsesoria.php'>Volver hacer otro cambio</a>";
    }
  
?>﻿