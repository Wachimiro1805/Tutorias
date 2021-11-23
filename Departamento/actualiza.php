<?php
    include 'conexionCT.php';
        //recuperar las variables
        $firstname=$_POST['firstname'];
        $lasttname=$_POST['lasttname'];
        $lastname2=$_POST['lastname2'];

    $sql = "UPDATE jefe_departamento SET nombre='$firstname', apellido_p = '$lasttname', appelido_m = '$lastname2' WHERE jefe_departamento.id_jefe_departamento = 1;";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
    header ("Location: ActualizarJD.php");
    }else{
        header ("Location: ActualizarJD.php");
    }
  
?>﻿