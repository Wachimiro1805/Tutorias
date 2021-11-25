<?php
///////////
require "conexionCT.php";
$tutores=$_POST['docentes'];
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
//para ver el expediente
//id cordi
$sql = "SELECT D.id_docente FROM docentes D WHERE D.nombre_docente='$tutores';";
$result = $conexion->query($sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $id_docente = $row["id_docente"];}}else {
    echo "0 results";
  }
//id reporte
$sql2 = "SELECT GRT.id_reporte FROM generar_reporte_tutorias GRT INNER JOIN docentes D ON (D.id_docente = GRT.fk_docente) WHERE D.id_docente = $id_docente ;";
$result2 = $conexion->query($sql2);
if (mysqli_num_rows($result2) > 0) {
    while($row = mysqli_fetch_assoc($result2)) {
      $id_reporte = $row["id_reporte"];}}else {
        header ("Location: ReporteTutor.php?error=true");
   
  }

//reporte tutor

  $sql3 = " SELECT A.nombreA, A.apellido_p, A.apellido_m, A.numero_control,RT.sesiones_individuales,RT.sesiones_grupales, RT.actividad_integradora, RT.conferencias, RT.tallares, RT.psicologia, RT.asesorias, RT.horas_cumplidas, EP.acredito, EP.no_acredito, EP.deserto, EP.acreditado_en_seguimiento, RT.valor_numerico, RT.nivel_dedesempeno  FROM alumnos A INNER JOIN reporte_tutorado RT ON (RT.fk_alumnos = A.id_alumnos) INNER JOIN  estatus_en_el_programa EP ON (EP.fk_alumno = A.id_alumnos) INNER JOIN generar_reporte_tutorias GRT ON(GRT.id_reporte = RT.fk_reporte) WHERE GRT.id_reporte =  $id_reporte; ";
  $resultado = $conexion->query($sql3);
  
  //semestre atendido 
  $sql4 = "SELECT GRT.periodo_de_atencion FROM generar_reporte_tutorias GRT INNER JOIN docentes D ON(D.id_docente = GRT.fk_docente) WHERE D.id_docente = $id_docente; ";
  $result3 = $conexion->query($sql4);
  if (mysqli_num_rows($result3) > 0) {
      while($row = mysqli_fetch_assoc($result3)) {
        $semestreAtendido = $row["periodo_de_atencion"];}}else {
      echo "0 result ";
    }
// observaciones
    $sql5 = "SELECT GRT.observaciones FROM generar_reporte_tutorias GRT INNER JOIN docentes D ON(D.id_docente = GRT.fk_docente) WHERE D.id_docente = id_docente; ";
    $result4 = $conexion->query($sql5);
    if (mysqli_num_rows($result4) > 0) {
        while($row = mysqli_fetch_assoc($result4)) {
          $observaciones = $row["observaciones"];}}else {
        echo "0 result ";
      }

//carrera
$sql6 = "SELECT C.nombre_carrera FROM  docentes D INNER JOIN carreras C ON(C.id_carreras = D.fk_carreras) WHERE  D.id_docente = $id_docente; ";
$result5 = $conexion->query($sql6);
if (mysqli_num_rows($result5) > 0) {
    while($row = mysqli_fetch_assoc($result5)) {
      $carrera = $row["nombre_carrera"];}}else {
    echo "0 result ";
  }

  //grupo
$sql7 = "SELECT G.nombre_grupo FROM  docentes D INNER JOIN grupos G ON(D.fk_grupo = G.id_grupo) WHERE D.id_docente = $id_docente ";
$result6 = $conexion->query($sql7);
if (mysqli_num_rows($result6) > 0) {
    while($row = mysqli_fetch_assoc($result6)) {
      $grupo = $row["nombre_grupo"];}}else {
    echo "0 result ";
  }
    
 //apellido p
$sql8 = "SELECT D.apellido_p FROM  docentes D  WHERE D.id_docente = $id_docente ";
$result7 = $conexion->query($sql8);
if (mysqli_num_rows($result7) > 0) {
    while($row = mysqli_fetch_assoc($result7)) {
      $apellido = $row["apellido_p"];}}else {
    echo "0 result ";
  } 

 //apellido m
 $sql9 = "SELECT D.apellido_m FROM  docentes D  WHERE D.id_docente = $id_docente ";
 $result8 = $conexion->query($sql9);
 if (mysqli_num_rows($result8) > 0) {
     while($row = mysqli_fetch_assoc($result8)) {
       $apellido2 = $row["apellido_m"];}}else {
     echo "0 result ";
   }   
?> 

<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamento</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
            <li class="nav-item"><a href="ReporteTutor.php" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
<h2>Reporte Elabarado por el Tutor: <?php echo "$tutores $apellido $apellido2"  ?></h2>

<h4>Carrera: <?php echo "$carrera"?></h4>
<h4>Grupo: <?php echo "$grupo"?></h4>
    <h3 align="center">Reporte Tutor</h3>
    <table width="100%" border="2px" align="center">


    <tr align="center">
        <td>Nombre Alumno</td>
        <td>apellido paterno</td>
        <td>apellido materno</td>
        <td>Numero de control</td>
        <td>Sesiones Indiduales</td>
        <td>Sesiones Grupales</td>
        <td>Actividad Integradora</td>
        <td>Conferencias</td>
        <td>Talleres</td>
        <td>Psicologia</td>
        <td>Asesorias</td>
        <td>Horas cumplidas</td>
        <td>Acredito</td>
        <td>No acredito</td>
        <td>Deserto</td>
        <td>A. Seguimiento</td>
        <td>Valor numerico</td>
        <td>Desemepeño</td>

    </tr>
    </tr>
    <?php 
        while($datos=$resultado->fetch_array()){
        ?>
        <tr align="center">
                <td><?php echo $datos["nombreA"]?></td>
                <td><?php echo $datos["apellido_p"]?></td>
                <td><?php echo $datos["apellido_m"]?></td>
                <td><?php echo $datos["numero_control"]?></td>
                <td><?php echo $datos["sesiones_individuales"]?></td>
                <td><?php echo $datos["sesiones_grupales"]?></td>
                <td><?php echo $datos["actividad_integradora"]?></td>
                <td><?php echo $datos["conferencias"]?></td>
                <td><?php echo $datos["tallares"]?></td>
                <td><?php echo $datos["psicologia"]?></td>
                <td><?php echo $datos["asesorias"]?></td>
                <td><?php echo $datos["horas_cumplidas"]?></td>
                <td><?php echo $datos["acredito"]?></td>
                <td><?php echo $datos["no_acredito"]?></td>
                <td><?php echo $datos["deserto"]?></td>
                <td><?php echo $datos["acreditado_en_seguimiento"]?></td>
                <td><?php echo $datos["valor_numerico"]?></td>
                <td><?php echo $datos["nivel_dedesempeno"]?></td>

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






</body>
</html>