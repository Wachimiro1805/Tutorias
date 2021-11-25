<?php
require "conexionCT.php";
$coordi=$_POST['coordinadores'];
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
//para ver el expediente
//id cordi
$sql = "SELECT CT.id_coordinador_tutorias FROM coordinador_de_tutorias CT WHERE CT.nombre='$coordi';";
$result = $conexion->query($sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $id_coordi = $row["id_coordinador_tutorias"];}}else {
      echo "0 results";
    }
//id reporte
$sql2 = "SELECT GRC.pk_reporte_coord FROM genera_reporte_coordi GRC INNER JOIN coordinador_de_tutorias CT ON (CT.id_coordinador_tutorias = GRC.fk_coordi) WHERE CT.id_coordinador_tutorias = $id_coordi ; ";
$result2 = $conexion->query($sql2);
if (mysqli_num_rows($result2) > 0) {
    while($row = mysqli_fetch_assoc($result2)) {
      $id_reporte = $row["pk_reporte_coord"];}}else {
        header ("Location: ReporteCordi.php?error=true");
   
  }

//reporte
  $sql3 = "SELECT D.nombre_docente, D.apellido_p,G.nombre_grupo,C.siglas, RC.desertaron, RC.acreditaron, RC.no_acreditaron, RC.total_de_estudiantes_atendidos, RC.tutorias_individuales, RC.tutoria_grupal, RC.numero_estudiantes_canalizados, PAA.conferencias, PAA.talleres FROM docentes D INNER JOIN grupos G ON(G.id_grupo=D.fk_grupo) INNER JOIN carreras C ON(C.id_carreras = D.fk_carreras) INNER JOIN reporte_coordinador RC ON(RC.fk_docentes = D.id_docente) INNER JOIN participacion_de_actividades_de_apoyo PAA ON(PAA.fk_id_reporte_coordinador = RC.pk_reporteC) INNER JOIN genera_reporte_coordi GRC ON (GRC.pk_reporte_coord = RC.fk_reporte) WHERE GRC.pk_reporte_coord = $id_reporte;";
  $resultado = $conexion->query($sql3);
  
  //semestre atendido y observaciones
  $sql4 = "SELECT GRC.semestre_atendido FROM genera_reporte_coordi GRC INNER JOIN coordinador_de_tutorias CT ON (CT.id_coordinador_tutorias = GRC.fk_coordi) WHERE CT.nombre = '$coordi'; ";
  $result3 = $conexion->query($sql4);
  if (mysqli_num_rows($result3) > 0) {
      while($row = mysqli_fetch_assoc($result3)) {
        $semestreAtendido = $row["semestre_atendido"];}}else {
      echo "0 result ";
    }

    $sql5 = "SELECT GRC.observaciones FROM genera_reporte_coordi GRC INNER JOIN coordinador_de_tutorias CT ON (CT.id_coordinador_tutorias = GRC.fk_coordi) WHERE CT.nombre = '$coordi'; ";
    $result4 = $conexion->query($sql5);
    if (mysqli_num_rows($result4) > 0) {
        while($row = mysqli_fetch_assoc($result4)) {
          $observaciones = $row["observaciones"];}}else {
        echo "0 result ";
      }
    
?> 
<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamento</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="../css/estiloD.css">
  </head>

<body>

  <header class="navbar navbar-dark bg-dark navbar-expand-md">
    <a style="margin-left: 10px" class="navbar-brand">INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="ReporteCordi.php" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
<h2>Reporte Elabarado por el coordinador:</h2>
<h2><?php echo "$coordi"?></h2>
    <main> 

 <h3>Semestre Atendido:</h3>
 <h3><?php echo "$semestreAtendido"?></h3>   
    <h3 align="center">Reporte Coordinador</h3>
    <table width="100%" border="2px" align="center">


    <tr align="center">
        <td>Nombre Tutor</td>
        <td>apellido paterno</td>
        <td>Grupo</td>
        <td>Carrera</td>
        <td>Desertaron</td>
        <td>Acreditaron</td>
        <td>No acreditaron</td>
        <td>Total de estuidantes</td>
        <td>Tutoria individual</td>
        <td>Tutoria grupal</td>
        <td>Estudiantes canlizados</td>
        <td>Conferencias</td>
        <td>Talleres</td>

    </tr>
    <?php 
        while($datos=$resultado->fetch_array()){
        ?>
        <tr align="center">
                <td><?php echo $datos["nombre_docente"]?></td>
                <td><?php echo $datos["apellido_p"]?></td>
                <td><?php echo $datos["nombre_grupo"]?></td>
                <td><?php echo $datos["siglas"]?></td>
                <td><?php echo $datos["desertaron"]?></td>
                <td><?php echo $datos["acreditaron"]?></td>
                <td><?php echo $datos["no_acreditaron"]?></td>
                <td><?php echo $datos["total_de_estudiantes_atendidos"]?></td>
                <td><?php echo $datos["tutorias_individuales"]?></td>
                <td><?php echo $datos["tutoria_grupal"]?></td>
                <td><?php echo $datos["numero_estudiantes_canalizados"]?></td>
                <td><?php echo $datos["conferencias"]?></td>
                <td><?php echo $datos["talleres"]?></td>
      
            </tr>
            <?php   
        }
     ?>
 </table>
<br>
<br>  
 <h4>observaciones: </h4>
 <h4><?php echo "$observaciones"?></h4>  
    </main>



    <footer>
      <div class = footerDatos>     
      <h4>Instituto Tecnologico de Tepic</h4>
      <p>"Sabiduria Tecnologica #2595, Lagos del contry."</p>  
      <p>(311) 211 9400</p>
      <p>Tepic, Nayarit. Mexico</p>
      </div>
    </footer>


    <img class = "logo5" src ="../Imagenes/Incio/Icono5.png" alt ="Icono5" width="200">


</body>
</html>