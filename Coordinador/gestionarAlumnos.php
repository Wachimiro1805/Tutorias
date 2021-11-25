<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinador</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
            <li class="nav-item"><a href="gestionarAlumnos.php" class="nav-link">AGREGAR ALUMNOS</a></li>
            <li class="nav-item"><a href="BorrarAlumnos.php" class="nav-link">ELIMINAR ALUMNOS</a></li>
            <li class="nav-item"><a href="ActualizarAlumnos.php" class="nav-link">ACTUALIZAR ALUMNOS</a></li>
            <li class="nav-item"><a href="Coordinador.php" class="nav-link">REGRESAR</a></li> 
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
    <main>   
      <form action="guardarA.php" method="POST" class="formulario">  
      <h2 class ="titulo">REGISTRAR ALUMNO</h2>
      <div class = "IncioSnecio">
      <input name = "firstname" class = "NC" type = "text" placeholder="Nombre Completo">
      <input name = "lasttname" class = "NC" type = "text" placeholder="Apellido Paterno">
      <input name = "lastname2" class = "NC" type = "text" placeholder="Apellido Materno">
      <input name = "Ncontrol"  class = "NC" type = "text" placeholder="Numero de Control">
      <input name = "telefono" class = "NC" type = "text" placeholder="Telefono">
      <input name = "correo" class = "NC" type = "text" placeholder="Correo">
      <input name = "semestre" class = "NC" type = "number" placeholder="Semestre">
      </div>
  
      <div class = "grupos-carreras" >
          <Label style="margin-left: 30%;">Grupos</Label>
          <?php
          include 'conexionC.php';
          $consulta = "SELECT * FROM grupos";
          $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
          echo "<select required name = 'grupos'>";
          while ($columna = mysqli_fetch_array( $resultado ))
          {
              echo "<option value='". $columna['nombre_grupo']."'>";
              echo $columna['nombre_grupo'];
              echo "</option>";      
          }
          echo "<select>";
          mysqli_close( $conexion );
          ?>
  
  <Label>Carrera</Label>
          <?php
          include 'conexionC.php';
          $consulta = "SELECT * FROM carreras";
          $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
          echo "<select required name = 'carreras'>";
          while ($columna = mysqli_fetch_array( $resultado ))
          {
             
              echo "<option value='". $columna['siglas']."'>";
              echo $columna['siglas'];
              echo "</option>";      
          }
          echo "<select>";
          mysqli_close( $conexion );
          ?>
  
  
    
         <div class = "rutas">
          <div class = "buton"><button type="submit">REGISTRAR</button></div>
          </form>
         </div>
  
      </main>
      <div class = "buton"><button  style="margin-left: 46%; margin-top: 2%" onclick="location.href='Coordinador.php'" >CANCELAR</button></div>
  
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