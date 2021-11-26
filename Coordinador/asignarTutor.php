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

    //consulta para ver si el tutor ya tiene asignando a alguien
    $pk_asigna = "SELECT pk_asingatutor FROM asignar_tutor WHERE	fk_alumno=$id_alumno";
    $result = $conexion->query($pk_asigna);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $sql="UPDATE asignar_tutor  SET fk_alumno=$id_alumno WHERE fk_docentes= $id_docente AND fk_alumno IS NULL;";
      $ejecutar=mysqli_query($conexion, $sql);
      $error=mysqli_error($conexion);
    }
  } else {
    $sql="INSERT INTO asignar_tutor VALUES (DEFAULT,
                                     $id_alumno,
                                     $id_docente)";
  $ejecutar=mysqli_query($conexion, $sql);
  $error=mysqli_error($conexion);
if(!$ejecutar){
  header ("Location: AsignarTutores.php");
}else{
  header ("Location: AsignarTutores.php");;}



  }



 
?>﻿