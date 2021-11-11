<!DOCTYPE html>
<html lang="estilo"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar tus datos</title>
    
    <link rel="stylesheet" href="../css/Alumno/estiloA.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
          <li class="nav-item"><a href="Encuesta.php" class="nav-link">REALIZAR ENTREVISTA</a></li>
          <li class="nav-item"><a href="Canalizacion.php" class="nav-link">CANALIZACION</a></li>
          <li class="nav-item"><a href="CambiarDatos.php" class="nav-link">CAMBIAR DATOS</a></li>
          <li class="nav-item"><a href="loginA.php" class="nav-link">CERRAR SESIÓN</a></li>
      </ul>
    </div>
    <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
  </header>

  <main class="mainLogin">   
    
    <form class="formulario">
      <h2 class ="titulo">Información personal</h2>
      <div class="contenedor-form">
        <div class="input-contenedor">
          <input class = "NC" type = "text" placeholder="Nombre(s)">  
          <input class = "NC" type = "text" placeholder="Apellidos">
          <input class = "NC" type = "phone" placeholder="Telefono">
          <input class = "NC" disabled type = "text" placeholder="Correo">
        </div>
      </div>      
      <div class = "rutas" style="margin-top: 10px">
        <div class = "buton"><button style="margin-right: 10px"  >ACTUALIZAR INFORMACIÓN</button></div>
      </div>
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