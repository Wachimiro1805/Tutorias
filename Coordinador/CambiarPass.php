
<!DOCTYPE html>
<html lang="estilo"> 
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualiza tus datos</title>
    
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
      <li class="nav-item"><a href="GestionarDatosC.html" class="nav-link">REGRESAR</a></li>
      </ul>
    </div>
    <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
  </header>

  <main class="mainLogin">   
    
    <form class="formulario" action="actualizarPass.php" method="POST">
      <h2 class ="titulo">Actualizar contraseña</h2> 
      <div class="contenedor-form">
        <div class="input-contenedor">
          <input name = "contra1" class = "NC" type = "password" placeholder="Contraseña Actual">  
          <input name = "contra2" class = "NC" type = "password" placeholder="Contraseña nueva">
          <input name = "contra3" class = "NC" type = "password" placeholder="Confirma tu nueva contraseña">

        </div>
      </div>      
      <div class = "rutas" style="margin-top: 10px">
        <div class = "buton"><button style="margin-right: 10px" type="submit" >ACTUALIZAR INFORMACIÓN</button></div>
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