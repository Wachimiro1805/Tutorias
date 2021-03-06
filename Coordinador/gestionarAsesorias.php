<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinador</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
  <link rel="stylesheet" href="../css/estiloC.css">
  </head>

<body>

  <header class="navbar navbar-dark bg-dark navbar-expand-md">
    <a style="margin-left: 10px" class="navbar-brand">INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse end-justify" id="navbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="gestionarAsesorias.php" class="nav-link">REGISTRAR</a></li>
            <li class="nav-item"><a href="EliminarAsesoria.php" class="nav-link">ELIMINAR</a></li>
            <li class="nav-item"><a href="ActualizarAsesoria.php" class="nav-link">ACTUALIZAR</a></li>
            <li class="nav-item"><a href="Coordinador.php" class="nav-link">REGRESAR</a></li>
                    
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
 
 
  <main>
    <form action="guardarAS.php" method="POST" class="formulario">  
      <h2 class ="titulo">REGISTRAR ASESORIAS</h2>
      <div class = "contenedor-form">
      <input name = "nombre" class = "NC" type = "text" placeholder="Nombre de la asesoria">
      <input name = "impartidor" class = "NC" type = "text" placeholder="¿Quien la impartirá?">
      <div class="row-input">
      <input class="NC" name = "fecha" type="date" placeholder="Fecha de inicio">
      </div>
      <div class="row-input">      
      <select class="NC" name = "asesoria" required>
             <option value=""selected>
                 Tipo de asesoria
             </option>
             <option>
                Taller
             </option>
            <option>
                Conferencias
            </option>
            <option>
                Asesoria academica
            </option>
            <option>
                Asesoria psicologica
            </option>
            <option>
                Tutoria
            </option>
         </select>
      </div>

        <div class="row-input">
        <textarea name = "descripcion" cols = "30" rows="5" placeholder=" Escribe tus comentarios" class="NC"></textarea>
        </div>
   
      </div>

         <div class = "rutas">
          <div class = "buton"><button type="submit">REGISTRAR</button></div>
          </form>     
  </main>

  


</body>
</html>


<!--   <h2 class ="titulo">REGISTRAR ASESORIAS</h2>
      <form action="guardarAS.php" method="POST">  
    <div class = "IncioSnecio">
       
      <label>Nombre</label>
      <input name = "nombre" class = "NC" type = "text" placeholder="Nombre Completo">
  
      <labe for = "fecha">Fecha de inicio</label>   
      <input type="date" id = "fecha">

      <labe>Fecha de inicio</label>  
      <input name = "lasttname" class = "NC" type = "text" placeholder="Apellido Paterno">
  
      <label>Tipo de asesoria:</label>
      <select required>
             <option value=""selected>
                 Selecciona opcion
             </option>
             <option>
                Taller
             </option>
            <option>
                Conferencias
            </option>
            <option>
                Asesoria academica
            </option>
            <option>
                Asesoria psicologica
            </option>
            <option>
                Tutoria
            </option>
         </select>
     
      <label>Descripcion</label>
     <textarea cols = "30" rows="5" placeholder=" Escribe tus comentarios"></textarea>
    </div>
  
         <div class = "rutas">
          <div class = "buton"><button type="submit">REGISTRAR</button></div>
          </form>
         </div> -->