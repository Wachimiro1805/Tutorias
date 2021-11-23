<?php
    include 'conexionCT.php';
        //recuperar las variables
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellido_p=$_POST['apellido_p'];
        $apellido_m=$_POST['apellido_m'];

        $consulta = "SELECT id_coordinador_tutorias FROM coordinador_de_tutorias WHERE id_coordinador_tutorias = $id";
        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        if (mysqli_num_rows($resultado) > 0) {
            while($row = mysqli_fetch_assoc($resultado)) {
             $idConf = $row["id_coordinador_tutorias"];
              }    
        }
        else {
            echo "0 results";
          }

if($idConf == $id){
    $sql = "UPDATE coordinador_de_tutorias SET nombre = '$nombre', apellido_p = '$apellido_p', appelido_m='$apellido_m' WHERE coordinador_de_tutorias.id_coordinador_tutorias = $id;";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        header ("Location: ActualizarCT.php");

    }else{
        header ("Location: ActualizarCT.php");
        
    }
    
}else{
    header ("Location: ActualizarCT.php");
    
}
?>﻿