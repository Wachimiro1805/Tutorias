<?php 
session_start();
?>

<?php 

include_once 'conexionA.php';
$motivo = $_POST['motivo'];
$mensaje = $_POST['mensaje'];
$fk_docente = $_GET['fk_docente'];
date_default_timezone_set('America/Mazatlan');
$hoy = date("Y-m-d H:i:s");

$id_alumno = $conexion->query("SELECT id_alumnos from alumnos where numero_control = '".$_SESSION['control']."'");
$rowAl = $id_alumno->fetch_array();
$idal = $rowAl['id_alumnos'];

$sql = "INSERT INTO sala (motivo,fk_alumno,fk_docente) VALUES('$motivo','$idal','$fk_docente')";
$ejecutar=mysqli_query($conexion, $sql);
if($ejecutar){
//$sql3 = "SELECT id_sala from sala WHERE motivo = '$motivo' and fk_alumno = '$idal'";
$sql3 = "SELECT id from sala where motivo = '$motivo' and fk_alumno = '$idal'";
$ejecutar3=mysqli_query($conexion,$sql3);
if ($ejecutar3){
    $id_sal = $conexion->query("SELECT id from sala where motivo = '".$motivo."' and fk_alumno = '".$idal."'");
$rowsal = $id_sal->fetch_array();
$idsal = $rowsal['id'];
$sql2 = "INSERT INTO mensaje(id_sala, mensaje,fecha,fk_alumno) VALUES ('$idsal','$mensaje','$hoy','$idal')";

$ejecutar2=mysqli_query($conexion, $sql2);
if ($ejecutar2){
    header('Location: sala.php?id_sala='.$idsal.'&fk_docente='.$fk_docente);
} else {echo "No se pudo insertar mensaje";}
} else {echo "no se encontro la sala";}
} else {echo "No se pudo crear sala";}

?>