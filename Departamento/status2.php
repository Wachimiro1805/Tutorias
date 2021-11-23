<?php
    include 'conexionCT.php';
    $id=$_GET['id'];

$sql = "UPDATE solicitudes SET status = 'Aceptada' WHERE solicitudes.pk_solicitudes=  $id";
$ejecutar=mysqli_query($conexion, $sql);

if(!$ejecutar){
    header ("Location: Departamento1.php");
   
}else{
    header ("Location: Departamento1.php");
 
}

?>