<?php
require "conexionT.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}else {
  session_start();

  if (empty($_SESSION["usuario"])) {
     
  }else{
    $usuario = $_SESSION["usuario"];
    $consulta="SELECT * FROM docentes WHERE usuario = '$usuario'";
    $resultado = $conexion->query($consulta);
    while($rows=$resultado->fetch_array()){
          $nombre = $rows[1];    
      }
  }
}
 
?>




<!DOCTYPE html>
<html lang='estilo'>

<body style='display: flex;'>

    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Generar reporte</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src='../js/bootstrap.bundle.min.js'></script>
        <script src='../js/jquery-3.6.0.js'></script>
        <link rel='stylesheet' href='../css/estiloT.css'>
    </head>

    <header class='navbar navbar-dark bg-dark navbar-expand-md'>
        <a style='margin-left: 10px' class='navbar-brand'>INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
        <button class='navbar-toggler' data-bs-toggle='collapse' data-bs-target='#navbar'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='navbar-collapse collapse end-justify' id='navbar'>
            <ul class='navbar-nav'>
                <!--<li class = 'nav-item'><a href = 'Tutor.html' class = 'nav-link'>TUTORIAS</a></li>-->
                <li class='nav-item'><a href='Tutorados.php' class='nav-link'>TUTORADOS</a></li>
                <!--<li class = 'nav-item'><a href = 'Canalizacion.html' class = 'nav-link'>CANALIZACION</a></li>-->
                <li class='nav-item'><a href='#' class='nav-link'>SOLICITUDES</a></li>
                <li class='nav-item'><a href='Reporte.php' class='nav-link'>GENERAR REPORTE</a></li>
                <li class='nav-item'><a href='GestionarDatosT.html' class='nav-link'>ACTUALIZAR DATOS DE USUARIO</a>
                </li>
                <li class='nav-item'><a href='loginT.php' class='nav-link'>CERRAR SESI??N</a></li>
            </ul>
        </div>
        <a href='../index.html'><img src='../Imagenes/Incio/Icono4.png' alt='Icono2' width='250'></a>
    </header>

    <main class='mainLogin' style='display: inline;padding-right: 40px;padding-top: 10px;'>

        <body style='display: flex; padding-right: 40px;'>
            <div style=' display: flex ;flex-direction:column;'>
                <div style='display:flex; width:100%;flex-direction: row; background-color: peachpuff; '>
                    <div class='InfoArriba' style='float: left; '>
                        <!-- &&  &&  &&  && & Encabezado Izquierdo &&  &&  &&  && & -->
                        <h6 style='text-align: center;'>Datos Generales</h6>
                        <div class='InfoIzq' style=" margin: 0 auto;padding: 10px;  border: 1px solid black;">
                            <h6>Tutor:</h6>
                            <input type='text' id='Tutor' value="<?php  echo "$nombre";?>">
                            <h6>Carrera:</h6>
                            <input type='text' id='Carrera' value="<?php  echo "$carrera";?>">
                            <!--<h6>Periodo de Atenci??n:</h6>
                  <input type = 'text' id = 'PeriodoAtencion'>-->
                        </div>
                        <!-- &&  &&  &&  && & Encabezado Derecho &&  &&  &&  && & -->
                        <div class='InfoDer' style="margin: 0 auto;padding: 10px;border: 1px solid black;">
                            <h6 style=''>Grupo:</h6>
                            <input style='display:flex;' type='text' id='Grupo' value="<?php  echo "$grupo";?>">
                            <!--<h6 style = ''">Hora:</h6>
                <input   style="' type=' text' id='Hora">-->
                        </div>
                    </div>


                    <div style=" display:flex;width:100%;padding-top: 1.7em;padding-left: 6em;flex-direction: row;">
                        <div style="float: left;">
                            <!-- &&&&&&&&& Encabezado Izquierdo &&&&&&&&& -->
                            <div style=" margin: 0 auto;padding: 10px;border: 1px solid black;">

                                <form action="guardar.php" method="POST">
                                    <h6 style="">Nombre del Estudiante:</h6>
                                    <input name='nombre' type='text'>
                                    <h6 style="">No.Control:</h6>
                                    <input name='nomcontrol' type='text'>
                                    <h6 style="">Sesiones Individuales:</h6>
                                    <input name='sesionIn' type='text'>
                                    <h6 style="">Sesiones Grupales:</h6>
                                    <input name='sesionGr' type='text'>
                                    <h6 style="">Actividad Integradora:</h6>
                                    <input name='actividadIn' type='text'>

                            </div>
                        </div>
                    </div>

                    <div style="display:flex;width:100%;padding-top: 1.7em;padding-left: 1rem;flex-direction: row;">
                        <div style="float: left;">
                            <!-- &&&&&&&&& Encabezado Izquierdo &&&&&&&&& -->
                            <div style=" margin: 0 ;      padding: 10px;      border: 1px solid black;      ">
                                <h6 style="">Conferencias:</h6>
                                <input name='conferencias' type='text'>
                                <h6 style="">Talleres:</h6>
                                <input name='talleres' type='text'>
                                <h6 style="">Psicoolog??a</h6>
                                <input name='psicologia' type='text'>
                                <h6 style="">Asesor??a:</h6>
                                <input name='asesoria' type='text'>
                                <h6 style="">Total de Horas:</h6>
                                <input name='totalHoras' type='text'>
                            </div>
                        </div>
                    </div>

                    <div
                        style="display:flex;width:70%;padding-top: 1.7em;padding-left: 1rem;padding-right: 20%;flex-direction: row;">
                        <div style="float: left;">
                            <!-- &&&&&&&&& Encabezado Izquierdo &&&&&&&&& -->
                            <div style=" margin: 0 ;padding: 10px;border: 1px solid black;">

                                <p>Selecciona uno:<br>
                                <h6 style="font size=4"><input type="radio" name="seguimiento" value="acredito"
                                        required>Acredit??</h6><br>
                                <h6><input type="radio" name="seguimiento" value="noacredito">No acredit??</h6><br>
                                <h6><input type="radio" name="seguimiento" value="deserto">Desert??</h6><br>
                                <h6><input type="radio" name="seguimiento" value="AcreditadoSe">Acreditado en
                                    Seguimiento</h6>
                                </p>
                                <h6 style="">Valor Numerico:</h6>
                                <input name='ValorNu' type='text'>
                                <h6 style="">Nivel de Desempe??o:</h6>
                                <input name='Desempe??o' type='text'>
                            </div>
                        </div>
                    </div>




                    <div style="display:flex;flex-direction:column">
                        <div style="position: relative;right:265px;top: 150px;">
                            <div style="float: left;">
                                <!-- &&&&&&&&& Encabezado Izquierdo &&&&&&&&& -->
                                <div style=" margin: 0 auto;padding: 10px;">
                                    <div class='buton'><button type="submit">GUARDAR INFORMACI??N</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>




                    <div style="padding-right: 150px;position: relative;right:250px;top: 100px; ">
                        <div style="float: left;padding-right: 40px;">
                            <div
                                style=" margin: 0 ;padding: 10px;border: 1px solid black;background-color: lightsalmon;">

                                <table style="font-size: 11px;background-color: navajowhite;">
                                    <tr style="border: 1px solid #000;text-align: center;">
                                        <th colspan="2' style='border: 1px solid #000;padding: 5px;">Evaluaci??n del
                                            tutorado</th>
                                    </tr>
                                    <tr style="border: 1px solid #000;text-align: center;">
                                        <th style="border: 1px solid #000;">Valor numerico</th>
                                        <th style="border: 1px solid #000;">Nivel de desempe??o</th>
                                    </tr>
                                    <tr style="border: 1px solid #000;text-align: center;">
                                        <td style="border: 1px solid #000;">4</td>
                                        <td style="border: 1px solid #000;">Excelente</td>
                                    </tr>
                                    <tr style="border: 1px solid #000;text-align: center;">
                                        <td style="border: 1px solid #000;">3</td>
                                        <td style="border: 1px solid #000;">Notable</td>
                                    </tr>
                                    <tr style="border: 1px solid #000;text-align: center;">
                                        <td style="border: 1px solid #000;">2</td>
                                        <td style="border: 1px solid #000;">Bueno</td>
                                    </tr>
                                    <tr style="border: 1px solid #000;text-align: center;">
                                        <td style="border: 1px solid #000;">1</td>
                                        <td style="border: 1px solid #000;">Suficiente</td>
                                    </tr>
                                    <tr style="border: 1px solid #000;text-align: center;">
                                        <td style="border: 1px solid #000;">0</td>
                                        <td style="border: 1px solid #000;">Insuficiente</td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>



                </div>

                <div class="' style='display:flex;flex-direction: column;padding: 5px;">



                    <table style="font-size: 9px;background-color: sandybrown;">
                        <tr style="border: 1px solid #000;text-align: center;">
                            <th rowspan='2' style='border: 1px solid #000;padding: 5px;'>N??MERO</th>
                            <TH rowspan='2' style='border: 1px solid #000;padding: 5px;'>NOMBRE DEL ESTUDIANTE</TH>
                            <TH rowspan='2' style='border: 1px solid #000;padding: 5px;'>NO.CONTROL</TH>
                            <TH colspan='2' style='border: 1px solid #000;padding: 5px;'>N??MERO DE SESIONES CON EL TUTOR
                                (HORA/SESI??N)</TH>
                            <TH colspan='3' style='border: 1px solid #000;padding: 5px;'>PARTICIPACI??N EN ACTIVIDADESDE
                                APOYO (N??MERO DE HORAS DE LA ACTIVIDAD)</TH>
                            <TH colspan='2' style='border: 1px solid #000;padding: 5px;'>CANALIZACI??N (N??MERO DE
                                HORA/SESI??N)</TH>
                            <TH rowspan='2' style='border: 1px solid #000;padding: 5px;'>TOTAL DE HORAS CUMPLIDAS</TH>
                            <TH colspan='4' style='border: 1px solid #000;padding: 5px;'>ESTATUS EN EL PROGRAMA (MARQUE
                                X EN SOLO UNA COLUMNA)</TH>
                            <TH colspan='2' style='border: 1px solid #000;padding: 5px;'>EVALUACI??N DEL TUTORADO</TH>

                        </tr>
                        <tr style='border: 1px solid #000;text-align: center;'>
                            <td style='border: 1px solid #000;'>SESIONES INDIVIDUALES</td>
                            <td style='border: 1px solid #000;'>SESIONES GRUPALES</td>
                            <td style='border: 1px solid #000;'>ACTIVIDAD<br> INTEGRADORA<br> (Max. 4 horas)</td>
                            <td style='border: 1px solid #000;'>CONFERENCIAS</td>
                            <td style='border: 1px solid #000;'>TALLERES</td>
                            <td style='border: 1px solid #000;'>PSICOLOG??A</td>
                            <td style='border: 1px solid #000;'>ASESOR??A</td>
                            <td style='border: 1px solid #000;'>ACREDIT??</td>
                            <td style='border: 1px solid #000;'>NO<BR> ACREDIT??</td>
                            <td style='border: 1px solid #000;'>DESERT??</td>
                            <td style='border: 1px solid #000;'>ACREDITADO EN <BR>SEGUIMIENTO</td>
                            <td style='border: 1px solid #000;'>VALOR<BR>NUMERICO</td>
                            <td style='border: 1px solid #000;'>NIVEL DE <BR>DESEMPE??O</td>
                        </tr>

                        <form action="eliminact.php" method="POST">
                            <!--Datos DE LA TABLA-->
                            <?php while($datos=$resultado->fetch_array()){?>
                            <tr align="center">
                                <td style='border: 1px solid #000;'><?php echo $datos["id_reporte_tutorado"]?></td>
                                <td style='border: 1px solid #000;'><?php echo $datos["nombre"]?></td>
                                <td style='border: 1px solid #000;'><?php echo $datos["no_control"]?></td>
                                <td style='border: 1px solid #000;'><?php echo $datos["sesiones _individuales"]?></td>
                                <td style='border: 1px solid #000;'><?php echo $datos["sesiones _grupales"]?></td>
                                <td style='border: 1px solid #000;'><?php echo $datos["actividad_integradora"]?></td>
                                <td style='border: 1px solid #000;'><?php echo $datos["conferencias"]?></td>
                                <td style='border: 1px solid #000;'><?php echo $datos["tallares"]?></td>
                                <td style='border: 1px solid #000;'><?php echo $datos["psicologia"]?></td>
                                <td style='border: 1px solid #000;'><?php echo $datos["asesor??as"]?></td>
                                <td style='border: 1px solid #000;'><?php echo $datos["horas_cumplidas"]?></td>

                                <td style='border: 1px solid #000;'><?php echo $datos["acredito"]?></td>
                                <td style='border: 1px solid #000;'><?php echo $datos["no_acredito"]?></td>
                                <td style='border: 1px solid #000;'><?php echo $datos["deserto"]?></td>
                                <td style='border: 1px solid #000;'><?php echo $datos["acreditado_en_seguimiento"]?>
                                </td>


                                <td style='border: 1px solid #000;'><?php echo $datos["valor_numerico"]?></td>
                                <td style='border: 1px solid #000;'><?php echo $datos["nivel_dedesempe??o"]?></td>
                            </tr>
                            <?php } ?>


                    </table>

                    <div style="position: relative;right:250px;top: 50px;">
                        <div style="float: right;">
                            <!-- &&&&&&&&& Encabezado Izquierdo &&&&&&&&& -->
                            <div style=" margin: 0 auto;padding: 10px;">
                                <input name="id" class="NC" type="text" placeholder="ID para eliminar">
                                <div class='buton'><button type="submit">BORRAR INFORMACI??N</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                </div>

                <div>
                    <label for='nombre' style='font-size: 1.5rem;'>Observaciones: </label>
                    <input type='text'>
                </div>
            </div>
        </body>
    </main>

    <footer style='display: flexbox; position:relative'>
        <div class=footerDatos style='display: flex; flex-direction: column;'>
            <h4>Instituto Tecnologico de Tepic</h4>
            <p>'Sabiduria Tecnologica #2595, Lagos del contry.'</p>
            <p>( 311 ) 211 9400</p>
            <p>Tepic, Nayarit. Mexico</p>
            <img class='logo5' src='../Imagenes/Incio/Icono5.png' alt='Icono5' width='200'>
        </div>
    </footer>

</body>

</html>