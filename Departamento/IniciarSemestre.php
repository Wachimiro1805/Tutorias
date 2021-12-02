<?php
    include 'conexionCT.php';
        //recuperar las variables
        $per = $_POST['PER'];
        $ano = date("Y");

       $Perido=  "$per  $ano";

  
       $sql = "SELECT pk_semestre FROM semestre WHERE semestre = '$Perido';";
       $result = $conexion->query($sql);
       if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
            header ("Location: Departamento2.php?error=true");
             
          } }else {
                $sql="INSERT INTO semestre VALUES(DEFAULT,'$Perido');";
                $ejecutar=mysqli_query($conexion, $sql);
                if(!$ejecutar){
                    header ("Location: Departamento2.php");
                }else{
                    header ("Location: Departamento2.php");
                }
           }  


  
?>﻿