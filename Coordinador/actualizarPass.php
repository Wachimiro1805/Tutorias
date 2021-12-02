<?php
    include 'conexionC.php';
    $conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
    if($conexion->connect_errno)
    {
        echo "Error de conexion de la base datos".$conexion->connect_error;
        exit();
    }else {
      session_start();
      if (empty($_SESSION["usuario"])) {
      }else{
        $usuario = $_SESSION["usuario"];
        $consulta="SELECT * FROM coordinador_de_tutorias WHERE usuario = '$usuario'";
        $resultadoID = $conexion->query($consulta);
      }
    }    
    while($rows=$resultadoID->fetch_array()){
        $id = $rows[0];   
        }
        //recuperar las variables
        $contra1=$_POST['contra1'];
        $contra2=$_POST['contra2']; 
        $contra3=$_POST['contra3'];

        $consulta = "SELECT contrasena FROM coordinador_de_tutorias WHERE 	id_coordinador_tutorias= $id";
        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        $error=mysqli_error($conexion);

        if (mysqli_num_rows($resultado) > 0) {
            while($row = mysqli_fetch_assoc($resultado)) {
             $contra = $row["contrasena"];
              }    
        }
        else {
            echo "0 results";
          }
if($contra == $contra1){
 
if($contra2 == $contra3 ){
    $sql = "UPDATE coordinador_de_tutorias SET  contrasena = '$contra2' WHERE coordinador_de_tutorias.id_coordinador_tutorias = $id;";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='CambiarPass.php'>volver a actualizar</a>";
    }else{
        echo"datos guardado correctamente <br> <br> <a href='CambiarPass.php'>volver hacer otro cambio</a>";
    }
    //CONFIRMAR CONTRASEÑA
}else{
    echo"Las contraseñas no coinciden <br> <br> <a href='CambiarPass.php'>volver a actualizar</a>";
}
 //CONFIRMA CONTRASEÑA ANTIGUA   
}else{
    echo"Contraseña antigua no encontrada <br> <br> <a href='CambiarPass.php'>volver a actualizar</a>";
}
?>﻿