<?php
    include 'conexionCT.php';
        //recuperar las variables
        $id=$_POST['id'];


    $sql="DELETE  FROM coordinador_de_tutorias WHERE id_coordinador_tutorias = $id;";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        header ("Location: EliminarCT.php");
       
    }else{
        header ("Location: EliminarCT.php");
    }
  
?>﻿