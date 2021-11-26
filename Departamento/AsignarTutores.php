<?php
require "conexionCT.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}

 /*docentes */             
$sql2 = "SELECT D.nombre_docente, D.apellido_p, D.apellido_m, C.siglas 
          FROM docentes D 
            INNER JOIN carreras C ON(C.id_carreras = D.fk_carreras);";
 /*tutores */           
$sql3= "SELECT DISTINCT D.nombre_docente, D.apellido_p, D.apellido_m, C.siglas FROM docentes D 
INNER JOIN asignar_tutor ATR ON(D.id_docente = ATR.fk_docentes) 
INNER JOIN carreras C ON (C.id_carreras = D.fk_carreras);";

$sql4 = "SELECT D.id_docente, D.nombre_docente, D.apellido_p, D.apellido_m  
FROM docentes D LEFT JOIN asignar_tutor AST ON (AST.fk_docentes = D.id_docente) 
WHERE AST.fk_docentes IS NULL;";



$resultado2 = $conexion->query($sql2);
$resultado3 = $conexion->query($sql3);
$resultado4 = $conexion->query($sql4);


?>
<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinador</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
  <link rel="stylesheet" href="../css/estiloC.css">
  </head>

<body>

  <header class="navbar navbar-dark bg-dark navbar-expand-md">
    <a style="margin-left: 10px" class="navbar-brand">INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse end-justify" id="navbar">
        <ul class="navbar-nav">
  
        <li class="nav-item"><a href="ReporteTutor.php" class="nav-link">REPORTE</a></li>
            <li class="nav-item"><a href="AsignadoT.php" class="nav-link">TUTORES ASIGNADOS</a></li>
            <li class="nav-item"><a href="AsignarTutores.php" class="nav-link">ASIGNAR</a></li>
            <li class="nav-item"><a href="gestionarTutores.php" class="nav-link">REGISTRAR</a></li>
            <li class="nav-item"><a href="EliminarT.php" class="nav-link">ELIMINAR</a></li>
            <li class="nav-item"><a href="ActualizarT.php" class="nav-link">ACTUALIZAR</a></li>
            <li class="nav-item"><a href="Departamento.php" class="nav-link">REGRESAR</a></li>

        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
 

  <main>
    <h1 align="center">Tutores: </h1>
    <table width="70%" border="2px" align="center">

    <tr align="center">
        <td>Nombre docente</td>
        <td>Apellido Paterno</td> 
        <td>Apellido Materno</td>
        <td>Carrera Tutor</td>
    </tr>
    <?php 
        while($datos=$resultado3->fetch_array()){
        ?>
            <tr align="center">
                <td><?php echo $datos["nombre_docente"]?></td>
                <td><?php echo $datos["apellido_p"]?></td>
                <td><?php echo $datos["apellido_m"]?></td>
                <td><?php echo $datos["siglas"]?></td>
            </tr>
            <?php   
        }

     ?>
    </table> 
    <form action="asignarTutor.php" method="POST" class="formulario"  style="margin-top:2%">  
        <h2 align="center">Asignar Tutor</h2>
        
        <br>
        <div style="margin-left: 40%;">
        <?php
      if (isset($_GET['Error'])) {
        echo "Docente ya asignado";   
    } else {
        // Fallback behaviour goes here
    } ?>

        <h4>Docente</h4>


        <?php
          include 'conexionCT.php';
          $consulta = "SELECT D.id_docente, D.nombre_docente, D.apellido_p, D.apellido_m  
          FROM docentes D LEFT JOIN asignar_tutor AST ON (AST.fk_docentes = D.id_docente) 
          WHERE AST.fk_docentes IS NULL;";
          $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

          echo "<select  required name = 'docente'>";
          while ($columna = mysqli_fetch_array( $resultado ))
          {
              echo "<option value='". $columna['nombre_docente']." '>";
              echo $columna['nombre_docente'], " ", $columna['apellido_p'] , " ", $columna['apellido_m'];
              echo "</option>";      
          }
          echo "<select>";
          mysqli_close( $conexion ); 
          ?>
         
          </div>
        <div class = "rutas"style="margin-top:5%">
          <div class = "buton"><button type="submit"><a style="margin:20px">Asignar</a> </button></div>
        </div>
     
          </form>
          <h3 align="center">Sin Asignacion</h3>
    <table width="70%" border="2px" align="center">

    <tr align="center">
        <td>ID</td>
        <td>Nombre</td>
        <td>Apellido Paterno</td>
        <td>Apellido Materno</td>
    </tr>
    <?php 
        while($datos=$resultado4->fetch_array()){
        ?>
            <tr align="center">
                <td><?php echo $datos["id_docente"]?></td>
                <td><?php echo $datos["nombre_docente"]?></td>
                <td><?php echo $datos["apellido_p"]?></td>
                <td><?php echo $datos["apellido_m"]?></td>

            </tr>
            <?php   
        }
     ?>
    </table>  
  </main>



 



  </div>