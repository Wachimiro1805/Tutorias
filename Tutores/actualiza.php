<?php
    include 'conexionT.php';
        //recuperar las variables
        $id = $_POST["id"];
        $firstname=$_POST['firstname'];
        $lasttname=$_POST['lasttname'];
        $lastname2=$_POST['lastname2'];

    $sql = "UPDATE docentes SET nombre_docente='$firstname', 
                                apellido_p = '$lasttname', 
                                apellido_m = '$lastname2' 
                            WHERE id_docente = '$id'";

    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        echo"Hubo algun error <br> <br> <a href='GestionarDatosT.html'>volver a Registrar</a>";
        $error=mysqli_error($conexion);
        echo"Error: $error ";
    }else{
        echo"Datos guardado correctamente <br> <br> <a href='GestionarDatosT.html'>volver hacer otro cambio</a>";
    }
  

?>