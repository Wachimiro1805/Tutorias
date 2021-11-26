<?php
    include 'conexionCT.php';
    //recuperar las variables
    $docente=$_POST['docente'];



  //Consulta para obtener el id del docente
  $consultaId = "SELECT id_docente FROM docentes WHERE nombre_docente='$docente'";
  $result = $conexion->query($consultaId);


if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $id_docente = $row["id_docente"];
  }
} else {
  echo "0 results";
}


  //consulta para ver si ya esta asignado 
  $consultaIdasigna = "SELECT ATR.pk_asingatutor FROM asignar_tutor ATR WHERE ATR.fk_docentes = ' $id_docente'";
  $result2 = $conexion->query($consultaIdasigna);

  if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
      header ("Location: AsignarTutores.php?Error=true");
    }
  } else {
    $sql="INSERT INTO asignar_tutor VALUES (DEFAULT,DEFAULT,$id_docente)";
    $ejecutar=mysqli_query($conexion, $sql);
    $error=mysqli_error($conexion);
    
    if(!$ejecutar){
      header ("Location: AsignarTutores.php?Error=true");
    }else{
      header ("Location: AsignarTutores.php");
    }
  }
  




 
?>﻿