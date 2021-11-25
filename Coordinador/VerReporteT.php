<?php
session_start();
?>
<?php
    require "conexionC.php";
    $conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
    if($conexion->connect_errno){
        echo "Error de conexion de la base datos".$conexion->connect_error;
        exit();
    }

    //$sql = "SELECT * FROM reporte_tutorado;";
    $sql= "SELECT A.id_alumnos ,A.nombreA,A.numero_control,RA.sesiones_individuales,RA.sesiones_grupales,RA.actividad_integradora as 'Integradora',RA.conferencias,RA.tallares,
    RA.psicologia,RA.asesorias,RA.horas_cumplidas,E.acredito,E.no_acredito,E.deserto,E.acreditado_en_seguimiento,RA.valor_numerico,RA.nivel_dedesempeno FROM alumnos A 
            INNER JOIN reporte_tutorado RA ON RA.fk_alumnos = A.id_alumnos
            INNER JOIN estatus_en_el_programa E ON E.fk_alumno = A.id_alumnos";
            
    $resultado = $conexion->query($sql);
    $error=mysqli_error($conexion);
    //echo"Error: $error ";

?>

<!DOCTYPE html>
<html lang = 'estilo'>

  <body style = 'display: flex;'>

    <head>
      <meta charset = 'UTF-8'>
      <meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
      <title>Reportes</title>
      <link rel = 'stylesheet' href = '../css/bootstrap.min.css'>
      <script src = '../js/bootstrap.bundle.min.js'></script>
      <script src = '../js/jquery-3.6.0.js'></script>
      <link rel = 'stylesheet' href = '../css/estiloC.css'>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src = '../js/dowloadFile.js'></script>
      <script src = '../js/table2excel.js'></script>
    </head>

    <header class = 'navbar navbar-dark  navbar-expand-md'>
      <a style = 'margin-left: 10px' class = 'navbar-brand'>INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
      <button class = 'navbar-toggler' data-bs-toggle = 'collapse' data-bs-target = '#navbar'>
        <span class = 'navbar-toggler-icon'></span>
      </button>
      <div class = 'navbar-collapse collapse end-justify' id = 'navbar'>
        <ul class = 'navbar-nav'>
            <li class="nav-item"><a href="GestionarReportes.php" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a  href = '../index.html'><img src = '../Imagenes/Incio/Icono4.png' alt = 'Icono2' width = '250'></a>
    </header>

    <main class = 'mainLogin' style = 'display: inline;padding-right: 40px;padding-top: 10px;'>
      <body style = 'display: flex; padding-right: 40px;'>
              <div class="' style='display:flex;flex-direction: column;padding: 5px;">
                               
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
                <div style="margin-top: 5%" class = "buton"><button id="boton_descarga"style="padding-left: 10px; padding-right: 10px;" ><span class="material-icons"> arrow_circle_down </span> Descargar Excel</button></div>
                      </div>
                    </div>
                </form>

              </div>


      </div>
    </body>
  </main>

    <footer style = 'display: flexbox; position:relative'>
      <div class = footerDatos style = 'display: flex; flex-direction: column;'>
        <h4>Instituto Tecnologico de Tepic</h4>
        <p>'Sabiduria Tecnologica #2595, Lagos del contry.'</p>
        <p>( 311 ) 211 9400</p>
        <p>Tepic, Nayarit. Mexico</p>
        <img class = 'logo5' src = '../Imagenes/Incio/Icono5.png' alt = 'Icono5' width = '200'>
      </div>
    </footer>

  </body>

</html>

<script>
  document.getElementById("boton_descarga").addEventListener('click',()=>{
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#tblStocks"),"Reporte_tutorados");
  });

</script>

