<?php
include_once 'conexionCT.php';
$nombre = $_FILES['archivo']['name'];
$tipo = $_FILES['archivo']['type'];
$tamanio = $_FILES['archivo']['size'];
$ruta = $_FILES['archivo']['tmp_name'];
$destino = "archivos/" . $nombre;
$Alumno= $_POST['alumnos'];

        //consulta para id con del Alumno
        $consultaId = "SELECT id_alumnos FROM alumnos WHERE nombreA='$Alumno'";
        $result = $conexion->query($consultaId);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
      
          $id_alumno = $row["id_alumnos"];
        }
      } else {
        echo "0 results";
      }

        if (copy($ruta, $destino)) {
      
            $sql = "INSERT INTO documentos(fk_alumno,documento) VALUES('$id_alumno','$nombre')";
            $ejecutar=mysqli_query($conexion, $sql);
        }

?>