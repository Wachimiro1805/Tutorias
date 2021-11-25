
<?php
require "conexionCT.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT S.pk_solicitudes ,A.nombreA, A.apellido_p, A.numero_control, C.siglas, G.nombre_grupo, AR.nombre, S.fecha, AR.fecha, AR.tipo_de_asesoria, S.status FROM alumnos A  INNER JOIN  carreras C ON(C.id_carreras = A.fk_carreras) INNER JOIN grupos G ON(G.id_grupo = A.fk_grupo) INNER JOIN solicitudes S ON(S.fk_alumnos= A.id_alumnos) INNER JOIN asesorias AR ON(AR.id_asesorias= S.fk_asesorias);";
$resultado = $conexion->query($sql);

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
            <li class="nav-item"><a href="GestionarDatosJD.php" class="nav-link">ACTUALIZAR DATOS DE USUARIO</a></li>
            <li class="nav-item"><a href="loginD.php" class="nav-link">CERRAR SESIÓN</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>


    <main>
    <div class ="TituloIncio">
    <h2>Departamento de Tutorias</h2>
    </div> 

    <div class="contenido_Inicio">


    <div class = "rutasInicio">
    
    <div class = "buton"><button onclick="location.href='ReporteCordi.php'" >COORDINADORES DE TUTORIAS</button></div>
    
    <br>
    <div class = "buton"><button onclick="location.href='reporteTutor.php'" >TUTORES</button></div>
    <br>
 
    </div>
    </div>
    </main>
 


    <footer>

    </footer>


    <img class = "logo5" src ="../Imagenes/Incio/Icono5.png" alt ="Icono5" width="200">


</body>
</html>