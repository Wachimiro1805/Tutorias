<?php
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
        $acredito=$_POST['acredito'];
        $noacredito=$_POST['noacredito'];
        $deserto=$_POST['deserto'];
        $AcreditadoSe=$_POST['AcreditadoSe'];
        $ValorNu=$_POST['ValorNu'];
        $Desempeño=$_POST['Desempeño'];

        $sql="INSERT INTO reporte_tutorado VALUES (DEFAULT,'$nombre','$nomcontrol',
                                                           '$sesionIn','$sesionGr',
                                                           '$actividadIn','$conferencias',
                                                           '$talleres','$psicologia','$asesoria',
                                                           '$totalHoras','$acredito',
                                                           '$noacredito','$deserto',
                                                           '$AcreditadoSe','$ValorNu',
                                                           '$Desempeño',DEFAULT)";
        $ejecutar=mysqli_query($conexion, $sql);



    if(!$ejecutar){
        echo"huvo algun error <br> <br> <a href='Reporte.php'>volver a Registrar</a>";
    }else{
        echo"Datos guardado correctamente. <br> <br> <a href='Reporte.php'>Volver a agregar otro Alumno</a>";
    }
  
?>