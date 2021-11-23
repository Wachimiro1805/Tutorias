<?php
    include 'conexionCT.php';
        //recuperar las variables
        $firstname=$_POST['firstname'];
        $lasttname=$_POST['lasttname'];
        $lastname2=$_POST['lastname2'];

    $sql="INSERT INTO coordinador_de_tutorias VALUES (DEFAULT,'$firstname','$lasttname','$lastname2',DEFAULT,DEFAULT)";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        header ("Location: RegistrarCT.php");
        
    }else{
        header ("Location: RegistrarCT.php");
    }
  
?>﻿