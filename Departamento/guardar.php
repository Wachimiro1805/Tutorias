<?php
    include 'conexionCT.php';
        //recuperar las variables
        $firstname=$_POST['firstname'];
        $lasttname=$_POST['lasttname'];
        $lastname2=$_POST['lastname2'];

    $sql="INSERT INTO coordinador_de_tutorias VALUES (DEFAULT,'$firstname','$lasttname','$lastname2',DEFAULT,DEFAULT)";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='RegistrarCT.php'>volver a Registrar</a>";
    }else{
        echo"datos guardado correctamente <br> <br> <a href='RegistrarCT.php'>volver a agregar otro coordinador</a>";
    }
  
?>﻿