<?php
    include 'conexionC.php';
        //recuperar las variables
        $Nombregrupo=$_POST['Nombregrupo'];

    $sql="INSERT INTO grupos VALUES (DEFAULT,'$Nombregrupo')";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='RegistrarCT.php'>volver a Registrar</a>";
    }else{
        echo"datos guardado correctamente <br> <br> <a href='RegistrarGrupos.php'>volver a agregar otro grupo</a>";
    }
  
?>﻿