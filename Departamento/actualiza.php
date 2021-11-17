<?php
    include 'conexionCT.php';
        //recuperar las variables
        $firstname=$_POST['firstname'];
        $lasttname=$_POST['lasttname'];
        $lastname2=$_POST['lastname2'];

    $sql = "UPDATE jefe_departamento SET nombre='$firstname', apellido_p = '$lasttname', appelido_m = '$lastname2' WHERE jefe_departamento.id_jefe_departamento = 1;";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='ActualizarJD.php'>volver a Registrar</a>";
    }else{
        echo"datos guardado correctamente <br> <br> <a href='ActualizarJD.php'>volver hacer otro cambio</a>";
    }
  
?>﻿