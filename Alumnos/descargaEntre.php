<?php 
session_start();
?>
    <?php
        
            include 'conexionA.php';
            
            
            $id_alumno = $conexion->query("SELECT id_alumnos from Alumnos where numero_control = '".$_SESSION['control']."'");
            $rowAl = $id_alumno->fetch_array();
            $idal = $rowAl['id_alumnos'];

            $archivo = $conexion->query("SELECT archivo, tipo, nombre FROM documentos WHERE fk_alumno = '$idal' and clase = 'Entrevista'");
            $rowAl = $id_alumno->fetch_array();
 
if ($rowAl = $archivo->fetch_array()) {
$contenido = $rowAl['archivo'];
$tipo = $rowAl['tipo'];
}
 
header('Location: ../'.$contenido);
/*echo $contenido;
 
            /*
            $sql="SELECT ARCHIVO, TIPO, NOMBRE FROM documentos WHERE fk_alumno = '$id_alumno' and clase = 'Entrevista'";
  
 
            $resultado = mysqli_query($conexion, $sql) or die("Error: no se pudo hacer la consulta.");
  
            while($row = mysqli_fetch_array($resultado)){
                $archivo= $row[0]; //obtener el archivo
                $tipo=$row[1]; //obtener el tipo de archivo
                $nombre=$row[2]; //obtener el nombre del archivo
            }
  
 mysqli_close($conexion);
  
 //header para tranformar la salida en el tipo de archivo que hemos guardado
 header("Content-type: $tipo"); 
 header('Content-Disposition: attachment; filename="'.$nombre.'"');
  
 //imprimir el archivo
 echo $archivo;
}*/
        

 ?>