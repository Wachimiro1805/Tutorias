<?php
    include 'conexionT.php';
        //recuperar las variables
        $id=$_POST['id'];


    $sql="DELETE  FROM reporte_tutorado WHERE id_reporte_tutorado = $id;";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        echo"ID no encontrada <a href='Reporte.php'>Volver a</a>";
    }else{
        echo"Datos eliminados correctamente <br> <br> <a href='Reporte.php'>Eliminar otro alumno</a>";
    }
  
?>