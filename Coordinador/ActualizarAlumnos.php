<?php
require "conexionC.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT * FROM alumnos;";
$resultado = $conexion->query($sql);
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
        <li class="nav-item"><a href="gestionarAlumnos.php" class="nav-link">AGREGAR ALUMNOS</a></li>
            <li class="nav-item"><a href="BorrarAlumnos.php" class="nav-link">ELIMINAR ALUMNOS</a></li>
            <li class="nav-item"><a href="ActualizarAlumnos.php" class="nav-link">ACTUALIZAR ALUMNOS</a></li>
            <li class="nav-item"><a href="Coordinador.php" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
    
    <main>
    <form action="actualizarA.php" method="POST" class="formulario">  
    <h2 class ="titulo">Actualizar datos</h2>
    <table width="100%" border="2px" align="center">

    <tr align="center">
        <td>ID</td>
        <td>Nombre</td>
        <td>Apellido Paterno</td>
        <td>Apellido Materno</td>
        <td>No de control</td>
    </tr>
    <?php 
        while($datos=$resultado->fetch_array()){
        ?>
            <tr align="center">
                <td><?php echo $datos["id_alumnos"]?></td>
                <td><?php echo $datos["nombreA"]?></td>
                <td><?php echo $datos["apellido_p"]?></td>
                <td><?php echo $datos["apellido_m"]?></td>
                <td><?php echo $datos["numero_control"]?></td>

            </tr>
            <?php   
        }

     ?>
    </table>
    
    <input style="margin-top:5%" name = "id" class = "NC" type = "text" placeholder="ID a Actualizar">
    <input name = "nombre" class = "NC" type = "text" placeholder="Nombre">
    <input name = "apellido_p" class = "NC" type = "text" placeholder="Apellido paterno">
    <input name = "apellido_m" class = "NC" type = "text" placeholder="Apellido materno">

       </div>
       
       <div class = "rutas">
    
        <div class = "buton" style="margin-top: 8%"><button type="submit">Actualizar</button></div>
 
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