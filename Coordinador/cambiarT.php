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

  $sql="UPDATE asignar_tutor  SET fk_docentes=$id_docente WHERE fk_alumno= $id_alumno";
  $ejecutar=mysqli_query($conexion, $sql);
  $error=mysqli_error($conexion);

  

if(!$ejecutar){
    echo"Hubo algun error <br> <br> <a href='CambiarTutor.php'>volver </a>";
}else{
    echo"Datos guardados correctamente <br> <br> <a href='CambiarTutor.php'>Volver hacer otro cambio</a>";
}
 
?>﻿