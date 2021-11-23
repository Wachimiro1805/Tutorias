<?php
    include 'conexionC.php';
        //recuperar las variables
        $id=$_POST['id'];

    $sql="DELETE  FROM alumnos WHERE id_alumnos = $id;";
    $ejecutar=mysqli_query($conexion, $sql);
    $error=mysqli_error($conexion);

    if(!$ejecutar){
        echo"No se puede eliminar este Alumno ya que tiene un tutor asignado<br> <br> <a href='BorrarAlumnos.php'>Regresar</a> <br> <br>";
        
    }else{
        echo"Datos guardados correctamente <br> <br> <a href='BorrarAlumnos.php'>Eliminar otro coordinador</a>";
    }
  
?>﻿
