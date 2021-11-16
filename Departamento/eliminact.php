<?php
    include 'conexionCT.php';
        //recuperar las variables
        $id=$_POST['id'];


    $sql="DELETE  FROM coordinador_de_tutorias WHERE id_coordinador_tutorias = $id;";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        echo"ID no encontrada <a href='EliminarCT.php'>volver a</a>";
    }else{
        echo"datos guardado correctamente <br> <br> <a href='EliminarCT.php'>Eliminar otro coordinador</a>";
    }
  
?>﻿