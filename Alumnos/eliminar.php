<?php 
session_start();
?>

<?php 

require "conexionA.php";
$id_sala = $_GET['id_sala'];
$id_solicitud = $_GET['id_solicitud'];

$sql = "DELETE FROM solicitudes where pk_solicitudes = '$id_solicitud'";
$ejecutar=mysqli_query($conexion, $sql);
if ($ejecutar){  header('Location: mensajes.php');
} else {echo "Ha ocurrido un error";}
?>