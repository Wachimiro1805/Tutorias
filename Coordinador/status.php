<?php
    include 'conexionC.php';
    $id=$_GET['id'];

$sql = "UPDATE solicitudes SET status = 'Aceptada' WHERE solicitudes.pk_solicitudes=  $id";
$ejecutar=mysqli_query($conexion, $sql);

if(!$ejecutar){
    echo"huvo algun error <br> <br> <a href='Solicitudes.php'>volver </a>";
}else{
    echo"Datos guardados correctamente <br> <br> <a href='Solicitudes.php'>Volver hacer otro cambio</a>";
}

?>