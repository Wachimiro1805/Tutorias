<?php
    include 'conexionCT.php';
        //recuperar las variables
        $id=$_POST['id'];


    $sql="DELETE  FROM docentes WHERE id_docente = $id;";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        echo"ID no encontrada <a href='EliminarT.php'>volver a</a>";
    }else{
        echo"datos guardado correctamente <br> <br> <a href='EliminarT.php'>Eliminar otro Tutor</a>";
    }
  
?>﻿