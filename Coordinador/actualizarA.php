<?php
    include 'conexionC.php';
        //recuperar las variables
        $id=$_POST['id'];
        $name=$_POST['nombre'];   
        $lasttname=$_POST['apellido_p'];
        $lastname2=$_POST['apellido_m']; 
        $semestre=$_POST['semestre']; 
    $sql = "UPDATE alumnos SET 	nombreA='$name', apellido_p = '$lasttname', apellido_m = '$lastname2', semestre= $semestre WHERE alumnos.id_alumnos = $id;";
    $ejecutar=mysqli_query($conexion, $sql);
    $error=mysqli_error($conexion);

    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='ActualizarAlumnos.php'>Regresar</a>";
        echo"Error: $error ";
    }else{
        echo"datos guardado correctamente <br> <br> <a href='ActualizarAlumnos.php'>volver hacer otro cambio</a>";
    }
  
?>﻿