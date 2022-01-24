<?php 
session_start(); 
$NumCon=$_SESSION['usuario'];
?>

<?php 

 include_once 'conexionC.php'; 

$id_cordi = $conexion->query("SELECT id_coordinador_tutorias from coordinador_de_tutorias where usuario =  '$NumCon'");
$rowC = $id_cordi->fetch_array(); 
$idCordi = $rowC['id_coordinador_tutorias'];

$id_semestre = $_POST['periodo'];

$id_sem = $conexion->query("SELECT * from semestre where pk_semestre  = '$id_semestre'");
$rowS = $id_sem->fetch_array(); 
$semestreA = $rowS['semestre'];

$observaciones = $_POST['descripcion'];

$sql="INSERT INTO genera_reporte_coordi VALUES (DEFAULT,
$idCordi,
$id_semestre,
'$semestreA',
'$observaciones');";

$ejecutar=mysqli_query($conexion, $sql);

if(!$ejecutar){
    echo"Hubo algun error al genenerar el reporte <br> <br> <a href='ReporteC.php'>Regresar</a>";
}else{
   
$id_Reporte = $conexion->query("SELECT * from genera_reporte_coordi where fk_coordi = '$idCordi' and fk_semestre = '$id_semestre'");
$rowR = $id_Reporte->fetch_array();
$idR = $rowR['pk_reporte_coord'];

$docente = $_POST['docente'];
$id_docente = $conexion->query("SELECT id_docente from docentes where nombre_docente =  '$docente'");
$rowD = $id_docente->fetch_array(); 
$idDocente = $rowD['id_docente'];

$desertaron = $_POST['desertaron'];
$acreditaron = $_POST['acreditaron'];
$na = $_POST['na'];
$totalAtendidos = $_POST['totalA'];
$tutoriasIndividuales = $_POST['tutoria_in'];
$tutoriasGrupales = $_POST['tutoria_gr'] ;
$estudiantesCanalizados = $_POST['totalC'];

$sql2="INSERT INTO reporte_coordinador VALUES (DEFAULT,
$idR,
$desertaron,
$acreditaron,
$na,
$totalAtendidos,
$tutoriasIndividuales,
$tutoriasGrupales,
$estudiantesCanalizados,
$idDocente);";

$ejecutar2=mysqli_query($conexion, $sql2);

if(!$ejecutar2){
    echo"Hubo algun error al genenerar el reporte <br> <br> <a href='ReporteC.php'>Regresar</a>";
}else{
$id_ReporteC = $conexion->query("SELECT * from reporte_coordinador where fk_docentes =  '$idDocente'");
$rowRC = $id_ReporteC->fetch_array(); 
$ReporteC = $rowRC['pk_reporteC'];

$conferencias = $_POST['conferencia'];
$talleres = $_POST['taller'];

$sql3="INSERT INTO participacion_de_actividades_de_apoyo VALUES ($conferencias,
$talleres,
$ReporteC);";
$ejecutar3=mysqli_query($conexion, $sql3);

if(!$ejecutar3){
    echo"Hubo algun error al genenerar el reporte <br> <br> <a href='ReporteC.php'>Regresar</a>";
}else{
    echo"Reporte Generado Exitosamente <br> <br> <a href='ReporteC.php'>Regresar</a>";
}  
}
  
}




?>