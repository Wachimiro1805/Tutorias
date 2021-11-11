<?php
    include 'conexionA.php';
        //recuperar las variables
        $firstname=$_POST['firstname'];
        $lasttname=$_POST['lasttname'];
        $lastname2=$_POST['lastname2'];
        $grupos=$_POST['grupos'];
        $carreras=$_POST['carreras'];
    

 
        //consulta para id con el nombre de grupo
        $consultaId = "SELECT id_grupo FROM grupos WHERE nombre_grupo='$grupos'";
        $result = $conexion->query($consultaId);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
      
          $id_grupo = $row["id_grupo"];
        }
      } else {
        echo "0 results";
      }

      $consultaId = "SELECT id_carreras FROM carreras WHERE siglas='$carreras'";
      $result = $conexion->query($consultaId);
  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
    
        $id_carrera = $row["id_carreras"];
      }
    } else {
      echo "0 results";
    }

      $sql="INSERT INTO docentes VALUES (DEFAULT,'$firstname','$lasttname','$lastname2',DEFAULT,DEFAULT,$id_grupo,$id_carrera)";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='gestionarTutores.php'>volver a Registrar</a>";
    }else{
        echo"datos guardado correctamente <br> <br> <a href='gestionarTutores.php'>volver a agregar otro docente</a>";
    }


?>﻿