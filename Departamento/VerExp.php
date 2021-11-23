<?php
require "conexionCT.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");

if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}

$sql = "SELECT D.id_documento, A.nombreA, A.apellido_p, A.numero_control, C.siglas, D.documento FROM alumnos A INNER JOIN documentos D ON(D.fk_alumno=A.id_alumnos ) INNER JOIN carreras C ON(c.id_carreras = A.fk_carreras);";
$resultado = $conexion->query($sql);
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
            <li class="nav-item"><a href="ExpedienteC.php" class="nav-link">AGREGAR EXPEDIENTE</a></li>
            <li class="nav-item"><a href="VerExp.php" class="nav-link">VER EXPEDIENTE</a></li>
            <li class="nav-item"><a href="Departamento.php" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>

    <main>
 

   
    <h3 align="center">Expedientes Alumnos</h3>
    <table width="100%" border="2px" align="center">

    <tr align="center">
        <td>ID Documento</td>
        <td>Nombre Alumno</td>
        <td>Apellido Paterno</td>
        <td>Numero de control</td>
        <td>Carrera</td>
        <td>Expediente</td>
    </tr>
    <?php 
        while($datos=$resultado->fetch_array()){
        ?>
            <tr align="center">
                <td><?php echo $datos["id_documento"]?></td>
                <td><?php echo $datos["nombreA"]?></td>
                <td><?php echo $datos["apellido_p"]?></td>
                <td><?php echo $datos["numero_control"]?></td>
                <td><?php echo $datos["siglas"]?></td>
                <td><a href="archivo.php?id=<?php echo $datos['id_documento']?>" target="_blank"><?php echo $datos['documento'];?></a></td>
            </tr>
            <?php   
        }

     ?>
    </table>
       
          
    <form action="VerExp.php" method="POST">  
    <?php   
          $consulta = "SELECT * FROM carreras";
          $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
          echo "<select required name = 'carreras'>";
          while ($columna = mysqli_fetch_array( $resultado ))
          {
              echo "<option value='". $columna['nombre_carrera']."'>";
              echo $columna['nombre_carrera'];
              echo "</option>";      
          }
          echo "<select>";
          mysqli_close( $conexion );
          ?>
      </form>
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