<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Encuesta</title>
    
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
            <li class="nav-item"><a href="Encuesta.php" class="nav-link">REALIZAR ENCUESTA</a>
              <ul>
                <li class="nav-item"><a href="Entrevista.php" class="nav-link">REALIZAR ENTREVISTA</a></li>
               </ul>
            </li>
            <li class="nav-item"><a href="Canalizacion.php" class="nav-link">CANALIZACION</a></li>
            <li class="nav-item"><a href="CambiarDatos.php" class="nav-link">CAMBIAR DATOS</a></li>
            <li class="nav-item"><a href="cambiarContraseña.php" class="nav-link">CAMBIAR CONTRASEÑA</a></li>
            <li class="nav-item"><a href="expediente.php" class="nav-link">VER EXPEDIENTE</a></li>
            <li class="nav-item"><a href="loginA.php" class="nav-link">CERRAR SESIÓN</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
 
    <main>
      <h2 style="color:#021d75;">Encuesta de nuevo ingreso</h2>
      <h6>Para el departamento es de suma importancia saber informacion basica de sus alumnos, por lo cual se realiza una pequeña encuesta con el fin de recabar informacion para el posterior seguimiento del alumno</h6>
      <br>
      <h5>Por favor, llena la siguiente encuesta  y manda tus respuestas para poder conocerte y tener informacion que nos servira en un futuro</h5>
      <div class = "buton">
        <button onclick="location.href='descargarE.php?file=Ficha.pdf'" style="margin-right: 10px">Descargar Ficha</button>
      </div>
      <br></br>
      <h5>¿Ya completaste la encuesta?</h5>
      <h5>Sube tus respuestas</h5>
      <form method="post" action="" enctype="multipart/form-data">
      <?php
        if(filter_input(INPUT_POST, 'btnGuardar')){

        $archivo_nombre=$_FILES['archivo']['name'];
        $archivo_tipo = $_FILES['archivo']['type'];
        $archivo_temp = $_FILES['archivo']['tmp_name'];
   
        require "conexionA.php";
  
        $archivo_binario = (file_get_contents($archivo_temp));

        $id_alumno = $conexion->query("SELECT id_alumnos from Alumnos where numero_control = '".$_SESSION['control']."'");
        $rowAl = $id_alumno->fetch_array();
        $idal = $rowAl['id_alumnos'];
        $existe = $conexion->query("SELECT id_documento from documentos where fk_alumno = '$idal' and clase = 'Encuesta'");
        $rowEx = $existe->fetch_array();
        $comproba = $rowEx['id_documento'];
        $direccion = "Alumnos/files/Encuestas/{$idal}-{$archivo_nombre}";
        if (empty($comproba)){
          $insercion = $conexion ->query("INSERT INTO documentos VALUES (null, '$archivo_nombre', '$archivo_tipo', $direccion, 'Encuesta', '$idal')");
          file_put_contents("files/Encuestas/{$idal}-{$archivo_nombre}", $archivo_binario);
          if ($insercion) {echo "Se ha subido el archivo";}
              else {
                  echo "No se ha podido subir el archivo";
              }
          } else {
              $insercion = $conexion ->query("UPDATE documentos SET nombre = '$archivo_nombre', tipo = '$archivo_tipo', archivo = '$direccion' where fk_alumno='$idal' and clase = 'Encuesta ' ");
              file_put_contents("files/Encuestas/{$idal}-{$archivo_nombre}", $archivo_binario);
              if ($insercion) {echo "Se ha actualizado el archivo";}
              else {
                  echo "No se ha podido actualizar el archivo";
              }
          }
      }
 ?>
        <input type="file" name="archivo" ></input><br/><br/>
        <input type="submit" name="btnGuardar" value="Guardar" />
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