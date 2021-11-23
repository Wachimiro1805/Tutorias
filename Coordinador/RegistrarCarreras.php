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
            <li class="nav-item"><a href="RegistrarCarreras.php" class="nav-link">REGISTRAR</a></li>
            <li class="nav-item"><a href="EliminarCarrera.php" class="nav-link">ELIMINAR</a></li>
            <li class="nav-item"><a href="ActualizarCarrera.php" class="nav-link">ACTUALIZAR</a></li>
            <li class="nav-item"><a href="GestionarGruposCarreras.html" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
    <main>
    <form action="guardarCA.php" method="POST" class="formulario">  
    <h2 class ="titulo">REGISTRAR GRUPOS</h2>
    <div class = "IncioSnecio">
    <input name = "NombreCarrera" class = "NC" type = "text" placeholder="Nombre de la carrera">  

    <input name = "Siglas" class = "NC" type = "text" placeholder="Siglas">    
       <div class = "rutas">
        <div class = "buton" style="margin-top: 3%"><button type="submit">REGISTRAR</button></div>
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