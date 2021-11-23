<?php
    include 'conexionC.php';
        //recuperar las variables
        $id=$_GET['id'];

    $sql="DELETE  FROM asesorias WHERE id_asesorias  = $id;";
    $ejecutar=mysqli_query($conexion, $sql);
    $error=mysqli_error($conexion);

    if(!$ejecutar){
        echo"No se puede eliminar esta Asesoria <br> <br> <a href='EliminarAsesoria.php'>Regresar</a> <br> <br>";
        echo"Error: $error";
        
    }else{
        echo"Datos guardados correctamente <br> <br> <a href='EliminarAsesoria.php'>Eliminar otra carrera</a>";
    }
  
?>﻿