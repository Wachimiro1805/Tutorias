<?php
session_start();
?>

<?php
require "conexionA.php";
$conexionA = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexionA->connect_errno){
    echo "Error de conexion de la base datos".$conexionA->connect_error;
    exit();
}

$id_alumno = $conexion->query("SELECT id_alumnos from alumnos where numero_control = '".$_SESSION['control']."'");
        $rowAl = $id_alumno->fetch_array();
        $idal = $rowAl['id_alumnos'];



        $existe = $conexion->query("SELECT fk_docentes from asignar_tutor where fk_alumno = '$idal'");
        $rowEx = $existe->fetch_array();
        if(isset($rowEx['fk_docentes'])){
            $locacion = 'Location: empezarChat.php?fk_docente='.$rowEx['fk_docentes'].'';
              header($locacion);
        } else {
            echo "Disponible unicamente al tener asignado un tutor";
            header('Location: mensajes.php');
        }
?>