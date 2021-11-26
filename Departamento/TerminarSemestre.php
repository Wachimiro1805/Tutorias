<?php
    include 'conexionCT.php';
        //recuperar las variables


    $sql="DELETE FROM asignar_tutor";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        header ("Location: Departamento2.php");
        
    }else{
        header ("Location:  Departamento2.php");
    }
  
?>﻿