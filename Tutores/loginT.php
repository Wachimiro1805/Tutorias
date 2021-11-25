<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loginT</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="../css/estiloT.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <header class = "barraTareas">
        <div class = "logo">
        <img src ="../Imagenes/Incio/Icono4.png" alt ="Icono2" width="200">
        </div> 

        <h2>Instituto Tecnologico de Tepic</h2>

        <div class = "logo2">   
        <a href="../index.html">Regresar</a>
        <img src ="../Imagenes/Incio/Icono2.png" alt ="Icono2" width="200">
        </div>    
       </header> 

    <main class="mainLogin">   
    
    <form action="validarT.php" method="post" class="formulario">
      <h2 class ="titulo">Iniciar Sesion</h2>
      <div class="contenedor-form">
      <form action="Tutor.html" method='post' class="formulario"> 
        <div class="input-contenedor">
          <span class="material-icons icon"> account_circle </span>
          <input name = "control" class = "NC" type = "text" placeholder="Usuario">  
        </div>  
          <br> 
          <span class="material-icons"> password </span>
          <input name = "pass" class = "NC" type = "password" placeholder="Contraseña"   require>
        </div>
      </div>      
      <div class = "rutas" style="margin-top: 10px">
</form>
        <div class = "buton"><button style="margin-right: 10px" onclick="location.href='Tutor.html'" >INGRESAR</button></div>
      </div>
    </form>
    <?php
if (isset($_GET['error'])) {
    echo "Error al iniciar sesion";   
} else {
    // Fallback behaviour goes here
}
?>
    
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
</div>
</body>
</html>