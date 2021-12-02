
<?php
require "conexionCT.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT S.semestre FROM semestre S ORDER by S.pk_semestre DESC;";
$resultado = $conexion->query($sql);
$ano = date("Y");
?>

<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="../css/estiloDe.css">
    
    <style>
.button {
  border: none;
  color: white;
  border-radius: 10px;
  padding: 20px 42px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 40px 50px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #FF3300;
}

.button1:hover {
  background-color: #FF3300;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

</style>


  </head>

<body>
<header class="navbar navbar-dark bg-dark navbar-expand-md">
    <a style="margin-left: 10px" class="navbar-brand">INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbar">
        <ul class="navbar-nav">
        <li class="nav-item"><a href="Departamento.php" class="nav-link">TUTORES/COORDINADORES</a></li>
            <li class="nav-item"><a href="verExp2.php" class="nav-link">VER EXPEDIENTES ALUMNOS</a></li>
            <li class="nav-item"><a href="Departamento2.php" class="nav-link">FINALIZAR SEMESTRE</a></li> 
            <li class="nav-item"><a href="GestionarDatosJD.php" class="nav-link">ACTUALIZAR DATOS DE USUARIO</a></li>
            <li class="nav-item"><a href="loginD.php" class="nav-link">CERRAR SESIÓN</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>


    <main>
 
    <h2>Departamento de Tutorias</h2>
   
    <button class="button button1" onclick="location.href='TerminarSemestre.php'">FINALIZAR SEMESTRE</button>

 <form  action="IniciarSemestre.php" method="POST">
    <button class="button button2" >INICIAR SEMESTRE</button>
    
    <select required name='PER'>
    <option >Agosto - Diciembre</option>
    <option >Enero - Junio</option>
    </select>
    <label style="color:#9A979D;font-weight:500;margin:60px 40px;" > Periodo Actual: <?php echo "$ano"; ?> </label>
 </form>
   

 
 

    
    </main>
   <?php $datos=$resultado->fetch_array()?>
    <label style="color:black;font-weight:500;margin:60px 40px;" > Semestre en Atencion: <?php echo $datos["semestre"]?> </label>
  

    <?php
if (isset($_GET['error'])) {
    echo "Semestre ya ingresado";   
} else {
    // Fallback behaviour goes here
}
?>





</body>
</html>