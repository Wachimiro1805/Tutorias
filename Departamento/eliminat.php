<?php
    include 'conexionCT.php';
        //recuperar las variables
        $id=$_POST['id'];


    $sql="DELETE  FROM docentes WHERE id_docente = $id;";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        header ("Location: EliminarT.php");
      
    }else{
        header ("Location: EliminarT.php");
    }
  
?>﻿