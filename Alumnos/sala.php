<?php 
session_start();
?>
<?php 
require "conexionA.php";
$id_sala = $_GET['id_sala'];
$fk_docente = $_GET['fk_docente'];
$sqlA = "SELECT * from mensaje where id_sala = '".$id_sala."'";
$sqlB = "SELECT * from sala where id='".$id_sala."'";
$sqlC = "SELECT nombre_docente,apellido_p,apellido_m from docentes where id_docente='".$fk_docente."'";
$sqlD = "SELECT nombreA, apellido_p,apellido_m,id_alumnos from alumnos where numero_control='".$_SESSION['control']."'";
      
$resultado = $conexion->query($sqlA);
$resultadoB = $conexion->query($sqlB);
$resultadoC = $conexion->query($sqlC);
$resultadoD = $conexion->query($sqlD);

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


    <?php 
            while($datosB=$resultadoB->fetch_array()){
                ?>
    <h1 align="center"><?php echo $datosB['motivo']?></h1>

    <?php 
            }
    ?>
        <table width="70%" border="0px" align="center">

        <?php 
            while($datosC=$resultadoC->fetch_array()){
                while($datosD=$resultadoD->fetch_array()){
                    $nombreProf = $datosC['nombre_docente'].' '.$datosC['apellido_p'].' '.$datosC['apellido_m'];
                    $nombreAlum = $datosD['nombreA'].' '.$datosD['apellido_p'].' '.$datosD['apellido_m'];
                    ?>
                    <tr align="center">
                    <td><?php echo $nombreAlum?></td>
                    <td> </td>
                    <td><?php echo $nombreProf?></td>
                    
                </tr>

            <?php
                }
            }
        ?>
            
<?php 
while($datos=$resultado->fetch_array()){
    if ($datos['fk_docente']!=$fk_docente){
?>

<tr align="center">
    <td  class="formulario"><h7><?php echo $datos["fecha"]?></h7>
        <p><?php echo $datos["mensaje"]?></p></td>
    <td></td>
    <td></td>
</tr>
<?php 
   } else { ?>
<tr align="center">
    <td></td>
    <td></td>
    <td  class="formulario"><h7><?php echo $datos["fecha"]?></h7>
        <p><?php echo $datos["mensaje"]?></p></td>
</tr>
<?php
    }
?>

<?php   
}
?>
</table >

<form action="enviarMensaje.php?id_sala=<?php echo $id_sala?>&fk_docente=<?php echo $fk_docente?>" method="post" align="center">
    <input class = "NC" type = "text" placeholder="Mensaje" required name="mensaje">
    <div class = "buton">
            <button name="btnMensaje">Enviar</button>
        </div>
</form>
        
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