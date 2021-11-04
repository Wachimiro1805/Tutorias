<?php
    include 'conexionC.php';
        //recuperar las variables
        $NombreCarrera=$_POST['nombre'];
        $Siglas=$_POST['Siglas'];

    $sql="INSERT INTO asesorias VALUES (DEFAULT,'$NombreCarrera','$Siglas')";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='RegistrarCarreras.php'>volver a Registrar</a>";
    }else{
        echo"datos guardado correctamente <br> <br> <a href='RegistrarCarreras.php'>volver a agregar otra carrera</a>";
    }
  
?>﻿