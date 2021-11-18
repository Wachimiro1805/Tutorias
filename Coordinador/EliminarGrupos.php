<?php
require "conexionC.php";
$conexion = new mysqli("localhost","root","","bd_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT * FROM grupos;";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinador</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
            <li class="nav-item"><a href="RegistrarGrupos.php" class="nav-link">REGISTRAR</a></li>
            <li class="nav-item"><a href="EliminarGrupos.php" class="nav-link">ELIMINAR</a></li>
            <li class="nav-item"><a href="ActualizarGrupo.php" class="nav-link">ACTUALIZAR</a></li>
            <li class="nav-item"><a href="GestionarGruposCarreras.html" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
    
    <main>

    <form class="formulario"   method="POST">   
    <h3 align="center">Grupos</h3>
    <table width="100%" border="2px" align="center">

    <tr align="center">
        <td>ID</td> 
        <td>Nombre</td>
    </tr>
    <?php 
        while($datos=$resultado->fetch_array()){
        ?>
            <tr align="center"> 
                <td ><?php echo $datos["id_grupo"]?></td> 
                <td><?php echo $datos["nombre_grupo"]?></td> 
                <td> <a style="margin-top: 5%" class="btn btn-primary" href="eliminarG.php?id=<?php echo $datos['id_grupo']?>"> <span class="material-icons"> delete </span></a></td>

            </tr>
            <?php   
        }

     ?>
    </table>

       </div>
 
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