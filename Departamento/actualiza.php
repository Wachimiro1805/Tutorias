<?php
    include 'conexionCT.php';
        //recuperar las variables
        $firstname=$_POST['nombre'];
        $lasttname=$_POST['apellidom'];
        $lastname2=$_POST['apellidop'];

    $sql = "UPDATE jefe_departamento SET nombre='$firstname', apellido_p = '$lasttname', appelido_m = '$lastname2' WHERE jefe_departamento.id_jefe_departamento = 1;";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
    header ("Location: ActualizarJD.php");
    }else{
        header ("Location: ActualizarJD.php");
    }
  
?>﻿