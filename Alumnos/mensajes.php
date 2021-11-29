<?php 
session_start();
?>
<?php 
require "conexionA.php";
$sqlA = "SELECT * from alumnos where numero_control = '".$_SESSION['control']."'";

      
$resultado = $conexion->query($sqlA);


$id_alumno = $conexion->query("SELECT id_alumnos from alumnos where numero_control = '".$_SESSION['control']."'");
$rowAl = $id_alumno->fetch_array();
$idal = $rowAl['id_alumnos'];

$sqlC = "SELECT * from sala where fk_alumno = '$idal'";
$resultadoC = $conexion->query($sqlC);

$id_docente = $conexion->query("SELECT fk_docentes from asignar_tutor where fk_alumno = '$idal'");
$rowdo = $id_docente->fetch_array();
if (isset($rowdo['fk_docentes'])){
$iddoc = $rowdo['fk_docentes'];
} else { echo "No te han asignado tutor";}
$sqlB = "SELECT * from solicitudes where fk_alumnos = '".$idal."'";
$resultadoB = $conexion->query($sqlB);

$docente = $conexion->query("SELECT nombre_docente,apellido_p,apellido_m from docentes where id_docente = '$iddoc'");
$rowd = $docente->fetch_array();
$profNombre = $rowd['nombre_docente'].' '.$rowd['apellido_p'].' '.$rowd['apellido_m'];
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
         <li class="nav-item"><a href="Alumno.php" class="nav-link">SOLICITUDES</a></li>
         <li class="nav-item"><a href="mensajes.php" class="nav-link">MENSAJES</a></li>
         <li class="nav-item"><a href="expediente.php" class="nav-link">EXPEDIENTE</a></li>
          <li class="nav-item"><a href="CambiarDatos.php" class="nav-link">CAMBIAR DATOS</a></li>
          <li class="nav-item"><a href="cambiarContraseña.php" class="nav-link">CAMBIAR CONTRASEÑA</a></li>
          <li class="nav-item"><a href="loginA.php" class="nav-link">CERRAR SESIÓN</a></li>
      </ul>
    </div>
    <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
  </header>

  <main class="mainLogin">   
    <div div align="center">

    <h1 align="center">Solicitudes realizadas</h1>
        <div align="center">
        <table width="70%" border="1px" align="center">

            <tr align="center">
                <td>Fecha</td>
                <td>Estado</td>
                <td>Motivo</td>
                <td>Ver conversación</td>
                <td>Eliminar</td>
            </tr>
        <?php 
            while($datosB=$resultadoB->fetch_array()){
        ?>
            <tr align="center">
                <td><?php echo $datosB["fecha"]?></td>
                <td><?php echo $datosB["status"]?></td>
                <td><?php echo $datosB["motivo"]?></td>
                <td><?php if(isset($datosB["id_sala"])){ ?>
                    <a href="sala.php?id_sala=<?php echo $datosB['id_sala']?>&fk_docente=<?php echo $iddoc?>">Ver conversación
                    <?php }  else {echo "--"; }?></td>
                <td><a href="eliminar.php?id_sala=<?php echo $datosB['id_sala'] ?>&id_solicitud=<?php echo $datosB['pk_solicitudes']?>">Eliminar</td>
            </tr>
            <?php   
        }

     ?>
    </table >

    <h1 align="center">Todos los mensajes</h1>
        <div align="center">
        <table width="70%" border="1px" align="center">

            <tr align="center">
                <td>Docente</td>
                <td>Motivo</td>
                <td>Ver conversación</td>
                <td>Eliminar</td>
            </tr>
        <?php 
            while($datosC=$resultadoC->fetch_array()){
        ?>
            <tr align="center">
                <td><?php echo $profNombre?></td>
                <td><?php echo $datosC["motivo"]?></td>
                <td><?php if(isset($datosC["id"])){ ?>
                    <a href="sala.php?id_sala=<?php echo $datosC['id']?>&fk_docente=<?php echo $iddoc?>">Ver conversación
                    <?php }  else {echo "--"; }?></td>
                <td><a href="eliminar.php?id_sala=<?php echo $datosC['id'] ?>">Eliminar</td>
            </tr>
            <?php   
        }

     ?>
    </table >
    
    
    <br></br>
    <div class = "buton">
        <button  onclick="location.href='tieneTutorM.php'" name="btnMensaje">Mandar mensaje a tu tutor</button>
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