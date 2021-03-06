<?php 
    session_start();
?>
<?php
    require "conexionA.php";
    $conexionA = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
    if($conexionA->connect_errno){
        echo "Error de conexion de la base datos".$conexionA->connect_error;
        exit();
    }

    $id_alumno = $conexion->query("SELECT id_alumnos from alumnos where numero_control = '".$_SESSION['control']."'");
        $rowAl = $id_alumno->fetch_array();
        if(isset($rowAl['id_alumnos'])){
        $idal = $rowAl['id_alumnos'];
        }

    $sql = "SELECT id_documento, documento, tipo, semestre from documentos where fk_alumno = $idal;";

    $resultado = $conexionA->query($sql);

?>
<!DOCTYPE html>
<html lang="estilo">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alumnos</title>
    
        <link rel="stylesheet" href="../css/Alumno/estiloA.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
                    <li class="nav-item"><a href="Alumno.php" class="nav-link">SOLICITUDES</a></li>
                    <li class="nav-item"><a href="mensajes.php" class="nav-link">MENSAJES</a></li>
                    <li class="nav-item"><a href="expediente.php" class="nav-link">EXPEDIENTE</a></li>
                    <li class="nav-item"><a href="CambiarDatos.php" class="nav-link">CAMBIAR DATOS</a></li>
                    <li class="nav-item"><a href="cambiarContrase??a.php" class="nav-link">CAMBIAR CONTRASE??A</a></li>
                    <li class="nav-item"><a href="loginA.php" class="nav-link">CERRAR SESI??N</a></li>
                </ul>
            </div>
            <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
        </header>
<!--recibe numero de control-->


    <main>
        <h1 align="center">Documentos</h1>
        <div align="center">
        <table width="70%" border="1px" align="center">

            <tr align="center">
                <td>Nombre del documento</td>
                <td>Tipo</td>
                <td>Semestre</td>
                <td>Expediente</td>
            </tr>
        <?php 
            while($datos=$resultado->fetch_array()){
                
        ?>
            <tr align="center">
                <td><?php echo $datos["documento"]?></td>
               <td><?php echo $datos["tipo"]?></td>
               <td><?php  echo $datos["semestre"]?></td>
                <td><a href="descargarE.php?file=<?php echo $datos['documento']?>"><?php echo $datos['documento'];?></a></td>
            </tr>
            <?php   
        }

     ?>
    </table >
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