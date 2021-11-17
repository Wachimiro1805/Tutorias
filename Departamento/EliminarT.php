<?php
require "conexionCT.php";
$conexion = new mysqli("localhost","root","","bd_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT id_docente, nombre_docente, apellido_p, apellido_m FROM docentes;";
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
        <li class="nav-item"><a href="gestionarTutores.php" class="nav-link">AGREGAR TUTORES</a></li>
            <li class="nav-item"><a href="EliminarT.php" class="nav-link">ELIMINAR TUTORES</a></li>
            <li class="nav-item"><a href="ActualizarT.php" class="nav-link">ACTUALIZAR TUTORES</a></li>
            <li class="nav-item"><a href="GestionarUsuarios.html" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
    
    <main>
    <form action="eliminat.php" method="POST">  
    <h2 class ="titulo">Eliminar Tutor</h2>
    <h3 align="center">Tutores</h3>
    <table width="100%" border="2px" align="center">

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

   

       </div>
       
       <div class = "rutas">
        <input name = "id" class = "NC" type = "text" placeholder="ID para eliminar">
        <div class = "buton" style="margin-top: 8%"><button type="submit">Eliminar</button></div>
 
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