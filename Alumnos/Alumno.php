<?php
require "conexionA.php";
$conexion = new mysqli("localhost","root","","bd_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT * FROM asesorias;";
$sql2 = "SELECT A.nombreA, A.fecha, A.tipo_de_asesoria, S.status, S.fecha FROM solicitudes S INNER JOIN asesorias A ON(A.id_asesorias = S.fk_asesorias);";
$resultado = $conexion->query($sql);
$resultado2 = $conexion->query($sql2);
?>
<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
    
    <link rel="stylesheet" href="../css/Alumno/estiloA.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
</head>
<body>

  <header class="navbar navbar-dark bg-dark navbar-expand-md">
    <a style="margin-left: 10px" class="navbar-brand">INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbar">
        <ul class="navbar-nav">
           <li class="nav-item"><a href="Alumno.php" class="nav-link">VER SOLICITUDES</a></li>
            <li class="nav-item"><a href="Encuesta.php" class="nav-link">REALIZAR ENTREVISTA</a></li>
            <li class="nav-item"><a href="Canalizacion.php" class="nav-link">CANALIZACION</a></li>
            <li class="nav-item"><a href="CambiarDatos.php" class="nav-link">CAMBIAR DATOS</a></li>
            <li class="nav-item"><a href="loginA.php" class="nav-link">CERRAR SESIÓN</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
<!--recibe numero de control-->


<?php
if (isset($_GET['numero'])) {
    echo $_GET['numero']; 
  
} else {

}
?>
    <main>
    <h1 align="center">Asesorias</h1>
    <table width="70%" border="1px" align="center">

    <tr align="center">
        <td>Nombre de asesoria</td>
        <td>Fecha de inicio</td>
        <td>Tipo de asesoria</td>
        <td>Descripcion</td>
    </tr>
    <?php 
        while($datos=$resultado->fetch_array()){
        ?>
            <tr align="center">
                <td><?php echo $datos["nombreA"]?></td>
                <td><?php echo $datos["fecha"]?></td>
                <td><?php echo $datos["tipo_de_asesoria"]?></td>
                <td><?php echo $datos["descripcion"]?></td>
            </tr>
            <?php   
        }

     ?>
    </table >
    <h1 align="center">Solicitudes</h1>
    <table width="70%" border="1px" align="center">

    <tr align="center">
        <td>Nombre de asesoria</td>
        <td>Fecha de inicio</td>
        <td>Tipo de asesoria</td>
        <td>Estatus</td>
        <td>Fecha</td>
    </tr>
    <?php 
        while($datos=$resultado2->fetch_array()){
        ?>
            <tr align="center">
                <td><?php echo $datos["nombre"]?></td>
                <td><?php echo $datos["fecha"]?></td>
                <td><?php echo $datos["tipo_de_asesoria"]?></td>
                <td><?php echo $datos["status"]?></td>
                <td><?php echo $datos["fecha"]?></td>
            </tr>
            <?php   
        }

     ?>
    </table>
    <h1 align="center">Realizar Solicitud</h1>
    <?php
          include 'conexionA.php';
          $consulta = "SELECT * FROM asesorias";
          $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
          echo "<select required name='alumnos'>";
          while ($columna = mysqli_fetch_array( $resultado ))
          {
             
              echo "<option value='". $columna['nombre']."'>";
              echo $columna['nombre'];
              echo "</option>";      
          }
          echo "<select>";
          mysqli_close( $conexion );
          ?>


<div class = "buton"><button method="POST" style="margin-right: 10px" onclick="location.href='Alumno.php?numero=16401013&tipo=asesoria'" name="btnSolicitar">SOLICITAR</button></div>
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