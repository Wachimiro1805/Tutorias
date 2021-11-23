<?php 
    session_start();
?>
<?php
    require "conexionA.php";
    $conexionA = new mysqli("localhost","root","","bd_tutorias");
    if($conexionA->connect_errno){
        echo "Error de conexion de la base datos".$conexionA->connect_error;
        exit();
    }

    $id_alumno = $conexion->query("SELECT id_alumnos from Alumnos where numero_control = '".$_SESSION['control']."'");
        $rowAl = $id_alumno->fetch_array();
        $idal = $rowAl['id_alumnos'];

    $sql = "SELECT id_documento, nombre, clase, archivo from documentos where fk_alumno = $idal";

    $resultado = $conexionA->query($sql);

?>
<!DOCTYPE html>
<html lang="estilo">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alumnos</title>
    
        <link rel="stylesheet" href="../css/Alumno/estiloA.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
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
                    <li class="nav-item"><a href="Alumno.php" class="nav-link">VER SOLICITUDES</a></li>
                    <li class="nav-item"><a href="expediente.php" class="nav-link">VER EXPEDIENTE</a></li>
                    <li class="nav-item"><a href="Canalizacion.php" class="nav-link">CANALIZACION</a></li>
                    <li class="nav-item"><a href="CambiarDatos.php" class="nav-link">CAMBIAR DATOS</a></li>
                    <li class="nav-item"><a href="cambiarContraseña.php" class="nav-link">CAMBIAR CONTRASEÑA</a></li>
                    <li class="nav-item"><a href="loginA.php" class="nav-link">CERRAR SESIÓN</a></li>
                </ul>
            </div>
            <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
        </header>
<!--recibe numero de control-->


    <main>
        <h1 align="center">Documentos</h1>
        <table width="70%" border="1px" align="center">

            <tr align="center">
                <td>Nombre del documento</td>
                <td>Tipo</td>
                <td>Expediente</td>
            </tr>
        <?php 
            while($datos=$resultado->fetch_array()){
        ?>
            <tr align="center">
                <td><?php echo $datos["nombre"]?></td>
                <td><?php echo $datos["clase"]?></td>
                <td><a href="archivo.php?id=<?php echo $datos['id_documento']?>"><?php echo $datos['nombre'];?></a></td>
            </tr>
            <?php   
        }

     ?>
    </table >
    
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