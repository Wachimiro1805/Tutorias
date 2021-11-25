<?php 
session_start();
?>
<?php 
$control = $_SESSION['control'];
?>

<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Expediente</title>
    
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
           <li class="nav-item"><a href="Alumno.php" class="nav-link">VER SOLICITUDES</a></li>
           <li class="nav-item"><a href="expediente.php" class="nav-link">VER EXPEDIENTE</a></li>

            <li class="nav-item"><a href="CambiarDatos.php" class="nav-link">CAMBIAR DATOS</a></li>
            <li class="nav-item"><a href="cambiarContraseña.php" class="nav-link">CAMBIAR CONTRASEÑA</a></li>
            <li class="nav-item"><a href="loginA.php" class="nav-link">CERRAR SESIÓN</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
 
    <main>
      <div align=center>
      <h2 style="color:#021d75;">Completa tu información</h2>
      <h6>Descarga los archivos y subelos con todos tus datos</h6>
      <br>
      <form method="post" action="">
      <?php
        
 ?>
      <div class = "">
        <a href='#' onclick="location.href='descargarE.php?file=Ficha.pdf'" style="margin-right: 10px" name ='btnFicha'>Descargar ficha de identificación</a>
      </div>
      </form>
      
      <div class = "">
        <a href='#' onclick="location.href='descargarE.php?file=Entrevista.pdf'" style="margin-right: 10px" name ='btnEntrevista'>Descargar entrevista</a>
      </div>
      <br>

      <h2 style="color:#021d75;">Sube tus archivos</h2>
      <form method="post" action="subirPDF.php?tipo=Ficha" enctype="multipart/form-data">
      <?php /*
        if(filter_input(INPUT_POST, 'btnGuardar')){

        $archivo_nombre=$_FILES['archivoF']['name'];
        $archivo_tipo = $_FILES['archivoF']['type'];
        $archivo_temp = $_FILES['archivoF']['tmp_name'];
   
        require "conexionA.php";
  
        $archivo_binario = (file_get_contents($archivo_temp));

        $id_alumno = $conexion->query("SELECT id_alumnos from Alumnos where numero_control = '".$_SESSION['control']."';");
        $rowAl = $id_alumno->fetch_array();       
        $idal = $rowAl['id_alumnos'];       
        $existe = $conexion->query("SELECT id_documento from documentos where fk_alumno = '$idal' and clase = 'Ficha';");
        $rowEx = $existe->fetch_array();
        if(isset($rowEx['id_documento'])){
        $comproba = $rowEx['id_documento'];
        }
        $direccion = "Alumnos/files/{$archivo_nombre}";
        if (empty($comproba)){
          $insercion = $conexion ->query("INSERT INTO documentos VALUES (null, '$archivo_nombre', '$archivo_tipo', $direccion, 'Ficha', '$idal');");
          file_put_contents("files/{$archivo_nombre}", $archivo_binario);
          if ($insercion) {echo "Se ha subido el archivo";}
              else {
                  echo "No se ha podido subir el archivo";
              }
          } else {
              $insercion = $conexion ->query("UPDATE documentos SET nombre = '$archivo_nombre', tipo = '$archivo_tipo', archivo = '$direccion' where fk_alumno='$idal' and clase = 'Ficha ' ;");
              file_put_contents("files/{$archivo_nombre}", $archivo_binario);
              if ($insercion) {echo "Se ha actualizado el archivo";}
              else {
                  echo "No se ha podido actualizar el archivo";
              }
          }
      }
    */
 ?>
      <div>
      <label for="archivoF">Subir ficha</label>
        <input type="file" name="archivoF" require></input>
        
        <input class="buton" type="submit" name="btnGuardar" value="Guardar" />
        
        </div>
    </form>

    <form method="post" action="subirPDF.php?tipo=Entrevista" enctype="multipart/form-data">

 <label for="archivoF">Subir Entrevista</label>
        <input type="file" name="archivoF" require></input>
        <input class="button" type="submit" name="btnGuardarE" value="Guardar" />
    </form>


    <form method="post" action="subirNSS.php?tipo=NSS" enctype="multipart/form-data">


    <label for="archivoF">Subir vigencia de derechos del IMSS</label>
        <input type="file" name="archivoIMSS" require></input>
        <input class="button" type="submit" name="btnGuardarI" value="Guardar" />

      </form>

    <a href='#' onclick="location.href='verArchivos.php'" style="margin-right: 10px">Verificar tus archivos</a>

    
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