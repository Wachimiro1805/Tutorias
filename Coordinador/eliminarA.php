<?php
    include 'conexionC.php';
        //recuperar las variables
        $id=$_POST['id'];

    $sql="DELETE  FROM alumnos WHERE id_alumnos = $id;";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        echo"ID no encontrada <br> <br> <a href='BorrarAlumnos.php'>Regresar</a> <br> <br>";
        echo"Consulta Realizada: $sql ";
    }else{
        echo"Datos guardado correctamente <br> <br> <a href='BorrarAlumnos'>Eliminar otro coordinador</a>";
    }
  
?>﻿
