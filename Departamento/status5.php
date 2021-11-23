<?php
    include 'conexionCT.php';
    $id=$_GET['id'];

$sql = "UPDATE solicitudes SET status = 'Negada' WHERE solicitudes.pk_solicitudes=   $id";
$ejecutar=mysqli_query($conexion, $sql);

if(!$ejecutar){
    header ("Location: Departamento2.php");
 
}else{
    header ("Location: Departamento2.php");
}

?>