<?php 
session_start();
?>

<?php 
require "conexionA.php";
$id_sala = $_GET['id_sala'];
$mensaje = $_POST['mensaje'];
$fk_docente = $_GET['fk_docente'];

date_default_timezone_set('America/Mazatlan');
$hoy = date("Y-m-d H:i:s");

$id_alumno = $conexion->query("SELECT id_alumnos from alumnos where numero_control = '".$_SESSION['control']."'");
$rowAl = $id_alumno->fetch_array();
$idal = $rowAl['id_alumnos'];

$sql2 = "INSERT INTO mensaje(id_sala, mensaje,fecha,fk_alumno) VALUES ('$id_sala','$mensaje','$hoy','$idal')";
$ejecutar2=mysqli_query($conexion, $sql2);
if ($ejecutar2){
    header('Location: sala.php?id_sala='.$id_sala.'&fk_docente='.$fk_docente);
} else {echo "No se pudo enviar el mensaje";}
?>