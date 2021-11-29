<?php


$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}

    include 'conexionT.php';
        //recuperar las variables
        $nombre=$_POST['nombre'];
        $nomcontrol=$_POST['nomcontrol'];
        $sesionIn=$_POST['sesionIn'];
        $sesionGr=$_POST['sesionGr'];
        $actividadIn=$_POST['actividadIn'];
        $conferencias=$_POST['conferencias'];
        $talleres=$_POST['talleres'];
        $psicologia=$_POST['psicologia'];
        $asesoria=$_POST['asesoria'];
        $totalHoras=$_POST['totalHoras'];
        $acredito=$_POST['seguimiento'];

        $ValorNu=$_POST['ValorNu'];
        $Desempeño=$_POST['Desempeño'];

        $sql0="SELECT id_alumnos from alumnos where numero_control = '".$nomcontrol."';";

        $resultado2 = $conexion->query($sql0);

        $result = $conexion->query($sql2);
        if (mysqli_num_rows($resultado2) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $id_alumnos = $row["id_alumnos"];}}else{
            echo "0 results";
          }
        echo " $id_alumnos ";


        $error=mysqli_error($conexion);
        echo"Error: $error ";

        $sql="INSERT INTO reporte_tutorado VALUES (DEFAULT,'$sesionIn','$sesionGr',
                                                    '$actividadIn','$conferencias',
                                                    '$talleres','$psicologia','$asesoria',
                                                    '$totalHoras','$ValorNu',
                                                    '$Desempeño','$id_alumnos')";

        $acredito=$_POST['seguimiento'];
        if($acredito=='acredito'){
            $sql1="INSERT INTO reporte_tutorado VALUES ('x','','','','$id_alumnos')";
        }else if($acredito=='noacredito'){
            $sql1="INSERT INTO reporte_tutorado VALUES ('','x','','','$id_alumnos')";
        }else if($acredito=='deserto'){
            $sql1="INSERT INTO reporte_tutorado VALUES ('','','x','','$id_alumnos')";
        }else if($acredito=='AcreditadoSe'){
            $sql1="INSERT INTO reporte_tutorado VALUES ('','','','x','$id_alumnos')";
        }                                       
        $ejecutar=mysqli_query($conexion, $sql1);

        $sql="INSERT INTO reporte_tutorado VALUES (DEFAULT,'$nombre','$nomcontrol',
                                                           '$sesionIn','$sesionGr',
                                                           '$actividadIn','$conferencias',
                                                           '$talleres','$psicologia','$asesoria',
                                                           '$totalHoras','$acredito',
                                                           '$noacredito','$deserto',
                                                           '$AcreditadoSe','$ValorNu',
                                                           '$Desempeño',DEFAULT)";

        


    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='Reporte.php'>volver a Registrar</a>";
    }else{
        echo"Datos guardado correctamente. <br> <br> <a href='Reporte.php'>Volver a agregar otro Alumno</a>";
    }

?>