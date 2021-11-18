<?php
    include 'conexionC.php';
        //recuperar las variables
        $NombreCarrera=$_POST['NombreCarrera'];
        $Siglas=$_POST['Siglas'];

    $sql="INSERT INTO carreras VALUES (DEFAULT,'$NombreCarrera','$Siglas')";
    $ejecutar=mysqli_query($conexion, $sql);
    $error=mysqli_error($conexion);

    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='RegistrarCarreras.php'>volver a Registrar</a>";
        echo"Error: $error";
    }else{
        echo"datos guardado correctamente <br> <br> <a href='RegistrarCarreras.php'>volver a agregar otra carrera</a>";
    }
   
?>﻿