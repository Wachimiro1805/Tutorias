<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Expediente</title>
    
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
            <li class="nav-item"><a href="Encuesta.php" class="nav-link">REALIZAR ENCUESTA</a>
              <ul>
                <li class="nav-item"><a href="Entrevista.php" class="nav-link">REALIZAR ENTREVISTA</a></li>
               </ul>
            </li>
            <li class="nav-item"><a href="Canalizacion.php" class="nav-link">CANALIZACION</a></li>
            <li class="nav-item"><a href="CambiarDatos.php" class="nav-link">CAMBIAR DATOS</a></li>
            <li class="nav-item"><a href="cambiarContraseña.php" class="nav-link">CAMBIAR CONTRASEÑA</a></li>
            <li class="nav-item"><a href="expediente.php" class="nav-link">VER EXPEDIENTE</a></li>
            <li class="nav-item"><a href="loginA.php" class="nav-link">CERRAR SESIÓN</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
 
    <main>
      <h2 style="color:#021d75;">Expediente</h2>
      <h6>Verifica tus archivos subidos a la plataforma</h6>
      <br>
      <h5>¡Asegurate de subir lor correctos!</h5>
      <form method="post" action="">
      <?php
        
 ?>
      <div class = "">
        <a href='#' onclick="location.href='descargaEntre.php'" style="margin-right: 10px" name ='btnEntrevista'>Ver Entrevista</a>
      </div>
      </form>
      <br></br>
      <div class = "">
        <a href='#' onclick="location.href='descargaEnc.php'" style="margin-right: 10px" name ='btnEntrevista'>Ver Encuesta</a>
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