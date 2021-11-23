<?php
require "conexionCT.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}else {
  session_start();

  if (empty($_SESSION["control"])) {
     
  }else{
    $usuario = $_SESSION["control"];
    $consulta="SELECT * FROM jefe_departamento WHERE usuario = '$usuario'";
    $resultado = $conexion->query($consulta);
    while($rows=$resultado->fetch_array()){
      $nombre = $rows[1];
      $apellidoM = $rows[2];
      $apellidoP = $rows[3];      
      
      }
    //echo '<h4 style="text-align:center">'. $resultado .' </h4>' ; 
  }
}
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
            <li class="nav-item"><a href="GestionarDatosJD.html" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
    <main>
    <h2 class ="titulo">Actulizar informacion</h2>
    <form action="actualiza.php" method="POST">  
    <div class = "IncioSnecio">

    <input name = "firstname" class = "NC" type = "text" placeholder="<?php  echo "$nombre";?>">

    <input name = "lasttname" class = "NC" type = "text" placeholder="<?php  echo "$apellidoM";?>">

    <input name = "lastname2" class = "NC" type = "text" placeholder="<?php  echo "$apellidoP";?>">
   

       <div class = "rutas">
        <div class = "buton" style="margin-top: 8%"><button type="submit">ACTUALIZAR</button></div>
        </form>
       </div>
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