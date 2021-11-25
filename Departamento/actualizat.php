<?php
    include 'conexionCT.php';
        //recuperar las variables
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellido_p=$_POST['apellido_p'];
        $apellido_m=$_POST['apellido_m'];
        $correo=$_POST['correo'];

        $consulta = "SELECT id_docente FROM docentes WHERE id_docente = $id";
        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        if (mysqli_num_rows($resultado) > 0) {
            while($row = mysqli_fetch_assoc($resultado)) {
             $idConf = $row["id_docente"];
              }    
        }
        else {
            echo "0 results";
          }

if($idConf == $id){
    $sql = "UPDATE docentes SET nombre_docente = '$nombre', apellido_p = '$apellido_p', apellido_m='$apellido_m', correo='$correo' WHERE docentes.id_docente = $id;";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        header ("Location: ActualizarT.php");
      
    }else{
        header ("Location: ActualizarT.php");
    }
    
}else{
    header ("Location: ActualizarT.php");
}
?>﻿