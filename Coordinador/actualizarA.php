<?php
    include 'conexionC.php';
        //recuperar las variables
        $id=$_POST['id'];
        $name=$_POST['nombre'];  
        $lasttname=$_POST['apellido_p'];
        $lastname2=$_POST['apellido_m'];

    $sql = "UPDATE alumnos SET 	nombreA='$name', apellido_p = '$lasttname', appelido_m = '$lastname2' WHERE alumnos.id_alumnos = $id;";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='ActualizarAlumnos.php'>Regresar</a>";
    }else{
        echo"datos guardado correctamente <br> <br> <a href='ActualizarAlumnos.php'>volver hacer otro cambio</a>";
    }
  
?>﻿