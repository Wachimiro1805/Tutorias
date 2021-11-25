<?php
    include 'conexionCT.php';
    $id=$_GET['id'];

$sql = "UPDATE solicitudes SET status = 'Negada' WHERE solicitudes.pk_solicitudes=   $id";
$ejecutar=mysqli_query($conexion, $sql);

if(!$ejecutar){
    echo"huvo algun error <br> <br> <a href='Solicitudes.php'>volver </a>";
}else{
    echo"Datos guardado correctamente <br> <br> <a href='Solcitudes.php'>Volver hacer otro cambio</a>";
}

?>