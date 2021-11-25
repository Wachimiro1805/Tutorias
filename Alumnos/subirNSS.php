<?php 
session_start();
?>
<?php
include_once 'conexionA.php';
$nombre = $_FILES['archivoIMSS']['name'];
$tipoA = $_GET['tipo'];
$tipo = $_FILES['archivoIMSS']['type'];
$tamanio = $_FILES['archivoIMSS']['size'];
$ruta = $_FILES['archivoIMSS']['tmp_name'];
$archivo_binario = (file_get_contents($ruta));

// $Alumno= $_POST['alumnos'];

        //consulta para id con del Alumno
        $consultaId = "SELECT id_alumnos, semestre FROM alumnos WHERE numero_control = '".$_SESSION['control']."'";
        $result = $conexion->query($consultaId);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
      
          $id_alumno = $row["id_alumnos"];
          $semestre = $row["semestre"];
        }
      } else {
        echo "0 results";
      }
      $destino = $id_alumno.'-'.$semestre.'-'.$tipoA.'.pdf';

        
      $consultaFk = "SELECT fk_alumno, tipo, semestre from documentos where (fk_alumno = '$id_alumno') and (tipo='$tipoA') and (semestre='$semestre')";
      $resultado = $conexion->query($consultaFk);
      if (mysqli_num_rows($resultado) > 0){
        unlink("//XANNAX/files/$destino");
        file_put_contents("//XANNAX/files/$destino", $archivo_binario);
      } else {
            $sql = "INSERT INTO documentos(fk_alumno,documento,tipo,semestre) VALUES('$id_alumno','$destino','$tipoA','$semestre')";
            $ejecutar=mysqli_query($conexion, $sql);
            file_put_contents("//XANNAX/files/$destino", $archivo_binario);
      }
      header('Location: verArchivos.php');

?>