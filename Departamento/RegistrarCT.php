<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamento</title>
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
            <li class="nav-item"><a href="ReporteCordi.php" class="nav-link">REPORTE</a></li>
            <li class="nav-item"><a href="RegistrarCT.php" class="nav-link">REGISTRAR</a></li>
            <li class="nav-item"><a href="EliminarCT.php" class="nav-link">ELIMINAR</a></li>
            <li class="nav-item"><a href="ActualizarCT.php" class="nav-link">ACTUALIZAR</a></li>
            <li class="nav-item"><a href="Departamento.php" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
    <main>
    <h2 class ="titulo">REGISTRAR COORDINADOR DE TUTORIAS</h2>
    <form action="guardar.php" method="POST">  
    <div class = "IncioSnecio">
     
    <input name = "firstname" class = "NC" type = "text" placeholder="Nombre's">

    <input name = "lasttname" class = "NC" type = "text" placeholder="Apellido Paterno">

    <input name = "lastname2" class = "NC" type = "text" placeholder="Apellido Materno">

    <input name = "correo" class = "NC" type = "mail" placeholder="Correo">
   

       <div class = "rutas">
        <div class = "buton" style="margin-top: 8%"><button type="submit">REGISTRAR</button></div>
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