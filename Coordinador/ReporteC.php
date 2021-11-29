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

    //$sql1 = "SELECT * FROM reporte_coordinador;";
    $sql= "SELECT D.id_docente,D.nombre_docente,G.nombre_grupo,C.siglas  FROM docentes D 
            INNER JOIN reporte_coordinador RC ON RC.fk_docentes = D.id_docente
            INNER JOIN grupos G ON G.id_grupo = D.fk_grupo
            INNER JOIN carreras C ON C.id_carreras = D.fk_carreras";
            
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
      <title>Reporte Coordinador</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="../css/estiloC.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>

    <header class="navbar navbar-dark bg-dark navbar-expand-md">
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
                    <TH rowspan='2' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>NOMBRE DEL DOCENTE</TH>
                    <TH rowspan='2' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>GRUPO</TH>
                    <TH rowspan='2' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>CARRERA </TH>
                    <TH colspan='3' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>NÚMERO DE ESTUDIANTES ATENDIDOS</TH>
                    <TH rowspan='2' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>TOTAL DE ESTUDIANTES ATENDIDOS</TH>

                    <TH colspan='2' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>N° DE SESIONES EN EL SEMESTRE</TH>
                    <TH rowspan='2' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>NÚMERO DE ESTUDIANTES CANALIZADOS</TH>
                    <TH colspan='5' style='border: 1px solid #ddd;padding: 5px; background-color: #294c67; color:white;'>PARTICIPACION EN ACTIVIDADES DE APOYO (NÚMERO DE TUTORADOS)</TH>

                  </tr>
                  <tr style='border: 1px solid #000;text-align: center;'>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>DESERTARON</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>ACREDITARON</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>NO ACREDITARON</td>
                    <td style='padding: 2px; background-color: #294c67; color:white;'>TUTORIA INDIVIDUAL</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>TUTORIA GRUPAL</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>        </td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>        </td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>        </td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>CONFERENCIAS</td>
                    <td style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;'>TALLERES</td>
                  </tr>          

                <form method="POST" action="generarReporteC.php">  
                  <!--Datos DE LA TABLA-->
                  <?php while($datos=$resultado->fetch_array()){?>
                    <tr align="center">
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["id_docente"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["nombre_docente"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["nombre_grupo"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><?php echo $datos["siglas"]?></td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><input name = "desertaron" id="desertaron"  class = "NC" type = "text">  </td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><input name = "acreditaron" id="na"  class = "NC" type = "text">  </td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><input name = "na" id="na" class = "NC" type = "text">  </td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><input name = "totalA" id="totalA" class = "NC" type = "text">  </td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><input name = "tutoria_in" id="tutoria_in"  class = "NC" type = "text">  </td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><input name = "tutoria_gr" id="tutoria_gr"  class = "NC" type = "text">  </td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><input name = "totalC" id="totalC"   class = "NC" type = "text">  </td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><input name = "" id=""  class = "NC" type = "text" disabled readonly>  </td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><input name = "" id=""  class = "NC" type = "text" disabled readonly>  </td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><input name = "" id=""  class = "NC" type = "text" disabled readonly>  </td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><input name = "conferencia" id="conferencia"  class = "NC" type = "text">  </td>
                      <td style='border: 1px solid #000;padding: 2px;font-size: 1rem;'><input name = "taller" id="taller"  class = "NC" type = "text">  </td>

                    </tr>
                  <?php } ?>


                </table>
                <div align="center" class="row-input" >
                  <div class="formulario">  
                  <div class = "contenedor-form">
                  <h5 style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;width: 90%;'>Estutiantes atendidos</h5>   
                    <div style="flex-direction: row;justify-content:space-evently; width: 90%;align-items: center; margin-bottom:10px;" >
                    <input style="font-size: 20px;padding: 5px;border-radius: 10px;width: 30%;" name = "desertaron" id="desertaron" type = "text" placeholder=" Desertaron">
                    <input style="font-size: 20px;padding: 5px;border-radius: 10px;width: 30%;" name = "acreditaron" id="acreditaron"  class = "NC-2" type = "text" placeholder="Acreditaron">
                    <input style="font-size: 20px;padding: 5px;border-radius: 10px;width: 30%;" name = "na" id="na" class = "NC-2" type = "text" placeholder=" No Acreditaron">
                    </div>
                    <input name = "totalA" id="totalA" class = "NC" type = "text" placeholder="Total de estudiantes atendidos">

                    <h5 style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;width: 90%;'>N° de sesiones en el semestre</h5>   
                    <div style="flex-direction: row;justify-content:space-evently; width: 90%;align-items: center; margin-bottom:10px;" >
                    <input style="font-size: 20px;padding: 5px;border-radius: 10px;width: 30%;" name = "tutoria_in" id="tutoria_in" type = "text" placeholder="Tutoria individual">
                    <input style="font-size: 20px;padding: 5px;border-radius: 10px;width: 30%;" name = "tutoria_gr" id="tutoria_gr"  class = "NC-2" type = "text" placeholder="Tutoria grupal">
                    </div>
                    <input  name = "totalC" id="totalC" class = "NC" type = "text" placeholder="Número de estudiantes canalizados">
                    
                    <div class="row-input"> 
                    <h5 style='border: 1px solid #ddd;padding: 2px; background-color: #294c67; color:white;width: 90%;'>Periodo</h5>   
                    <?php
                      include 'conexionC.php';
                      $consulta = "SELECT DISTINCT * FROM semestre;";
                      $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                      echo "<select class='NC'  required name = 'periodo'>";
                      while ($columna = mysqli_fetch_array( $resultado ))
                      {
                          echo "<option value='". $columna['pk_semestre']."'>";
                          echo $columna['semestre'];
                          echo "</option>";      
                      }
                      echo "<select>";
                      mysqli_close( $conexion ); 
                    ?>   
                    </div> 

                      <div class="row-input">
                      <textarea name = "descripcion" cols = "30" rows="5" placeholder=" Escribe tus comentarios" class="NC"></textarea>
                      </div>
                
                    </div>
                  </div>                  
                </div>                   
                <div style="margin-top: 5%" class = "buton"><button style="padding-left: 10px; padding-right: 10px;" type="submit" ><span class="material-icons"> check_circle </span> Enviar Reporte</button></div>
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


