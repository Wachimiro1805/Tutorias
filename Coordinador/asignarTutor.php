<?php
    include 'conexionC.php';
    //recuperar las variables
    $docente=$_POST['docente'];
    $alumno=$_POST['alumno'];


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

    //consulta para id con el nombre del alumno
    $alumnoId = "SELECT id_alumnos FROM alumnos WHERE 	nombreA='$alumno'";
    $result = $conexion->query($alumnoId);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $id_alumno = $row["id_alumnos"];
    }
  } else {
    echo "0 results";
  }

  $sql="INSERT INTO asignar_tutor VALUES ($id_alumno,$id_docente)";
$ejecutar=mysqli_query($conexion, $sql);
$error=mysqli_error($conexion);

if(!$ejecutar){
    echo"Error al asignar tutor al alumno <br> <br> <a href='AsignarTutores.php'>Regresar</a> <br> <br>";
    echo"Error: $error";
}else{
    echo"datos guardado correctamente <br> <br> <a href='AsignarTutores.php'>Asignar otro tutor</a>";
}


 
?>﻿