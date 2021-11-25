
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


    $sql3= "SELECT A.id_alumnos ,A.nombreA,A.numero_control,RA.sesiones_individuales,RA.sesiones_grupales,RA.actividad_integradora as 'Integradora',RA.conferencias,RA.tallares,
    RA.psicologia,RA.asesorias,RA.horas_cumplidas,E.acredito,E.no_acredito,E.deserto,E.acreditado_en_seguimiento,RA.valor_numerico,RA.nivel_dedesempeno FROM alumnos A 
            INNER JOIN reporte_tutorado RA ON RA.fk_alumnos = A.id_alumnos
            INNER JOIN estatus_en_el_programa E ON E.fk_alumno = A.id_alumnos";
            
    $resultado = $conexion->query($sql3);
    $error=mysqli_error($conexion);

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
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
    <script src = '../js/dowloadFile.js'></script>
      <script src = '../js/table2excel.js'></script>
    <link rel="stylesheet" href="../css/estiloD.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
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
  <main>
<h2>Reporte Elabarado por el Tutor: <?php echo "$tutores $apellido $apellido2"  ?></h2>

<h4>Carrera: <?php echo "$carrera"?></h4>
<h4>Grupo: <?php echo "$grupo"?></h4>
    <h3 align="center">Reporte Tutor</h3>
    <table id="tblStocks" style="font-size: 9px;" >
                  <tr style="border: 1px solid #000;text-align: center;">
                    <th rowspan='2' style="border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;">NÚMERO</th>
                    <TH rowspan='2' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>NOMBRE DEL ESTUDIANTE</TH>
                    <TH rowspan='2' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>NO.CONTROL</TH>
                    <TH colspan='2' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>NÚMERO DE SESIONES CON EL TUTOR (HORA/SESIÓN)</TH>
                    <TH colspan='3' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>PARTICIPACIÓN EN ACTIVIDADESDE APOYO (NÚMERO DE HORAS DE LA ACTIVIDAD)</TH>
                    <TH colspan='2' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>CANALIZACIÓN (NÚMERO DE HORA/SESIÓN)</TH>
                    <TH rowspan='2' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>TOTAL DE HORAS CUMPLIDAS</TH>
                    <TH colspan='4' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>ESTATUS EN EL PROGRAMA (MARQUE X EN SOLO UNA COLUMNA)</TH>
                    <TH colspan='2' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>EVALUACIÓN DEL TUTORADO</TH>

                  </tr>
                  <tr style='border: 1px solid #000;text-align: center;'>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>SESIONES INDIVIDUALES</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>SESIONES GRUPALES</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>ACTIVIDAD<br> INTEGRADORA<br> (Max. 4 horas)</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>CONFERENCIAS</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>TALLERES</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>PSICOLOGÍA</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>ASESORÍA</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>ACREDITÓ</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>NO<BR> ACREDITÓ</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>DESERTÓ</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>ACREDITADO EN <BR>SEGUIMIENTO</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>VALOR<BR>NUMERICO</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>NIVEL DE <BR>DESEMPEÑO</td>
                  </tr>          

                <form method="POST">  
                  <!--Datos DE LA TABLA-->
                  <?php while($datos=$resultado->fetch_array()){?>
                    <tr align="center">
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["id_alumnos"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["nombreA"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["numero_control"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["sesiones_individuales"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["sesiones_grupales"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["Integradora"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["conferencias"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["tallares"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["psicologia"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["asesorias"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["horas_cumplidas"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["acredito"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["no_acredito"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["deserto"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["acreditado_en_seguimiento"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["valor_numerico"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["nivel_dedesempeno"]?></td>
                    </tr>
                  <?php } ?>
        

                  </table>
                  <h4>Observaciones: <?php echo "$observaciones"?></h4>
               
                <div style="margin-top: 5%" class = "buton"><button id="boton_descarga"style="padding-left: 10px; padding-right: 10px;" ><span class="material-icons"> arrow_circle_down </span> Descargar Excel</button></div>
                      </div>
                    </div>
                </form>

              </div>


      </div>
    </body>
  </main>



  </body>

</html>

<script>
  document.getElementById("boton_descarga").addEventListener('click',()=>{
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#tblStocks"),"Reporte_tutorados");
  });

</script>