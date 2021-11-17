<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamento</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
            <li class="nav-item"><a href="ExpedienteC.php" class="nav-link">AGREGAR EXPEDIENTE</a></li>
            <li class="nav-item"><a href="VerExp.php" class="nav-link">VER EXPEDIENTE</a></li>
            <li class="nav-item"><a href="Departamento.php" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
    
    <main>
 
    <h2 class ="titulo">Expedientes Alumnos</h2>
   
    <div style="width: 500px;margin: auto;border: 1px solid blue;padding: 30px;">
            <h4>Subir PDF</h4>
            <form method="post" action="subirPDF.php" enctype="multipart/form-data">
                <table>
  
                    <tr>
                        <td><Label>Alumnos</Label>
          <?php
          include 'conexionCT.php';
          $consulta = "SELECT * FROM alumnos";
          $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
          echo "<select required name = 'alumnos'>";
          while ($columna = mysqli_fetch_array( $resultado ))
          {
              echo "<option value='". $columna['nombreA']."'>";
              echo $columna['nombreA'];
              echo "</option>";      
          }
          echo "<select>";
          ?>
  </td>
                    </tr>

                    <tr>
                        <td colspan="2"><input type="file" name="archivo"></td>
                    <tr>
                        <td><input type="submit" value="subir expediente" name="subir"></td>
  
                    </tr>
                </table>
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