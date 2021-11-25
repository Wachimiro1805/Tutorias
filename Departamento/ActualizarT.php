<?php
require "conexionCT.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT id_docente, nombre_docente, apellido_p, apellido_m , correo FROM docentes;";
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
        <li class="nav-item"><a href="ReporteTutor.php" class="nav-link">REPORTE</a></li>
            <li class="nav-item"><a href="AsignadoT.php" class="nav-link">TUTORES ASIGNADOS</a></li>
            <li class="nav-item"><a href="gestionarTutores.php" class="nav-link">REGISTRAR</a></li>
            <li class="nav-item"><a href="EliminarT.php" class="nav-link">ELIMINAR</a></li>
            <li class="nav-item"><a href="ActualizarT.php" class="nav-link">ACTUALIZAR</a></li>
            <li class="nav-item"><a href="Departamento.php" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
    
    <main>
    <form action="actualizat.php" method="POST">  
    <h2 class ="titulo">Actualizar datos Tutor</h2>
    <h3 align="center">Tutores</h3>
    <table width="100%" border="2px" align="center">

    <tr align="center">
        <td>ID</td>
        <td>Nombre</td>
        <td>Apellido Paterno</td>
        <td>Apellido Materno</td>
        <td>Correo Electronico</td>
    </tr>
    <?php 
        while($datos=$resultado->fetch_array()){
        ?>
            <tr align="center">
                <td><?php echo $datos["id_docente"]?></td>
                <td><?php echo $datos["nombre_docente"]?></td>
                <td><?php echo $datos["apellido_p"]?></td>
                <td><?php echo $datos["apellido_m"]?></td>
                <td><?php echo $datos["correo"]?></td>

            </tr>
            <?php   
        }

     ?>
    </table style="margin-bottom: 2%">

    <input name = "id" class = "NC" type = "text" placeholder="ID a Actualizar">
    <input name = "nombre" class = "NC" type = "text" placeholder="Nombre">
    <input name = "apellido_p" class = "NC" type = "text" placeholder="Apellido paterno">
    <input name = "apellido_m" class = "NC" type = "text" placeholder="Apellido materno">
    <input name = "correo" class = "NC" type = "mail" placeholder="Correo Electronico">

       </div>
       
       <div class = "rutas">
    
        <div class = "buton" style="margin-top: 0.1%"><button type="submit">Actualizar</button></div>
 
       </form>
    </main>





    <img class = "logo5" src ="../Imagenes/Incio/Icono5.png" alt ="Icono5" width="200">


</body>
</html>