<?php
    include 'conexionCT.php';
        //recuperar las variables
        $contra1=$_POST['contra1'];
        $usuario=$_POST['usuario'];
        $contra2=$_POST['contra2'];
        $contra3=$_POST['contra3'];

        $consulta = "SELECT contraseña FROM jefe_departamento";
        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

        if (mysqli_num_rows($resultado) > 0) {
            while($row = mysqli_fetch_assoc($resultado)) {
             $contra = $row["contraseña"];
              }    
        }
        else {
            echo "0 results";
          }
if($contra == $contra1){

if($contra2 == $contra3 ){
    $sql = "UPDATE jefe_departamento SET ususario = '$usuario', contraseña = '$contra2' WHERE jefe_departamento.id_jefe_departamento = 1;";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='ActualizarUS.php'>volver a actualizar</a>";
    }else{
        echo"datos guardado correctamente <br> <br> <a href='ActualizarUS.php'>volver hacer otro cambio</a>";
    }
    //CONFIRMAR CONTRASEÑA
}else{
    echo"contraseñas no coinciden <br> <br> <a href='ActualizarUS.php'>volver a actualizar</a>";
}
 //CONFIRMA CONTRASEÑA ANTIGUA   
}else{
    echo"contraseña antigua no encontrada <br> <br> <a href='ActualizarUS.php'>volver a actualizar</a>";
}
?>﻿