<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="estilo"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    
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
          <li class="nav-item"><a href="Canalizacion.php" class="nav-link">CANALIZACION</a></li>
          <li class="nav-item"><a href="CambiarDatos.php" class="nav-link">CAMBIAR DATOS</a></li>
          <li class="nav-item"><a href="cambiarContraseña.php" class="nav-link">CAMBIAR CONTRASEÑA</a></li>
          <li class="nav-item"><a href="loginA.php" class="nav-link">CERRAR SESIÓN</a></li>
      </ul>
    </div>
    <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
  </header>

  <?php
if (isset($_GET['numero'])) {
    echo $_GET['numero']; 
/*
    if (isset($_GET['tipo'])) {
       echo $_GET['tipo'];
       echo $_POST['alumnos'];
*/

  
} else {
    // Fallback behaviour goes here
}
?>


  <main class="mainLogin">   
  

    <h2 class ="titulo">Cambiar contraseña</h2>
    <div class = >
    <form action="" method='post' >   

    <?php

  if (isset($_POST['btnIngresar'])){
      require "conexionA.php";
      $passActual = $conexion->real_escape_string($_POST['contraseñaV']);
      $pass1 = $conexion->real_escape_string($_POST['contraseña']);
      $pass2 = $conexion->real_escape_string($_POST['Rcontraseña']);

      /*$passActual = md5($passActual)
      $pass1 = md5($pass1)
      $pass2 = md5($pass2)*/

      $sqlA = $conexion->query("SELECT contrasena from alumnos where numero_control = '".$_SESSION['control']."'");
      $rowA = $sqlA->fetch_array();

      if ($rowA['contrasena']==$passActual){

        if ($pass1 == $pass2){
            $update = $conexion->query("UPDATE alumnos set contrasena = '$pass1' where numero_control = '".$_SESSION['control']."'");
            if ($update) {echo "Se ha actualizado la contraseña";}
        }
        else {
          echo "Las contraseñas no coinciden";
        }
      }
      else {
        echo "Contraseña actual no coincide";
      }
  }

  ?>

        <div >
        
        
        <input name = "contraseñaV"  
        class = "NC" type = "text" 
        placeholder="Contraseña anterior" 
        require>
        </div>

        <input name = "contraseña"  
        class = "NC" type = "text" 
        placeholder="Nueva contraseña" 
        require>
       

        <input name = "Rcontraseña"  
        class = "NC" type = "text" 
        placeholder="Repetir contraseña" 
        require>
         
        
    </div>

       <div class = "rutas">
        <div class = "buton"><button style="margin-right: 10px" onclick="location.href='Alumno.php'" name="btnIngresar">Realizar cambio</button></div>
        </form>  
      </div>
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