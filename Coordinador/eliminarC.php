<?php
    include 'conexionC.php';
        //recuperar las variables
        $id=$_GET['id'];

    $sql="DELETE  FROM carreras WHERE id_carreras  = $id;";
    $ejecutar=mysqli_query($conexion, $sql);
    $error=mysqli_error($conexion);

    if(!$ejecutar){
        echo"No se puede eliminar esta Carrera <br> <br> <a href='EliminarCarrera.php'>Regresar</a> <br> <br>";
        echo"Error: $error";
        
    }else{
        echo"Datos guardados correctamente <br> <br> <a href='EliminarCarrera.php'>Eliminar otra carrera</a>";
    }
  
?>﻿