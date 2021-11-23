<?php
    include 'conexionT.php';
        //recuperar las variables
        $id=$_POST['id'];
        $contra1=$_POST['contra1'];
        $usuario=$_POST['usuario'];
        $contra2=$_POST['contra2'];
        $contra3=$_POST['contra3'];

       

        $consulta = "SELECT contrasena FROM docentes";
        $resultado = mysqli_query( $conexion, $consulta )
                         or die ( "Algo ha ido mal en la consulta a la base de datos");


if($contra1 == $contra1){

    if($contra2 == $contra3 ){
        $sql = "UPDATE docentes 
                    SET usuario = '$usuario', contrasena = '$contra2' 
                        WHERE id_docente = $id";
        $ejecutar=mysqli_query($conexion, $sql);

        if(!$ejecutar){
            echo"Hubo algun error <br> <br> <a href='ActualizarUsuConTuto.php'>volver a actualizar</a>";
            $error=mysqli_error($conexion);
            echo"Error: $error ";
        }else{
            echo"datos guardado correctamente <br> <br> <a href='ActualizarUsuConTuto.php'>volver hacer otro cambio</a>";
            $error=mysqli_error($conexion);
            echo"Error: $error ";
        }
    //CONFIRMAR CONTRASEÑA
    }else{
        echo"contraseñas no coinciden <br> <br> <a href='ActualizarUsuConTuto.php'>volver a actualizar</a>";
        $error=mysqli_error($conexion);
        echo"Error: $error ";
    }
 //CONFIRMA CONTRASEÑA ANTIGUA   
}else{
    echo"contraseña antigua no encontrada <br> <br> <a href='ActualizarUsuConTuto.php'>volver a actualizar</a>";
    $error=mysqli_error($conexion);
    echo"Error: $error ";
}
?>

