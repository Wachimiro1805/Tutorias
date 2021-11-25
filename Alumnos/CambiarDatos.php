<?php 
session_start();
?>
<?php 
require "conexionA.php";
$sqlA = "SELECT * from alumnos where numero_control = '".$_SESSION['control']."'";
      
$resultado = $conexion->query($sqlA);
?>

<!DOCTYPE html>
<html lang="estilo"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar tus datos</title>
    
    <link rel="stylesheet" href="../css/Alumno/estiloA.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
         <li class="nav-item"><a href="expediente.php" class="nav-link">VER EXPEDIENTE</a></li>

          <li class="nav-item"><a href="CambiarDatos.php" class="nav-link">CAMBIAR DATOS</a></li>
          <li class="nav-item"><a href="cambiarContraseña.php" class="nav-link">CAMBIAR CONTRASEÑA</a></li>
          <li class="nav-item"><a href="loginA.php" class="nav-link">CERRAR SESIÓN</a></li>
      </ul>
    </div>
    <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
  </header>

  <main class="mainLogin">   
    <div div align="center">
    <form class="formulario" action="" method='post' align="center">
    <?php

if (isset($_POST['guardar'])){
  require "conexionA.php";
  $numero = $conexion ->real_escape_string($_POST['numeroT']);


  $update = $conexion->query("UPDATE alumnos set telefono = '$numero' where numero_control = '".$_SESSION['control']."'");
  if ($update) {echo "Se ha actualizado el número telefonico";}
  else {
    echo "No se pudo actualizar el número telefonico";
  }

}
?>

      <h2 class ="titulo">Información personal</h2>
      <div class="contenedor-form">
      <?php 
            while($datos=$resultado->fetch_array()){
                
        ?>
        <div class="input-contenedor">
          <p>Nombre: <?php echo $datos["nombreA"].' '.$datos["apellido_p"].' '.$datos["apellido_m"]?></p>
          <p>Correo: <?php echo $datos["correo"]?></p>
          <p>Semestre: <?php echo $datos["semestre"]?></p>
          <p>Numero de control: <?php echo $datos["numero_control"]?></p>
          <p>Telefono: <?php if(isset($datos["telefono"])){
            echo $datos["telefono"];
          } else {
            echo "No se ha registrado numero telefonico";
          }?></p>
          <br></br>
        <p>Registra o actualiza tu número telefonico</p>
        <input class = "NC" type = "tel" placeholder="Telefono" required name="numeroT">
          <?php   
        }
     ?>
        </div>
      </div>      
      <div class = "rutas" style="margin-top: 10px">
        <div class = "buton"><button  name="guardar" >ACTUALIZAR INFORMACIÓN</button></div>
      </div>
    </form>
    
    </div>
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