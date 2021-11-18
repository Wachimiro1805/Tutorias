<?php 
session_start();
?>
    <?php
        
            include 'conexionA.php';
            
            
            $id_alumno = $conexion->query("SELECT id_alumnos from Alumnos where numero_control = '".$_SESSION['control']."'");
            $rowAl = $id_alumno->fetch_array();
            $idal = $rowAl['id_alumnos'];

            $archivo = $conexion->query("INSERT into canalizaciones values ('Solicitada','Canalizacion','no','$idal',1)");
            if ($archivo){
                echo "se ha realizado con exito";
            } else {
                echo "No se ha podido realizar";
            }

 ?>