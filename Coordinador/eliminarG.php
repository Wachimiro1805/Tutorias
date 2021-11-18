<?php
    include 'conexionC.php';
        //recuperar las variables
        $id=$_GET['id'];

    $sql="DELETE  FROM grupos WHERE id_grupo  = $id;";
    $ejecutar=mysqli_query($conexion, $sql);
    $error=mysqli_error($conexion);

    if(!$ejecutar){
        echo"No se puede eliminar este Grupo <br> <br> <a href='EliminarGrupos.php'>Regresar</a> <br> <br>";
        echo"Error: $error";
        
    }else{
        echo"Datos guardados correctamente <br> <br> <a href='EliminarGrupos.php'>Eliminar otro grupo</a>";
    }
  
?>﻿