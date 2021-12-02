<?php 
session_start();
$NumCon=$_SESSION['usuario'];

?>

<?php
    include 'conexionC.php';
        //recuperar las variables
        $firstname=$_POST["name"];
        $lasttname=$_POST["lastname"];
        $lastname2=$_POST["lastname2"]; 

    $sql = "UPDATE coordinador_de_tutorias SET nombre='$firstname', apellido_p = '$lasttname', appelido_m = '$lastname2' WHERE coordinador_de_tutorias.usuario = '$NumCon';";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='CambiarDatos.php'>Regresar</a>";
        echo"Error: $error ";
    }else{
        echo"datos guardado correctamente <br> <br> <a href='CambiarDatos.php'>volver hacer otro cambio</a>";
    }
  
?>﻿