<?php
require "conexionCT.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
<<<<<<< HEAD
$sql = "SELECT D.id_docente, D.nombre_docente, D.apellido_p, D.apellido_m FROM docentes D;";
$sql2 = "SELECT D.id_docente, D.nombre_docente, D.apellido_p, A.nombreA, A.apellido_p, A.numero_control, G.nombre_grupo,C.siglas  FROM docentes D INNER JOIN asignar_tutor AST ON(AST.fk_docentes=D.id_docente) INNER JOIN alumnos A ON(A.id_alumnos = AST.fk_alumno) INNER JOIN grupos G ON(G.id_grupo= A.fk_grupo) INNER JOIN carreras C ON(C.id_carreras= A.fk_carreras)";
$sql3 = "SELECT D.id_docente, D.nombre_docente, D.apellido_p, D.apellido_m FROM docentes D LEFT JOIN asignar_tutor AST ON (AST.fk_docentes = D.id_docente) WHERE AST.fk_docentes IS NULL;";
=======
$sql = "SELECT id_docente, nombre_docente, apellido_p, apellido_m FROM docentes;";
$sql2 = "SELECT D.id_docente, D.nombre_docente, D.apellido_p, 
                A.nombreA, A.apellido_p, A.numero_control, 
                G.nombre_grupo,
                C.siglas  
                FROM docentes D 
                INNER JOIN asignar_tutor AST ON(AST.fk_docentes=D.id_docente) 
                INNER JOIN alumnos A ON(A.id_alumnos = AST.fk_alumno) 
                INNER JOIN grupos G ON(G.id_grupo= A.fk_grupo) 
                INNER JOIN carreras C ON(C.id_carreras= A.fk_carreras);";
$sql3 = "SELECT D.id_docente, D.nombre_docente, D.apellido_p, D.apellido_m 
            FROM docentes D 
            LEFT JOIN asignar_tutor AST ON (AST.fk_docentes = D.id_docente) 
            WHERE AST.fk_docentes IS NULL;";
>>>>>>> 59916494e9b168dd1b9ecc02286f4cd61319a0cb
$resultado = $conexion->query($sql);
$resultado2 = $conexion->query($sql2);
$resultado3 = $conexion->query($sql3);
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
        <li class="nav-item"><a href="ReporteTutor.php" class="nav-link">REPORTE</a></li>
            <li class="nav-item"><a href="AsignadoT.php" class="nav-link">TUTORES ASIGNADOS</a></li>
<<<<<<< HEAD
            <li class="nav-item"><a href="gestionarTutores.php" class="nav-link">REGISTRAR</a></li>
            <li class="nav-item"><a href="EliminarT.php" class="nav-link">ELIMINAR</a></li>
            <li class="nav-item"><a href="ActualizarT.php" class="nav-link">ACTUALIZAR</a></li>
=======
            <li class="nav-item"><a href="gestionarTutores.php" class="nav-link">AGREGAR TUTORES</a></li>
            <li class="nav-item"><a href="EliminarT.php" class="nav-link">ELIMINAR TUTORES</a></li>
            <li class="nav-item"><a href="ActualizarT.php" class="nav-link">ACTUALIZAR TUTORES</a></li>
>>>>>>> 59916494e9b168dd1b9ecc02286f4cd61319a0cb
            <li class="nav-item"><a href="Departamento.php" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
    
    <main>
   
    <h2 class ="titulo">Tutores</h2>
    <h3 align="center">Todos los Tutores</h3>
    <table width="70%" border="2px" align="center">

    <tr align="center">
        <td>ID</td>
        <td>Nombre</td>
        <td>Apellido Paterno</td>
        <td>Apellido Materno</td>
    </tr>
    <?php 
        while($datos=$resultado->fetch_array()){
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

    <h3 align="center">Tutores Asignados</h3>
    <table width="70%" border="2px" align="center">

    <tr align="center">
        <td>ID</td>
        <td>Nombre Docente</td>
        <td>Nombre Alumno</td>
        <td>Numero de control</td>
        <td>Grupo</td>
        <td>Carrera</td>
    </tr>
    <?php 
        while($datos=$resultado2->fetch_array()){
        ?>
            <tr align="center">
                <td><?php echo $datos["id_docente"]?></td>
                <td><?php echo $datos["nombre_docente"]?></td>
                <td><?php echo $datos["nombreA"]?></td>
                <td><?php echo $datos["numero_control"]?></td>
                <td><?php echo $datos["nombre_grupo"]?></td>
                <td><?php echo $datos["siglas"]?></td>
            </tr>
            <?php   
        }
     ?>
    </table>

    <h3 align="center">Sin Asignacion</h3>
    <table width="70%" border="2px" align="center">

    <tr align="center">
        <td>ID</td>
        <td>Nombre</td>
        <td>Apellido Paterno</td>
        <td>Apellido Materno</td>
    </tr>
    <?php 
        while($datos=$resultado3->fetch_array()){
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
<br>
<br>




</body>
</html>